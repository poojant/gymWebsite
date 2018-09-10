<?php
        //require 'connector.inc.php';
        //require 'core.inc.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        $link = mysqli_connect('localhost','root',''); 
        if(!$link)
        {
            die('Could not connect :' .mysqli_error());
        }
        $db_selected = mysqli_select_db($link,'fitnesslogin');
        if(!$db_selected)
        {
            die('Could not connect :' .mysqli_error());
        }
        //echo 'connected';

        if($_POST)
        {
            $email = $_POST['tempmail'];
            $selectquery = mysqli_query($link,"select * from logindata where email = '$email'") or die(mysqli_error($link));
            $query_no_row = mysqli_num_rows($selectquery);
            $row = mysqli_fetch_array($selectquery);
            //echo $query_no_row;
            if($query_no_row>0)
            {
                //echo $row['password'];
                
//Load Composer's autoloader
                require 'vendor/autoload.php';

                $mail = new PHPMailer(true);                                // Passing `true` enables exceptions    
                try {
    //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'turakhiapoojan@gmail.com';                 // SMTP username
                $mail->Password = '*****';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
                $mail->setFrom('turakhiapoojan@gmail.com', 'Mr.Poojan');
                $mail->addAddress($email, $email);     // Add a recipient
    
    //Content
                 $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Forget Password Recovery';
                $mail->Body    = "Hi $email your Password is {$row['password']}";
                $mail->AltBody = "Hi $email your Password is {$row['password']}";

                $mail->send();
                echo "<script>alert('Your Password has been sent on your entered Email ID');</script>";
                } catch (Exception $e) {
                echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
            else
            {
                echo "<script>alert('Email not Found');</script>";
            }
        }
?>

<html>
<style>
body{
    margin: 0;
    padding: 0;
    background: url(gymback.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
.login-box{
    width: 300px;
    height: 240px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 35%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.login-box img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
.login-box h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 20px;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login-box input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
    margin-top: 10px;
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
    
}
.avatar {
    width: 100px;
    height:100px;
    border-radius: 50%;
}
</style>
<body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
    <h1>Password Recovery</h1>
    <form method="POST">
        <input type="text" name="tempmail" placeholder="Enter Email Id">
        <input type="submit" name="submit" value="Submit">
    </form>
    </div>
</body>
</html>