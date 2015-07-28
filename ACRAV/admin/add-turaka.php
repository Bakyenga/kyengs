<?php 
	require_once("access.php"); 
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>

<div class="main-content grid_7 alpha">
	<header>
      <div class="view-switcher">
         <h2>New Tracker</h2>
      </div>
    </header>
    <section>
		<form id="user" class="form grid_6 viaAjax" action="backend.php?addturaka=true" method="post">
          <fieldset>
           <legend>Tracker details</legend>
              <label>Tracker No <em>*</em><small>( E.g 256757262171 )</small></label><input type="text" name="sim" required="required"/>
              <label>Serial No <em>*</em><small>Tracker serial number</small></label><input type="text" name="serial" required="required"/>
                    
        <div class="action">
           <button class="button button-green" type="submit"><span class="accept"></span>OK</button>
           <button class="button button-gray" type="reset">Reset</button>
         </div>
        </fieldset>
     </form>
 	</section>
 </div>
  <!--<div class="preview-pane grid_2 omega">
        <div class="content">
            <div class="message info">
                <h3><img src="images/icons/lightbulb.png" class="fl" /> &nbsp;SYSTEM INFO</h3>
                
                <p>->The system is used in capturing information on clients, loans, payments and generating custom reports.</p>
                
                <p>->Editable regions/data is edited by clicking on the real value.</p>
                
                <p>->Be careful editing or deleting information to avoid errors.</p>
                
            </div>
        </div>
        <div class="preview">
        </div>
    </div>-->
<?php } ?>