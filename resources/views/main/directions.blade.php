<div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>
                {{ __('dashboard.directions') }}
                </span>
                @if($company)
                <span>
                <a href="{{route('direction.create')}}">{{__('dashboard.new_direction')}}</a>
                </span>
                @endif 
            </div>
        </div>
    <div class="card-body">
        @if($company)
            <table class="table">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="search" class="col col-form-label">Поиск направления:</label>
                        <div class="col-8">
                        <input type="text" id="search" class="form-control" placeholder="Введите фамилию для поиска">
                        </div>
                        
                    </div>
                </form>

                <thead>
                    <th>Номер
                    <button id="sort-number" class="btn btn-link" value="asc"><i id="sort-number-caret" class="bi bi-caret-up"></i></button>
                    </th>
                    <th >
                        <div class="d-flex">
                            <span>
                            Дата выдачи
                            
                            </span>          
                            <button id="sort-data" class="btn btn-link" value="asc"><i id="sort-data-caret" class="bi bi-caret-up"></i></button>                            
                        </div>  
                    </th>
                    <th>Вид направления</th>
                    <th colspan="2" class="text-center">Кому выдано</th>
                    <th>Действия</th>
                </thead>
                <tbody class="directions">

                </tbody>
                
            </table>
        @else
            Для того чтобы создать направление на медицинский осмотр необходимо зарегистрировать компанию
        @endif      
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            @if($company)
            <span><a href="{{route('direction.export', $company)}}">{{__('dashboard.export_direction')}}</a></span>
            @endif
        </div>
    </div>
</div>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });

        $('#search').on('keyup', function(){
            search();
        });
        $('#sort-data').click(function(){
            if(this.value == 'asc'){
                this.value = 'desc'
                $('#sort-data-caret').attr('class', 'bi-caret-down');
            } else {
                this.value = 'asc'
                $('#sort-data-caret').attr('class', 'bi-caret-up');
            }
            search();
        });
        $('#sort-number').click(function(){
            if(this.value == 'asc'){
                this.value = 'desc'
                $('#sort-number-caret').attr('class', 'bi-caret-down');
            } else {
                this.value = 'asc'
                $('#sort-number-caret').attr('class', 'bi-caret-up');
            }
            search();
        });
        search();
        function search(){
        let keyword = $('#search').val();
        let sortData = $('#sort-data').val();
        let sortNumber = $('#sort-number').val();
            $.ajax({
                url: "{{route('directions.search')}}",
                method: "POST",
                data: {
                    keyword:keyword, 
                    sortData:sortData, 
                    sortNumber:sortNumber,
                },
                dataType: "json",
                success: function(data){
                table_post_row(data)
                console.log(data)
                }, error(data){
                console.log('error!')
                }
            });
    
        }
        function table_post_row(res){
            let htmlView = "";
            if(res.directions.length <= 0){
                htmlView += `
                    <tr>
                        <td colspan="6">Направления не найдены!</td>
                    </tr>`;
            }
            
            for(let i = 0; i < res.directions.length; i++){
                htmlView += `
                    <tr>
                        <td>`+ res.directions[i].number +`</td>
                        <td>`+ res.directions[i].date +`</td>
                        <td>`+ res.directions[i].typeOfDirection +`</td>
                        <td>`+ res.directions[i].fullname +`</td>
                        <td>`+ res.directions[i].profession +`</td>
                        <td><a href="directions/download/`+res.directions[i].id+`">Скачать</a></td>
                        <td><a href="directions/edit/`+res.directions[i].id+`">Изменить</a></td>
                        <td>
                        <form action="directions/`+ res.directions[i].id+`" method="POST">
                            @METHOD('delete')
                            @csrf
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </form>
                        </td>
                    </tr>
                `;
            }
            $('.directions').html(htmlView);
        }
</script>