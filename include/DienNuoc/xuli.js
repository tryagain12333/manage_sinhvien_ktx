$(document).ready(function () {
	$(".DonGiaDien").change(function(){
		var id = $(".DonGiaDien").val();
		$.post("include/DienNuoc/XuLiSua.php", {id: id}, function(data){
			$("span:#NgayDonGiaD").html(data);	
			
		})
		 
	})
	$(".DonGiaNuoc").change(function(){
		var id = $(".DonGiaNuoc").val();
		$.post("include/DienNuoc/XuLiSua.php", {id: id}, function(data){
			$("span:#NgayDonGiaN").html(data);	
			
		})
		 
	})
	$('#btnCapNhat').click(function (event) {
        //prevent event default of DOM
        event.preventDefault();
        var MaPhong = $('.phong').val();
        var Thang = $('.thang').val();
		
       if(Thang=="")
	   {
		 alert("Tháng không thể rỗng");  
		 }
		else
			{
				$.post("include/DienNuoc/xulicapnhat.php", {MaPhong: MaPhong ,Thang: Thang}, function(data){
				
				$('.csd').val(data);
				$('#btnCapNhat').hide();
				})
			}
	   
    });
	$('#btnCapNhat').click(function (event) {
        //prevent event default of DOM
        event.preventDefault();
        var MaPhong = $('.phong').val();
        var Thang = $('.thang').val();
			
       if(Thang=="")
	   {
		 
		 }
		else
			{
			   $.post("include/DienNuoc/xulicapnhat2.php", {MaPhong: MaPhong ,Thang: Thang}, function(data){
						
					
					$('.csn').val(data);
				})
			}
    });
});