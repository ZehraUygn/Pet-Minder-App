<?php
    include_once 'header.php';
    include_once 'dbh.inc.php';

    if (isset($_POST["submit"]))
    {
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $oPwd = $_POST["oldPwd"];
        $nPwd = $_POST["newPwd"];

        $query = mysqli_query($conn, "SELECT usersemail, usersPwd from users where usersemail = '$email' AND usersPwd = '$oPwd' ");

        $num = mysqli_fetch_array($query);

        if ($num > 0){
            $con = mysqli_query($conn, "UPDATE users set usersPwd = '$nPwd' WHERE usersemail = '$email' ");
            echo "Password Changed successfully";
        }
        else{
            echo "Passsword or e-mail doesn't match.";
        }
    }
?>


<h2>Change your password</h2>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="uid" placeholder="username">
        <input type="password" name="oldPwd" placeholder="Current password">
        <input type="password" name="newPwd" placeholder="New password">
        <button type="submit" name="submit">Confirm change password</button>
    </form>