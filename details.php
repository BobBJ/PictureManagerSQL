<?php
    require_once('bdd.php');
    require_once('requêtes.php');
    include("menu.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title> Détails des photos </title>
    
    <!-- Bootstrap core CSS -->
    <link rel = "stylesheet" href = "bootstrap/bootstrap.css">
    <link rel = "stylesheet" href = "bootstrap/bootstrap.min.css">

    <style>
    body
    {
        background-color: white;
    }

    #menu2
    {
        background-color: #ECECEC;
    }

    #menu2 a
    {
        color: #323232;
    }

    p
    {
        font-weight: bold;
        font-size: 30px;
    }
    </style>

  </head>

<br>

</html>

<?php


if(isset($_GET['categ']))
{
    $idCategorie = $_GET['categ'];?>
    <div class="container d-flex flex-column flex-md-row justify-content-between" id="menu2">
    <?php
    if ($idCategorie == 1)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=tp" > Toutes les photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=2" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=3" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=4" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=5" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 2)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=tp" > Toutes les photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=1" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=3" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=4" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=5" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 3)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=tp" > Toutes les photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=1" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=2" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=4" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=5" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 4)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=tp" > Toutes les photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=1" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=2" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=3" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=5" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 5)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=tp" > Toutes les photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=1" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=2" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=3" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./index.php?cat=4" > Sport </a> <br>
        <?php
    }
    $_SESSION['categ'] = $idCategorie;

?>
</div> <?php

    if(isset($_GET['id']))
    {
        $idPhoto = $_GET['id'];
        $reponse = $bdd->query("SELECT * FROM Photo WHERE photoId = '".$idPhoto."';");?>

        <center> <br><p> Les détails sur cette photo </p> <br><br>
        <?php
        while($donnees = $reponse->fetch())
        {
            ?>
            <table class="table table-bordered" style="max-width: 400px; width: 400px; position: absolute; left: 740px; top: 320px;">
            <tbody>
                <tr>
                    <th scope="row">Description</th>
                    <td><?php echo $donnees['description']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nom du fichier</th>
                    <td><?php echo $donnees['nomFich']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Catégorie</th>
                    <td>
                    <?php
                        if ($donnees['catId'] == 1)
                        { ?>
                            <a href="./index.php?cat=1" > Animaux</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 2)
                        { ?>
                        <a href="./index.php?cat=2" > Art</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 3)
                        { ?>
                        <a href="./index.php?cat=3" > Cuisine</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 4)
                        { ?>
                        <a href="./index.php?cat=4" > Sport</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 5)
                        { ?>
                        <a href="./index.php?cat=5" > Voyage</a> <br> <?php
                        } ?>    
                    </td>
                </tr>
            </tbody>
            </table>
            
            </div>
            <div style='width:200px; position: absolute; left: 470px; top: 320px;'>
            <?php echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; 
            $_SESSION['id'] = $idPhoto?><br>
            </div></center> 
            <?php 
        }
    }
}

if(isset($_GET['mesPhotos']) && $_GET['mesPhotos'] == "oui")
{
    ?>
    <div style='position: absolute; left: 566px; top: 530px; border: none;'>
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Modifier </button> </a>
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=cacher&visible=non'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Cacher </button> </a> 
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?action=supprimer'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Supprimer </button> </a> 
    </center>
    </div> 
    <div style='position: absolute; left: 670px; top: 630px;'>
    <center> <a href="./mesPhotos.php?visible=oui" ><button type="button" class="btn btn-dark">Retour à vos photos</button> </a> </center>
    </div> 

    <?php
}
else
{?>
    <div style='position: absolute; left: 670px; top: 630px;'>
    <center> <a href="./index.php" ><button type="button" class="btn btn-dark">Retour à toutes les photos</button> </a> </center>
    </div> 
    <?php
}
?>