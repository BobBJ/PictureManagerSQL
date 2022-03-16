<?php

/* Cette fonction prend en entrée un pseudo à ajouter à la relation utilisateur et une connexion et retourne vrai si le 
pseudo est disponible (pas d'occurence dans les données existantes), faux sinon */
function pseudoDispo($pseudo, $bdd)
{
	$req = $bdd->query("SELECT * FROM Utilisateur WHERE pseudo ='".$pseudo."';");
	return $req->rowCount();
	// Récupère le nombre de lignes dans notre résultat.
	// Ici on vérifie qu'il n'y en a pas, pseudo différent => vrai si disponible.
}

/* Cette fonction prend en entrée un pseudo et un mot de passe et enregistre le nouvel utilisateur dans la relation 
Utilisateur via la connexion */
function nouveauUtilisateur($pseudo, $mdp, $bdd)
{
	$resultat = $bdd->prepare("INSERT INTO Utilisateur (pseudo, mdp, etat, statut, temps_connexion) VALUES(:pseudo, :mdp, 'déconnecté', 'utilisateur', '165432345');");
	$resultat->execute(array(
		'pseudo' => $pseudo,
		'mdp' => $mdp,
		));
	$resultat->closeCursor();
}

/* Cette fonction prend en entrée un pseudo et mot de passe et renvoie vrai si l'utilisateur existe (au moins 
un tuple dans le résultat), faux sinon. */
function utilisateurExiste($pseudo, $mdp, $bdd)
{
	$req = $bdd->query("SELECT pseudo FROM Utilisateur WHERE pseudo = '".$pseudo."' AND mdp = '".$mdp."';");
	return $req->rowCount();
}

/* Cette fonction prend en entrée un pseudo d'utilisateur, une connexion et change son état en 'connecté' dans la relation 
utilisateur via la connexion. */
function connecteUtilisateur($pseudo, $bdd)
{
	$resultat = $bdd->query("UPDATE Utilisateur SET etat = 'connecté' WHERE pseudo ='".$pseudo."';");
	$resultat->closeCursor();
}

/* Cette fonction prend en entrée un pseudo d'utilisateur, une connexion et change son état en 'déconnecté' dans la relation 
utilisateur via la connexion. */
function deconnecteUtilisateur($pseudo, $bdd)
{
	$resultat = $bdd->query("UPDATE Utilisateur SET etat = 'déconnecté' WHERE pseudo ='".$pseudo."';");
	$resultat->closeCursor();
}

function ajoutImageBdd($bdd, $nomFich, $desc, $categorie, $rep)
{
	$resultat = $bdd->prepare("INSERT INTO Photo (nomFich, description, visible, catId, utilisateurId) VALUES(:nomFich , :description, 'oui', :categorie, :utilisateurId)");
	$resultat->execute(array(
		'nomFich' => $nomFich,
		'description' => $desc,
		'categorie' => $categorie,
		'utilisateurId' => $rep
		));
	$resultat->closeCursor();
}

/* Cette fonction prend en entrée un nom de fichier, une connexion et retourne le nombre de lignes pour savoir si une
photo avec le même nom existe.  */
function memeNom($bdd, $nomFich)
{
	$req = $bdd->query("SELECT * FROM Photo WHERE nomFich = '".$nomFich."';");
	return $req->rowCount();
}

function etatConnecté($bdd, $pseudo)
{
	$req = $bdd->query("SELECT pseudo FROM Utilisateur WHERE etat = 'connecté' AND pseudo = '".$pseudo."';");
	return $req->rowCount();
}

function modificationUtilisateur($ancienPseudo, $pseudo, $mdp, $bdd)
{
	$resultat = $bdd->query("UPDATE Utilisateur SET pseudo = '".$pseudo."', mdp = '".$mdp."' WHERE pseudo ='".$ancienPseudo."';");
	$resultat->closeCursor();
}

function recuperePhotosUtilisateur($bdd, $id)
{
	$resultat = $bdd->query("SELECT * FROM Photo WHERE idUtilisateur ='".$id."';");
	$resultat->closeCursor();
}

function rendPhotoVisible($bdd, $idPhoto)
{
	$resultat = $bdd->query("UPDATE Photo SET visible = 'oui' WHERE photoId ='".$idPhoto."';");
	$resultat->closeCursor();
}

function rendPhotoCachee($bdd, $idPhoto)
{
	$resultat = $bdd->query("UPDATE Photo SET visible = 'non' WHERE photoId ='".$idPhoto."';");
	$resultat->closeCursor();
}

function supprimePhoto($bdd, $idPhoto)
{
	$resultat = $bdd->query("DELETE FROM Photo WHERE Photo.photoId ='".$idPhoto."';");
	$resultat->closeCursor();
}



?>