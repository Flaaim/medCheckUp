@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Изменить компанию
                    </div>
                    <div class="card-body">
                    <form action="{{route('company.update', ['company' => $company])}}" method="POST">
                            @csrf
                            @METHOD('PUT')
                            <div class="form-group">
                                <label for="name">Название </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
                                <small class="form-text text-muted">* обязательно к заполнению</small>
                            </div>   
                            <div class="form-group">   
                                <label for="type_of_ownership">Форма собственности</label>
                                <input type="text" class="form-control" id="type_of_ownership" name="type_of_ownership" value="{{$company->type_of_ownership}}">
                            </div>

                            <div class="form-group">
                            <label for="economic_activity">Вид экономической деятельности по ОКВЭД</label>
                                <input type="text" class="form-control" id="economic_activity" name="economic_activity" value="{{$company->economic_activity}}">
                            </div>

                            <div class="form-group">
                            <label for="ogrn">ОГРН</label>
                                <input type="text" class="form-control" id="ogrn" name="ogrn" value="{{$company->ogrn}}">
                            </div>

                            <div class="form-group">
                            <label for="email">Адрес эл.почты</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$company->email}}">
                            </div>
                            <div class="form-group">
                                <p><strong>Ниже укажите работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="fullname">ФИО полностью</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" value="{{$company->fullname}}">
                                <label for="profession">Должность</label>
                                <input type="text" class="form-control" name="profession" id="profession" value="{{$company->profession}}">
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection