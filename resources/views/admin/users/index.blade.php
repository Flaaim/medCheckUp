@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user::ACTIVE) 
                        <span class="badge bg-secondary">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>Удалить</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection