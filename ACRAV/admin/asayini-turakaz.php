<?php 
	require_once("access.php"); 
	require_once("functions.php");
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>
	
	<SCRIPT>


		function listbox_moveacross(sourceID, destID) {
			var src = document.getElementById(sourceID);
			var dest = document.getElementById(destID);

			for(var count=0; count < src.options.length; count++) {

				if(src.options[count].selected == true) {
						var option = src.options[count];

						var newOption = document.createElement("option");
						newOption.value = option.value;
						newOption.text = option.text;
						newOption.selected = true;
						try {
								 dest.add(newOption, null); //Standard
								 src.remove(count, null);
						 }catch(error) {
								 dest.add(newOption); // IE only
								 src.remove(count);
						 }
						count--;

				}

			}

		}
		function listbox_selectall(listID, isSelect) {

			var listbox = document.getElementById(listID);
			for(var count=0; count < listbox.options.length; count++) {

				listbox.options[count].selected = isSelect;

			}
		}
	</SCRIPT>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2>Assign Trackers</h2>
        </div>
    </header>
    <section>


<div id="shAssigner">
<?php
	$query = "SELECT m.* FROM trackers m WHERE Status = 'Available' ORDER BY ID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){
?>
<table class="datatable sortable full">
    	<thead >
         <tr align="center">
            <th width="45%">Available trackers</th>
            <th width="10%">Translation</th>
			<th width="45%">Selected trackers</th>
         </tr>
       </thead>
     <tbody>
     <tr valign="top" style="text-align:center;">
<td>
<SELECT id="s" size="18" multiple style="width:230px;">
<?php do {  ?>
			<OPTION value="<?php echo $row['ID']; ?>"><?php echo $row['SimNo'] . " [ ". $row['SerialNo'] ." ]"; ?></OPTION>
 <?php } while ($row = mysql_fetch_assoc($query));  ?>
</SELECT> 
<br/><br/>
SELECT
<a href="#" onClick="listbox_selectall('s', true)">ALL</a>,
<a href="#" onClick="listbox_selectall('s', false)">NONE</a>
</td>
<td valign="middle">
<input type="submit" value="Select &gt;&gt;" style="width:70px; text-align:center" onClick="listbox_moveacross('s', 'd')"/>
<br/><br/>
<input type="submit" value="Deselect &lt;&lt;" style="width:70px; text-align:center" onClick="listbox_moveacross('d', 's')"/>
</td>
<td>
<form method="post" action="backend.php?ass-turakaz=true">
<SELECT name="trackers[]" id="d" size="18" multiple style="width:230px;" required="required">
	
</SELECT><br/><br/>
<input type="hidden" name="companyid" value="<?php echo decryptValue($_GET['flag']); ?>"/>
SELECT
<a href="#" onClick="listbox_selectall('d', true)">ALL</a>,
<a href="#" onClick="listbox_selectall('d', false)">NONE</a><br/><br/>
<button class="button button-green" type="submit"><span class="accept"></span>Submit</button>
</form>
</td>
</tr>
</tbody>
</table>
<?php  }else{ echo "<fieldset><h4>There are currently no available trackers in the system for assignment!</h4></fieldset>"; } ?>
</div>
    </section>
</div>
<?php } ?>