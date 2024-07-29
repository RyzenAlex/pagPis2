<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Registro</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Correo en uso!, Intenta con otro!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registro Satisfactorio!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Ingresar ahora!</button>";
         

         }

         }else{
         
        ?>

            <header>Registrarse</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="usuario" required>
                </div>

                <div class="field input">
                    <label for="email">Correo</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="correo" required>
                </div>
                
                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="*******" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Registrarse" required>
                </div>
                <div class="links">
                    Ya tienes cuenta? <a href="index.php">Inicia Sesion</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>