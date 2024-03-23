<?php 
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech";
$conn = new mysqli($serverName,$userName,$password,$dbName);
$sql = "select * from info";
$res = mysqli_query($conn,$sql);

if(isset($_GET['edit'])){
    $name = $_GET['edit'];
    $sql2 = "select * from info where ID = '$name'";
    $res2 = mysqli_query($conn,$sql2);
    $r2   =mysqli_fetch_assoc($res2);

    echo"
    <form method = 'get'>
    <h1 align = center><u>Edit Info</u></h1>
        <table align = center>
            <tr>
            <td>Name: </td>
            <td><input type = 'text' name='Name' value=$r2[Name]></td>
            </tr>
            <tr>
            <td>ID: </td>
            <td><input type = 'text' name='ID' value=$r2[ID]></td>
            </tr>
            <tr>
            <td>Email: </td>
            <td><input type = 'text' name='Email' value=$r2[Email]></td>
            </tr>
            <tr>
            <td>Password: </td>
            <td><input type = 'text' name='Password' value=$r2[Password]></td>
            </tr>
            <tr>
                <td><input type='submit' name='btn2' value ='Update'></td>
            </tr>
        </table>
    </form>";
}

else if(isset($_GET['btn2'])){
    $name3 = $_GET['Name'];
    $id = $_GET['ID'];
    $email = $_GET['Email'];
    $password = $_GET['Password'];
    $sql3 = "update info set Name='$name3',ID='$id', Email='$email', Password='$password' where ID='$id'";
    mysqli_query($conn,$sql3);
    header('location:quiznight.php');
    exit();
}

else if(isset($_GET['delete'])){
    $name4 = $_GET['delete'];
    $sql4 =  "delete from info where ID='$name4'";
    mysqli_query($conn,$sql4);
    header('location:quiznight.php');
    exit();
}

else if(isset($_GET['add'])){
    echo"
    <form method = 'get'>
    <h1 align = center><u>Add Info</u></h1>
        <table align = center>
            <tr>
            <td>Name: </td>
            <td><input type = 'text' name='Name'></td>
            </tr>
            <tr>
            <td>ID: </td>
            <td><input type = 'text' name='ID'></td>
            </tr>
            <tr>
            <td>Email: </td>
            <td><input type = 'text' name='Email'></td>
            </tr>
            <tr>
            <td>Password: </td>
            <td><input type = 'text' name='Password'></td>
            </tr>
            <tr>
                <td><input type='submit' name='btn3' value ='Add'></td>
            </tr>
        </table>
    </form>";
}

else if(isset($_GET['btn3'])){
    $name5 = $_GET['Name'];
    $id = $_GET['ID'];
    $email = $_GET['Email'];
    $password = $_GET['Password'];
    $sql5 = "insert into info(Name,ID,Email,Password) values('$name5','$id','$email','$password')";
    mysqli_query($conn,$sql5);
    header('location:quiznight.php');
    exit();
}

else if (isset($_GET['btn'])) {
    if (empty($_GET['Name']) || empty($_GET['Password'])) {
        echo "Fill up the form";
    } else {
        $name2 = $_GET['Name'];
        $pass2 = $_GET['Password'];
        $sql3 = "select * from info where Name='$name2' and Password='$pass2'";
        $res3 = mysqli_query($conn, $sql3);

        if ($res3->num_rows > 0) {
            echo "Valid User";
        } else {
            echo "Invalid User";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Night</title>
</head>
<body>
    <h1 align = center><u>Database Information Verification</u></h1>
    <form method = "get">
        <table border = "1" align = center>
            <tr>
                <td>Name:</td>
                <td><input type = "text" name="Name"</td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type = "password" name="Password"</td>
            </tr>
            <tr>
                <td colspan = "2" align = center><input type = "submit" name="btn"</td>
            </tr>
        </table>
    </form>
    <h1 align = center><u>Database Dashboard</u></h1>
    <form method = "get">
        <table border = "1" align = center>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php 
        $limit = 0;
        while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $r["Name"]; ?></td>
                <td><?php echo $r["ID"]; ?></td>
                <td><?php echo $r["Email"]; ?></td>
                <td><?php echo $r["Password"]; ?></td>
                <td><button name="edit" value="<?php echo $r["ID"]; ?>">Edit</button></td>
                <td><button name="delete" value="<?php echo $r["ID"]; ?>">Delete</button></td>
                <?php if($limit==0){ ?>
                <td><button name="add"</button>ADD</td>
                <?php } ?>
            </tr>
        <?php $limit =1; } ?>
    </table>
</form>
</body>
</html>