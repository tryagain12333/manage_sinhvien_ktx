<script type="text/javascript" src="js/ajax-jquery.js"></script>
<script type="text/javascript" src="include/DienNuoc/xuli.js"></script>

	<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=Them-Sv" class="current">Thêm Điện Nước</a> </div>
    <h1>Thêm Điện Nước</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Điện Nước</h5>
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
                  
                    <select  name="phong" class="span5 phong">
                       <?php 
					   				
                        			
                                    $sql="select * from phong";
                                    $query=mysqli_query($conn,$sql);
                                    while ($r=mysqli_fetch_assoc($query)){
									?>
                                    <option value="<?php echo $r['MaPhong']?>"  >  <?php echo $r['TenPhong'] ?> </option>
									
                        				<?php }?>
                    </select>
                  
                      <label class="control-label">Tháng Ghi Số</label>
                      	
                        <input type="month"required max="12" min="1"  name="ThangGhiSo" class="span5 thang"  value="" />
                        <br />
                        <input type="submit" class="span3 btn btn-info"  id="btnCapNhat" value="Cập Nhật Tháng Trước"  />
                   	
              </div>
              
            <div id="tab2" class="tab-pane"> 
              	<form method="post">
                <input type="number"  name="ChiSoDauD"  title="Chỉ Số Đầu"class="span8 csd" placeholder="Chỉ Số Đầu"required value="" />
                <input type="number"  name="ChiSoCuoiD" class="span8"  title="Chỉ Số Cuối"placeholder="Chỉ Số Cuối" required
                 value=""
                />
            </div>
            <div id="tab3" class="tab-pane">
             	 <input type="number"  name="ChiSoDauN" 
                 class="span8 csn" placeholder="Chỉ Số Đầu" title="Chỉ Số Đầu"required value="" />
                  <input type="number" name="ChiSoCuoiN"
                   class="span8"title="Chỉ Số Cuối" placeholder="Chỉ Số Cuối" required />
          </div>
          		<button class="btn btn-primary" name="btnThemDN">Thêm</button>
          			<?php
                    	if(isset($_POST['btnThemDN']))
						{		
								$maphong=$_POST['phong'];
								$thang=$_POST['ThangGhiSo'];
								if((mysqli_fetch_assoc(mysqli_query($conn,"select * from dien 
								where MaPhong='$maphong' and ThangGhiSo='$thang'")))>0)
								{
									echo"<script>alert('Dữ liệu bị Trùng');</script>";	
								}
								else
									{
										$ChiSoMoiD=$_POST['ChiSoDauD'];     $ChiSoCuD=$_POST['ChiSoCuoiD'];
										$ChiSoMoiN=$_POST['ChiSoDauN'];     $ChiSoCuN=$_POST['ChiSoCuoiN'];
										$tv1="select * from dongia where Loai='1' ORDER BY DonGiaID DESC LIMIT 1";
										$tv2=mysqli_fetch_assoc(mysqli_query($conn,$tv1));   
										$DonGiaID=$tv2['DonGiaID'];
										$DNTT=$ChiSoCuD-$ChiSoMoiD;
										$TienDien=$DNTT*$tv2['DonGia'];
										
										$sql4="insert into dien(MaPhong,ThangGhiSo,ChiSoDau,ChiSoCuoi,DonGiaID,TienDien)
												values('$maphong','$thang','$ChiSoMoiD','$ChiSoCuD','$DonGiaID','$TienDien')";
										mysqli_query($conn,$sql4);
										
										
										
										
										$t1="select * from dongia where Loai='2' ORDER BY DonGiaID DESC LIMIT 1";
										$t2=mysqli_fetch_assoc(mysqli_query($conn,$t1));   
										$DonGiaIDN=$t2['DonGiaID'];
										$m3=$ChiSoCuN-$ChiSoMoiN;
										$TienNuoc=$m3*$t2['DonGia'];
										
										$sql4="insert into nuoc(MaPhong,ThangGhiSo,ChiSoDau,ChiSoCuoi,DonGiaID,TienNuoc)
												values('$maphong','$thang','$ChiSoMoiN','$ChiSoCuN','$DonGiaIDN','$TienNuoc')";
										mysqli_query($conn,$sql4);
										echo"<script>alert('Thêm Thành Công');windown(-1)</script>";
									}
						}
					?>
          </form>
         
        </div>
        
        
         </div>
          </div>
