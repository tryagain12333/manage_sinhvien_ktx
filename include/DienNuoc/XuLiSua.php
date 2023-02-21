<?php
	include '../../config.php';
	$DonGiaID=$_POST['id'];
	$sql="select NgayCapNhat from dongia where DonGiaID='$DonGiaID'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($query);
	echo $row['NgayCapNhat'];
?>