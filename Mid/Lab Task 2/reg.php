<!DOCTYPE html>
<html lang="en">
<head>
   <title>Reg</title>
</head>
<body>
<fieldset>

    <u><h2 align="center">Reg</h2></u>

<form method="get">

    
    <b>ID:</b><input type="text" name="id"><br><br>
    <b>Password:</b>  <input type="password" name="password"><br><br>
    <b>Contact No:</b><input type="text" name="contact"><br><br>
    <b>Email:</b><input type="text" name="email"><br><br>
    
    <button name = "Reg">Reg</button>
    <button name = "Login">Login</button>

</form>
<?php
if(isset($_GET['Reg']))
{
    
    if((empty($_GET['id'])) || (empty($_GET['password'])) || (empty($_GET['contact'])) || (empty($_GET['email'])) )
    {
        echo "Empty";
    }
    else
    {
        echo "OK";
      
    }
    
}
elseif(isset($_GET['Login']))
{
    header("Location: login.php");
}
?>
</fieldset>
</body>
</html>