$(document).ready(function(){
    $('#submitBtn').click(function(){
        //e.preventDefault();
        var one = document.querySelector("#one");
        var two = document.querySelector("#two");
        var three = document.querySelector("#three");
        var four = document.querySelector("#four");
        
        var checkedbox;
        
        if(one.checked == true){
            checkedbox = 1;
        }
        else if(two.checked == true){
            checkedbox = 2;
        }
        else if(three.checked == true){
            checkedbox = 3;
        }
        else if(four.checked == true){
            checkedbox = 4;
        }
        $.ajax({

        type: "GET",
        url: "api.php",
        dataType: "json",
        data: { "rating":checkedbox },
        success: function(data,status) {
        alert(data);

        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(status);
        }

        });//ajax
        
    
    });
    
})

