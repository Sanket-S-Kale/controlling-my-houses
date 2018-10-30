<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
    <title>Controlling My Houses</title>
    
    <!-- Ilwin Joey Dcunha - 1001390458  -->
   
</head>

<body id="wrapper">


    <section>
        <img class="loginImg">
            <lable class="topleft">Controlling My House</lable>
    </section>
    <section >
        
           
       <form action="<?php echo base_url();?>login_controller/validateFields" method="POST">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" id="uname" name="username">
                <label></label><span class="text-danger"><?php echo form_error("username")?></span> 

                <label for="psw"><b>Password</b></label>

                    <input type="password" placeholder="Enter Password" name="password" id="psw" >

                    <label></label><span class="text-danger">
                        <?php  
                         if (isset($message))
                            echo $message;
                        else 
                           echo form_error("password")
                       ?></span> 
                <button type="submit" >Login</button>
                
            </div>

           
            </form>
        
            
    </section>
</body>

</html>