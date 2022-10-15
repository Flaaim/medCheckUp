@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                        <span>Сменить компанию</span>
                        <span><a href="{{route('home')}}">Назад</a></span>
                    </div>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.changeCompany')}}" method="POST">
                            @csrf
                        <select name="id" class="form-control">
                            
                            
                            @foreach($companies as $company)
                                @if($company->status == '1')
                                <option value="{{$company->id}}" selected>{{$company->name}}</option>
                                @else
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <p></p>
                        <button type="submit" class="btn btn-primary">Выбрать</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection