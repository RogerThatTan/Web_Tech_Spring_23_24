<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login</title>
</head>
<body>
    <fieldset>
    <u><h2 align="center">Login</h2></u>

    <form method="get">

    
    <b>ID:</b><input type="text" name="id"><br><br>
    <b>Password:</b>  <input type="password" name="password"><br><br>
    <button name = "Login">Login</button>
    <button name = "Reg">Reg</button>

    </form>

<?php
if(isset($_GET['Login']))
{
    
    if((empty($_GET['id'])) || (empty($_GET['password'])))
    {
        echo "Empty";
    }
    else
    {
        echo "OK";
        exit();
    }
}
elseif(isset($_GET['Reg']))
{
    header("location: reg.php");
}
?>
</fieldset>
</body>
</html>