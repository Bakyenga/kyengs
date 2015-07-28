<style type="text/css">
form#myfilter {
  margin:20px 40px;
}
fieldset
{ border:1px solid #bbb;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  -khtml-border-radius:5px;
  border-radius:5px;
  padding:20px;
  margin-bottom:10px; }

fieldset legend
{ border-left:1px solid #bbb;
  border-right:1px solid #bbb;
  padding:0 10px; }

.form label
{ display:block;
  float:left;
  font-size:12px;
  font-weight:bold;
  margin:0;
  text-align:right;
  width:160px;
  clear:left; }

.form label small
{ color:#666;
  display:block;
  font-size:11px;
  font-weight:normal;
  line-height:11px;
  text-align:right;
  width:160px; }
</style>
		<fieldset><legend>Generate Statistical Report</legend>
        <table width="50%" border="0" align="center">
           <tr> 
            <td>
              <table width="50%" align="center" border="0" >
                <tr>
                  <td class="fieldlabel" id="t_FirstDate">From: </td>
                  <td class="fieldarea"><input  type="text" name="FirstDate" id="FirstDategsr" class="textfield tcal" value="<?php echo date("Y-m-d") ?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="fieldlabel" id="t_SecondDate">To: </td>
                  <td class="fieldarea"><input  type="text" name="SecondDate" id="SecondDategsr" class="textfield tcal"  value="<?php echo date("Y-m-d") ?>"/></td>
                </tr>
              
              <tr>
              <td>
              <br />
              <div align="center">
                <span class="accept"></span><input type="submit" id="btngsr" value="GENERATE" class="button button-green" />
              </div>
              </td></tr></table>
            </td>
          </tr>
        </table>
        <div id="gsrdisplay" style="display:none" ></div>
        </fieldset>

</body>
<script type="text/javascript">
	 $(function() {
	
		$("#btngsr").click(function()   
			{
					$("#gsrdisplay").css("display","visible");
					$("#gsrdisplay").html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Generating report, please wait...');
					var fd 	 = document.getElementById('FirstDategsr').value;
					var sd 	 = document.getElementById('SecondDategsr').value;	
					$("#gsrdisplay").load("companyprofile/statreport.php?fd="+fd+"&sd="+sd+"&randval=" + Math.random()).slideDown("slow");
					$('html, body').animate({
                     scrollTop: $(document).height()
					 },
					 1500);
					 return false;
		});
	});
</script>