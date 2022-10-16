@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-8">
                @include('components.validation-errors')
                <div class="card">
                    <div class="card-header">
                        {{__('company.company_edit')}}
                    </div>
                    <div class="card-body">
                    <form action="{{route('company.update', ['company' => $company])}}" method="POST">
                            @csrf
                            @METHOD('PUT')
                            <div class="form-group">
                                <label for="name">{{__('company.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
                                <small class="form-text text-muted">* обязательно к заполнению</small>
                            </div>  
                            <p></p> 
                            <div class="form-group">   
                                <label for="type_of_ownership">{{__('company.type_of_ownership')}}</label>
                                <input type="text" class="form-control" id="type_of_ownership" name="type_of_ownership" value="{{$company->type_of_ownership}}">
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="economic_activity">{{__('company.economic_activity')}}</label>
                                <input type="text" class="form-control" id="economic_activity" name="economic_activity" value="{{$company->economic_activity}}">
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="ogrn">{{__('company.ogrn')}}</label>
                                <input type="text" class="form-control" id="ogrn" name="ogrn" value="{{$company->ogrn}}">
                            </div>
                            <p></p>
                            <div class="form-group">
                            <label for="email">{{__('company.email')}}</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$company->email}}">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>Ниже укажите работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="fullname">{{__('company.fullname')}}</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" value="{{$company->fullname}}">
                                <label for="profession">{{__('company.profession')}}</label>
                                <input type="text" class="form-control" name="profession" id="profession" value="{{$company->profession}}">
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">{{__('company.edit_button')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection