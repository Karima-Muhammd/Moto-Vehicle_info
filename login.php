<?php
session_start();
require_once "function/validate.php";
require_once "db.php";
?>
<?php
if(isset($_SESSION['email']))
{
    header('location:home.php');

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 ">
            <h1 class="text-center" style="font-family: 'Piedra', cursive;margin-top:25% ; ">Admins Login <br>
                <span style="font-size: 14px"> It's not for anyone just Admins</span> </h1>

            <form style="margin-top:8% ; "  action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" >
            <div class="form-group">
                <input  type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit"  name="login_btn" class="btn btn-primary">Login </button>
            <?php

            if(isset($_POST['login_btn']))
            {
                $email=$_POST['email'];
                $pass=$_POST['password'];
                if(IsNotEmpty($email))
                {
                    if(IsNotEmpty($pass))
                    {
                        if(ValidEmail($email))
                        {
                            if(ifExist('admins','email',$email))
                            {
                                    $query="select * from admins where email='$email'";
                                    $data=SelectRow($query);
                                    $new_pass=md5($pass);

                                    if($new_pass==$data['pass'])
                                    {
                                         $_SESSION['email']=$email;
                                         $_SESSION['name']=$data['name'];
                                         header('location:home.php');
                                    }
                                    else
                                        $error_message = "This Password is Not Correct";

                            }
                            else
                                $error_message = "This Email Not Exist";
                           /*  register
                           if(strlen($pass)>8)
                            {
                                if (preg_match('/[A-Z].[a-z].[0-9]|[0-9].*[A-Za-z]/', $pass))
                                {
                                    $success_message='Secure enough';
                                }
                                else
                                    $error_message='Should password contain Letters and Numbers';
                            }
                            else
                                $error_message='Should password contain more than 8 Digit';
                           */
                        }
                        else
                                $error_message = "Please ,Enter valid Email";
                    }
                    else
                        $error_message = "Password is Required";

                }
                else
                    $error_message='Email is required';
                require_once 'function/message.php';
            }
            ?>
        </form>


        </div>
    </div>

</div>
</body>
</html>
