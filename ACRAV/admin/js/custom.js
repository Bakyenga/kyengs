
$(document).ready(function(){

	

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


                           
                                    
	

	  $(".editable_select").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'SINGLES':'SINGLES', 'CASES':'CASES'}",
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










