<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="form_section">
                <form method="POST" class="form_forlogin">
                    <label for="Name">Name</label>
                    <br>
                    <input type="text" id="name" name="name">
                    <br>
                    <label for="Email">Email</label>
                    <br>
                    <input type="email" id="Email" name="email" required>
                    <br>
                    <label for="Password">Password</label>
                    <br>
                    <input type="password" id="Password" name="password">
                    <br>
                    <label for="Confirm_password">Confirm password</label>
                    <br>
                    <input type="password" id="Confirm_password" name="conpass">
                    <br><br>
                    <button type="submit" name="button">SUBMIT</button>
                </form>
                <?php
                    if(isset($_POST['button'])){
                        require 'db/phptest.php';

                        $getname=$_POST['name'];
                        $getmail=$_POST['email'];
                        $getpass=$_POST['password'];
                        $conpass=$_POST['conpass'];
                        $hash=password_hash($getpass, PASSWORD_DEFAULT);

                        $sql="select email from credentials where email = '$getmail'";
                        $sqlres=mysqli_query($connect,$sql);
                        $rowcount=mysqli_num_rows($sqlres);

                        if($rowcount != 0){
                            echo"This email is already has an account.Try using another one";
                        }
                        if($getpass != $conpass){
                            echo"confirm your password properly";
                        }
                        if(($rowcount ==0) && ($getpass == $conpass)){
                            echo"You have succesfully Signed up.";
                            $gotologin = "<a href ='login1.php'>Log in</a>";
                            echo $gotologin;

                            $sql = "insert into credentials (name, email, password) values ('$getname', '$getmail','$hash')";
                            $sqlres=mysqli_query($connect, $sql);
                        }

                    }
                ?>

                <?php
                    echo "HELLO WORLD !" ;
                ?>

            </div>
            <div class="image_section">
                <img src="46929.jpg" alt="An image">
            </div>
        </div>
    </main>
</body>
</html>