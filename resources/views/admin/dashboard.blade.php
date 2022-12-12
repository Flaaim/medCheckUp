@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">
            Admin Panel
        </div>

        <div class="card-body">
            <p>
                Привет {{Auth::user()->name}}!
            </p>
            Всего зарегистрировано пользователей: {{count($users)}}

        </div>
    </div>
@endsection