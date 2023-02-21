$(document).ready(function () {
	$("#password2").change(function(event){
		event.preventDefault();
		var pass1=$("#password").val();
		var pass2=$("#password2").val();
		$("#mess").removeClass("icon-remove-sign");
		$("#mess").removeClass("icon-ok-sign");
		if(pass2!=pass1)
		{
			$("#mess").addClass("icon-remove-sign");
			$("#mess").html("Mật khẩu không khớp");
			
		}
		else
			{
			
			$("#mess").html("Mật khẩu hợp lệ");
			$("#mess").addClass("icon-ok-sign");
			}
			
	})
	$("#password").change(function(event){
		event.preventDefault();
		var pass1=$("#password").val();
		var pass2=$("#password2").val();
		$("#mess").removeClass("icon-remove-sign");
		$("#mess").removeClass("icon-ok-sign");
		if(pass1!=pass2)
		{
			$("#mess").addClass("icon-remove-sign");
			$("#mess").html("Mật khẩu không khớp");
			
		}
		else
			{
			
			$("#mess").html("Mật khẩu hợp lệ");
			$("#mess").addClass("icon-ok-sign");
			}
			
	})
})