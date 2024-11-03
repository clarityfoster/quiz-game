@extends('layouts.app')
@section('content')
    <div class="custom-container">
        <h4 class="my-4 leaderboard">
            Leaderborad
            <span class="badge bg-primary text-white">{{ $users->count() }}</span>
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="bg-secondary text-white" scope="col">User Name</th>
                    @php
                        $linear = [
                            'cherry-blossom-linear',
                            'blue-linear',
                            'purple-linear',
                            'sunny-linear',
                            'emerald-linear',
                            'berry-linear',
                            'peacock-blue-linear',
                            'ruby-red-linear',
                            'flamingo-pink-linear',
                        ];
                    @endphp
                    @foreach ($categories as $index => $category)
                        <th scope="col" class="text-white {{ $linear[$index % count($linear)] }}">{{ $category->name }}
                            Score</th>
                    @endforeach
                    <th class="bg-secondary text-white" scope="col">Total Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="{{ auth()->check() && auth()->user()->id == $user->id ? 'table-active' : '' }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        @php
                            $colors = [
                                'cherry-blossom-linear1',
                                'blue-linear1',
                                'purple-linear1',
                                'sunny-linear1',
                                'emerald-linear1',
                                'berry-linear1',
                                'peacock-blue-linear1',
                                'ruby-red-linear1',
                                'flamingo-pink-linear1',
                            ];
                            $usersCategoryScore = $userAnswer
                                ->where('user_id', $user->id)
                                ->groupBy('category_id')
                                ->map(function ($category) {
                                    return $category->sum('score');
                                });
                        @endphp
                        @foreach ($categories as $index => $cat)
                            <td class="{{ $colors[$index % count($colors)] }}">{{ $usersCategoryScore->get($cat->id, 0) }}
                                <span class="text-muted">
                                    / {{ $questionsByCategories[$cat->id] ?? 'NULL' }}
                            </td>
                            </span>
                        @endforeach
                        <td>
                            <b>{{ $usersCategoryScore->sum() }}
                                <span class="text-muted"> / {{ $questions->count() ?? 'NULL' }}</span>
                            </b>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
