<?php
$maphong=$_GET['maphong'];
$sql="Delete from phong where MaPhong='$maphong' ";
if($query=mysqli_query($conn,$sql))
{
	header("Location: index.php?page=QL-Sv");	
}
?>