<?php
  require_once('bdd.php');
  require_once('requêtes.php');?>

<!doctype html>
<html lang="en">
  <head>
    <title> Connexion </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    
    <!-- Bootstrap core CSS -->
    <link rel = "stylesheet" href = "bootstrap/bootstrap.css">
    <link rel = "stylesheet" href = "bootstrap/bootstrap.min.css">

  <style>
  
  html, body 
  {
    height: 100%;
    background-color: rgb(245, 245, 245);
  }

  .body
  {
    position: relative;
    top : 200px;
  }

  .form-signin 
  {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
  }

  .form-signin .checkbox 
  {
    font-weight: 400;
  }

  .form-signin .form-floating:focus-within 
  {
    z-index: 2;
  }

  .form-signin input[type="text"] 
  {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .form-signin input[type="password"] 
  {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .bd-placeholder-img 
  {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  nav
  {
    background-color: #1D1D1D;
  }

  nav a
  {
    color: #999;
    text-decoration: none;
  }

  nav a:hover
  {
    color: #fff;
  }

  #idf, #mdp
  {
    position: absolute;
    top: -15px;
  }

  form h1
  {
    background-color: rgb(255, 255, 255);
    position: relative;
    bottom: 25px;
  }

  #pasInscrit
  {
    position: relative;
    top: 20px;
    color:rgb(43, 43, 43);
  }

  #pasInscrit:hover
  {
    color: rgb(25, 104, 207);
  }

  </style>
  </head>

<?php include("menu.php");
// On vérifie que le visiteur a correctement saisi puis envoyé le formulaire.
if( (isset($_POST['connexion'])) && ($_POST['connexion'] = 'Connexion') )
{
  if ( (isset($_POST['idf']) && !empty($_POST['idf'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])))
  {
    $pseudo = htmlspecialchars($_POST['idf']);
    $mdp = md5($_POST['mdp']);
    if (utilisateurExiste($pseudo, $mdp, $bdd) == 1)
    {
      connecteUtilisateur($pseudo, $bdd); 
      // On récupère le statut d'un membre (admin ou utilisateur).
      $resultat = $bdd->query("SELECT statut FROM Utilisateur WHERE pseudo = '".$pseudo."';");
      $rep = $resultat->fetch();
      $resultat->closeCursor();
      if($rep['statut'] == "admin")
      {
        header('Location:./statistiques.php?temps=oui'); 
      }
      else if ($rep['statut'] == "utilisateur")
      {
        header('Location:./index.php?connecte=oui&temps=oui'); 
      }
      $_SESSION['logged'] = $pseudo;
      $_SESSION['mdp'] = $mdp;
      $_SESSION['statut'] = $rep['statut'];?>
      </div><?php
    }
    else
    {
      $msg = "Identifiant ou mot de passe incorrect !";
      echo '<font color="red">'."$msg"."</font>";
    }
  }
  else 
  {
    $msg = "Tous les champs doivent être complétés !";
    echo '<font color="red">'."$msg"."</font>";
  }
}?>

<div class = "body" >
<body class="text-center">  
<main class="form-signin" style="position: relative; top: -100px;">

  <form method="post" action="connexion.php">	
  <h1 class="h3 mb-3 fw-normal"> Veuillez vous connecter </h1>
  <div class="form-floating">
    <label id = "idf" for="idf"> Identifiant </label>
    <input name = "idf" type="text" class="form-control" id="floatingInput" >
  </div>
  <div class="form-floating">
    <label id = "mdp" for="mdp"> Mot de passe </label>
    <input name="mdp" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
  </div>

  <input class="w-100 btn btn-lg btn-primary" name = "connexion" type="submit" value="Connexion"> </button>
  </form>
  <a id ="pasInscrit" href = "inscription.php" > Je ne suis pas inscrit. </a>
  <p class="mt-5 mb-3 text-muted">&copy; 2020 &#45; 2021</p>
</main>

</body>
</div>
</html>

