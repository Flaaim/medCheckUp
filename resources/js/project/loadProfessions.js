// Загружает профессии в направления на медицинские осмотры.
    $('#profession').change(function(){
        let profession = $('#profession option:selected').val()
       
        $.ajax({
            url: '/directions/loadProfessions',
            method: "POST",
            data:{profession:profession},
            dataType: "json",
            success: function(data){
                loadProfessions(data)
            }
        })
    })
    function loadProfessions(data){
        $('#factors').val(data.harmFulfactor.harmfulfactor)
    }