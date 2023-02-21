<?php
$maphong=$_GET['MaPhong'];
$Thang=$_GET['Thang'];
$sql="Delete from dien where MaPhong='$maphong' and ThangGhiSo='$Thang' ";
$sql2="Delete from nuoc where MaPhong='$maphong' and ThangGhiSo='$Thang' ";
if($query=mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2))
{
	header("Location: index.php?page=QL-DN");	
}
?>