<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>Настройки</span>
            <span><a href="{{route('home')}}">Назад</a></span>
        </div>    
    
    </div>
    <div class="card-body">
        <h5>Импорт таблицы с факторами</h5>
        <p>
            Вы можете загрузить excel файл с вредными производственными факторами, устрановленными для профессий ваших работников, чтобы в дальнейшем при создании направления не указывать их вручную.
        </p>
       @if(count($harmfulFactors) > 0)
        <p>Факторы успешно загружены</p>
            <table class="table">
                <th>
                    №
                </th>
                <th>
                    Профессия/Должность
                </th>
                <th>
                    Вредный фактор/Вид деятельности
                </th>
                    @foreach($harmfulFactors as $factor)
                        <tr>
                            <td>{{$factor->id}}</td>
                            <td>{{$factor->profession}}</td>
                            <td>{{$factor->harmfulfactor}}</td>
                        </tr>
                    @endforeach
                <tr></tr>
            </table>
            <form action="{{route('factors.delete.all', $company)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Удалить все факторы</button>
            </form>
            
       @else
        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-3">
                <label for="uploadExcel"  class="form-label">Загрузить excel файл</label>
                <input type="file" name="harmfulFactors" class="form-control" id="uploadExcel">
            </div>
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
        @endif
    </div>
</div>