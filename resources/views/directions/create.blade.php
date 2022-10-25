
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>{{__('direction.new_direction')}}</span>
                            <span><a href="{{route('home')}}">Назад</a></span>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('direction.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="company_name"><strong>{{__('direction.company_name')}}</strong></label>
                                <input type="text" class="form-control" placeholder="{{$company->name}}" disabled>
                            </div>
                            <p></p>

                            <div class="row">
                                <div class="col">
                                    <label for="date">{{__('direction.date')}}</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                <label for="number">{{__('direction.number')}}</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{old('number')}}">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror  
                                </div>
                            </div>
                            <p></p>
                            <h2>Направление</h2>
                            <div class="form-group">
                                <label for="typeOfDirection">{{__('direction.typeOfDirection')}}</label>
                                <select class="form-control" name="typeOfDirection" id="typeOfDirection">
                                    <option value="Предварительный">Предварительный</option>
                                    <option value="Периодический">Переодический</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="fullname">{{__('direction.fullname_worker')}}</label>
                                <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" id="fullname" value="{{old('fullname')}}">
                                <small class="form-text text-muted">* Указываем ФИО полностью</small>
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="birthdate">{{__('direction.birthdate')}}</label>
                                <input type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{old('birthdate')}}">
                                <small class="form-text text-muted">* Дата рождения в формате ДД.ММ.ГГГГ</small>
                                @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="gender">{{__('direction.gender')}}</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="М">М</option>
                                    <option value="Ж">Ж</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="department">{{__('direction.department')}}</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{old('department')}}">
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="profession">{{__('direction.profession')}}</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror" id="profession" name="profession" value="{{old('profession')}}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="factors">{{__('direction.factors')}}</label>
                                <input type="text" class="form-control @error('factors') is-invalid @enderror" id="factors" name="factors" value="{{old('factors')}}">
                                <small class="form-text text-muted">* Перечислите пункты факторов через запятую</small>
                                @error('factors')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>ФИО, должность работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="author_fullname">{{__('direction.author_fullname')}}</label>
                                <input type="text" class="form-control @error('author_fullname') is-invalid @enderror" name="author_fullname" id="author_fullname" value="{{$company->fullname}}">
                                @error('author_fullname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="author_profession">{{__('direction.author_profession')}}</label>
                                <input type="text" class="form-control @error('author_profession') is-invalid @enderror" name="author_profession" id="author_profession" value="{{$company->profession}}">
                                @error('author_profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p></p>
                            <div class="form-check">
                                <label for="psycho"><strong>{{__('direction.psycho')}}<strong></label>
                                <input type="checkbox" class="form-check-input" name="psycho" id="psycho">
                            </div>
                            <p></p>

                            {{-- Направление на психиатрическое освидетельствование --}}

                            <div class="form-group select">

                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">{{__('direction.create')}}</button>
                            <a href="#" class="btn btn-primary disabled">Предварительный просмотр</a>
                        </form>
                    </div>
                </div>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#psycho').change(function(){
        if($(this).prop('checked')){
            showFactors();
        } else {
            $('#psycho-factors').remove();
            $('#select-label').remove();
            $('#select-label').remove();
        } 
    });
    
    function showFactors(){
        $.ajax({
            url: "{{route('direction.loadfactors')}}",
            method: "POST",
            dataType: "json",
            success: function(data){
                get_select_form(data);
            }
        });
    }
    function get_select_form(data){
        let label = $('<label></label>').text('Укажите вид работ').attr('for','psycho-factors').attr('id','select-label').appendTo('.select');
        let select = $('<select multiple></select>').addClass("form-control").attr('id', 'psycho-factors').attr('name', "psychofactors[]").appendTo('.select');
        let psychofactors = $('#psycho-factors');
        $.each(data.factors, function(index, value){
            psychofactors.append($('<option></option>').attr('value', value.id).text(value.alias));
        });
        let small = $('<small></small>').addClass("form-text text-muted").attr('id','select-label').text('* Чтобы выбрать несколько видов зажмите Ctrl').appendTo('.select');
            
    }

    </script>

    
    
   
