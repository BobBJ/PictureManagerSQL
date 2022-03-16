<?php
    require_once('bdd.php');
    require_once('requêtes.php');
?>

<!doctype html>
<html lang="fr">

<header>
        <?php

        if (isset($_SESSION['logged']))
        {
            // On récupère le statut d'un membre (admin ou utilisateur).
            $resultat = $bdd->query("SELECT * FROM Utilisateur WHERE pseudo = '".$_SESSION['logged']."';");
            $rep = $resultat->fetch();
            if($rep['statut'] == "admin")
            {?>
            <style>
                nav
                {
                    background-color: #C02D2D;
                }

                nav a
                {
                    color: #491111;
                    text-decoration: none;
                }

                nav a:hover
                {
                    color: #fff;
                }
            </style> <?php
            }
            else 
            {?>
            <style>
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
            </style><?php
            } 
        }
        else 
        {?>
        <style>
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
        </style><?php
        }
?>
        
</header>

<nav class="site-header sticky-top py-1">
	<div class="container d-flex flex-column flex-md-row justify-content-between">
		<a class="py-2" href="#" aria-label="Product">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
		</a>
        
        
        <?php 

        if (isset($_SESSION['logged']))
        {
            if ($rep['statut'] == "utilisateur")
            {
                ?>
                <a class="py-2 d-none d-md-inline-block" href="index.php">Accueil</a>      
                <a class="py-2 d-none d-md-inline-block" href="ajoutImage.php"> Ajouter une image </a> 
                <a class="py-2 d-none d-md-inline-block" href="mesPhotos.php?visible=oui"> Mes photos </a>
                <a class="py-2 d-none d-md-inline-block" href="profil.php"> Profil </a>
                <a class="py-2 d-none d-md-inline-block" href="deconnexion.php"> D&eacuteconnexion </a>
                <?php
            }

            if ($rep['statut'] == "admin")
            {
                ?>
                <a class="py-2 d-none d-md-inline-block" href="lesPhotos.php"> Les photos </a>
                <a class="py-2 d-none d-md-inline-block" href="ajoutImage.php"> Ajouter une image </a> 
                <a class="py-2 d-none d-md-inline-block" href="profil.php"> Profil </a>
                <a class="py-2 d-none d-md-inline-block" href="statistiques.php"> Statistiques </a>
                <a class="py-2 d-none d-md-inline-block" href="deconnexion.php"> D&eacuteconnexion </a>
                
                <?php
            }
        }
        else
        {
            ?>
            <a class="py-2 d-none d-md-inline-block" href="inscription.php"> Inscription </a>
            <a class="py-2 d-none d-md-inline-block" href="connexion.php"> Connexion </a>
            <?php
        }  
        ?>
	</div>
</nav>

<body>

    <br>
    <center>
    <?php
    if (isset($_SESSION['logged']))
    {?>
        <div style="font-size: 18px; color: #323232;">
        <?php echo 'Bonjour ' .$_SESSION['logged']. ' !'; ?>
        </div> <br><?php
    } ?>
    

<div style="color: #369D3D; position: absolute; left: 600px; bottom: 630px;" id="demo">
    </div>

    <script> <?php
    if(isset($_GET['temps']) && $_GET['temps'] == "oui")
    { 
		$date = date_create();
		$dateEnvoye = date_timestamp_get($date);
		?>
        var countDownDate = new Date().getTime();
        <?php
        $req = $bdd->query("UPDATE Utilisateur SET temps_connexion = '".$dateEnvoye."' WHERE pseudo ='".$_SESSION['logged']."';");
        $req->closeCursor();
    }
    else
    {
		$req = $bdd->query("SELECT temps_connexion FROM Utilisateur WHERE pseudo ='".$_SESSION['logged']."';");
        $temps = $req->fetch();
        $req->closeCursor();
        ?>
        var countDownDate2 = <?php Print($temps['temps_connexion'])?>;
		var countDownDate = countDownDate2 * 1000;
        <?php
    }?>
        var x = setInterval(function () 
        {
        var now = new Date().getTime();
        var distance = now - countDownDate;

        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo").innerHTML = "Durée de connexion : " + hours + "h " + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }	
        }, 1000);

    </script> <br> </center>
</body>

</html>
