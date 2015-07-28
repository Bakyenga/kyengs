$(document).ready(function(){

	$("span#show_rmember").hide();
	$("span#show_nmember").hide();
	
	$("#mstatus").change(function()			
	{
		var x = $(this), v = x.val();
		
		if (v=="2") {
			$(".nname").removeAttr("disabled");
			$(".nphone").removeAttr("disabled");
			$(".nemail").removeAttr("disabled");
			$(".norg").removeAttr("disabled");
			$(".nmid").attr("disabled", "disabled");
			$("span#show_nmember").slideDown("slow");	
			$("span#show_rmember").hide();
		}
		if (v=="1") {
			$(".nname").attr("disabled", "disabled");
			$(".nphone").attr("disabled", "disabled");
			$(".nemail").attr("disabled", "disabled");
			$(".norg").attr("disabled", "disabled");
			$(".nmid").removeAttr("disabled");
			$("span#show_rmember").slideDown("slow");
			$("span#show_nmember").hide();	
		}
		
	});					

	
	
});
