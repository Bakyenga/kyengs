<?php

	//Restrict access to page
	require_once("pagecheck.php");
	
?>
    <aside class="grid_1">
    
        <nav class="subnav recent">
            <ul class="clearfix">
                <li <?php if(!isset($_GET['p'])){ echo "class='active'";} ?>><a class="nav-icon icon-house" href="dashboard.php">Dashboard</a></li>  
            </ul>
        </nav>
        
        <?php if(isset($_SESSION['Level']) && $_SESSION['Level']==1){ ?>
                
                <nav class="subnav recent">
                    <h4>Trackers</h4>
                    <ul class="clearfix">
                    	<li <?php if(isset($_GET['p']) && (decryptValue($_GET['p'])=='turakaz')){ echo "class='active'";} ?>><a class="nav-icon icon-disk" href="dashboard.php?p=<?php echo encryptValue("turakaz"); ?>">Manage trackers</a></li>
                    </ul>
        		</nav>
                
                <nav class="subnav recent">
                    <h4>Companies</h4>
                    <ul class="clearfix">
                    	<li <?php if(isset($_GET['p']) && (decryptValue($_GET['p'])=='members')){ echo "class='active'";} ?>><a class="nav-icon icon-all" href="dashboard.php?p=<?php echo encryptValue("members"); ?>">Manage companies</a></li>
                    </ul>
        		</nav>
                
          <?php } ?>
          
        <?php if(isset($_SESSION['Level']) && $_SESSION['Level']==1){ ?>
            <nav class="subnav recent">        
              <h4>System Users</h4>
                <ul class="clearfix">
                    <li <?php if(isset($_GET['p']) && (decryptValue($_GET['p'])=='users')){ echo "class='active'";} ?>><a class="nav-icon icon-members" href="dashboard.php?p=<?php echo encryptValue("users"); ?>"><h5>Users</h5></a></li>
                </ul>
            </nav>
        <?php } ?>
        
          
        
        <nav class="subnav recent">
        <h4>Profile Info</h4>
            <ul class="clearfix">
            	<li><a class="nav-icon icon-tick" rel="facebox" title="" href="edit-user.php" id="staff|ID|<?php echo $_SESSION['UserID']; ?>"><h5>Edit profile Info</h5></a></li>
                
            
            </ul>
        </nav>
        <nav class="subnav recent">
        <h4>Manage cargo</h4>
            <ul class="clearfix">
            	<li><a class="nav-icon icon-tick" rel="facebox" title="" href="userhome.php" id="staff|ID|<?php echo $_SESSION['UserID']; ?>"><h5>Edit profile Info</h5>
                
                </a></li></ul></nav></aside>
                <a href="../dashboard2.php">manage cargo</a>
            	  <p>&nbsp;</p>
            	</a></li>
                
            
            </ul>
        </nav>
        
    </aside>
