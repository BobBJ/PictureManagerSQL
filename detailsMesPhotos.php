<?php
    require_once('bdd.php');
    require_once('requêtes.php');
    include("menu.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title> Détails de mes photos </title>
    
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

if(isset($_GET['form']) && $_GET['form'] == "envoyer")
{
    $idPhoto = $_SESSION['id'];
    $idCategorie = $_SESSION['categ'];
    if(isset($_POST['desc']))
    {
        $desc = htmlspecialchars($_POST['desc']);
        $taille_desc = strlen($desc);
        // La description contient au moins une lettre.
        if ( preg_match("#[a-z_A-Z]+#", $_POST['desc']) && ($taille_desc > 0) && ($taille_desc <= 150) )
        {
            $resultat = $bdd->query("UPDATE Photo SET description = '".$desc."' WHERE photoId ='".$idPhoto."';");
            $resultat->closeCursor();
            header("Location:./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier&form=envoyer&descr=oui");?>
            <?php
        }
    }
    if(isset($_POST['cat']) && $_POST['cat'] !== "--")
    {
        $cat = htmlspecialchars($_POST['cat']);
        $resultat = $bdd->query("UPDATE Photo SET catId = '".$cat."' WHERE photoId ='".$idPhoto."';");
        $resultat->closeCursor();
        header("Location:./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier&form=envoyer&descr=oui");
    }
    if(isset($_POST['desc']) && ($_POST['desc'] == "") && (isset($_POST['cat']) && $_POST['cat'] == "--"))
    {?>
        <div style="position: absolute; left: 115px; top: 205px;"> <?php
            $msg = "Veuillez compléter au moins un champ !";
            echo '<font color="red">'."$msg"."</font>"; ?>
        </div> <?php
    }
}

if(isset($_GET['visible']) && $_GET['visible'] == "oui" || (isset($_GET['action']) && $_GET['action'] == "modifier"))
{
    if(isset($_GET['categ']))
    {
    $idCategorie = $_GET['categ'];?>
    <div class="container d-flex flex-column flex-md-row justify-content-between" id="menu2">
    <?php
    if ($idCategorie == 1)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=oui" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=oui" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=oui" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=oui" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=oui" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 2)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=oui" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=oui" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=oui" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=oui" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=oui" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 3)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=oui" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=oui" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=oui" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=oui" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=oui" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 4)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=oui" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=oui" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=oui" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=oui" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=oui" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 5)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=oui" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=oui" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=oui" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=oui" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=oui" > Sport </a> <br>
        <?php
    }
    $_SESSION['categ'] = $idCategorie; ?>
    </div> <?php
}

    if(isset($_GET['id']))
    {
        $idPhoto = $_GET['id'];
        $reponse = $bdd->query("SELECT * FROM Photo WHERE photoId = '".$idPhoto."';");?>

        <center> <br><p> Les détails sur vos photos </p> <br><br>
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
                            <a href="./mesPhotos.php?cat=1&visible=oui" > Animaux</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 2)
                        { ?>
                        <a href="./mesPhotos.php?cat=2&visible=oui" > Art</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 3)
                        { ?>
                        <a href="./mesPhotos.php?cat=3&visible=oui" > Cuisine</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 4)
                        { ?>
                        <a href="./mesPhotos.php?cat=4&visible=oui" > Sport</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 5)
                        { ?>
                        <a href="./mesPhotos.php?cat=5&visible=oui" > Voyage</a> <br> <?php
                        } ?>    
                    </td>
                </tr>
            </tbody>
            </table>
            
            </div>
            <div style='width:200px; position: absolute; left: 470px; top: 320px;'>
            <?php echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; 
            $_SESSION['id'] = $idPhoto;?><br>
            </div></center> 
            <?php 
        }
    }
}
else if (isset($_GET['visible']) && $_GET['visible'] == "non" || (isset($_GET['action']) && $_GET['action'] == "modifier"))
{
    if(isset($_GET['categ']))
    {
    $idCategorie = $_GET['categ'];?>
    <div class="container d-flex flex-column flex-md-row justify-content-between" id="menu2">
    <?php
    if ($idCategorie == 1)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=non" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=non" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=non" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=non" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=non" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 2)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=non" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=non" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=non" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=non" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=non" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 3)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=non" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=non" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=non" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=non" > Sport </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=non" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 4)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=non" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=non" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=non" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=non" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=5&visible=non" > Voyage </a> <br>
        <?php
    }
    else if ($idCategorie == 5)
    {
        ?>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=tp&visible=non" > Toutes vos photos </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=1&visible=non" > Animaux </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=2&visible=non" > Art </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=3&visible=non" > Cuisine </a> <br>
        <a class="py-2 d-none d-md-inline-block" href="./mesPhotos.php?cat=4&visible=non" > Sport </a> <br>
        <?php
    }
    $_SESSION['categ'] = $idCategorie; ?>
    </div> <?php
}

    if(isset($_GET['id']))
    {
        $idPhoto = $_GET['id'];
        $reponse = $bdd->query("SELECT * FROM Photo WHERE photoId = '".$idPhoto."';");?>

        <center> <br><p> Les détails sur vos photos </p> <br><br>
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
                            <a href="./mesPhotos.php?cat=1&visible=non" > Animaux</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 2)
                        { ?>
                        <a href="./mesPhotos.php?cat=2&visible=non" > Art</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 3)
                        { ?>
                        <a href="./mesPhotos.php?cat=3&visible=non" > Cuisine</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 4)
                        { ?>
                        <a href="./mesPhotos.php?cat=4&visible=non" > Sport</a> <br> <?php
                        }
                        else if ($donnees['catId'] == 5)
                        { ?>
                        <a href="./mesPhotos.php?cat=5&visible=non" > Voyage</a> <br> <?php
                        } ?>    
                    </td>
                </tr>
            </tbody>
            </table>
            
            </div>
            <div style='width:200px; position: absolute; left: 470px; top: 320px;'>
            <?php echo "<img class='img-fluid' src='./images/".$donnees['nomFich']." ' >"; 
            $_SESSION['id'] = $idPhoto;?><br>
            </div></center> 
            <?php 
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == "modifier")
{?>
    <center><form method="post" <?php echo "action='detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier&form=envoyer'" ?> enctype="multipart/form-data" >
  <div style="width: 320px; position: relative; bottom: 100px; left: -460px;">
    <div style="font-size: 25px; color: black; background-color: #F7F7F7; border: solid black 1px;">
    Modifier la photo 
    </div>
    <br>
    <div class="form-floating">
        <textarea name="desc" minlength="1" maxlength="145" class="form-control" id="floatingTextarea2" style="height: 120px"></textarea>
        <label for="floatingTextarea2">Changement de la description :</label>
    </div> <br>
    <div class="form-floating">
        <select class="form-select" id="floatingSelect" name="cat" aria-label="Floating label select example">
            <option value="--">--</option>
            <option value="1">Animaux</option>
            <option value="2">Art</option>
            <option value="3">Cuisine</option>
            <option value="4">Sport</option>
            <option value="5">Voyage</option> 
        </select>
        <label for="floatingSelect">Changement de la catégorie :</label>
    </div> <br>
    <input style="position: relative; top: 10px;" type = "submit" name="envoyer" class = "btn btn-dark" value = "Modifier"/>
  </div> 
  </form></center>
  <?php
}

if (isset($_GET['action']) && $_GET['action'] == "supprimer")
{
    supprimePhoto($bdd, $_SESSION['id']);
    header("Location:./mesPhotos.php?visible=oui&supprimer=oui");
}

if (isset($_GET['action']) && $_GET['action'] == "visible" || (isset($_GET['visible']) && $_GET['visible'] == "oui"))
{  
    rendPhotoVisible($bdd, $idPhoto);
    ?>
    <div style='position: absolute; left: 566px; top: 570px; border: none;'>
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Modifier </button> </a>
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=cacher&visible=non'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Cacher </button> </a> 
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?action=supprimer'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Supprimer </button> </a> 
    </center>
    </div> 
    <div style='position: absolute; left: 670px; top: 660px;'>
    <center> <a href="./mesPhotos.php?visible=oui" ><button type="button" class="btn btn-dark">Retour à vos photos</button> </a> </center>
    </div> 

    <?php
}
else if (isset($_GET['action']) && $_GET['action'] == "cacher" || (isset($_GET['visible']) && $_GET['visible'] == "non"))
{
    rendPhotoCachee($bdd, $idPhoto);
    ?>
    <div style='position: absolute; left: 566px; top: 570px; border: none;'>
    <center> 
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=modifier'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Modifier </button> </a>
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?id=$idPhoto&categ=$idCategorie&action=visible&visible=oui'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Visible </button> </a> 
        <a style="color: white;" <?php echo "href='./detailsMesPhotos.php?action=supprimer'"; ?> ><button style="margin: 20px;" type="button" class="btn btn-warning"> Supprimer </button> </a> 
    </center>
    </div> 
    <div style='position: absolute; left: 670px; top: 660px;'>
    <center> <a href="./mesPhotos.php?visible=oui" ><button type="button" class="btn btn-dark">Retour à vos photos</button> </a> </center>
    </div> 
    <?php
}

if(isset($_GET['descr']) && $_GET['descr'] == "oui")
{?>
    <div style="position: relative; top: -455px; right: -180px;"> <?php
    $msg = "Modification réussie !";
    echo '<font color="green">'."$msg"."</font>";?>
    </div> <?php
}



?> 
