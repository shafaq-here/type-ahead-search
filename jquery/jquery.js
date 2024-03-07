$('#user-input').keyup(function()
{
    $user_input = $('#user-input').val() ;

    $.ajax({
        url:'data.php',
        method:'POST',
        data:{
            user_input : $user_input 
        },
        success:function(response) {
           $("#dropdata").html(response) ;
        }
    })


    if($("#user-input").val() !='') {
        $('.results-section').show() ;
    } else {
        $('.results-section').hide() ;
    }
})

