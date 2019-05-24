<?php
session_start();
$allo = $_SESSION['username'];
$connecter =true;
?>

<?php

			$Erreur = "";
			try {

					$Mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe24;charset=utf8','equipe24','2hv6ai74',array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

			} catch (PDOException $e) {
					print "Erreur !: " . $e->getMessage() . "<br/>";
					die();
			}
	?>




<!DOCTYPE html>
<header>
<link rel="stylesheet" type="text/css" href="CSS.Ajouter_photo.css">
</header>
<?php
if (isset($_SESSION['username']))
{
	$connecter=true;
}
else {
	$connecter=false;
}
if ($connecter)
{
	$stm = $Mybd->prepare("CALL VerifierAdmin(?)", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	$Username=$_SESSION['username'];
	$stm->bindParam(1, $Username);
	$stm->execute();
	$donnees = $stm->fetch();
	if($donnees[0] === 'Y')
	{
		$admin = 1;
	}
	else {
		$admin = 0;
	}
}
if (!isset($admin)) {
    $admin = 0;
}
$stm = $Mybd->prepare("CALL SelectNomPrenom(?)", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
$stm->bindParam(1, $Username);
$stm->execute();
$donnees = $stm->fetch();
$Nom = $donnees[0];
$Prenom = $donnees[1];
?>

<body>
<navigation>
<div class="topnav">
  <a href="Photo.php">Galerie Photo</a>
	<?php
	if($admin == 1){
		echo ("<a href='Admin.php'>Admin</a>");
	}
	if($connecter==true){
		echo "<a href='Ajouter_Photo.php'>Ajouter une photo</a>";
		echo "logout";
		echo "<a style='float:right;' href='?logout=true'> logout</a>";
		if(isset($_GET['logout']))
		{
			setcookie("User", null , -1);
			session_start();
	    session_unset();
	    header("Location: login.php");
		}
echo "<a style='float:right;' href='Profil.php?reussi=0'> $Prenom $Nom  </a>";
	}
	else
	{
		echo "<a style='float:right;' href='login.php'> Login </a>";
	}
  ?>
</div>
</navigation>


<div class="container">
  <form  onsubmit="Add_photo()" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="Titre">Titre :</label>
      </div>
      <div class="col-75">
        <input type="text" id="Titre" name="firstname" placeholder="Le Titre de l'image..." required>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="Description">Description de l'image :</label>
      </div>
       <div class="col-75">
         <textarea id="Description" name="subject" placeholder="Ex: fleur, oiseaux,etc." style="height:200px" required></textarea>
       </div>
     </div>
	<div class="row">
	 <div class="col-25">
	 <label for="fichier image">Selectionner le fichier image :</label>
	 </div>
	<div class="col-75">
       <input name="fileToUpload" id="fileToUpload" size="35" type="file" accept=".jpg,.jpeg,.png,.gif" required>
    </div>
	</div>
	<div class="row">
      <input value="Upload Image" type="submit" value="Submit">
    </div>
  </form>
</div>
</body>



<script>
function Add_photo()
{

	$idimage = 1;
	$Titre = document.getElementById("Titre").value;
	$Description = document.getElementById("Description").value;
	$Url = "images/" + $_FILES["fileToUpload"]["name"];
	$pseudonyme = $_SESSION['username'];
	$insertion = $mybd->exec("INSERT INTO images(idimages,Titre,Description,Url,pseudonyme) VALUES($idimage,$Titre,$Description,$Url,$pseudonyme)");
	echo('total insertion est ' . $insertion);
	header("refresh:0");
}



</script>
