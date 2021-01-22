$(document).ready(function(){

    $.ajax({
        method: "POST",
        url: "init.php",
        success: function(response){
            console.log(response);
           console.log('ready');
         }
      })

    $('.file-item a').click(function(e){
        e.preventDefault;
        let file =  $(this).text();

        $.ajax({
            method: "POST",
            url: "parse.php",
            data: { fileName : file },
            success: function(response){
                $('.listing').text(`${response}`);
                $('.filename').html(file);
            }
        })
        
    })




    $('#getValue').click(function(e){
        e.preventDefault;

        let id =  $('#idNumber');
        let value = $('#valueNumber');

        if(id == ''){
            alert('Поле id пустое!!!!');
        }else{
            $.ajax({
                method: "POST",
                url: "getvalue.php",
                data: { number : id.val() },
                success: function(response){
                   if(response == 0){
                        alert('Такого значения несуществует!');
                        id.val('');
                        value.val('');
                   }else{
                    value.val(response);
                   }
                   
                }
            })
        }
        
    })
})