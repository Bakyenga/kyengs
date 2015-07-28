<?php include("../Connections/connect.php"); ?>
<?php include("../pagecheck.php"); ?>
<div id="results" style="width:100%">
<?php
		session_start(); 
		$dt  = $_GET['fd'] . " 00:00:00";
		$dtl  = $_GET['sd'];
		$dt1 = explode("-",$_GET['sd']);
		$date2 = $dt1[2]+1;
		$dt2 = $dt1[0]."-".$dt1[1]."-".$date2;
				
		$dt2 = $dt2 . " 00:00:00";
        //$spec = "SELECT * FROM shipments WHERE CompanyID = '".$_SESSION['UserID']."' AND `DateIn` BETWEEN '$dt' AND '$dt2'";
		$spec = "SELECT sum(`TotalWeight`) As t, sum(`Rate`) As r, Shiper, Type, CompanyID FROM shipments WHERE CompanyID = '".$_SESSION['UserID']."' AND `DateIn` BETWEEN '$dt' AND '$dt2' GROUP BY Shiper ORDER BY Type";
		
        $res = mysql_query($spec) or die("Problem with Query: " . mysql_error());
        $specrows = mysql_num_rows($res);
		$row = mysql_fetch_assoc($res);
		
		/*if($specrows==1 && (strcmp("Restaurant", $row['Section'])==0)){
			$arr1 = array(0, 0, $row['e']);
			$arr2 = array(0, 0, $row['i']);
			$arr3 = array(0, 0, $row['i'] - $row['e']);
		}elseif($specrows==1 && (strcmp("Bar", $row['Section'])==0)){
			$arr1 = array(0, $row['e'], 0);
			$arr2 = array(0, $row['i'], 0);
			$arr3 = array(0, $row['i'] - $row['e'], 0);
		}elseif($specrows==1 && (strcmp("Accomodation", $row['Section'])==0)){
			$arr1 = array($row['e'], 0, 0);
			$arr2 = array($row['i'], 0, 0);
			$arr3 = array($row['i'] - $row['e'], 0, 0);
		}else{*/
		
			do{
				$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companyclients WHERE ID='".$row['Shiper']."'"));
				$arr1[] = $row['t'];
				$arr2[] = $row['t'];
				$arr3[] = $row['t'];
				$arr4[] = $comp['Name'];
				
			}while($row = mysql_fetch_assoc($res));
			//print_r($arr1)."<br/>"; print_r($arr2)."<br/>"; print_r($arr3)."<br/>"; exit;
		//}
		
		if($specrows == 0){
			 echo "<div style='color:#000; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:30px 30px 30px 30px;'>	
    	<h2>No data.</h2>
    </div>";
		}else{
?>




<script type="text/javascript">
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container',
				type: 'column'
			},
			title: {
				text: 'Acrav Reports'
			},
			subtitle: {
				text: 'Graphical Analysis'
			},
			xAxis: {
				categories: [
					'IMPORTS',
					'EXPORTS',
					'LOCAL GOODS'
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'AMOUNT'
				}
			},
			legend: {
				layout: 'vertical',
				backgroundColor: '#FFFFFF',
				align: 'left',
				verticalAlign: 'top',
				x: 100,
				y: 70,
				floating: true,
				shadow: true
			},
			tooltip: {
				formatter: function() {
					return ''+
						this.x +': $'+ this.y;
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
				series: [{
				name: 'Imports',
				data: [<?php echo $arr1[0] . ", " . $arr1[0] . ", " . $arr1[0]; ?>]
	
			}, {
				name: 'Exports',
				data: [<?php echo $arr2[0] . ", " . $arr2[0] . ", " . $arr2[0]; ?>]
	
			}, {
				name: 'Local Goods',
				data: [<?php echo $arr3[0] . ", " . $arr3[0] . ", " . $arr3[0]; ?>]
	
			}]
			<?php
					/*foreach($arr4 as $value){
						echo "{ name: '".$value."', data: [" . $arr1[0] ."]},";
					}*/
				?>
		});
	});
</script>
	

<div id="container" style="width:100%; height: 400px; margin: 10px auto"></div>
</div>
<?php } ?>