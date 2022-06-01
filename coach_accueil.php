<?php $pseudo = $_GET['data'];?>

<!DOCTYPE html>
<html>
<head>
	<title>Projet Piscine</title>
	<link rel="stylesheet" type="text/css" href="enpage4.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="coach_accueil.php?data=<?=$pseudo?>">Accueil</a></li>
			<li><a href="coach_messages.php?data=<?=$pseudo?>">Consultez vos messages</a></li>
			<li><a href="coach_planning.php?data=<?=$pseudo?>">Consultez vos plannings </a></li>
			<li><a href="coach_collegues.php?data=<?=$pseudo?>">Visualisation les collegues</a></li>
			<li><?php echo $pseudo; ?></li>
			<li><a href="coach_accueil.php?data=<?=$pseudo?>"><img id="logo" src="Logo_Projet.png" width="100px" height="80px"></a></li>
			>--Coach--<
		</ul>
	</nav>
	</br></br>
	<div class="container1">
		<div class="thead-accueil">
			Qu'est-ce que l'OMNES EDUCATIONS ?
		</div>
		</br>
		<img src="omnes.jpg" width="100%" height="250px"></br></br>
		<p>Omnes Education est un etablissement d'enseignement superieur prive francais forme autour de l'Institut des hautes etudes economiques et commerciales, regroupant 13 grandes ecoles et ecoles specialisees en management, sciences de l ingenieur, communication et sciences politiques.
		</p></br>
		<div class="thead-accueil">
			Les Ecoles du groupe OMNES EDUCATIONS
		</div>
		</br></br>
		<img src="Ece_Paris.jpg" width="100%" height="350px"><legend><i>ECE Paris</i></legend></br>
		<p><strong>ECE Paris</strong> est l'une des 204 ecoles d'ingenieurs francaises accreditees au 1er septembre 2020 a delivrer un diplome d'ingenieur. Seule ecole d'ingenieurs du groupe Omnes Education, elle est membre de la Conference des grandes ecoles, de Campus France et de l'Union des grandes ecoles independantes.</br></br>
			Elle forme principalement dans les technologies de l'information (systemes d'information, finance, telecoms, reseaux, IoT, systemes embarques, multimedia). Elle propose egalement des formations axees sur la sante et son lien avec la technologie, sur les transports et la mobilite, sur les energies et l'environnement
		</p></br>
		<div class="presentation-accueil">
			<img src="INSEEC_ecole.jpg" width="40%" height="300px">
			<img class="ESCE" src="ESCE_Ecole.png" width="40%" height="300px">
			<legend><i>INSEEC Lyon</i></legend><legend class="ESCE"><i>ESCE Paris</i></legend></br></br>
			<p><strong>INSEEC : </strong>Institut des hautes etudes economiques et commerciales est une ecole de commerce privee francaise dont le campus historique est situe a Bordeaux, en Nouvelle-Aquitaine</p>
			<p><strong>ESCE : </strong>L'Ecole superieure du commerce exterieur est une ecole de commerce situee a Paris dans le XVeme arrondissement et a Lyon dans le VIIeme arrondissement. Membre de la conference des grandes ecoles.</p>
		</div></br></br>
		<div class="presentation-accueil">
			<img src="HEIP_ecole.jpg" width="40%" height="300px">
			<img class="ESCE" src="sUP_Ecole.JPG" width="40%" height="300px">
			<legend><i>HEIP Paris </i></legend><legend class="ESCE"><i>Sup de Pub Bordeaux</i></legend></br></br>
			<p><strong>HEIP : </strong>Creee en 1899, HEIP est une ecole pionniere dans le domaine des relations internationales et des sciences politiques</p>
			<p><strong>Sup de Pub : </strong>Sup de Pub est une ecole organique, en perpetuelle croissance et en recherche constante d'innovations pedagogiques dans le domaine de la communication et du marketing.</p>
		</div>

		</br></br></br>

	</div>
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Piscine";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	} 
	?><?php
		$variable = '<script type="text/javascript">document.write(months);</script>';
	?><?php
	$test1 = "04";
	$EnCours[31];

	for ($i=1; $i < 32; $i++) { 
		$sql = "SELECT count(Coach) FROM calendrier WHERE Planning = '2022-05-0$i'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_array($result)){
		    $EnCours[$i] = $row['count(Coach)'];
		}
	}
	echo "<br>";

	$conn->close();
	?>
	<link rel="stylesheet" type="text/css" href="agenda.Css">
	<?php
		$message = "1";
	?>
	<script type="text/javascript">
		let mois = ['Janvier', 'Fevrier', 'Mars', 'Avril','Mai', 'Juin','Juillet','Aout','Septembre','Octobre', 'Novembre','Decembre'];
		let an = ['2017', '2018', '2019', '2020','2021', '2022','2023','2024','2025','2026', '2027','2028'];
		let rendezvous = ['', '°', '°°', '°°°', '°°°°', '°°°°°', '°°°°°...'];

		let Janvier2022  = "Samedi";
		let Fevrier2022  = "Mardi";
		let Mars2022  = "Mardi";
		let Avril2022  = "Vendredi";
		let Mai2022  = "Dimanche";
		let Juin2022  = "Mercredi";
		let Juillet2022  = "Vendredi";
		let Aout2022  = "Lundi";
		let Septembre2022  = "Jeudi";
		let Octobre2022  = "Samedi";
		let Novembre2022  = "Mardi";
		let Decembre2022  = "Jeudi";

		let months = "03";

		let actuel = 4;
		let year = 5;

		function mai(){

			document.getElementById("jour29").innerHTML = "23";
			let variable23 = '<?=$EnCours[23];?>';
			document.getElementById("evenement29").innerHTML = rendezvous[variable23];

			document.getElementById("jour30").innerHTML = "24";
			let variable24 = '<?=$EnCours[24];?>';
			document.getElementById("evenement30").innerHTML = rendezvous[variable24];

			document.getElementById("jour31").innerHTML = "25";
			let variable25 = '<?=$EnCours[25];?>';
			document.getElementById("evenement31").innerHTML = rendezvous[variable25];

			document.getElementById("jour32").innerHTML = "26";
			let variable26 = '<?=$EnCours[26];?>';
			document.getElementById("evenement32").innerHTML = rendezvous[variable26];

			document.getElementById("jour33").innerHTML = "27";
			let variable27 = '<?=$EnCours[27];?>';
			document.getElementById("evenement33").innerHTML = rendezvous[variable27];

			document.getElementById("jour34").innerHTML = "28";
			let variable28 = '<?=$EnCours[28];?>';
			document.getElementById("evenement34").innerHTML = rendezvous[variable28];

			document.getElementById("jour35").innerHTML = "29";
			let variable29 = '<?=$EnCours[29];?>';
			document.getElementById("evenement35").innerHTML = rendezvous[variable29];
		}
	</script>

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
	            <p><a href="https://fr.linkedin.com/school/omneseducation/"><img src="linkedin_logo.png" width="55px" height="30px"></a></p>
	            <p><a href="https://m.facebook.com/pg/omneseducationgroup/posts/?ref=page_internal"><img src="facebook_logo.webp" width="55px" height="30px"></a></p>
	            <p><a href="https://www.instagram.com/omneseducationgroup/"><img src="logo_insta.png" width="55px" height="30px"></a></p>
        </div>
	    </br></br></br></br>
	    <div class="map">
	    	"<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.337894978979!2d2.284293215674139!3d48.85176677928678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653297517867!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	    </div>
	</footer>
</body>
</html>