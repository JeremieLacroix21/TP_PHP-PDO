<!DOCTYPE html>
<?php
session_start();

			$Erreur = "";
			try {

					$Mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe24;charset=utf8','equipe24','2hv6ai74',array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
			} catch (PDOException $e) {
					print "Erreur !: " . $e->getMessage() . "<br/>";
					die();
			}
?>

<header>
<link rel="stylesheet" href="CSS.Photo.css">
<header/>

<?php
if (isset($_SESSION['username']))
{
	$connecter=true;
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
?>

<body>
<navigation>
<div class="topnav">
  <a href="Photo.php">Galerie Photo</a>
  <a href="Ajouter_Photo.php">Ajouter une photo</a>
	<?php
	if($admin == 1){
		echo ("<a href='Admin.php'>Admin</a>");
	}
  ?>
  <a style="float:right;" href="#logout">
  <?php
	if($connecter==true){
		echo "logout";
	}
  ?> </a>
  <?php
	if($connecter==false)
	{
		echo "<a style='float:right;' href='login.php'> Login </a>";
	}
	else
	{
	  echo "<a style='float:right;' href='Profil.php'> $Username </a>";
	}
  ?>
</div>
</navigation>

<table>
	<tr>
		<td>
			<a href="PhotoVue.php?id=1" >
    	<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=2" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=3" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=4" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=5" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=6" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=7" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="PhotoVue.php?id=8" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=9" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=10" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=11" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=12" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=13" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=14" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="PhotoVue.php?id=15" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=16" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=17" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=18" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=19" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=20" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
		<td>
			<a href="PhotoVue.php?id=21" >
			<img src="images/1.jpg" alt='Nature'>
			</a>
		</td>
	</tr>
</table>


<body/>
