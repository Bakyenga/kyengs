<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2>System Dashboard</h2>
        </div>
    </header>
    <section>	
		<fieldset>
        <?php   $conn= $_SESSION['name']?>
        	<div style="text-align:center;"><h4>Welcome, you are logged in as <?php echo $conn; ?></h4></div>
        </fieldset>
        
        <?php if(isset($_SESSION['Level']) && $_SESSION['Level']==1){ 
			$rows = mysql_num_rows(mysql_query("SELECT m.* FROM companies m WHERE Status='1' AND Username='0' AND Password='0' "));
			if($rows > 0 ){ 
			
				//$check = mysql_fetch_assoc(mysql_query("SELECT * FROM companies WHERE Status = '1'"));
			
			?>
				<div style='color:#F00; border:1px solid #F90; background-color: #F0FFE1; padding:4px 4px; font-weight:bold; text-align:center; margin:3px 30px 3px 30px;'>
                    <a href="dashboard.php?p=<?php echo encryptValue("activate-account"); ?>" class="bold font_2"><span style='color:#F00;'> There <?php if($rows > 1){ echo "are "; }else{ echo "is "; } ?><?php  echo $rows; ?> pending <?php if($rows > 1){ echo "accounts "; }else{ echo "account "; } ?> on the system. </span></a>
                </div>
		    <p>
			      <?php }}
		?>
			      
			      
      </p>
		    <p><div> </div>&nbsp;</p>
		    <p>&nbsp;</p>
		    <p>&nbsp;</p>
		    <p>&nbsp;</p>
		    <p>&nbsp;</p>
    </section>
</div>
