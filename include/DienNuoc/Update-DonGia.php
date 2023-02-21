
	<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=Them-Sv" class="current">Cập Nhật Đơn Giá </a> </div>
    <h1>Cập Nhật Đơn Giá </h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập Nhật Đơn Giá </h5>
        </div>
        
	<div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Điện<i class="add-on icon-bolt"></i></a></li>
              <li><a data-toggle="tab" href="#tab2">Nước<span class='add-on icon-tint'></a></li>
              
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
            	 <?php
                  	$tv="select DonGia,NgayCapNhat from dongia where Loai='1' ORDER BY DonGiaID DESC LIMIT 1";
					$tv2=mysqli_query($conn,$tv);
					$tv3=mysqli_fetch_assoc($tv2);
					
					
				  
				  ?>
              	<form action="" method="post">
                  <label class="control-label" class="span5 text-center">Điện(Cập nhật ngày <?php echo $tv3['NgayCapNhat'] ?> )</label>
                 
                  <input type="number" class="span5" name="Dien"  title="Đơn giá điện" value="<?php echo $tv3['DonGia']?>"><br>
                  <button class="btn btn-info" name="CapNhatDien" onClick="return Sua();">Cập Nhật Thêm</button>
                  <?php
                  	if(isset($_POST['CapNhatDien']))
					{	$Ngay=date('Y-m-d');
						$Dien=$_POST['Dien'];
						$sql="insert into dongia(DonGia,NgayCapNhat,Loai)
								values('$Dien','$Ngay','1')";
						if(mysqli_query($conn,$sql))
							echo"<script>alert('Cập Nhật  Thành Công!');window.location='index.php?page=Update-DonGia'</script>";	 
					}
				  
				  ?>
                  </form>
              </div>
            <div id="tab2" class="tab-pane"> 
            	
            	<?php
                  	$t="select DonGia,NgayCapNhat from dongia where Loai='2' ORDER BY DonGiaID DESC LIMIT 1 ";
					$t2=mysqli_query($conn,$t);
					$t3=mysqli_fetch_assoc($t2);
					
					
				  
				  ?>
                  <form action="" method="post">
              	<label class="control-label" class="span5 text-center">Nước(Cập nhật ngày <?php echo $t3['NgayCapNhat'] ?>)</label>
                  <input type="number" class="span5" name="Nuoc" title="Đơn giá nước" value="<?php echo $t3['DonGia'] ?>"><br>
                  <button class="btn btn-info" name="CapNhatNuoc" onClick="return Sua();">Cập Nhật Thêm</button>
                  
               </form>
               <?php
                  	if(isset($_POST['CapNhatNuoc']))
					{	$Ngay=date('Y-m-d');
						$Nuoc=$_POST['Nuoc'];
						$sql2="insert into dongia(DonGia,NgayCapNhat,Loai)
								values('$Nuoc','$Ngay','2')";
						if(mysqli_query($conn,$sql2))
							echo"<script>alert('Cập Nhật  Thành Công!');window.location='index.php?page=Update-DonGia'</script>";	 						else 
							echo"<script>alert('Lỗi!')</script>";
					}
				  
				  ?>
  			</div>       
      </div>
        
        
       </div>
</div>

