$(function(){
    
    
    //click on email sorting button
    $("#email").click(function(){
        $.ajax({
            url: "sort-email.php",
            success: function (data){
                $('#notes').html(data);
                
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> All Notes)");
                        $("#alert").fadeIn();
            }

        });
    
    });


    $("#status").click(function(){
        $.ajax({
            url: "sort-by-status.php",
            success: function (data){
                $('#notes').html(data);
                
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> All Notes)");
                        $("#alert").fadeIn();
            }

        });
    
    });

    $("#username").click(function(){
        $.ajax({
            url: "sort-by-username.php",
            success: function (data){
                $('#notes').html(data);
                
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> All Notes)");
                        $("#alert").fadeIn();
            }

        });
    
    });


});



 


