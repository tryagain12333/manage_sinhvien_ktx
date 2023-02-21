<div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
        <div class="quick-actions_homepage">
          <ul class="quick-actions">
            <li class="bg_lb"> <a href="index.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
            <li class="bg_lo"> <a href="?page=QL-Sv"> <i class="icon-user"></i> Sinh Viên</a> </li>
            <li class="bg_ly"> <a href="?page=QL-Phong"> <i class="icon-inbox"></i> Phòng </a> </li>
            
           
            
            <li class="bg_ls"> <a href="?page=QL-DN"> <i class="icon-tint"></i>Điện Nước</a> </li>
             <li class="bg_lo"> <a href="?page=QL-HD"> <i class="icon-fullscreen"></i>Hóa Đơn</a> </li>
           <li class="bg_lg"> <a href="?page=QL-Lop"> <i class="icon-signal"></i> Lớp</a> </li>
          </ul>
        </div>
    <!--End-Action boxes-->    
    
    <!--Chart-box-->    
        <div class="row-fluid">
          <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
              <h5>Site Analytics</h5>
            </div>
            <div class="widget-content" >
              <div class="row-fluid">
              <!-- pie chart -->
               		<!-- <div class="span5">
						<div id="pie_chart_div" class="templatemo-chart"></div>
                    </div>    	   
                <!-- end pie chart---> 
               <?php
			   	//sinh vien
               	 $sql="select COUNT(*) as TongCong from sinhvien";
				 $query=mysqli_query($conn,$sql);
				 $row=mysqli_fetch_assoc($query);
				 $tongcongsv=$row['TongCong'];
				 //lop
				 $row2=mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(*) as TongCong from lop"));
			   	 $tongconglop=$row2['TongCong'];
				 //Phong
				 $row3=mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(*) as TongCong from phong"));
			   	 $tongcongphong=$row3['TongCong'];
				 //Phong day
				 $row4=mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(*) as TongCong from phong where TinhTrangPhong='1'"));
			   	 $tongcongphongday=$row4['TongCong'];
				 
				 //Hoa Don
				 
				 $today=date("Y-m-d");
				
				$ngay= date("d",strtotime($today));
				$thang =date("m",strtotime($today));
				$thang2=date("m",strtotime($today));
				$nam =date("Y",strtotime($today));
				if($ngay<25&&$ngay>=1)
				{
					if($thang==1)
					{
						$thang=12;
						$nam-=1;	
					}
					else
						$thang-=1;
				}
				
				if($thang>9)
					$namthang=$nam."-".$thang;
				else
					$namthang=$nam."-0".$thang;
				// Hoa don thang da thanh toan
				 $row6=mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(*) as TongCong from hoadon where ThangGhiSo='$namthang' "));
			   	 $tongconghoadonthang=$row6['TongCong'];
			
				//Tong hoa don thang
				 $row7=mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(*) as TongCong from dien where ThangGhiSo='$namthang' "));
			   	 $tongcongdiennuocthang=$row7['TongCong'];
			   ?>
                <div class="span5"><!-- span5--->
                  <ul class="site-stats">
                    <li class="bg_lh"><i class="icon-user"></i> <strong><?php echo $tongcongsv?></strong> <small>Tổng số Sinh Viên</small></li>
                    <li class="bg_lh"><i class="icon-plus"></i> <strong><?php echo $tongconglop?></strong> <small>Lớp </small></li>
                    <li class="bg_lh"><i class="icon-inbox"></i> <strong><?php echo $tongcongphong?></strong> <small>Tổng Số Phòng</small></li>
                    <li class="bg_lh"><i class="icon-inbox"></i> <strong><?php echo $tongcongphongday?></strong> <small>Tổng Số Phòng Đầy</small></li>
                    <li class="bg_lh"><i class="icon-fullscreen"></i> <strong><?php echo $tongcongdiennuocthang?></strong> <small>Tổng Số Hóa Đơn</small></li>
                    <li class="bg_lh"><i class="icon-fullscreen"></i> <strong><?php echo $tongconghoadonthang?></strong> <small>Tổng Đã Hóa Đơn Tháng <?php echo $thang2?></small></li>
                  </ul>
                  
                </div><!-- span5--->
                <!-- Tyle phan tram --->
                <div class="widget-content span7">
                    <ul class="unstyled">
                    <?php
						$tongcongphongtrong=$tongcongphong-$tongcongphongday;
						$TyLePhongTrong=($tongcongphongtrong/$tongcongphong)*100;
                    	if($tongcongdiennuocthang!=0){
						$TongHoaDonChuaThanhToan=$tongcongdiennuocthang-$tongconghoadonthang;
						$TyLeHdChuaThanhToan=($TongHoaDonChuaThanhToan/$tongcongdiennuocthang)*100;
						}
						else
							echo"<script>alert('Chưa có hóa đơn nào của tháng này')</script>"
					?>
                      <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> <?php echo round($TyLePhongTrong, 2);?>% Phòng Trống <span class="pull-right strong">
                      	<?php echo $tongcongphong?>
                      </span>
                        <div class="progress progress-striped ">
                          <div style="width: <?php echo round($TyLePhongTrong, 2);?>%;" class="bar"></div>
                        </div>
                      </li>
                      
                      <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span> 
					  <?php if($tongcongdiennuocthang!=0)echo round($TyLeHdChuaThanhToan, 2); else "0"?>% Hóa đơn chưa thanh toán tháng <?php echo $thang2?> <span class="pull-right strong"><?php echo $tongcongdiennuocthang?></span>
                        <div class="progress progress-warning progress-striped ">
                          <div style="width: <?php echo round($TyLeHdChuaThanhToan, 2); ?>%;" class="bar"></div>
                        </div>
                      </li>
                      
                    </ul>
                  </div><!-- ty le phan tram ---->
              </div><!-- row full-->
              
            </div>
          </div>
        </div>
        