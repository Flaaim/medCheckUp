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
                    <th>Номер<button id="id" class="btn btn-link sort active" value="asc"><i id="sort-number-caret" class="bi bi-caret-up"></i></button>
                    </th>
                    <th >
                        <div class="d-flex">
                        <span>
                            Дата выдачи
                        </span>          
                        <button id="date" class="btn btn-link sort" value="asc"><i id="sort-data-caret" class="bi bi-caret-up"></i></button>                            
                        </div>  
                    </th>
                    <th>Вид направления</th>
                    <th>ФИО
                    <button id="fullname" class="btn btn-link sort" value="asc"><i id="sort-number-caret" class="bi bi-caret-up"></i></button>
                    </th>
                    <th>Должность</th>
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
    const options = {}

    function search(options){
        let field = options.field || 'id';
        let sort = options.sort || 'asc';
        let page = options.page || 1;
        let keyword = $('#search').val();
            $.ajax({
                url: "{{route('directions.search')}}",
                method: "POST",
                data: {
                    keyword:keyword,
                    sort:sort,
                    field: field,
                    page:page
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

        search(options);



        $('#search').on('keyup', function(){
            search(options);
        });

        $('.sort').click(function(){
            this.val == 'asc' ? this.val = 'desc' : this.val = 'asc'
            $(this).val(this.val);
            options.field = $(this).attr('id');
            options.sort = $(this).val();
            $(this).children().attr('class') == 'bi bi-caret-down' ? $(this).children().attr('class', 'bi bi-caret-up') : $(this).children().attr('class', 'bi bi-caret-down');
            search(options);
        })
        

        
        function table_post_row(res){
            let htmlView = "";
            if(res.directions.length <= 0){
                htmlView += `
                    <tr>
                        <td colspan="6">Направления не найдены!</td>
                    </tr>`;
            }
           console.log(res)
            for(let i = 0; i < res.directions.length; i++){
                htmlView += `
                    <tr>
                        <td>`+ res.directions[i].id +`</td>
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
            htmlView += `<tr>`
                        for(let i = 1; i <= res.countpages; i++){
                            htmlView += `<td><button class="paginate" value="`+i+`">`+i+`</button></td>`
                        }
            htmlView += `</tr>`
            $('.directions').html(htmlView);

            $('.paginate').click(function(){
                options.page = $(this).val();
                search(options);
            })

        }


</script>