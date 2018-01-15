<?php include('connexion.php'); ?>

<?php

// On démarre la session AVANT d'écrire du code HTML
session_start();

$_SESSION['pseudo'] = ($_POST['pseudo']);

$_SESSION['pass'] = ($_POST['pass']);

?>



<?php
//Insertion du nouvel article dans la base de données
if(isset($_POST) && ((empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['password'] ) || empty($_POST['email'] )))):?>
    <p>Veuillez remplir tous les champs !</p>

?>

<?php
elseif(!empty($_POST['nom']) && 
	   !empty($_POST['prenom']) &&
	   !empty($_POST['pseudo']) &&
	   !empty($_POST['password']) &&
	   !empty($_POST['email'])
	  )
	{
    $req = $bdd->prepare('INSERT INTO connexion (nom, prenom, pseudo, password, nbre_joueurs_max, commentaires) 
    	VALUES(:nom, :prenom, :pseudo, :password, :email)');
    
    $req->execute(
    	array(
        'nom'=>htmlspecialchars($_POST['nom']),
        'prenom'=>htmlspecialchars($_POST['prenom']),
        'pseudo'=>htmlspecialchars($_POST['pseudo']),
        'password'=>htmlspecialchars($_POST['password'],
   		'email'=>htmlspecialchars($_POST['email')
    		  )
   		);
}

var_dump($_POST); 

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <style>

    	.container {
    		padding: 50px;
    		background-color: AliceBlue;
    		margin-top: 100px;
    		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    	}

    </style>

    <title>Formulaire de connexion</title>
  </head>
  <body>

    <div  class="container">
	<h1>Formulaire de connexion</h1>
		
		<form class="formulaire"  action="" methode="post">
			<div class="row">
			  <div class="col-6">
			    <label for="nom">Nom</label>
			    <input type="nom" class="form-control" id="nom" aria-describedby="nom" placeholder="Nom">  
			  </div>
			  <div class="col-6">
			    <label for="prenom">Prénom</label>
			    <input type="prenom" class="form-control" id="prenom" aria-describedby="nom" placeholder="Prénom">  
			  </div>
			   <div class="col-6">
			    <label for="pseudo">Pseudo</label>
			    <input type="pseudo" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="Pseudo">  
			  </div>
			  <div class="col-6" >
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password">
			  </div>
			<div class="col-12">
				<label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-check col-6">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1"> J'ai lu les conditions</label>
			  </div>
			  <div class="col-6">
			  	  <button type="submit" class="btn btn-info">Envoyer le formulaire</button>
			  </div>
			
		  	</div>
		</form>

	</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>

