$(function(){
    //define variables
    //active note will store id of our current task to store info in the appropriate DM row
    var activeNote = 0;
    var editMode = false;
    $(".back").hide();
    //load notes on page load: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote(); clickonDelete();
            
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> loadnotes)");
                    $("#alert").fadeIn();
        }
    });

    // saving info after clicking on buttom

    $('#add-new-note-form').on('submit', function(e) {
        e.preventDefault();
        var id = $(".currentID").val();
        var file = $("#avatar")[0].files[0]; 
        var filename = file.name;
        $.ajax({
            url : 'saveInfo.php',
            type : 'POST', 
            method :'POST',
            cache : false,
            data : $(this).serialize(), 
            processData: false,
            success : function(data) {
               console.log(data);
               alert("Data saved successfully!!");
           }
        });
    });




     $(".imageSubmit").click(function(){
        var id = $(".currentID").val();
        var file = $("#avatar")[0].files[0]; 
        var filename = file.name;
        $.ajax({
            url : 'saveImgName.php',
            type : 'POST',
            cashe : false,
            data: {id : id, name : filename} ,
             success : function(data){
                console.log(data);
            }
        });
    });


    // $(".imageUpload").submit(function(e) {
    //     console.log("ololo");
    //     var id=$(".currentID").val();
    //     console.log("ID ->"+id);
    //     $.ajax({
    //     url : 'saveImgName.php',
    //     type : 'POST',
    //     cashe : false,
    //     data: {id : id, image :  $("#avatar").val()} ,
    //     success : function(data){
    //         console.log(data);
    //     }
    // });
        
    // });



    //BACK buttom functionality
    $(".back").click(function(){
    $.ajax({
        url: "loadnotes.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote(); clickonDelete();
            
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> loadnotes)");
            $("#alert").fadeIn();
        }
    
    });

    });
    //saving image name to the DB


    
    
    //add a new note: : Ajax call to createnote.php
    $('#addNote').click(function(){
        $.ajax({
            url: "createnote.php",
            success: function(data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue inserting the new note in the database!");
                    $("#alert").fadeIn();
                }else{
                    //update activeNote to the id of the new note
                    activeNote = data; 
                    $($('#add-new-note-form')[0].elements.id).val(activeNote);
                    $("textarea").val("");
                    //show hide elements
                    showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                    $("textarea").focus();   
                }
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> Add Note)");
                    $("#alert").fadeIn();
            }
        
        
        });
    
    
    });

    $('.preview').on('click', function(e) {
        e.preventDefault();
        console.log("Preview clicked !");
        var id=$(".currentID").val();
        console.log("ID" + id);
        var datastr = 'ID='+id;
        $.ajax({
            url : 'preview.php',
            type : 'POST',
            cashe : false,
            data : datastr,
            success : function(data){
                $('.main-content').html(data);
                $('.back').show();
                //alert("Data recieved from preview.php");
            }
        });

    });


    



    //type note: : Ajax call to updatenote.php
    $("textarea").keyup(function(){
        //ajax call to update the task of id activenote
        $.ajax({
            url: "updatenote.php",
            type: "POST",
            //we need to send the current note content with its id to the php file
            data: {note: $(this).val(), id:activeNote},
            success: function (data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue updating the note 2in the database!");
                    $("#alert").fadeIn();
                }

            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> TEXTAREA)");
                        $("#alert").fadeIn();
            }

        });
        
    });



    
    //click on all notes button
    $("#allNotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function (data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes"], ["#allNotes", "#notePad"]);
                clickonNote(); clickonDelete();
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.(-> All Notes)");
                        $("#alert").fadeIn();
            }

        });
    
    });
    
    //click on done after editing: load notes again
    $("#done").click(function(){
        //siwtch to non edit mode
        editMode = false;
       //expand notes
        $(".noteheader").removeClass("col-xs-7 col-sm-9");
        //show hide elements
        showHide(["#edit"],[this, ".delete"]);
    });
    
    
    //click on edit: go to edit mode (show delete buttons, ...)
    $("#edit").click(function(){
        //switch to edit mode
        editMode = true;
        //reduce the width of notes
        $(".noteheader").addClass("col-xs-7 col-sm-9");
        //show hide elements
        showHide(["#done", ".delete"],[this]);
    
    });
    
    
    
    //functions
        //click on a note
        function clickonNote(){$(".noteheader").click(function(){
            if(!editMode){
                //update activeNote variable to id of note
                activeNote = $(this).attr("id");
           
                $(".currentID").val(activeNote);

                //fill text area
                $("textarea").val($(this).find('.text').text());
                //show hide elements
                showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                $("textarea").focus();
            }
        });
    }
        //click on delete
    
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            //send ajax call to delete note
            $.ajax({
                url: "deletenote.php",
                type: "POST",
                //we need to send the id of the note to be deleted
                data: {id:deleteButton.next().attr("id")},
                success: function (data){
                    if(data == 'error'){
                        $('#alertContent').text("There was an issue delete the note from the database!");
                        $("#alert").fadeIn();
                    }else{
                        //remove containing div
                        deleteButton.parent().remove();
                    }
                },
                error: function(){
                    $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                            $("#alert").fadeIn();
                }

            });
            
        });
        
    }
        //show Hide function
        
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();   
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();   
        }
    };
    
});