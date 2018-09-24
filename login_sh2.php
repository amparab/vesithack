<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
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
                        <div class="list-group-item  flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1"><?php session_start(); echo $_SESSION['name'];?></h6>
    </div>
    <small class="text-muted"><?php echo $_SESSION['designation'];?></small>
  </div>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="logout.php">Log Out
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
                <img src="https://i0.wp.com/vesitadmissions.ves.ac.in/wp-content/uploads/2017/03/cropped-favicon.png?fit=240%2C240&ssl=1" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Request Assets</a>
                <a href="asset_requests.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Track Asset Request</a>
                <a href="issued.php?ID=0" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Issued Assets</a>
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
			<br>
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-flex justify-content-center">
				<form class="text-center border border-light p-5" action="login_sh2.php" method="post">

						<p class="h4 mb-4">Request assets</p>
						<!-- Email -->

							Asset name:
						<select class="mdb-select md-form" style="padding:4px; color:gray;" name="astname">
							<option value="laptop">Laptop</option>
							<option value="chalk">Chalk</option>
							<option value="inkcart">Ink cartridge</option>
							<option value="projector">Projector</option>
						</select>
						<input type="number" name="quantity" class="form-control mb-4" placeholder="Quantity">

						
						<!-- Password -->
						
						<!-- Basic dropdown -->
						

						<!-- Sign in button -->
						<input type="submit" class="btn btn-info btn-block my-4" value="Request"/>

					


					</form>
				</div>
				
			</div>

        </div>
    </main><?php
    				require 'connect.inc.php';

if(isset($_POST['astname'])&&isset($_POST['quantity']))
{
	
	$astname=$_POST['astname'];
	$quantity=$_POST['quantity'];
	$sthid=$_SESSION['id'];
	$date=date('y/m/d');
	echo $date;
	if(!empty($astname)&&!empty($quantity)&&!empty($sthid))
	{	
					$requests_query = "INSERT INTO requests (sthid,assetname,req_date,quantity,status) VALUES ('$sthid','$astname','$date','$quantity','Requested')";
					if(!mysqli_query($connect,$requests_query))
					{
						echo 'not inserted';
					}
					else
					{
					echo 'inserted';
					}
		
		
		
	}
	else
	{
		echo "<div class='message'><br>Fill all fields.</div></div></div></div>";
	}
	
}?>
    
</body>

</html>