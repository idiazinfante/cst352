$(document).ready(function(){
    $("#faveButton").click(function() {
        //alert($(this).val());
        $.ajax({
        
        type: "GET",
        url: "../addFavorite.php",
        dataType: "json",
        data: { "bookId":$(this).attr("id") },
        success: function(data,status) {
        alert(data);
        
            if(data=="added") {
                alert("Added!");
                $(this).attr("disabled","true");
                $("#faveLink").show();
            }
        }
        complete: function(data,status) { //optional, used for debugging purposes
        alert(data);
      }
        
        });//ajax
    })
    
    
    
    
    
    
});