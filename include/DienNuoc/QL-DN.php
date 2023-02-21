<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=QL-Phong" class="current">Quản Lí Điện Nước</a> </div>
    <h1>Quản lí  Điện Nước </h1>	 	
    <!--Action boxes-->
      <div class="container-fluid">
			<div class="widget-box">
              <div class="widget-title">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab1">Quản Lí Điện</a></li>
                  <li ><a data-toggle="tab" href="#tab2">Quản Lí Nước</a></li>
                  
                </ul>
              </div>
              <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active"><!--  tab 1--->
                	<div class="widget-box">
                      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Table sinh viên</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                          <thead>
                            <tr>
                              <th>Tên Phòng</th>
                              <th>Tháng Ghi Số</th>
                              <th>Chỉ Số Đầu</th>
                              <th>Chỉ Số Cuối</th>
                              <th>Điện Năng TT</th>
                              <th>Đơn Giá</th>
                              <th>Thành Tiền</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                         
                              <?php
                                $sql="select * from dien,phong,dongia where dien.MaPhong=phong.MaPhong  and dien.DonGiaID=dongia.DonGiaID";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($query)){
                                    $DNTT=$row['ChiSoCuoi']-$row['ChiSoDau'];
                                    $TongTien=$DNTT*$row['DonGia'];
									$TongCong2=number_format($TongTien,0,',','.')." đ";
                                    echo "
                                         <tr class='gradeU'>
                                            <th>".$row['TenPhong']."</th>
                                            <th>".$row['ThangGhiSo']."</th>
                                            <th>".$row['ChiSoDau']."</th>
                                            <th>".$row['ChiSoCuoi']."</th>
                                            <th>".$DNTT."</th>
                                            <th>".$row['DonGia']."</th>
                                            <th>".$TongCong2."</th>
                                            
                                            <th><a href='index.php?page=Sua-DN&&MaPhong=".$row['MaPhong']."&&Thang=".$row['ThangGhiSo']." '>Sửa</a></th>
                                            <th><a href='index.php?page=Xoa-DN&&MaPhong=".$row['MaPhong']."&&Thang=".$row['ThangGhiSo']." ' onclick='return deleteAction();'>Xóa</a></th>
                                        </tr>
                                    ";
                                        
                                }
                              ?>
                            
                           
                            
                            
                          </tbody>
                        </table>
                      </div>
       			 </div> <!-- tab 1--->
                 </div>
                <div id="tab2" class="tab-pane">
                	<div class="widget-box">
                      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Table sinh viên</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                          <thead>
                            <tr>
                              <th>Tên Phòng</th>
                              <th>Tháng Ghi Số</th>
                              <th>Chỉ Số Đầu</th>
                              <th>Chỉ Số Cuối</th>
                              <th>m3 Tiêu Thụ</th>
                              <th>Đơn Giá</th>
                              <th>Thành Tiền</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                         
                              <?php
                                $sql="select * from nuoc,phong,dongia where nuoc.MaPhong=phong.MaPhong  and nuoc.DonGiaID=dongia.DonGiaID";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($query)){
                                    $m3=$row['ChiSoCuoi']-$row['ChiSoDau'];
                                    $TongTien=$m3*$row['DonGia'];
									$TongCong2=number_format($TongTien,0,',','.')." đ";
                                    echo "
                                         <tr class='gradeU'>
                                            <th>".$row['TenPhong']."</th>
                                            <th>".$row['ThangGhiSo']."</th>
                                            <th>".$row['ChiSoDau']."</th>
                                            <th>".$row['ChiSoCuoi']."</th>
                                            <th>".$m3."</th>
                                            <th>".$row['DonGia']."</th>
                                            <th>".$TongCong2."</th>
                                            
                                            <th><a href='index.php?page=Sua-DN&&MaPhong=".$row['MaPhong']."&&Thang=".$row['ThangGhiSo']." '>Sửa</a></th>
                                            <th><a href='index.php?page=Xoa-DN&&MaPhong=".$row['MaPhong']."&&Thang=".$row['ThangGhiSo']." ' onclick='return deleteAction();'>Xóa</a></th>
                                        </tr>
                                    ";
                                        
                                }
                              ?>
                            
                           
                            
                            
                          </tbody>
                        </table>
                      </div>
                </div>
                
        	</div><!--  widget-box --->
      </div>