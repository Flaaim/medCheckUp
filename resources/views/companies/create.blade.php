@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                @include('components.validation-errors')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>{{__('company.company_create')}}</span>
                            <span><a href="{{route('home')}}">Вернуться назад</a></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('company.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <small class="form-text text-muted">* обязательно к заполнению</small>
                            </div>   
                            <div class="form-group">   
                                <label for="type_of_ownership">{{__('company.type_of_ownership')}}</label>
                                <input type="text" class="form-control" id="type_of_ownership" name="type_of_ownership">
                            </div>

                            <div class="form-group">
                            <label for="economic_activity">{{__('company.economic_activity')}}</label>
                                <input type="text" class="form-control" id="economic_activity" name="economic_activity">
                            </div>

                            <div class="form-group">
                            <label for="ogrn">{{__('company.ogrn')}}</label>
                                <input type="text" class="form-control" id="ogrn" name="ogrn">
                            </div>

                            <div class="form-group">
                            <label for="email">{{__('company.email')}}</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>Ниже укажите работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="fullname">{{__('company.fullname')}}</label>
                                <input type="text" class="form-control" name="fullname" id="fullname">
                                <label for="profession">{{__('company.profession')}}</label>
                                <input type="text" class="form-control" name="profession" id="profession">
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">{{__('company.create_button')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection