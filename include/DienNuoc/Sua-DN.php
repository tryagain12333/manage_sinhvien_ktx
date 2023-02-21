<?php
	$maphong=$_GET['MaPhong'];
	$thang=$_GET['Thang'];
	$sql2="select * from dien,dongia where MaPhong='$maphong' and ThangGhiSo='$thang' and dien.DonGiaID=dongia.DonGiaID";
	$query2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($query2);
	$DonGiaID_Dien=$row2['DonGiaID'];
	
	$sql3="select * from nuoc,dongia where MaPhong='$maphong' and ThangGhiSo='$thang' and nuoc.DonGiaID=dongia.DonGiaID";
	$query3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_assoc($query3);
	 $DonGiaID_Nuoc=$row3['DonGiaID'];

?>
<script type="text/javascript" src="js/ajax-jquery.js"></script>
<script type="text/javascript" src="include/DienNuoc/xuli.js"></script>
<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Sửa Điện Nước</a> </div>
    <h1>Sửa Điện Nước</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Sửa Điện Nước</h5>
        </div>
        
	<div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Hóa Đơn</a></li>
              <li><a data-toggle="tab" href="#tab2">Điện</a></li>
              <li><a data-toggle="tab" href="#tab3">Nước</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              	<form action="" method="post">
                  <label class="control-label" class="span5 text-center">Phòng</label>
                  
                    
                       <?php 
					   				
                        			
                                    $sql="select * from phong where MaPhong='$maphong'";
                                    $query=mysqli_query($conn,$sql);
                                    $r=mysqli_fetch_assoc($query);
									?>
                                    
                    <input class="span5" disabled value="<?php echo $r['TenPhong']?>" >
                  
                      <label class="control-label">Tháng Ghi Số</label>
                      	
                        <input type="month" disabled max="12" min="1"  name="ThangGhiSo" class="span5 thang"  value=<?php echo $row2['ThangGhiSo'] ?> />
                        <br />
                        
                   	
              </div>
              
            <div id="tab2" class="tab-pane"> 
              	<form method="post">
                <input type="number"  name="ChiSoDauD"  title="Chỉ Số Đầu"class="span8" placeholder="Chỉ Số Đầu" disabled value="<?php echo $row2['ChiSoDau']?>" />
                <input type="hidden" name="ChiSoDauD2" value="<?php echo $row2['ChiSoDau']?>" />
                <input type="number"  name="ChiSoCuoiD" class="span8"  title="Chỉ Số Cuối"placeholder="Chỉ Số Cuối" required 
                 value="<?php echo $row2['ChiSoCuoi']?>"
                />
                <div class="control-group">
                  <label class="control-label">Đơn Giá</label>
                  <div class="controls">
                    <select  name="DonGiaDien" class="span2 DonGiaDien">
                           <?php 
                                        //$DonGiaID_Dien=filter_input(INPUT_POST,'DonGiaDien');
                                        $sql4="select * from dongia where Loai='1' ORDER BY DonGiaID 
    DESC";
                                        $kq4=mysqli_query($conn,$sql4);
                                        while ($r4=mysqli_fetch_assoc($kq4)){
                                        ?>
                                        <option value="<?php echo $r4['DonGiaID']?>" <?php if($r4['DonGiaID']==$DonGiaID_Dien) 
                                                                        echo "selected" ?> >  <?php echo $r4['DonGia'] ?> </option>
                                        
                                            <?php }?>
                        </select>
                        Ngày: <span id="NgayDonGiaD" class="date badge badge-info"><?php echo $row2['NgayCapNhat']?></span>
                  </div>
                </div>
            </div>
            <div id="tab3" class="tab-pane">
             	 <input type="number"  name="ChiSoDauN" 
                 class="span8" placeholder="Chỉ Số Đầu" title="Chỉ Số Đầu" disabled value="<?php echo $row3['ChiSoDau']?>" />
                 <input type="hidden" name="ChiSoDauN2" value="<?php echo  $row3['ChiSoDau']?>" />
                  <input type="number" name="ChiSoCuoiN"
                   class="span8"title="Chỉ Số Cuối" placeholder="Chỉ Số Cuối" required value="<?php echo $row3['ChiSoCuoi']?>" />
                   <div class="control-group">
                  <label class="control-label">Đơn Giá</label>
                  <div class="controls">
                    <select  name="DonGiaNuoc" class="span2 DonGiaNuoc">
                           <?php 
                                         $sql5="select * from dongia where Loai='2' ORDER BY DonGiaID 
    DESC";		
                                        $kq5=mysqli_query($conn,$sql5);
                                        while ($r5=mysqli_fetch_assoc($kq5)){
                                        ?>
                                        <option value="<?php echo $r5['DonGiaID']?>" <?php if($r5['DonGiaID']==$DonGiaID_Nuoc) 
                                                                        echo "selected" ?> >  <?php echo $r5['DonGia'] ?> </option>
                                        
                                            <?php }?>
                        </select>
                        Ngày: <span id="NgayDonGiaN" class="date badge badge-info"><?php echo $row3['NgayCapNhat']?></span>
                  </div>
                </div>
          </div>
          		<button class="btn btn-primary" name="btnSuaDN">Cập Nhật</button>
                
                </form>
         
        </div>
        
        
         </div>      </div>
      <?php
      	if(isset($_POST['btnSuaDN']))
		{  	
		 	$ChiSoDauDien=$_POST['ChiSoDauD2'];
			$ChiSoCuoiDien=$_POST['ChiSoCuoiD'];
			$DonGiaID_Dien2=$_POST['DonGiaDien'];
			$sql6="select DonGia from dongia where DonGiaID='$DonGiaID_Dien2' ";
			$row6=mysqli_fetch_assoc(mysqli_query($conn,$sql6));
			$DonGiaDien=$row6['DonGia'];
			$DNTT=$ChiSoCuoiDien-$ChiSoDauDien;
			$TienDien=$DNTT*$DonGiaDien;
			$sql7="Update dien Set ChiSoCuoi='$ChiSoCuoiDien',DonGiaID='$DonGiaID_Dien2',TienDien='$TienDien'
			where MaPhong='$maphong'  and ThangGhiSo='$thang' ";
			mysqli_query($conn,$sql7);
			
			$ChiSoDauNuoc=$_POST['ChiSoDauN2'];
			$ChiSoCuoiNuoc=$_POST['ChiSoCuoiN'];
			$DonGiaID_Nuoc2=$_POST['DonGiaNuoc'];
			$sql8="select DonGia from dongia where DonGiaID='$DonGiaID_Nuoc' ";
			$row8=mysqli_fetch_assoc(mysqli_query($conn,$sql8));
			$DonGiaNuoc=$row8['DonGia'];
			$m3=$ChiSoCuoiNuoc-$ChiSoDauNuoc;
			$TienNuoc=$m3*$DonGiaNuoc;
			$sql9="Update nuoc Set ChiSoCuoi='$ChiSoCuoiNuoc',DonGiaID='$DonGiaID_Nuoc2',TienDien='$TienNuoc' where MaPhong='$maphong'  and ThangGhiSo='$thang'";
			mysqli_query($conn,$sql9);
			
			echo"<script>alert('Cập Nhật Thành Công');window.location='index.php?page=QL-DN'</script>";
		}
	  	
	  ?>