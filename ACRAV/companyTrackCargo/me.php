<?php
ob_start();
	require_once('Connections/connect.php'); 
	require_once("../pagecheck.php");
	
	
	//track btn points
	//if ((isset($_GET["gpstracker"])) && $_GET["gpstracker"] == "true" ) {
		
		?> <script type="text/javascript">
		
		function getCookieValue(key)
		{
			currentcookie = document.cookie;
			if (currentcookie.length > 0)
			{
				firstidx = currentcookie.indexOf(key + "=");
				if (firstidx != -1)
				{
					firstidx = firstidx + key.length + 1;
					lastidx = currentcookie.indexOf(";",firstidx);
					if (lastidx == -1)
					{
						lastidx = currentcookie.length;
					}
					return unescape(currentcookie.substring(firstidx, lastidx));
				}
			}
			return "";
		}
		
		var v = getCookieValue("v");
		var x = getCookieValue("x");
		var y = getCookieValue("y");
		
		var gpsMsgs1 = []; 
        
        
        </script><?php
			
		$query1 = "select * from messages where date_added BETWEEN '".$_COOKIE['x']."' AND '".$_COOKIE['v']."' AND phone='+".$_COOKIE['y']."'  order by date_added ASC LIMIT 5000";
		
		$query1 = mysql_query($query1) or die(mysql_error()); ?>
		
                            <?php 
						
						$gpsar = "";
							while ($gps1 = mysql_fetch_array($query1)){	 
							
								?>
                                	<script type="text/javascript">
                	gpsMsgs1.push('<?php echo $gps1['message']; ?>');
                </script>
                                <?php //$gpsar .= $gps1['message'];
														
                           }
       
		
		
	//} //End of track btn points
	
	setcookie("x", "", time()-3600);
	setcookie("v", "", time()-3600);
	setcookie("y", "", time()-3600);
	
	
	
 ob_end_flush(); 
?>