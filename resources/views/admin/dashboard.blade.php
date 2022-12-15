@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
    @include('admin._tabs')
    <div class="card my-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Hello {{Auth::user()->name}}!</li>
            <li class="list-group-item">Всего пользователей зарегистрировано: {{count($users)}}</li>

          </ul>
    </div>
</div>
</div>
@endsection