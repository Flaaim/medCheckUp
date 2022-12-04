<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>Настройки</span>
            <span><a href="{{route('home')}}">Назад</a></span>
        </div>    
    
    </div>
    <div class="card-body">
        <h4>Импорт таблицы с профессиями/факторами</h4>
        <p>
            Вы можете загрузить excel файл с профессиями и пунктами вредных производственными факторов, которые им соответствуют, чтобы в дальнейшем при создании направления не указывать их вручную.
        </p>
        <p>
            <a href="{{route('harmfulfactors.index')}}">Настроить импорт</a>
        </p>
        <h4>Медицинское медучреждение</h4>
        @if($medclinic)
        <p>
            Медицинское учреждение успешно добавлено. Отметьте флажок, чтобы активировать добавление медицинского учреждения в форму направления.
        </p>
        <div class="d-flex m-3 align-items-center justify-content-center ">
            <div class="col-2 form-check">
                <label class="form-check-label" for="medclinic">Активировать</label>
                <input type="checkbox" class="form-check-input medclinicStatus" name="medclinicStatus" value="{{$medclinic->status}}">
            </div>
            <div class="col-6 text-center">{{$medclinic->clinicName}}</div>
            <div class="col-2 text-center"><a href="{{route('medclinic.edit', $medclinic)}}">Изменить</a></div>
            <div class="col-2 text-center">
                <form action="{{route('medclinic.destroy', $medclinic)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">Удалить</button>
                </form>
            </div>
        </div>
        @else
        <p>Ниже вы можете добавить медициского учреждения. При выборе учреждения, указанные данные будут заполняться в направлении автоматически</p>
        <p>
            <a href="{{route('medclinic.create')}}">Добавить медучреждение</a>
        </p>
        @endif
    </div>
</div>

<script>

    $(document).ready(function(){
        if($('.medclinicStatus').val() == 1){
            $('.medclinicStatus').attr('checked', true);
        }


    })

    $('.medclinicStatus').on('click',function(){
        let status = $(this).val()
        console.log('value= '+status)
        $('.medclinicStatus').attr('disabled', true);
        $.ajax({
            url: "{{route('medclinic.status')}}",
            method: "POST",
            data: {status:status},
            dataType: "json",
            success: function(data){
                
            console.log('return '+data.status)
            updateStatus(data);
            }
        }) 
        function updateStatus(data){
        $('.medclinicStatus').val(data.status);
        $('.medclinicStatus').attr('disabled', false);
    }
    })


    function showMessage(){
        $(`<div id="flashmessage" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Медицинское учреждение успешно активировано. Теперь оно будет отображаться в направлении на медицинский осмотр</strong>
                    </div>`).prependTo('.col-md-10').fadeOut(5000);
    }
</script>