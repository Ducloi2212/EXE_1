@extends('dashboard')

@section('content')
<div class="container list view">
    <div class="row justify-content-center text-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->phone }}</th>
                    <th>{{ $user->address }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection