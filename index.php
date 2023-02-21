<?php ob_start();include "config.php";
include "check-login.php";
 date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<script>
	function deleteAction(){
		return confirm("Bạn có muốn xóa mục này");
		}
	function Sua(){
		return confirm("Bạn có sửa mục này");
		}	
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />

<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css"/>
</head>

<body> 
        <!--Header-part-->
    <div id="header">
      <h1><a href="dashboard.html">Matrix Admin</a></h1>
    </div>
    <!--close-Header-part--> 
    
    
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
            <li class="divider"></li>
            
            <li class="divider"></li>
            <li><a href="?page=Doi-MK"><i class="icon-key"></i> Đổi mật khẩu</a></li>
            <li><a href="logout.php"><i class="icon icon-share-alt"></i> Logout</a></li>
          </ul>
        </li>
        
        
        <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
      </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->
    <div id="search">
      <input type="text" placeholder="Search here..."/>
      <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
      <ul>
      	
        <li class="active"><a href="?page=dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu "> <a href="#"><i class="icon icon-th-list"></i> <span>Sinh Viên</span> </a>
          <ul>
            <li><a href="?page=Them-Sv">Thêm Sinh Viên</a></li>
            <li><a href="?page=QL-Sv">Quản lí Sinh Viên </a></li>
             <li><a href="?page=QL-Lop">Quản lí Lớp </a></li>
          </ul>
        </li>
        <li class="submenu "> <a href="?page=QL-Phong"><i class="icon icon-inbox"></i> <span>Phòng</span></a>
        	<ul>
                <li><a href="?page=Them-Phong">Thêm Phòng</a></li>
                <li><a href="?page=QL-Phong">Quản lí Phòng </a></li>
                
			</ul>
        </li>
        <li class="submenu "> <a href="#"><i class="icon icon-th-list"></i> <span>Điện Nước</span> </a>
          <ul>
            <li><a href="?page=Them-DN">Thêm Điện Nước</a></li>
            <li><a href="?page=QL-DN">Quản lí Điện Nước </a></li>
            <li><a href="?page=Update-DonGia">Cập Nhật Đơn Giá Điện Nước</a></li>
            
          </ul>
        </li>
        <li class="submenu "><a href="#"><i class="icon icon-th"></i> <span>Hóa Đơn</span></a>
        	<ul>
            <li><a href="?page=Them-HD">Thêm Hóa Đơn</a></li>
            <li><a href="?page=QL-HD">Quản lí Hóa Đơn </a></li>
            
          </ul>
        </li>
        
        
        
        
      </ul>
    </div>
    <!--sidebar-menu-->
    
    <!--main-container-part-->
    <div id="content">
    <!--Dieu Huong-->
      <?php 
	if(isset($_GET['page'])){$page=$_GET['page'];}else{$page="";}
	switch($page)
	{
		case "dashboard":
			include("include/DashBoard.php");
		break;
		/* QL SV */
		case "Them-Sv":
			include("include/SinhVien/Them-Sv.php");
		break;
		
		
		case "QL-Sv":
			include("include/SinhVien/QL-Sv.php");
		break;
		
		case "Sua-Sv":
			include("include/SinhVien/Sua-Sv.php");
		break;
		case "Xoa-Sv":
			include("include/SinhVien/Xoa-Sv.php");
		break;
		/* End-QL Lop */
		case "QL-Lop":
			include("include/Lop/QL-Lop.php");
		break;
		case "Sua-Lop":
			include("include/Lop/Sua-Lop.php");
		break;
		case "Xoa-Lop":
			include("include/Lop/Xoa-Lop.php");
		break;
		/* QL Phong*/
		case "Them-Phong":
			include("include/Phong/Them-Phong.php");
		break;
		case "Sua-Phong":
			include("include/Phong/Sua-Phong.php");
		break;
		case "Xoa-Phong":
			include("include/Phong/Xoa-Phong.php");
		break;
		case "QL-Phong":
			include("include/Phong/QL-Phong.php");
		break;
		case "ChiTiet-Phong":
			include("include/Phong/ChiTiet-Phong.php");
		break;
		// QL-DN
		case "Them-DN":
			include("include/DienNuoc/Them-DN.php");
		break;
		case "CapNhat":
			include("include/DienNuoc/xulicapnhat.php");
		break;
		case "QL-DN":
			include("include/DienNuoc/QL-DN.php");
		break;
		case "Sua-DN":
			include("include/DienNuoc/Sua-DN.php");
		break;
		case "Xoa-DN":
			include("include/DienNuoc/Xoa-DN.php");
		break;
		case "Update-DonGia":
			include("include/DienNuoc/Update-DonGia.php");
		break;
		//QL-HD
		case "Them-HD":
			include("include/HoaDon/Them-HD.php");
		break;
		case "QL-HD":
			include("include/HoaDon/QL-HD.php");
		break;
		case "Xoa-HD":
			include("include/HoaDon/Xoa-HD.php");
		break;
		case "Sua-HD":
			include("include/HoaDon/Sua-HD.php");
		break;
		//Maukhau
		case "Doi-MK":
			include("include/DoiMatKhau/DoiMatKhau.php");
		break;
		default:
			include("include/DashBoard.php");
	}
?>
    <!--End Dieu Huong--> 
        <hr/>
        <div class="row-fluid">
          <div class="span6"></div>
        </div>
      </div>
    </div>
    
    <!--end-main-container-part-->
    
    <!--Footer-part-->
    
    <div class="row-fluid">
      <div id="footer" class="span12"> 2013-<?php echo date('Y');?> &copy; Matrix Admin.</a> </div>
    </div>
    
    <!--end-Footer-part-->
    
   
    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
     <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/matrix.calendar.js"></script> 
    <script src="js/fullcalendar.min.js"></script> 
	<script src="js/matrix.calendar.js"></script> 
    
    <script src="js/matrix.js"></script> 
   
   
   
    <script src="js/matrix.chat.js"></script> 
   
    <script src="js/jquery.dataTables.min.js"></script> 
    <script src="js/matrix.tables.js"></script> 
    
    <script type="text/javascript">
      // This function is called from the pop-up menus to transfer to
      // a different page. Ignore if the value returned is a null string:
      function goPage (newURL) {
    
          // if url is empty, skip the menu dividers and reset the menu selection to default
          if (newURL != "") {
          
              // if url is "-", it is this page -- reset the menu:
              if (newURL == "-" ) {
                  resetMenu();            
              } 
              // else, send page to designated URL            
              else {  
                document.location.href = newURL;
              }
          }
      }
    
    // resets the menu selection upon entry to this page:
    function resetMenu() {
       document.gomenu.selector.selectedIndex = 2;
    }
    </script>   
      
    
    
</body>
</html>
<?php
	ob_end_flush();
?>