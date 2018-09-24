<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ASM</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
                    <strong class="blue-text">Asset Management System</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="login.php">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">

            <a class=" waves-effect">
                <br><img src="https://i0.wp.com/vesitadmissions.ves.ac.in/wp-content/uploads/2017/03/cropped-favicon.png?fit=240%2C240&ssl=1" class="img-fluid" alt="">
            </a>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-flex justify-content-center">
				
                    <!-- Default form login -->
					<form class="text-center border border-light p-5" action="signupp.php" method="post">

						<p class="h4 mb-4">Sign Up</p>
						<input type="text" name="name" class="form-control mb-4" placeholder="Name">
						<!-- Email -->
						<input type="text" name="email" class="form-control mb-4" placeholder="E-mail">
						<input type="text" name="contact" class="form-control mb-4" placeholder="Contact No.">
						<!-- Password -->
						<input type="password" name="password" class="form-control mb-4" placeholder="Password">
						Desgination:
						<select class="mdb-select md-form" style="padding:4px; color:gray;" name="designation">
							<option value="Lab Incharge">Lab Incharge</option>
							<option value="Professor">Professor</option>
							<option value="Student">Student</option>
							<option value="Purchase Department">Purchase Department</option>
						</select>

						<input type="submit" class="btn btn-info btn-block my-4" value="Sign Up"/>
						


					</form>
<?php
require 'connect.inc.php';



if(isset($_POST['name'])&&isset($_POST['contact'])&&isset($_POST['email'])&&isset($_POST['password']))
{
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$pass=$_POST['password'];
	$designation=$_POST['designation'];
	if(!empty($name)&&!empty($email)&&!empty($contact))
	{	
					$signup_query = "INSERT INTO stakeholders (name,email,contact,designation,password) VALUES ('$name','$email','$contact','$designation','$pass')";
					if(!mysqli_query($connect,$signup_query))
					{
						//echo 'not inseted';
					}
					else
					{
					//echo 'inserted';
					session_start();
					ob_start();
					$_SESSION['name']=$name;
					$_SESSION['email']=$email;
					$_SESSION['designation']=$designation;
					//Not be written
					/*echo 'session set';
					echo $user_id;*/
					//header('Location:loggedin_inc.php');
					
					
					if(isset ($_SESSION['name'])&& !empty($_SESSION['name'])&& isset ($_SESSION['email'])&& !empty($_SESSION['email']))
					{
					header('Location:login.php');
					}
					else
					{
					echo 'Not logged in';
					}
					}
		
		
		
	}
	else
	{
		echo "<div class='message'><br>Fill all fields.</div></div></div></div>";
	}
	
}
//else{echo "nooo";}
	
//header("refresh:0;url=signuptemp.php");	


?>

						
<!-- Default form login -->

                </div>

            </div>
            <!-- Heading -->


            
		
        </div>
    </main>
    <!--Main layout-->


</body>

</html>