<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>
                Импорт таблицы с профессиями/факторами
            </span>
            <a href="{{route('settings')}}">Вернуться к настройкам</a>
        </div>
        
    </div>

    <div class="card-body">
        @if(count($harmfulFactors) > 0)
        <p>Факторы успешно загружены</p>
            <table class="table">
                <th>Профессия/Должность</th>
                <th>Вредный фактор/Вид деятельности</th>
                <th>Действия</th>
                
                    @foreach($harmfulFactors as $factor)
                        <tr>
                            <input type="hidden" class="form-control {{$factor->id}}" value="{{$factor->id}}">
                            <td><input type="text" class="form-control {{$factor->id}}" value="{{$factor->profession}}" disabled>
                            </td>
                            <td><input type="text" class="form-control {{$factor->id}}" value="{{$factor->harmfulfactor}}" disabled>
                                </td>
                            <td>
                                <button id="{{$factor->id}}" class="btn btn-link save" disabled>Сохранить</button>
                                <button id="{{$factor->id}}" class="btn btn-link changeFactor">Изменить</button>
                            </td>
                            
                        </tr>
                    @endforeach
                <tr></tr>
            </table>
            <form action="{{route('harmfulfactors.delete.all', $company)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Удалить все факторы</button>
            </form>
            
       @else
        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-3">
                <label for="uploadExcel" class="form-label">Загрузить excel файл</label>
                <input type="file" name="harmfulFactors" class="form-control " id="uploadExcel" required>
            </div>
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
        @endif
    </div>
</div>
<script>
    $('.changeFactor').click(function(){
        let id = $(this).prop('id');
        $('.'+id).prop('disabled', false);
        $('#'+id).prop('disabled', false);
    })
    $('.save').click(function(){
        let id = $(this).prop('id')
        const arr = [];
        $('.'+id).each(function(){
            arr.push($(this).val());
        })
        console.log(arr)
        $.ajax({
            url: "{{route('harmful.save')}}",
            method: "POST",
            data: {arr:arr},
            dataType: "json",
            success: function(data){
                console.log(data)
                $('.'+data.updateFactors.id).prop('disabled', true);
                $('#'+data.updateFactors.id).prop('disabled', true);
            }
        })
    })


</script>