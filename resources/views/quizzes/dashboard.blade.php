@extends('layouts.app')
@section('content')
    <div class="custom-container">
        @include('share.alerts')
        <h4 class="my-4">
            Manage Users
            <span class="badge text-bg-secondary">{{ $users->count() }}</span>
        </h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Role</th>
                    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                        <th scope="col">Change Role</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $badgeBg = '';
                                switch ($user->role_id) {
                                    case 1:
                                        $badgeBg = 'text-bg-primary';
                                        break;
                                    case 2:
                                        $badgeBg = 'text-bg-success';
                                        break;
                                    case 3:
                                        $badgeBg = 'text-bg-secondary';
                                        break;
                                }
                            @endphp
                            <span class="badge {{ $badgeBg }}">{{ $user->role->name }}</span>
                        </td>
                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                            <td>
                                <div class="btn-group">
                                    @if (auth()->user()->role_id == 1)
                                        <div class="dropdown">
                                            <a href="" class="btn btn-outline-secondary dropdown-toggle me-2"
                                                data-bs-toggle="dropdown">
                                                Change Role
                                            </a>
                                            <div class="dropdown-menu drop-down-menu-dark">
                                                @foreach ([
                                                    1 => "Admin",
                                                    2 => "Manager",
                                                    3 => "User",
                                                ] as $roleId => $roleName)
                                                <form action="{{ route('changeRole', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input name="role_id" type="hidden" value="{{ $roleId }}">
                                                    <button type="submit" class="dropdown-item">{{ $roleName }}</button>
                                                </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if (auth()->user()->id !== $user->id && $user->role_id !== 1)
                                        @if ($user->ban == 0)
                                            <form action="{{ route('ban', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-warning">
                                                    Ban
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('unban', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    Unban
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
