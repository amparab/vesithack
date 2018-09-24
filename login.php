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
<?php
	session_start();
	ob_start();
	require 'connect.inc.php';
	?>

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
                            <a class="nav-link waves-effect" href="signupp.php">Sign Up
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
					<form class="text-center border border-light p-5" action="login.php" method="post">

						<p class="h4 mb-4">Login</p>
						<!-- Email -->
						<input type="text" name="email" class="form-control mb-4" placeholder="E-mail">
						<!-- Password -->
						<input type="password" name="password" class="form-control mb-4" placeholder="Password">
						

						<input type="submit" class="btn btn-info btn-block my-4" value="Sign In"/>
					</form>
<?php
					if (isset ($_POST['email'])&&isset ($_POST['password']))
					{
						//echo 'ok';
						$email=$_POST['email'];
						$password=$_POST['password'];
						
						if(!empty($email)&&!empty($password))
						{
							$login_query="SELECT * FROM `stakeholders` WHERE `email`='$email' AND `password`='$password' ";
							
							if($login_query_run=mysqli_query($connect,$login_query))
							{
								$rows=mysqli_num_rows($login_query_run);
								if($rows==0)
								{
									echo '<div class="message">Enter valid username and password combination</div>';
								}
								else if($rows==1)
								{
									
									//$user_id=mysql_result($login_query_run,0,'id');
									while($row = mysqli_fetch_assoc($login_query_run)) 
									{
										$id=$row['sthid'];
									   $name=$row['name'];
									   $email=$row['email'];
									   $designation=$row['designation'];
									   $_SESSION['name']=$name;
									$_SESSION['email']=$email;
									$_SESSION['designation']=$designation;
									$_SESSION['id']=$id;
									}
									
									
									
									/*echo 'session set';
									echo $user_id;*/
									//header('Location:loggedin_inc.php');
									if(isset ($_SESSION['name'])&& !empty($_SESSION['name'])&& isset ($_SESSION['email'])&& !empty($_SESSION['email']))
									{
										if($_SESSION['designation']=="Purchase Department"){
										header('Location:request_pending.php?ID=0');
										}
										else if($_SESSION['designation']=="admin"){
										header('Location:adminhome.php');	
										}
										else{
										header('Location:login_sh2.php');	
										}
									}
									else
									{
										echo 'Not logged in';
									}
								}
							}
							else
							{
									echo 'query not run';
							}
							
							
						}
						else
						{
							echo '<div class="message">Enter username and password </div><br>';
						}
					}
					
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