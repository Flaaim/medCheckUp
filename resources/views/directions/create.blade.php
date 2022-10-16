@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                 @include('components.flash-message')
                <div class="card">
                    <div class="card-header">
                        Новое направление на медицинский осмотр
                    </div>
                    <div class="card-body">
                        <form action="{{route('direction.store')}}" method="POST">
                            @csrf
                            <p></p>
                            <div class="col-5">
                                <label for="date">Дата выдачи направления</label>
                                <input type="date" class="form-control" name="date" >
                            </div>
                            <p></p>
                            <h2>Направление</h2>
                            <div class="form-group">
                                <label for="typeOfDirection">Вид медицинского осмотра</label>
                                <select class="form-control" name="typeOfDirection" id="typeOfDirection">
                                    <option value="first">Предварительный</option>
                                    <option value="second">Переодический</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="fullname">Фамилия Имя Отчество</label>
                                <input class="form-control" type="text" name="fullname" id="fullname">
                                <small class="form-text text-muted">* Полностью</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="birthdate">Дата рождения</label>
                                <input type="text" class="form-control" id="birthdate" name="birthdate">
                                <small class="form-text text-muted">* Дата рождения в формате ДД.ММ.ГГГГ</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="gender">Пол</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="male">М</option>
                                    <option value="female">Ж</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="department">Структурное подразделение</label>
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="profession">Наименование должности (профессии) или вида работы</label>
                                <input type="text" class="form-control" id="profession" name="profession">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="factors">Вредные и (или) опасные производственные факторы. 
                                Вид работы</label>
                                <input type="text" class="form-control" id="factors" name="factors">
                                <small class="form-text text-muted">* Перечислите пункты факторов через запятую</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>ФИО, должность работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="author_fullname">Фамилия Имя Отчество</label>
                                <input type="text" class="form-control" name="author_fullname" id="author_fullname" value="{{$company->fullname}}">
                                <label for="author_profession">Должность</label>
                                <input type="text" class="form-control" name="author_profession" id="author_profession" value="{{$company->profession}}">
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">Создать</button>
                            <a href="#" class="btn btn-primary disabled">Предварительный просмотр</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection