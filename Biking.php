<?php $pseudo = $_GET['data'];?>

<!DOCTYPE html>
<html>
<head>
	<title>Projet Piscine</title>
	<link rel="stylesheet" type="text/css" href="enpage3.css">
	<link rel="stylesheet" type="text/css" href="enpage4.css">
	<link rel="stylesheet" type="text/css" href="enpage5.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<nav>
		<ul>
			<li><a href="Accueil2.php?data=<?=$pseudo?>">Accueil</a></li>
			<li><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle"
                type="button" data-toggle="dropdown">
                Tout Parcourir 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="Activite.php?data=<?=$pseudo?>">Activites Sportives</a></li>
                <li><a href="Sport.php?data=<?=$pseudo?>">Sports de competition</a></li>
                <li><a href="Salle.php?data=<?=$pseudo?>">Salle de sport</a></li>
            </ul>
        </div></li>
			<li><a href="Votrecompte.php?data=<?=$pseudo?>">Votre compte : <strong><?php echo $pseudo; ?></strong><img src=""></a></li>
			<li><a href="Recherche.php?data=<?=$pseudo?>">Recherche</a></li>
			<li><a href="identification.php?data=<?=$pseudo?>">Deconnexion</a></li>
			<li><a href="Accueil2.php?data=<?=$pseudo?>"><img id="logo" src="Logo_Projet.png" width="100px" height="0px"></a></li>
		</ul>
	</nav>
	</br></br>
	
	<div class="container1">
		<div class="thead-accueil">
			Les sports disponibles
		</div><HR>
		<div class="barre-sport">
			<ul>
				<li><a href="Musculation.php?data=<?=$pseudo?>"><p>Musculation</p></a></li>
				<li><a href="Fitness.php?data=<?=$pseudo?>"><p>Fitness</p></a></li>
				<li><a href="Biking.php?data=<?=$pseudo?>"><p>Biking</p></a></li>
				<li><a href="Cardio_Training.php?data=<?=$pseudo?>"><p>Cardio-Training</p></a></li>
				<li><a href="Cours_Collectifs.php?data=<?=$pseudo?>"><p>Cours Collectifs</p></a></li>
			</ul></br></br>
			
		</div></br></br>
		<div class="container1">
		<div class="thead-accueil">
			Biking :
		</div>
		</br>
		<img src="biking.jpg" width="100%" height="350px"></br></br>
		<p>Sur un velo fixe, vous pourrez pedaler en toute sécurite en interieur, sans les aleas de la pratique exterieure, avec un programme elabore par votre coach ou en seance libre dans votre salle de sport. La vitesse et la difficulte se reglent par programme automatise ou manuellement sur la console du velo. (@Lorangebleue)
		</p></br></br>
		<div class="container4"></br>
			<div class="voir-coach">
				<a href="Coach_biking.php?data=<?=$pseudo?>" class="voir-coach"> <strong>Voir coach : </strong></a></br></br>
				<img src="coach_biking.webp" width="80%" height="350px"></br>
				Coach : M. Thierry</br>
				Mail : <i>Jean.Thierry@omneseducations.Fr</i></br>
				Texto : <i>06 01 94 29 86</i></br></br>
			</div></br></br>
				<HR></br>
		</div></br></br>
	</div></div>
	<footer>
		<div class="blocfoot-foot">
	        <div class="info-foot">
	            <p class="titre-accueil"><a href="Accueil.html">Accueil</a></p>
	            <p class="titre-accueil"><a href="ToutParcourir.html">Tout parcourir</a></p>
	            <p class="titre-accueil"><a href="Recherche.html">Recherche</a></p>
	            <p class="titre-accueil"><a href="RendezVous.html">Rendez-vous</a></p>
	            <p class="titre-accueil"><a href="VotreCompte.html">Votre compte</a></p>
	        </div>

	        <div class="autres-foot">
	          <h3>Nous Contacter</h3>
	          <p>OMNES EDUCATIONS</p>
	          <p>37 Quai de Grenelle,</p>
	          <p>75015 Paris</p>
	          <p> 01 44 39 06 00</p>
	        </div>

	        <div class="Equipe-foot">
	            <p><a href="https://fr.linkedin.com/school/omneseducation/"><img src="linkedin_logo.png" width="55px" height="28px"></a></p>
	            <p><a href="https://m.facebook.com/pg/omneseducationgroup/posts/?ref=page_internal"><img src="facebook_logo.webp" width="55px" height="28px"></a></p>
	            <p><a href="https://www.instagram.com/omneseducationgroup/"><img src="logo_insta.png" width="55px" height="28px"></a></p>
        </div>
	    </br></br></br></br>
	</footer>
</body>
</html>