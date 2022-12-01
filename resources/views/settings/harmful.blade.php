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
        
        <div class="row align-items-center">
            <div class="col-4">
                <span>Факторы успешно загружены</span>
            </div>
            <div class="col-4">
                <form action="{{route('harmfulfactors.delete.all', $company)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary my-3">Удалить все факторы</button>
                </form>
            </div>
            <div class="col-3">
                <button  class="btn btn-primary" id="addOnefactor">Добавить фактор</button>
            </div>
            
        </div>
            <table class="table table-striped">
                <th>Профессия/Должность</th>
                <th>Вредный фактор/Вид деятельности</th>
                <th>Действия</th>
                    @foreach($harmfulFactors as $factor)
                        <tr id="{{$loop->iteration}}">
                            <input type="hidden" name="id" class="form-control data" value="{{$factor->id}}">
                            <td>
                                <input type="text" name="profession" class="form-control data" value="{{$factor->profession}}" required>
                            </td>
                            <td><input type="text" name="harmfulfactor" class="form-control data" value="{{$factor->harmfulfactor}}"  required>
                                </td>
                            <td>
                                <button id="{{$loop->iteration}}" class="btn btn-link save">Сохранить</button>
                                <form action="{{route('harmful.destroy', $factor)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Удалить</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                <tr></tr>
            </table>
       @else
        <form action="{{route('harmfulfactors.import')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-3">
                <label for="uploadExcel" class="form-label">Загрузить excel файл</label>
                <input type="file" name="harmfulFactors" class="form-control  @error('harmfulFactors') is-invalid @enderror" id="uploadExcel" >
            </div>
        @if(count($errors) > 0)
            
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                
                {{ $errors->first() }} <br>
                     
            </div>
        @endif
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
        @endif
    </div>
</div>
<script>
    
    $('.save').click(function(){
        let id = $(this).prop('id')
        const data = {};
        
        $('#'+id+' .data').each(function(){
            data[$(this).attr('name')] = $(this).val()
        })
        
        $.ajax({
            url: "{{route('harmful.save')}}",
            method: "POST",
            data: {data:data},
            dataType: "json",
            success: function(data){
            showMessage(data)
            window.setTimeout(location.reload(true), 3000);
            }
        })
    })
        $('#addOnefactor').one('click',function(){
            let tr = $(`
                <tr>
                    <td>Профессия/Должность</td>
                    <td>Вредный фактор/Вид деятельности</td>
                </tr>
                <tr id="saveNewFactor">
                    <td><input type="text" name="profession" class="form-control" required></td>
                    <td><input type="text" name="harmfulfactor" class="form-control" required></td>
                    <td><button class="btn btn-link saveNewFactor">Сохранить</button></td>
                </tr>`).prependTo('.table');
        })

    $('.table').on('click', '.saveNewFactor', function(){
        const data = {};
        $('#saveNewFactor input').each(function(){
            data[$(this).attr('name')] = $(this).val()
        })
        
        $('.saveNewFactor').attr('disabled', true);
            $.ajax({
            url: "{{route('harmful.save')}}",
            method: "POST",
            data: {data:data},
            dataType: "json",
            success: function(data){
            showMessage(data)
            window.setTimeout(location.reload(true), 3000);
            }
            })
    })

    function showMessage(data){
        if(data.hasOwnProperty('errors')){
                    let profession = data.errors.profession
                    let harmfulfactor = data.errors.harmfulfactor
                    $(`<div id="flashmessage" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>`+profession+`</strong>
                    <strong>`+harmfulfactor+`</strong>
                    </div>`).prependTo('.col-md-10');
        } else{
        $(`<div id="flashmessage" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>`+data.message+`</strong>
                    </div>`).prependTo('.col-md-10');
        }
    }

</script>