<?php 



?>
<html>
	<head>
		<title>Appels</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body >
	
	
	
<form  enctype="multipart/form-data" method="post"  name="form" >
	<table  border="0">
    <?php 
$cours="mmm";
 if($flux = simplexml_load_file('http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr'))
{
$donnee = $flux->channel;
$etudiants = Array();


   foreach($donnee->item as $valeur)
   {
  $nom=$valeur->title;
   		
   
 
       
   		echo "<tr> <td ><img style='padding: 5px; height: 235' src='".$valeur->enclosure['url']."' width='40%' height='40%' />$valeur->title</td>";
   		
   	
   }
}else echo 'Erreur de lecture du flux RSS';


?>
	</table> 
	</form>
	
	</body>
	</html>