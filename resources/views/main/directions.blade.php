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
        <div class="table-responsive">
        <table class="table table-striped">

                
                    <div class="form-group row">

                        <div class="col-sm-4">
                        <label for="limit" >
                                Кол-во записей на странице:
                            </label>
                        <select name="limit" id="limit" class="form-control ">
                            <option value='10'>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        </div>
                            
                        <div class="col-sm-8">
                            <label for="search"><strong>Поиск направления:</strong></label>
                            <input type="text" id="search" class="form-control" placeholder="Введите фамилию для поиска">
                        </div>
                        
                    </div>
                

                <thead>
                    <th>Номер<button id="id" class="btn btn-link sort active" value="desc"><i id="sort-number-caret" class="bi bi-caret-up"></i></button>
                    </th>
                    <th >
                        <div class="d-flex">
                        <span>
                            Дата выдачи
                        </span>          
                        <button id="date" class="btn btn-link sort" value="desc"><i id="sort-data-caret" class="bi bi-caret-up"></i></button>                            
                        </div>  
                    </th>
                    <th>Вид направления</th>
                    <th>ФИО
                    <button id="fullname" class="btn btn-link sort" value="desc"><i id="sort-number-caret" class="bi bi-caret-up"></i></button>
                    </th>
                    <th>Должность</th>
                    <th>Псих. осв.</th>
                    <th colspan="3">Действия</th>
                </thead>
                <tbody class="directions">   
                </tbody>
                
            </table>
        </div>   
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex align-self-center show-records rows mx-3">
                </div>
                <div class="d-flex pagination mx-3">
                </div>
            </div>
            

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
        let sort = options.sort || 'desc';
        let page = options.page || 1;
        let limit = options.limit || 10;
        let keyword = $('#search').val();
            $.ajax({
                url: "{{route('directions.search')}}",
                method: "POST",
                data: {
                    keyword:keyword,
                    sort:sort,
                    field: field,
                    page:page,
                    limit:limit
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

        $('#limit').change(function(){
            options.limit = $(this).children('option:selected').val()
            search(options)
        })  
       
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
            let htmlPaginateView = "";
            let htmlRecordsView = "";
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
                        <td>`
                        res.directions[i].psychofactors.length == 0 ? htmlView += `Нет` : htmlView += `Да`;
                        htmlView +=  `</td>
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
            htmlPaginateView += `<div>`
                        for(let i = 1; i <= res.countpages; i++){
                            if(i == res.pagenumber){
                                htmlPaginateView += `
                            <button class="btn btn-outline-lighpaginate" value="`+i+`" disabled>`+i+`</button>
                            `
                            } else {
                                htmlPaginateView += `
                            <button class="btn btn-outline-ligh paginate" value="`+i+`">`+i+`</button>
                            `
                            }
                            
                        }
            htmlPaginateView += `</div>`
            htmlRecordsView += `<div>
                        Показаны результаты с `+res.firstLast['first']+` по `+res.firstLast['last']+` Всего: `+res.firstLast['all']+` 
                        </div>`
            $('.directions').html(htmlView);
            $('.pagination').html(htmlPaginateView);
            $('.show-records').html(htmlRecordsView);
            $('.paginate').click(function(){
                options.page = $(this).val();
                search(options);
            })

        }


</script>