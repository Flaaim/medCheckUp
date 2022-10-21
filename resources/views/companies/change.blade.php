                 <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                        <span>{{__('company.company_change')}}</span>
                        <span><a href="{{route('home')}}">Назад</a></span>
                    </div>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.changeCompany')}}" method="POST">
                            @csrf
                        <select name="id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <p></p>
                        <button type="submit" class="btn btn-primary">Выбрать</button>
                        </form>

                    </div>
                </div>