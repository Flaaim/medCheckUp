$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    function showFactors(){
        $.ajax({
            url: "/directions/loadfactors",
            method: "POST",
            dataType: "json",
            success: function(data){
                get_select_form(data);
            }
        });
    }
    $('#psycho').change(function(){
        
        if($(this).prop('checked')){
            showFactors();
        } else {
            $('#psycho-factors').remove();
            $('#select-label').remove();
            $('#select-label').remove();
        } 
    });
    

    function get_select_form(data){
        let label = $('<label></label>').text('Укажите вид работ').attr('for','psycho-factors').attr('id','select-label').appendTo('.select');
        let select = $('<select multiple></select>').addClass("form-control").attr('id', 'psycho-factors').attr('name', "psychofactors[]").appendTo('.select');
        let psychofactors = $('#psycho-factors');
        $.each(data.factors, function(index, value){
            psychofactors.append($('<option></option>').attr('value', value.id).text(value.alias));
        });
        let small = $('<small></small>').addClass("form-text text-muted").attr('id','select-label').text('* Чтобы выбрать несколько видов зажмите Ctrl').appendTo('.select');
            
    }
