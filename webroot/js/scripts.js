$(document).ready(function () {
    
    throwError();

    function throwError(){
        var errorList = $(".error-list").val();
        
        if(errorList !== ""){
            var message = $(".error-message").val();
            var messageField = $(".error-message-field").val();
            list = errorList.split("|");
            $("."+ messageField).text(message);

        for(i = 0; i < Object.keys(list).length; i++){
            console.log(list[i])
            $("[name='"+list[i]+"']").addClass('error');
        }

        }

    }

    $('input').keypress(function (e) { 
        $(this).removeClass('error');
    });
});