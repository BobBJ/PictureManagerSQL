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

  p
	{
		font-weight: bold;
		font-size: 30px;
	}

  #menu2
  {
    background-color: #ECECEC;
  }

  #menu2 a
  {
    color: #323232; 
  }
  </style>

  <?php include("menu.php"); ?>
  
  </head>

  <body>
  <br>
	
  <center>
  <div class="container d-flex flex-column flex-md-row justify-content-between" style="position: relative; top: -15px; width: 400px;" id="menu2">
    <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?visible=oui" > Photos visibles </a> 
    <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?visible=non" > Photos cachées </a> 
  </div>
  
  </body>
</html>
  <?php
  
  if (isset($_GET['supprimer']) && $_GET['supprimer'] == "oui")
  {
    ?>
    <div style="color: red; font-size: 24px"> <?php
    echo "Votre image a bien été supprimée !"; ?>
    </div> <br>
    <?php
  }

  if(isset($_SESSION['logged']))
  {
    // On récupère l'id de l'utilisateur qui a posté l'image.
    $req = $bdd->query("SELECT utilisateurId FROM Utilisateur WHERE pseudo = '".$_SESSION['logged']."';");
    $rep = $req->fetch();
    
    $_SESSION['utilisateurId'] = $rep['utilisateurId'];
    $idUt = $_SESSION['utilisateurId'];

    $req->closeCursor();
  }

  if (isset($_GET['visible']) && $_GET['visible'] == "non")
  {
    if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos') || (isset($_GET['cat']) && $_GET['cat'] == "tp") )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)' 
      ?>
      </div>
    <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux') || (isset($_GET['cat']) && $_GET['cat'] == 1) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 1 AND utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'art') || (isset($_GET['cat']) && $_GET['cat'] == 2) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 2  AND utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine') || (isset($_GET['cat']) && $_GET['cat'] == 3) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 3  AND utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'sport') || (isset($_GET['cat']) && $_GET['cat'] == 4) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 4 AND utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage') || (isset($_GET['cat']) && $_GET['cat'] == 5) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 5 AND utilisateurId = '".$idUt."' AND visible = 'non';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) cachée(s) sélectionnée(s)'
      ?>
      </div>
    <?php
    } 
    else
    {
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        echo '0 photo cachée sélectionnée' 
      ?>
      </div> 
    <?php
    } 
  }
  else if (isset($_GET['visible']) && $_GET['visible'] == 'oui')
  {
    if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos') || (isset($_GET['cat']) && $_GET['cat'] == "tp") )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)' 
      ?>
      </div>
    <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux') || (isset($_GET['cat']) && $_GET['cat'] == 1) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 1 AND utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'art') || (isset($_GET['cat']) && $_GET['cat'] == 2) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 2  AND utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine') || (isset($_GET['cat']) && $_GET['cat'] == 3) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 3  AND utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'sport') || (isset($_GET['cat']) && $_GET['cat'] == 4) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 4 AND utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)' 
      ?>
      </div>
      <?php 
    } 
    else if ( (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage') || (isset($_GET['cat']) && $_GET['cat'] == 5) )
    {
      $reponse = $bdd->query("SELECT COUNT(*) AS NbPhotosSelect FROM Photo WHERE catID = 5 AND utilisateurId = '".$idUt."' AND visible = 'oui';"); 
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        $donnees = $reponse->fetch();
        echo $donnees['NbPhotosSelect'].' photo(s) visible(s) sélectionnée(s)'
      ?>
      </div>
    <?php
    } 
    else
    {
      ?>
      <div class="alert alert-warning" role="alert" > 
      <?php
        echo '0 photo visible sélectionnée' 
      ?>
      </div> </center>
    <?php
    } 
  }
    

  if(isset($_GET['visible']) && $_GET['visible'] == "oui")
  { ?>
    <center>
		<form method="post" action="mesPhotos.php?visible=oui&mesPhotos=oui">	
		<div class = "container" style="position: relative;">
			<div class="p-2 1" >
			<label for="categorie"> Lesquelles de vos photos visibles souhaitez-vous afficher? </label>
			</div>
			<div class="p-2 2">
			<select name="categorie" id="categorie">
				<option value="--" selected> -- </option>
				<option value="toutesPhotos"> Toutes vos photos visibles </option>
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
    </center><?php
  }
  else if (isset($_GET['visible']) && $_GET['visible'] == "non")
  { ?>
    <center>
		<form method="post" action="mesPhotos.php?visible=non&mesPhotos=oui">	
		<div class = "container" style="position: relative;">
			<div class="p-2 1" >
			<label for="categorie"> Lesquelles de vos photos cachées souhaitez-vous afficher? </label>
			</div>
			<div class="p-2 2">
			<select name="categorie" id="categorie">
				<option value="--" selected> -- </option>
				<option value="toutesPhotos"> Toutes vos photos cachées</option>
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
    </center><?php
  }
  
  if (isset($_GET['visible']) && $_GET['visible'] == "non")
  {
    if( (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos') || (isset($_GET['cat']) && $_GET['cat'] == "tp") )
    {
      ?>
      <p> Toutes vos photos </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE utilisateurId = '".$idUt."' AND visible = 'non';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." '>"; ?>
      </div>
      <?php 
      } 
    } 
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux') || (isset($_GET['cat']) && $_GET['cat'] == 1) )
    {
      ?>
      <p> Vos photos de la catégorie Animaux </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 1 AND utilisateurId = '".$idUt."' AND visible = 'non';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'art') || (isset($_GET['cat']) && $_GET['cat'] == 2) )
    {
      ?>
      <p> Vos photos de la catégorie Art </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 2 AND utilisateurId = '".$idUt."' AND visible = 'non';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine') || (isset($_GET['cat']) && $_GET['cat'] == 3) )
    {
      ?>
      <p> Vos photos de la catégorie Cuisine </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 3 AND utilisateurId = '".$idUt."' AND visible = 'non';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'sport') || (isset($_GET['cat']) && $_GET['cat'] == 4) )
    {
      ?>
      <p> Vos photos de la catégorie Sport </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 4 AND utilisateurId = '".$idUt."' AND visible = 'non';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage') || (isset($_GET['cat']) && $_GET['cat'] == 5) )
    { 
      ?>
      <p> Vos photos de la catégorie Voyage </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 5 AND utilisateurId = '".$idUt."' AND visible = 'non';"); ?>
      
      <?php
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=non'><br />";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php 
      }
    }
  }
  else if (isset($_GET['visible']) && $_GET['visible'] == 'oui')
  {
    if( (isset($_POST['categorie']) && $_POST['categorie'] == 'toutesPhotos') || (isset($_GET['cat']) && $_GET['cat'] == "tp") )
    {
      ?>
      <p> Toutes vos photos </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE utilisateurId = '".$idUt."' AND visible = 'oui';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." '>"; ?>
      </div>
      <?php 
      } 
    } 
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'animaux') || (isset($_GET['cat']) && $_GET['cat'] == 1) )
    {
      ?>
      <p> Vos photos de la catégorie Animaux </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 1 AND utilisateurId = '".$idUt."' AND visible = 'oui';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'art') || (isset($_GET['cat']) && $_GET['cat'] == 2) )
    {
      ?>
      <p> Vos photos de la catégorie Art </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 2 AND utilisateurId = '".$idUt."' AND visible = 'oui';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'cuisine') || (isset($_GET['cat']) && $_GET['cat'] == 3) )
    {
      ?>
      <p> Vos photos de la catégorie Cuisine </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 3 AND utilisateurId = '".$idUt."' AND visible = 'oui';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'sport') || (isset($_GET['cat']) && $_GET['cat'] == 4) )
    {
      ?>
      <p> Vos photos de la catégorie Sport </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 4 AND utilisateurId = '".$idUt."' AND visible = 'oui';");
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'>";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php
      }
    }
    else if( (isset($_POST['categorie']) && $_POST['categorie'] == 'voyage') || (isset($_GET['cat']) && $_GET['cat'] == 5) )
    { 
      ?>
      <p> Vos photos de la catégorie Voyage </p>
      <?php
      $reponse = $bdd->query("SELECT * FROM Photo WHERE catID = 5 AND utilisateurId = '".$idUt."' AND visible = 'oui';"); ?>
      
      <?php
      while($donnees = $reponse->fetch())
      {
      ?> 
      <div style="float: left; left: 2px; top: 20px; width: 220px; height: 220px; margin: 10px;">
      <?php echo"<a href='./detailsMesPhotos.php?id=$donnees[photoId]&categ=$donnees[catId]&action=cacher&visible=oui'><br />";
      echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; ?>
      </div>
      <?php 
      }
    }
  }

