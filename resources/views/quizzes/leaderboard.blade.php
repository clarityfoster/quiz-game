@extends('layouts.app')
@section('content')
    <div class="custom-container">
        <h4 class="my-4">
            Leaderborad
            <span class="badge text-bg-secondary">{{ $users->count() }}</span>
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    @foreach ($categories as $category)
                        <th scope="col">{{ $category->name }} Score</th>
                    @endforeach
                    <th scope="col">Total Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="{{ auth()->check() && auth()->user()->id == $user->id ? "table-active" : "" }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        @php
                            $usersCategoryScore = $userAnswer
                                ->where('user_id', $user->id)
                                ->groupBy('category_id')
                                ->map(function ($category) {
                                    return $category->sum('score');
                                });
                        @endphp
                        @foreach ($categories as $cat)
                            <td>{{ $usersCategoryScore->get($cat->id, 0) }}
                                <span class="text-muted">
                                    / {{ $questionsByCategories[$cat->id] ?? "NULL" }}
                            </td>
                            </span>
                        @endforeach
                        <td>
                            <b>{{ $usersCategoryScore->sum() }}
                                <span class="text-muted"> / {{ $questions->count() ?? "NULL" }}</span>
                            </b>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
