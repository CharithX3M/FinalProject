<html>
    <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form name="sup" method="post" action="signop.php">
            <input type="text" name="fname" required placeholder="First Name" ><div id="fname_error"></div><br>
            <input type="text" name="lname" required placeholder="Last Name" ><div id="lname_error"></div><br>
            <input type="email" name="email" required placeholder="email"><div id="email_error"></div><br>
            <input type="password" name="pwrd" required placeholder="Password" minlength="6" maxlength="16"><div id="pwrd_error"></div><br>
            <input type="password" name="rpwrd" required placeholder="Confirm Password" minlength="6" maxlength="16"><div id="cpwrd_error"></div><br>
            <input type="submit" id="click" value ="Sign Up"><br>
        </form>
        <div id="con_error"></div>
        <div id="db_error"></div>
        <div id="email_error"></div>
    </body>
    <script type="text/javascript">

        $("#click").click(function(event){
    	event.preventDefault();
    	
    	var myform = document.getElementById("sup");
         var fd = new FormData(myform );
    $.ajax({
        url: "./signop.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (dataofconfirm) {
            if(dataofconfirm == 'a')
            {
                    $('#cpwrd_error').html('<div class="alert alert-danger"> <strong>Password doesn\'t match</strong></div>');
            }
            else if (dataofconfirm == 'b')
                {
                    $('#con_error').html('<div class="alert alert-danger"> <strong>Notespace is having trouble with server</strong></div>');
                }
            
            else if (dataofconfirm=='c')
                {
                    $('#db_error').html('<div class="alert alert-danger"> <strong>Notespace is having trouble with database</strong></div>');
                }
            else if (dataofconfirm=='d')
                {
                    $('#email_error').html('<div class="alert alert-danger"> <strong>Notespace is having trouble with email server</strong></div>');
                }
            else
                {
                    
                }
        }
    });
    })
        
    </script>
</html>