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
        //echo 'Connected Successfully';
        if(isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['gender']))
        {
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $psw = $_POST['psw'];
            $gender = $_POST['gender'];
            if(!empty($fname) && !empty($psw))
            {
                $query = "INSERT into logindata(fullname,email,password,gender) VALUES('$fname','$email','$psw','$gender')";
                mysqli_query($link,$query);
                //echo 'Connected Successfully';
                echo "<script>alert('User Registered Successfully');</script>";
            }
            
        }

        if(isset($_GET['error']))
        {
            //if("'".$_GET['error']."'"=='Invalid')

                echo "<script>window.onload= function(e){document.getElementById('Error').innerHTML = 'Invalid username or password';}</script>";
        }

        /*if($_POST['tempmail'])
        {
            $email = $_POST['tempmail'];
            $selectquery = mysqli_query($link,"select * from logindata where email = '$email'"); //or die(mysqli_error($link));
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
                $mail->Password = 'chelseajt26';                           // SMTP password
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
        }*/

        
    ?>
<html>
<head>
<title>Fitness World</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>

body{
    margin: 0;
    padding: 0;
    background: url(gymback.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}

#demo{
    background: transparent; border:none; color: white; background: rgba(0, 0, 0, 0.5); width:320px; height:50px; margin-top:505px; margin-left:275px; font-size:13px;"
}
#demo:hover{
    color: #39dc79;
}
.login-box{
    width: 320px;
    height: 400px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 35%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.login-box h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 20px;
}
.login-box img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
#abc{
    margin: 0;
    padding: 0;
    font-weight: bold;
    font-size: 15px;
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
.login-box input[type="password"]
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
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
    
}
.login-box a{
    background: transparent;
    border: none;
    color: white;
    padding-bottom: 8px;
    text-decoration: none;
    font-size: 13px;
    color: #fff;
    line-height: 10px;
    text-align: center;
}

.login-box a:hover
{
    color: #39dc79;
}

/* Full-width input fields */
.container input[type="text"], input[type="email"] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}
.container  input[type="radio"]{
	margin-top : 12px;
	}

.container  input[type="password"] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size:16px;  
    color: black; 
}
/* Set a style for all buttons */
.container button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 15px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
.container button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 100px;
	height:100px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
</style>
<body>

<button id = "demo" onclick="document.getElementById('modal-wrapper').style.display='block'" >
Dont have account? Register</button>

<div class="login-box">
            <img src="avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form action="home.php" method="POST">
            <p id="abc">Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p id="abc">Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <div style="margin-bottom:12px;">
                <span id="Error" style="font-size:16px;color:red;"></span>
            </div>
            <input type="submit" name="submit" value="Login">
            <a href="forget-password.php" target="_self">Forget Password</a><br>
            </form>
        </div>


<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="indexed.php" method="POST">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="1.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Register</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Full Name" name="fname">
      <input type="email" placeholder="Email ID" name="email">
      <input type="password" placeholder="Enter Password" name="psw">   
      <input type="password" placeholder="ReEnter Password" name="repsw">
      <input type="text" placeholder="Mobile Number" name="mob">
	  <span style="padding: 12px 29px;">Birthdate :</span><input type="date" name="bday"><br>
	  <span style="padding: 12px 29px;">Gender :</span>
      <input type="radio" name="gender" value="M" autofocus required> Male
      <input type="radio" name="gender" value="F" autofocus required> Female
      <input type="radio" name="gender" value="O" autofocus required> Other<br>
      <button type="submit">Register</button>
           
    </div>
    
  </form>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    function openwindow()
    {
        window.location.replace("home.php");
    }
}
</script>

</body>
</html>
