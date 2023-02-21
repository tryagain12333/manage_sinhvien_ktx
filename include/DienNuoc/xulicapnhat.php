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
	$sql="select * from dien where MaPhong='$MaPhong' and ThangGhiSo='$NamThang'";
	$query=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($query);
	$ChiSoDauD=$r['ChiSoCuoi'];
	
	
?>
<?php echo $ChiSoDauD;
?>