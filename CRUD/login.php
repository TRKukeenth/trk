<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./singUp.css" >
    <title>login</title>
    <style>
        .form{
            width: 300px;
            height: 280px;
        }
    </style>
</head>
<body>
<?php
        require('./connection.php');
        if (isset($_POST['login_button'])){
            $_SESSION['validate']=false;
            $email=$_POST['email'];
            $password=$_POST['password'];
            
            if(!empty($_POST['email'])&& !empty($_POST['password'])){
               
                    $p=crud::connect()->prepare('SELECT *FROM crudtable WHERE email=:e and pass=:p');
                   
                    $p->bindValue(':e',$email);
                    $p->bindValue(':p',$password);
                    $p->execute();
                    $p->fetchAll(PDO::FETCH_ASSOC);
                    if($p->rowCount()>0){
                        $_SESSION['email']=$email;
                        $_SESSION['pass']=$password;
                        $_SESSION['validate']=true;
                        header('location:home.php');

                    }
                    else{
                        echo'check your password and email';
                    }

                
            }
            else{
                echo 'input all value';
            }


        }

    ?>
    
    <div class="form">
        <div class="title">
            <p>Login Page</p>
        </div>
        <form action="" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button">

        </form>
    </div>
</body>
</html>