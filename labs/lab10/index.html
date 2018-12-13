<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
               $("#btnSubmit").click(function(){
                  /*alert("Button has been clicked!"); */
                  var answer1 =  $('#q1').val();
                  var answer2 = $('#q2').val().toLowerCase();
                  var score=0;
                  
                  if(answer1 == 4) {
                      //alert("Correct");
                      $('#feedback1').html("Correct");
                      score+=5;
                  }
                  else {
                      //alert("Wrong")
                      $('#feedback1').html("Wrong");
                  }
                  
                  if(answer2 == "sacramento") {
                      $('#feedback2').html("Correct");
                      score+=5;
                  }
                  else {
                      //alert("Wrong")
                      $('#feedback2').html("Wrong");
                  }
                  //alert(score);
                  $("#totalScore").html("The total Score is: "+score);
                  
                   $.ajax({
            
                    type: "GET",
                    url: "updateScore.php",
                    dataType: "json",
                    data: { "email":$("#emailAddress").val(), 
                            "score": score},
                    success: function(data,status) {
                       //alert(data.score + " " + data.attempts);
                       $("#prevScore").html("Your Previous Score was: " + data.score);
                       $("#totalAttempts").html("total attempts: " + (parseInt(data.attempts) + 1));
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                       //alert(status);
                    }
                    
                    });//ajax
               }); 
            });
            
           
        </script>
        <title>quiz</title>
    </head>
    <body>
        
   <form>        
    <h3>Enter your email
    <input type="text" id="emailAddress" name="email"/></br></h3>
    What is 2+2? 
    <select id="q1"> 
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    </select><br />
    
    <span id="feedback1"></span> </br><br>
    
    What is the capital of California?
     <input type="text" name="" id="q2"/> <br>
     <span id="feedback2"></span> </br><br>
     
     <h3 id="totalScore"></h3>
     
     <h3 id="prevScore"></h3>
     
     <h3 id="totalAttempts"></h3>
     <!--<button id="btnSubmit">Submit</button>-->
     <input type="button" id="btnSubmit" value="Submit"> 
    </form>
    
    </body>
</html>