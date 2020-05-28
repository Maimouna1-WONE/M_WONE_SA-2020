<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu Admin</title>
  <base href="./">
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style/css/manuAdmin.css<?php echo "?".rand();?>">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	
<div id="chartContainer1"></div>    
<?php
    include "./PHP/JOUEUR/menu.php";
  $tab1=file_get_contents('./BD/compteUser.json');
  $tab1=json_decode($tab1,true);
  $t1=lesjoueurs($tab1);
  $dataPoints1=array();
  foreach ($t1 as $val) {
    $b['label']=$val['Prenom'];
      $b['y']=$val['Score'];
     $dataPoints1[]=$b;
     usort($dataPoints1,"cmp");
  }
  for ($i=0;$i<5;$i++){
    $data[]=$dataPoints1[$i];
  }
?>
  <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Top Score"
  },
  axisY: {
    title: ""
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0 pts",
    dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				
</body>
</html>  