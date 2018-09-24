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
                <a href="request_pending.php?ID=0" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Requests Pending</a>
                <a href="asset_requestspd.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Track Asset Request</a>
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
				<h4>Track Assets</h4>
				</div>
			</div>
				
				<?php
				require 'connect.inc.php';
				$req_id=$_SESSION['id'];
				$query="SELECT * FROM `requests` ";
				if($query_run=mysqli_query($connect,$query))
							{
								$rows=mysqli_num_rows($query_run);
								if($rows==0)
								{
									echo 'You have not requested for any asset as yet.';
								}
								else
								{
									while($row = mysqli_fetch_assoc($query_run)) 
									{
										$asset=$row['assetname'];
										$date=$row['req_date'];
										$status=$row['status'];
										$reqid=$row['reqid'];
										$sthid=$row['sthid'];
										$query1="SELECT * FROM `stakeholders` WHERE `sthid`='$sthid'";
										$query1_run=mysqli_query($connect,$query1);
										$row1 = mysqli_fetch_assoc($query1_run);
										$name=$row1['name'];
										echo '<div class="card mb-4 wow fadeIn"><div class="card-body justify-content-center">';
										echo "Asset: ".$asset."<br>";
										echo "Requested By: ".$name."<br>";
										echo "Asset Type: <br>";
										echo "Date of Issue: ".$date."<br>";
										echo 'Status: '.$status.'<br></div></div>';
										/*echo '<form  action="asset_requests.php" method="post">
										Edit Status:
						<select style="padding:4px; color:gray;" name="designation">
							<option value="Consumed">Consumed</option>
							<option value="Transferred">Transferred</option>
							<option value="Discarded">Discarded</option>
						</select>
						<input type="submit" name="save" class="btn btn-info btn-block my-4" style="width:20%;" value="Save" onclick="myFunction('.$reqid.')"/></form>
										</div></div>
										';*/
									
										
									}
								}
							}
				else{echo "query not run";}
				/*if ( isset( $_POST['save'] ) ) {
				$update=	$_POST['designation'];
				$query1="UPDATE `requests` SET `status`='$update'  WHERE `reqid`='$reqid' ";
				mysqli_query($connect,$query1);
				}*/
				
				?>
				
				
				
				
			</div>

        </div>
    </main>
    <!--Main layout-->

    
</body>

</html>