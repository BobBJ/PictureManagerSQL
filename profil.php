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
        background-color: rgb(245, 245, 245);
    }

    #menu2
    {
        background-color: #ECECEC;
    }

    #menu2 a
    {
        color: #323232;
    }

    #idf, #mdp0, #mdp, #confirmmdp
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

    .form-signin input[type="text"] 
    {
    margin-bottom: 15px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] 
    {
    margin-bottom: 15px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }
</style>

  </head>
  
  <?php include("menu.php"); 
  if(isset($_GET['modif']))
  {
    if($_GET['modif'] = "oui")
    {
        ?>
		<div style="color: green; font-size: 17px"> <?php
		echo "Vous avez modifié votre compte !"; ?>
		</div>
		<?php
    }
  }

  if( (isset($_POST['changement'])) && ($_POST['changement'] = 'Changement') )
  {
    if ( (isset($_POST['idf']) && !empty($_POST['idf'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['mdp2']) && !empty($_POST['mdp2']) && (isset($_POST['mdp0']) && !empty($_POST['mdp0'])) ))
    {
      $pseudo = htmlspecialchars($_POST['idf']);
      $nouveauMdp = md5($_POST['mdp0']);
      $mdptemp = htmlspecialchars($_POST['mdp']);
      $mdp = md5($_POST['mdp']);
      $mdp2 = md5($_POST['mdp2']);
      $taillePseudo = strlen($pseudo);
      $tailleMdp = strlen($mdptemp);

      if(pseudoDispo($pseudo, $bdd) == 0)
      {
        if ( ($taillePseudo <= 30) && ($taillePseudo >= 3) && ($tailleMdp <= 40) && ($tailleMdp >= 8) )
        {
          if (isset($_SESSION['mdp']) &&  $_SESSION['mdp'] == $nouveauMdp)
          {
            if($mdp == $mdp2)
            {
              modificationUtilisateur($_SESSION['logged'], $pseudo, $mdp, $bdd);
              ?>
              <div style="color: green; font-size: 17px; position: relative; bottom: 475px;"> <?php
                $_SESSION['logged'] = $pseudo;
                header('Location:./profil.php?modif=oui');
                ?>
          </div>
                <?php
            }
            else
            {
              $msg = "Les deux nouveaux mots de passes ne correspondent pas !";
              echo '<font color="red">'."$msg"."</font>";
            }
          }
          else
          {
            $msg = "L'ancien mot de passe est éronné !";
            echo '<font color="red">'."$msg"."</font>";
          }
        }
        else 
        {
          $msg = "Votre identifiant doit être compris entre 3 et 30 caractères et votre mot de passe entre 8 et 40 caractères !";
          echo '<font color="red">'."$msg"."</font>";
        }
      }
      else 
      {
      $msg = "L'identifiant est déjà utilisé !";
      echo '<font color="red">'."$msg"."</font>";
      }
    }
    else
    {
      $msg = "Tous les champs doivent être complétés !";
      echo '<font color="red">'."$msg"."</font>";
    }
  }
  ?>

<body class="text-center">  
<main class="form-signin">
    <form method="post" action="profil.php">	
    <br> <br> <br>
    <center><h1 class="h3 mb-3 fw-normal" style="width: 500px;"> Modifier ses informations personnelles </h1>
     <div style="width: 300px;">

        <div style="color: #D3D3D3; background-color: #2E2E2E;">
        <p> Votre identifiant actuel : <?php echo $_SESSION['logged'] ?> </p>
        </div>
        <div class="form-floating">
        <label id = "idf" for="floatingInput"> Nouvel identifiant </label>
        <input name="idf" type="text" class="form-control" id="floatingInput">
        </div>
        <div class="form-floating">
        <label id = "mdp0" for="floatingPassword"> Ancien mot de passe </label>
        <input name="mdp0" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
        </div>
        <div class="form-floating">
        <label id = "mdp" for="floatingPassword"> Nouveau mot de passe </label>
        <input name="mdp" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
        </div>
        <div class="form-floating">
        <label id = "confirmmdp" for="floatingPassword"> Confirmation nouveau mot de passe </label>
        <input name="mdp2" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
        </div>

        <input class="w-100 btn btn-lg btn-primary" name = "changement" type="submit" value="Changement"> </button>

        <p class="mt-5 mb-3 text-muted">&copy; 2020 &#45; 2021</p>
    </div> </center>
    </form>
</main>
</body>

</html>
