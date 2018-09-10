<?php
        //require 'connector.inc.php';
        //require 'core.inc.php';

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
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(!empty($username) && !empty($password))
            {
                $query = "SELECT memid from logindata where email = '$username' and password = '$password'";
                if($query_run = mysqli_query($link,$query))
                {
                    $query_no_row = mysqli_num_rows($query_run);
                    if($query_no_row == 0)
                    {
                        header('Location: http://localhost/indexed.php?error=Invalid');

                    }
                    else if($query_no_row == 1)
                    {
                        //echo 'Login Successful';
                        //Sopenwindow();
                        //window.location.replace("index.html");
                    }
                }
            }
            else{
				header('Location: http://localhost/indexed.php?error=Empty');            	
            }
        }
       ?>
<html lang="en">
<head>
  <title>Fitness World</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css"> 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="fit.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark>
		<div class="navbar-header">
			<a href="#" class="navbar-brand text-light">Fitness World </a>
		</div>
	<button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="nav navbar-nav ">
		<li class="nav-item active">
			<a class="nav-link text-light" href="home.php">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-light" href="about.html">ABOUT US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-light" href="contact.html">CONTACT US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-light" href="vid.html">VIDEOS</a>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle text-light" id="navbardrop" data-toggle="dropdown">Nutrition <span class="caret"></span></a>
			<ul class="dropdown-menu bg-dark">
				<li class="dropdown-item"><a class="text-muted " href="https://www.nutrisystem.com/jsps_hmr/diet-plans/weight-loss-programs.jsp">DIET PLANS</a></li>
				<li class="dropdown-item"><a class="text-muted " href="http://www.advancedsupps.com/">SUPPLEMENTS</a></li>
				<li class="dropdown-item"><a class="text-muted " href="https://www.fitness-world.in/product-category/commercial-equipments/?gclid=EAIaIQobChMIldTU0L6_2gIVSx0rCh1t4wz1EAAYAiAAEgIA__D_BwE">EQUIPMENTS</a></li>
			</ul>
		</li>
	</ul>
	<ul class="nav nav-justify-end">
		<li><a class="nav-link text-light" href="#">LOGOUT</a></li>
	</ul>
	</div>
  </nav>
 
 <div class="container-fluid bg-secondary pb-3 pt-2">
	<label><h3 class="text-light">BMI</h3></label><br>
	<label class="text-light">Enter Weight </label>
	<input type="text" id="wt"><label class="text-light">  kg </label><br>
	<label class="text-light pr-1">Enter Height </label>
	<input type="text" id="ht"><label class="text-light">  cm </label><br><br>
	<button type="button" class="btn btn-inverse" onclick="document.getElementById('bmi').innerHTML = bmi()">Your BMI is:</button> <span  class="text-light pl-2 pr-2" id="bmi"></span><span id="bm" class="text-light pr-2"></span><br>
</div>
<div class="card-deck bg-secondary ">	
	<div class="card bg-dark pt-2" style="width:400px">
		<img class="card mx-auto img-fluid" src="pack1.jpg" alt="text">
		<div class="card-body">
            <h4 class="card-title text-light">ADVANCED/MUSCLE ENDURANCE, STRENGTH TRAINING</h4>
            <p class="card-text "><h5 class="text-light"><strong>28 DAYS TO REDEMPTION TRAINING PLAN</strong></h5></p>
			<p class="card-text"><h6 class="text-light">28 days      Equipments <br>duration      provided</h6></p>
             <a href="pack1.html" class="btn btn-primary">Show More</a>
        </div>
	</div>
	<div class="card bg-dark pt-2" style="width:400px">
		<img class="card mx-auto img-fluid  " src="pack2.jpg" alt="text">
		<div class="card-body">
            <h4 class="card-title text-light">BEGINNER/STRENGTH TRAINING</h4>
            <p class="card-text"><h5 class="text-light"><strong>2018 STARTER'S GUIDE: STRENGTH WORKOUT</strong></h5></p>
			<p class="card-text"><h6 class="text-light">   14<br>equipment  exercises</h6></p>
             <a href="pack2.html" class="btn btn-primary">Show More</a>
        </div>
	</div>
	<div class="card bg-dark pt-2" style="width:400px">
		<img class="card mx-auto img-fluid "  src="pack3.jpg" alt="text">
		<div class="card-body">
            <h4 class="card-title text-light">BEGINNER/MUSCLE ENDURANCE, STRENGTH TRAINING</h4>
            <p class="card-text"><h5 class="text-light"><strong>THE COMPLETE 4-WEEK BEGINNER'S WORKOUT</strong></h5></p>
			<p class="card-text"><h6 class="text-light">   4 WEEKS   <br>duration   equipment</h6></p>
             <a href="pack3.html" class="btn btn-primary">Show More</a>
        </div>
	</div>
</div>

</body>
</html>