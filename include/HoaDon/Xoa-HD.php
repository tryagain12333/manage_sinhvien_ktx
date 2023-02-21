<?php
$SoHD=$_GET['mahd'];
$sql="Delete from hoadon where SoHoaDon='$SoHD' ";
if($query=mysqli_query($conn,$sql))
{
	header("Location: index.php?page=QL-HD");	
}
?>