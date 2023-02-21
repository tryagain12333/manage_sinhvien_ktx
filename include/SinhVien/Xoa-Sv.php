<?php
	$masv=$_GET['masv'];
	$maphong=$_GET['maphong'];
	$sql="Delete from sinhvien where MaSV='$masv' ";
	$query=mysqli_query($conn,$sql);
	
	if($query){
		
		$sql2="select * from phong where MaPhong='$maphong'";
		$query2=mysqli_query($conn,$sql2);
		$r=mysqli_fetch_assoc($query2);
		
		
		$soluong=$r['SoNguoi'];
		$soluong2=$soluong-1;
		$tinhtrang=$r['TinhTrangPhong'];
		
		$sql3="update phong SET SoNguoi='$soluong2' where MaPhong='$maphong' ";
		mysqli_query($conn,$sql3);
		if($soluong=4){
				$sql3="update phong SET TinhTrangPhong='0' where MaPhong='$maphong'";
				mysqli_query($conn,$sql3);
		}
		
		
		header("Location: index.php?page=QL-Sv");
	}
	else {
		echo "<script>alert('Có lỗi trong khi xóa!!!');</script>";
		}
?>