<? 

require_once "header.php"; 
require_once "cnx.php";

session_start();
require("session.php");
if (ret::isloggedR()){
}
else{
    header('location:login-v.php');
}

$sqlV = mysqli_query($con,"SELECT max(id_vers) as longV from temp_v");
if (mysqli_num_rows($sqlV)>0){
		 $rowV = mysqli_fetch_assoc($sqlV) ;

}
$longV = $rowV['longV'];

  $monfichier = fopen('compt_v.txt', 'r+'); 
  $act = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
  if($act < $longV){
    $act = $act + 1; // On augmente de 1 ce nombre de pages vues
    fseek($monfichier, 0); // On remet le curseur au début du fichier
    fputs($monfichier, $act); // On écrit le nouveau nombre de pages vues
    fclose($monfichier);
  }
  $atn = $longV - $act;


?>

<html lang="en">
<head>

	<title>Fil D'attente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="css/font.css" />
  <link rel="stylesheet" type="text/css" href="css/csr.css" />

</head>
<body>
<div class="container">

<div class="courses-container">

	<div class="course">
    <div class="course-info">
	  <h2>Numero Actuelle</h2>
		</div>
		<div class="course-preview">
			<h2 id="r-act"><? echo $act;?></h2>
		</div>
  </div>

  <div class="course">
		<div class="course-preview">
			<h2 id="Rattente"><? echo $atn;?></h2>
		</div>
		<div class="course-info">
	  <h3>Personnes en attente</h3>
		</div>
  </div>
  
</div>
<form method='post' action ='caisier-v.php'>
<button class="botn" name="suiv">Suivant</button>
</form>
</div>
</div>
</body>
</html>



