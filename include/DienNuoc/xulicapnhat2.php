<?php
	include '../../config.php';
	$MaPhong=$_POST['MaPhong'];
	$Thang=$_POST['Thang'];
	
			
	$Thang2=date("m",strtotime($Thang));
	$Nam=date("Y",strtotime($Thang));
	if($Thang2==1)
	{
		$Thang2=12;
		$Nam-=1;
	}
	else
		$Thang2-=1;
	
	if($Thang2>9)
		$NamThang=$Nam."-".$Thang2;	
	else
		$NamThang=$Nam."-0".$Thang2;
	
	
	$sql2="select * from nuoc where MaPhong='$MaPhong' and ThangGhiSo='$NamThang'";
	$query2=mysqli_query($conn,$sql2);
	$r2=mysqli_fetch_assoc($query2);
	$ChiSoDauN=$r2['ChiSoCuoi'];
?>
<?php 
echo $ChiSoDauN?>