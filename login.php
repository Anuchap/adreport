<?php
   session_start();
   $error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];    
        if($username == 'admin' && $password == 'P@ssw0rd') {
            $_SESSION['login_user'] = $username;
            header("location: index.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
   }
?>
<html>
   <head>
      <title>Login Page</title>     
   </head>
   <body>
    <form action="" method="post">
        <label>UserName  :</label><input type="text" name="username" /><br />
        <label>Password  :</label><input type="password" name="password" /><br/>
        <input type="submit" value="Submit"/>
    </form>
    <div><?=$error ?></div>
   </body>
</html>