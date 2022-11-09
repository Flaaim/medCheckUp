@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                <div class="d-flex flex-column align-items-center mt-5">
                    <h1>Страница на найдена</h1>
                        <p>
                            Вернитесь на <a href="{{route('home')}}">главную</a>
                        </p>
                </div>
                
            </div>
        </div>
    </div>

@endsection

