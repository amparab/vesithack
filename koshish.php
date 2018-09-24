<html>
<body>
<?php
require 'connect.inc.php';
				$ID = mysqli_real_escape_string($connect,$_GET['ID']);
				$C = mysqli_real_escape_string($connect,$_GET['C']);
				$O = mysqli_real_escape_string($connect,$_GET['O']);
				if($ID!=0 && $C==0){
				$query2="UPDATE `requests` SET `status`='Approved'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Approving");
				header('Location:request_pending.php?ID=0');
				}
				else if($ID!=0 && $C==1){
				$query2="UPDATE `requests` SET `status`='Delivered'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Delivering");
				header('Location:request_pending.php?ID=0&C=10');
				}
				else if($ID!=0 && $C==2){
					$query2="UPDATE `requests` SET `status`='Issued'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Updating");
				header('Location:asset_requests.php?ID=0&C=10');
				}
				else if($ID!=0 && $C==3){
					$query2="UPDATE `requests` SET `status`='$O'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Updating");
				header('Location:asset_requests.php?ID=0&C=10');
				}
				
?>
</body>
</html>