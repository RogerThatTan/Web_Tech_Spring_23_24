<?php

$serverName = "localhost";
$userName = "root";
$pass = "";
$dbName = "tanvir";
$conn = new mysqli($serverName, $userName, $pass, $dbName);
$sql = "select * from info";
$res = mysqli_query($conn, $sql);


if (isset($_GET['edit'])) {

    $name3 = $_GET['edit'];
    $sql4 = "select * from info where ID='$name3'";
    $res4 = mysqli_query($conn, $sql4);
    $r2 = mysqli_fetch_assoc($res4);

    echo "
    <form method='get'>
        <table>
            <tr>
                <td>Name:</td>
                <td><input type='text' name='Name' value=$r2[Name]></td>
            </tr>

            <tr>
                <td>ID:</td>
                <td><input type='text' name='ID' value=$r2[ID]></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type='text' name='Email' value=$r2[Email]></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type='password' name='Password' value=$r2[Password]></td>
            </tr>

            <tr>
                <td><input type='submit' name='btn2' value ='Update'></td>
            </tr>
        </table>
    </form>";
} 

else if (isset($_GET['btn2'])) {

    $name4 = $_GET['Name'];
    $id = $_GET['ID'];
    $email = $_GET['Email'];
    $pass3 = $_GET['Password'];
    $sql5 = "update info set Name='$name4', ID='$id', Email='$email', Password='$pass3' where ID='$id'";
    mysqli_query($conn, $sql5);

}

else if (isset($_GET['delete'])) {
    $name = $_GET['delete'];
    $sql2 = "delete from info where ID='$name'";
    mysqli_query($conn, $sql2);
    header('refresh : 3;');
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
    <title>DBMS PRACTICE</title>
</head>
<body>

<form method="get">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="Name"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="Password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="btn"></td>
        </tr>
    </table>
</form>

<br><br><br><br><br>

<form method="get">
    <table border="1" cellspacing="10">
        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2">Option</th>
        </tr>
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $r["Name"]; ?></td>
                <td><?php echo $r["ID"]; ?></td>
                <td><?php echo $r["Email"]; ?></td>
                <td><?php echo $r["Password"]; ?></td>
                <td><button name="edit" value="<?php echo $r["ID"]; ?>">Edit</button></td>
                <td><button name="delete" value="<?php echo $r["ID"]; ?>">Delete</button></td>
            </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>
