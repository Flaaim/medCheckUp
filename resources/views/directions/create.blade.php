
                <div class="card">
                    <div class="card-header">
                        {{__('direction.new_direction')}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('direction.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="company_name"><strong>{{__('direction.company_name')}}</strong></label>
                                <input type="text" class="form-control" placeholder="{{$company->name}}" disabled>
                            </div>
                            <p></p>
                            <div class="col-5">
                                <label for="date">{{__('direction.date')}}</label>
                                <input type="date" class="form-control" name="date" >
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
                                <input class="form-control" type="text" name="fullname" id="fullname">
                                <small class="form-text text-muted">* Полностью</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="birthdate">{{__('direction.birthdate')}}</label>
                                <input type="text" class="form-control" id="birthdate" name="birthdate">
                                <small class="form-text text-muted">* Дата рождения в формате ДД.ММ.ГГГГ</small>
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
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="profession">{{__('direction.profession')}}</label>
                                <input type="text" class="form-control" id="profession" name="profession">
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="factors">{{__('direction.factors')}}</label>
                                <input type="text" class="form-control" id="factors" name="factors">
                                <small class="form-text text-muted">* Перечислите пункты факторов через запятую</small>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <p><strong>ФИО, должность работника, который будет выдавать направление на медицинский осмотр</strong></p>
                                <label for="author_fullname">{{__('direction.author_fullname')}}</label>
                                <input type="text" class="form-control" name="author_fullname" id="author_fullname" value="{{$company->fullname}}">
                                <label for="author_profession">{{__('direction.author_profession')}}</label>
                                <input type="text" class="form-control" name="author_profession" id="author_profession" value="{{$company->profession}}">
                            </div>
                            <p></p>
                            <button class="btn btn-primary" type="submit">{{__('direction.create')}}</button>
                            <a href="#" class="btn btn-primary disabled">Предварительный просмотр</a>
                        </form>
                    </div>
                </div>
