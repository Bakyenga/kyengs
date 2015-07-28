
$(document).ready(function(){

	//Script to add load units
	$('form.viaAjaxcargo').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						$("#cargodisplay").load('companyprofile/cargodata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});
	
	//Script to add clients
	$('form.viaAjaxxc').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						$("#clientdisplay").load('companyprofile/clientdata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});
	
	//Script to add truck loading schedules
	$('form.viaAjaxxstl').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						$("#scheduledisplay").load('companyprofile/scheduledata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});

 $("#shipmentsel").change(function()   
  {
	
	$("#shipment_details").html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading data, please wait...');
    var x = $(this), v = x.val();
    
   // document.cookie="v=" + v;
    
    $("#shipment_details").load("companyprofile/shipmentdetails.php?v="+v+"&randval=" + Math.random()).slideDown("slow");

  });




	//Script to Add info
	$('form.viaAjax').live('submit', function() {

		var form 		= $(this); _id = form.attr("id");
		page =	form.attr('action');
		postValues 		= $(form).serialize();

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
			
		  		//return {id : v[1], info : v[0], rand : Math.random()};
		  
				if(id==1){
					alert(info);
					setTimeout( function() { document.getElementById(_id).reset(); }, 1000);
				}else{
					alert(info);
				}
				
			}
			
		});
				
		return false;

	});
	
	
	
		//Script to add bids
	$('form.viaAjaxbids').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});

	//Script to Add bids
	$('form#bid4work').live('submit', function() {

				var form 	= $(this), _id = form.attr("id");
				$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Uploading... please wait.');
							
				$.ajax("backend.php?b1d4w4k=true", {
				  data: $("#bid4work [name=amount], #bid4work [name=details], #bid4work [name=bidowner], #bid4work [name=bidid], #bid4work [name=job]").serializeArray(),
				  files: form.find(":file"),
				  iframe: true,
				  processData: false
				}).complete(function() {
				  
				  //form.removeClass("loading");
				  return false;
				  
				}).success(function(data) { 
								
				  	var v = data;
					//alert(v);
					v = v.split("*");
					var id = v[1];
					var info = v[0];
			  
					if(id == 1){
						$("#Ajaxresults").slideDown().html(info);
					}else{
						//alert(data);
						$("#Ajaxresults").slideDown().html(data);
						setTimeout( function() { 
							$("#Ajaxresults").slideUp().html("");  
							document.getElementById(_id).reset(); 
							
						}, 3000); //Reset form
					}
					
					return false;
				  
				});
				
			return false;

	} );
	
	//Script to add shipments
	$('form.viaAjaxxs').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						$("#shipmentdisplay").load('companyprofile/shipmentdata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});

	//Script to add comments
	$('form.viaAjaxx').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{
					//alert(data);
					$("#Ajaxresults").html(data);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						$("#userdisplay").load('companyprofile/userdata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});
	


//Script to add - new bids
	$('form.viaAjaxxx').live('submit', function() {

		var form 	= $(this), _id = form.attr("id");
		page 		=	form.attr('action');
		postValues 	= $(form).serialize();
		
		$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading... please wait.');

		$.ajax({
				
			url: page+'&rand='+Math.random(),
			type: 'POST',
			data: postValues,
			dataType: "html",
			error : function() {
				alert("Ajax Error occured!");
			},
			success: function(data) { 
			
				var v = data;
				//alert(v);
				
				v = v.split("*");
				var id = v[1];
				var info = v[0];
		  
				if(id==1){
					$("#Ajaxresults").html(info);
				}else{

					/*var v = data;
					
					v = v.split("|");
					var id = v[1];
					var info = v[0];*/

					$("#Ajaxresults").html(info);
					setTimeout( function() { 
						$("#Ajaxresults").slideUp().html("");  
						document.getElementById(_id).reset(); 
						//$("#"+id).hide();
						//$("#cargo_details").html("Selected Cargo Details will be displayed here.. ");
					}, 1000); //Reset form
				}
			}
			
		});
				
		return false;

	});




	//Script to Add driver
	$('form#adddriver').live('submit', function() {

				var form 	= $(this), _id = form.attr("id");
				$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Uploading... please wait.');
							
				$.ajax("backend.php?adddriver=true", {
				  data: $("#adddriver [name=fname], #adddriver [name=lname], #adddriver [name=phone], #adddriver [name=dob], #adddriver [name=dpermit], #adddriver [name=passport], #adddriver [name=experience], #adddriver [name=endorsements], #adddriver [name=actingas]").serializeArray(),
				  files: form.find(":file"),
				  iframe: true,
				  processData: false
				}).complete(function() {
				  
				  //form.removeClass("loading");
				  return false;
				  
				}).success(function(data) { 
								
				  	var v = data;
					//alert(v);
					$("#userdisplay2").load('companyprofile/driverdata.php?id='+_id+'&randval=' + Math.random()).fadeIn("slow");
					v = v.split("*");
					var id = v[1];
					var info = v[0];
			  
					if(id==1){
						$("#Ajaxresults").slideDown().html(info);
					}else{
						//alert(data);
						$("#Ajaxresults").slideDown().html(data);
						setTimeout( function() { 
							$("#Ajaxresults").slideUp().html("");  
							document.getElementById(_id).reset(); 
							
						}, 3000); //Reset form
					}
					
					return false;
				  
				});
				
			return false;

	} );
	
	//Script to edit profile pic
	$('form#EditPic').live('submit', function() { 

			//-- Post feed and upload attached files----
			var form 	= $(this), _id = form.attr("id");
			$("#Ajaxresults").slideDown().html('<img src="images/ajax-loader.gif" />&nbsp;&nbsp;Saving photo ...');
						
			$.ajax("backend.php?editProfilePic=true", {
			  data: $("#EditPic [name=cid]").serializeArray(),
			  files: form.find(":file"),
			  iframe: true,
			  processData: false
			}).complete(function() {
			  
			  //form.removeClass("loading");
			  return false;
			  
			}).success(function(data) { 
				$("#Ajaxresults").html(data);								  
								
					return false;
			  
			});
				
			return false;

	} );

	$(".editable_text").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		width     : '150px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});


	$(".editable_textarea").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "textarea",
		submit : "OK",
		width     : '200px',
		height    : '70px',
		style   : 'display:block;',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});


     $(".editable_select1").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Male':'Male','Female':'Female'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });                      
                                    
		$(".editable_select2").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Company Administrator':'Company Administrator','Data Entry':'Data Entry'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		id		  : 'usertype',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });

	  $(".editable_seldri").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Driver':'Driver', 'Turnboy':'Turnboy'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '150px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });
	
	
		
		
	
	$(".editable_table").editable("backend.php?edit_table=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		width     : '150px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('info');
			v = v.split("|");
			
		  return {table : v[0], cname: v[2], type: v[1], rand : Math.random()};
		  
		}
		
	});


	$(".rename_table").editable("backend.php?rename_table=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		width     : '150px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], tablename : v[4], rand : Math.random()};
		  
		}
		
	});

	
	
	

	$("a.del").live('click', function () {
			
			var c, v, p = $(this).parent();
			
			v = $(this).attr('id');
			v = v.split("|");
	
	
	
		c = confirm("Are you sure about deleting this !");
		
		if (c==true) {
			
			p.html('<img src="images/ajax-loader.gif">');
			//$(this).remove();
		
			$.ajax({
				type: "POST", 
				url: "backend.php?del=true",
				data: ({ id : v[2], table : v[0], primarykey: v[1], rand : Math.random()}),
				success: function(msg) {//alert(msg);
					if(msg == "OK") {
						//alert("Record deleted");
						$('tr.' + v[2]).remove();
					} else {
						p.html('Error!');
					}
				}
			});
	
		}
	
		return false;
	});
		
	

	

	$.get_categories = function(ServiceID) {
		
		$("#Up-categories").html('<center><img src="images/ajax-loader.gif"> Please wait ...</center>')
		
		$.ajax({
				
			url: 'ajax-categories.php?ServiceID='+ServiceID+'&rand='+Math.random(),
			type: 'GET',
			dataType: "html",
			success: function(data) { 
			
				$("#Up-categories").html(data)				
			
			}
			
		});

		
	}



});










