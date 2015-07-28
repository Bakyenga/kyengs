  <?php require_once("pagecheck.php"); ?>
  
    <div class="container_8 clearfix">
        <h1 class="grid_1" align="center"><a href="dashboard.php"><img src="images/logo.jpg" style="margin-top:5px;margin-bottom:-5px;"/></a></h1>
        <nav class="grid_7">


            <ul class="clearfix">

			<?php if(!isset($_SESSION['Staff'])){ ?>
                <li class=""><a href="dashboard.php">Manage<span class="arrow-down"></span></a>
                    <ul>

                        <!--<li><a href="dashboard.php?p=add-job" class="bold font_2"><img src="images/add.png"/>&nbsp;Job</a></li>-->
                        
                        <?php if(isset($_SESSION['Level']) && $_SESSION['Level']==1){ ?>
                        	<li><a href="dashboard.php?p=<?php echo encryptValue("add-tracker"); ?>" class="bold font_2"><img src="images/add.png"/>&nbsp;Tracker</a></li>
                            <li><a href="dashboard.php?p=<?php echo encryptValue("add-user"); ?>" class="bold font_2"><img src="images/add.png"/>&nbsp;User</a></li>
                            <li><a href="dashboard.php?p=<?php echo encryptValue("add-user"); ?>" class="bold font_2"><img src="images/add.png"/>&nbsp;notifications</a></li>
                        <?php } ?>
                        
                        <?php if(isset($_SESSION['Level']) && $_SESSION['Level']==1){ 
						
						$rows = mysql_num_rows(mysql_query("SELECT m.* FROM companies m WHERE Status='1' AND Username='0' AND Password='0' "));
						?>
                        <li><a href="dashboard.php?p=<?php echo encryptValue("activate-account"); ?>" class="bold font_2">Confirm accounts &nbsp;<span style="color:white; background-color:green">[<?php echo $rows; ?>]</span></a></li>
                        
                        
                       
                       <?php } ?>
                        <li><a href="logout.php" class="bold">Log out</a></li>
                        
                    </ul>
                </li>
		<?php }?>
				<!--<li class="">
                    <form id="findkids" class="grid_2">
                        <input class="full" type="text" placeholder="Search..." />
                    </form>
                </li>-->
                
                <li class="fr"><a href="logout.php" class="bold font_2">Log out</a></li>

            </ul>
        </nav>
    </div>
