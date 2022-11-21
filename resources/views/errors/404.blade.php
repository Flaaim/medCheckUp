@extends('layouts.app')

@section('breadcrumbs', '')
@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                <div class="d-flex flex-column align-items-center mt-5">
                    <h1>Страница не найдена</h1>
                        <p>
                            Вернуться на <a href="{{route('welcome')}}">главную</a>
                        </p>
                        <img src="{{url('/images/cat.png')}}" alt="Images cat">
                </div>
                
            </div>
        </div>
    </div>

@endsection

