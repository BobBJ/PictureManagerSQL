<?php
    require_once('bdd.php');
    require_once('requêtes.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title> Accueil </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    
    <!-- Bootstrap core CSS -->
    <link rel = "stylesheet" href = "bootstrap/bootstrap.css">
    <link rel = "stylesheet" href = "bootstrap/bootstrap.min.css">

	<style>
	body
	{
		background-color: white;
	}

	main
	{
		position: relative;
		top: 50px;
	}

	p
	{
		font-weight: bold;
		font-size: 30px;
	}

	#photos
	{
		margin: 1em 10px 0px 0px; 
		padding-top: 0px; 
		padding-right: 10px; 
		padding-left: 8px; 
		padding-bottom: 0px; 
		display: inline; 
	}

	.form-signin 
	{
	width: 100%;
	max-width: 330px;
	padding: 15px;
	margin: auto;
	}

	.container div
	{
		display: inline-block;
	}

	.container div[class="1"]
	{
		width: 300px;
	}
	.container div[class="2"]
	{
		width: 200px;
	}
	.container div[class="3"]
	{
		width: 100px;
	}

	</style>
	<?php include("menu.php"); ?>
  </head>

	
<?php


if (isset($_GET['deco']) && $_GET['deco'] == "oui")
{
	?>
	<div style="color: red; font-size: 24px"> <?php
	echo "Vous avez été déconnecté !"; ?>
	</div> <br>
	<?php
}
?>

<?php
if (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)' 
	?>
	</div>
<?php 
} 
else if (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 1 AND visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)' 
	?>
	</div>
	<?php 
} 
else if (isset($_POST['categorie']) && $_POST['categorie'] == 'art')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 2 AND visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)' 
	?>
	</div>
	<?php 
} 
else if (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 3 AND visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)' 
	?>
	</div>
	<?php 
} 
else if (isset($_POST['categorie']) && $_POST['categorie'] == 'sport')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 4 AND visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)' 
	?>
	</div>
	<?php 
} 
else if (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage')
{
	$reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 5 AND visible = 'oui';"); 
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		$donnees = $reponse->fetch();
		echo $donnees['NbPhotosSelect'].' photo(s) sélectionnée(s)'
	?>
	</div>
<?php
} 
else
{
	?>
	<div class="alert alert-success" role="alert" > 
	<?php
		echo '0 photo sélectionnée' 
	?>
	</div>
<?php
} ?>
	
<div class="body" class="container-md d-flex flex-row justify-content-start">
<body class="text-center">  

		<form method="post" action="index.php">	
		<div class = "container" style="position: relative;">
			<div class="p-2 1" >
			<label for="categorie"> Quelles photos souhaitez-vous afficher? </label>
			</div>
			<div class="p-2 2">
			<select name="categorie" id="categorie">
				<option value="--" selected> -- </option>
				<option value="toutesPhotos"> Toutes les photos </option>
				<option value="animaux"> Animaux </option>
				<option value="art"> Art </option>
				<option value="cuisine"> Cuisine </option>
				<option value="sport"> Sport </option>
				<option value="voyage"> Voyage </option>
			</select>
			</div>
			<div class="p-2 3">
			<input type = "submit" class = "btn btn-dark" value = "Valider"/>
			</div> <br> <br>
		</div>
		</form>
	

	<?php 
	if( (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos') || (isset($_GET['cat']) && $_GET['cat'] == "tp") )
	{
		?>
		<p> Toutes les photos </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE visible = 'oui';");
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'>";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." '>"; ?>
		</div>
		<?php 
		} 
	} 
	else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux') || (isset($_GET['cat']) && $_GET['cat'] == 1) )
	{
		?>
		<p> Les photos de la catégorie Animaux </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 1 AND visible = 'oui';");
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'>";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
		</div>
		<?php
		}
	}
	else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'art') || (isset($_GET['cat']) && $_GET['cat'] == 2) )
	{
		?>
		<p> Les photos de la catégorie Art </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 2 AND visible = 'oui'");
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'>";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
		</div>
		<?php
		}
	}
	else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine') || (isset($_GET['cat']) && $_GET['cat'] == 3) )
	{
		?>
		<p> Les photos de la catégorie Cuisine </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 3 AND visible = 'oui';");
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'>";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
		</div>
		<?php
		}
	}
	else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'sport') || (isset($_GET['cat']) && $_GET['cat'] == 4) )
	{
		?>
		<p> Les photos de la catégorie Sport </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 4 AND visible = 'oui';");
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'>";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
		</div>
		<?php
		}
	}
	else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage') || (isset($_GET['cat']) && $_GET['cat'] == 5) )
	{ 
		?>
		<p> Les photos de la catégorie Voyage </p>
		<?php
		$reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 5 AND visible = 'oui';"); ?>
		
		<?php
		while($donnees = $reponse->fetch())
		{
		?> 
		<div style="float: left; left: 2px; top: 2px; width: 220px; height: 220; margin: 10px;">
		<?php echo"<a href='./details.php?id=$donnees[photoId]&categ=$donnees[catId]'><br />";
		echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
		</div>
		<?php 
		}
	}

?>

		</body>
	</div>
</html>
