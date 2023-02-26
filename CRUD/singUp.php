<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./singUp.css" >
    <title>SingUp</title>
</head>
<body>
    <?php
        require('./connection.php');
        if (isset($_POST['singUp_button'])){
            $name=$_POST['name'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confirmPassword=$_POST['confirmPassword'];
            if(!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['confirmPassword'])){
                if($password==$confirmPassword){
                    $p=crud::connect()->prepare('INSERT INTO crudtable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                    $p->bindValue(':n',$name);
                    $p->bindValue(':l',$lastName);
                    $p->bindValue(':e',$email);
                    $p->bindValue(':p',$password);
                    $p->execute();
                    echo'Sucsessful';

                }
                else{
                    echo'password not match';
                }
            }
            else{
                echo 'input all value';
            }


        }

    ?>
    <div class="form">
        <div class="title">
            <p>Sing UP Form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirmPassword" placeholder="Confirm Password">
            <input type="submit" value="Sign Up" name="singUp_button">

        </form>
    </div>
</body>
</html>