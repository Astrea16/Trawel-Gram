$(document).ready(function(){

	$("#btn-contact").click(function(){
		var	name = $("#name").val();
		var email = $("#email-1").val();
		var massage = $("#massage").val();

		$.ajax({

			url: "trevel.php",
			type: "post",
			dataType: "json",

			data: {
				"name": name,
				"email": email,
				"messge": massege
			},

			success: function(data){
				$(".result").html(data.result);
			}
		});
	});
});