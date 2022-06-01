<!DOCTYPE html>
<html>
<head>
	<title>Projet Piscine</title>
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
</head>
<body>
	<nav>
		<ul>
			<li><a href="Accueil2.php">Accueil</a></li>
			<li><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle"
                type="button" data-toggle="dropdown">
                Tout Parcourir 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="Activite.php">Activites Sportives</a></li>
                <li><a href="Sport.php">Sports de competition</a></li>
                <li><a href="Salle.php">Salle de sport</a></li>
            </ul>
        </div></li>
        	<li><a href="Rendez_vous.php">Rendez-Vous</a></li>
			<li><a href="VotreCompte.php">Votre compte</a></li>
			<li><a href="Recherche.php">Recherche</a></li>
			<li><a href="Accueil2.php"><img id="logo" src="Logo_Projet.png" width="100px" height="0px"></a></li>
		</ul>
	</nav>
	</br></br>
	<div class="container1">
		<div class="thead-accueil">
			Vos Rendez-vous
		</div>
		<div class="container1">
			<?php 
				$servername = "localhost";
				$username = "root";
				$password = "root";
				$dbname = "Piscine";

				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				} 
				$today = date("Y-m-d");
				$sql = "SELECT * FROM calendrier WHERE (Clienteles = 'Arthur') AND (Planning >= '$today')" ;

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  	echo "<table border=\"1\">";
				  	echo "<tr>";
					echo "<th>" . "Planning" . "</th>";
					echo "<th>" . "Heure" . "</th>";
					echo "<th>" . "Organisation" . "</th>";
					echo "<th>" . "Coach" . "</th>";
					echo "<th>" . "Clienteles" . "</th>"; 
					echo "<th>" . "Adresse" . "</th>";
					echo "<th>" . "DigiCode" . "</th>";
					echo "<th>" . "Documents-Appareils autorises" . "</th>";
					echo "</tr>";
				  while($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo "<td>".$row['Planning'] . "</td>";
				    echo "<td>".$row['Heure'] . "</td>";
				    echo "<td>".$row['Organisation'] . "</td>";
				    echo "<td>".$row['Coach'] . "</td>";
				    echo "<td>".$row['Clienteles'] . "</td>";
				    if($row['Organisation'] == 'Football'){
				    	echo "<td>"."Parc des Princes" . "</td>";
					}
					else if($row['Organisation'] == 'Basket-ball'){
				    	echo "<td>"."Stade de France" . "</td>";
					}
					else if($row['Organisation'] == 'Rugby'){
				    	echo "<td>"."Stade Charlety" . "</td>";
					}
					else if($row['Organisation'] == 'Tennis'){
				    	echo "<td>"."Rolland Garos" . "</td>";
					}
					else if($row['Organisation'] == 'Muscu'){
				    	echo "<td>"."Fitness Park" . "</td>";
					}
					else if($row['Organisation'] == 'Biking'){
				    	echo "<td>"."Bois de Vincennes" . "</td>";
					}
					else if($row['Organisation'] == 'Fitness'){
				    	echo "<td>"."Basic Fit" . "</td>";
					}
					else if($row['Organisation'] == 'Cardio'){
				    	echo "<td>"."Bois de boulogne" . "</td>";
					}
					else{
						echo "<td>"."-" . "</td>";
					}

					if($row['Organisation'] == 'Football'){
				    	echo "<td>"."8264" . "</td>";
					}
					else if($row['Organisation'] == 'Basket-ball'){
				    	echo "<td>"."45274" . "</td>";
					}
					else if($row['Organisation'] == 'Rugby'){
				    	echo "<td>"."27483" . "</td>";
					}
					else if($row['Organisation'] == 'Tennis'){
				    	echo "<td>"."10293" . "</td>";
					}
					else if($row['Organisation'] == 'Muscu'){
				    	echo "<td>"."7439" . "</td>";
					}
					else if($row['Organisation'] == 'Biking'){
				    	echo "<td>"."92838" . "</td>";
					}
					else if($row['Organisation'] == 'Fitness'){
				    	echo "<td>"."01939" . "</td>";
					}
					else if($row['Organisation'] == 'Cardio'){
				    	echo "<td>"."91983" . "</td>";
					}
					else{
						echo "<td>"."-" . "</td>";
					}



				    if($row['Organisation'] == 'Football'){
				    	echo "<td>"."Crampons foot" . "</td>";
					}
					else if($row['Organisation'] == 'Basket-ball'){
				    	echo "<td>"."Chaussure basket" . "</td>";
					}
					else if($row['Organisation'] == 'Rugby'){
				    	echo "<td>"."Crampons vises" . "</td>";
					}
					else if($row['Organisation'] == 'Tennis'){
				    	echo "<td>"."Raquette" . "</td>";
					}
					else if($row['Organisation'] == 'Muscu'){
				    	echo "<td>"."Gants de muscu" . "</td>";
					}
					else if($row['Organisation'] == 'Biking'){
				    	echo "<td>"."Genouillere" . "</td>";
					}
					else if($row['Organisation'] == 'Fitness'){
				    	echo "<td>"."Serviette" . "</td>";
					}
					else if($row['Organisation'] == 'Cardio'){
				    	echo "<td>"."Bouteille" . "</td>";
					}
					else{
						echo "<td>"."-" . "</td>";
					}

				    echo "</tr>";
				  }
				  echo "</table>";
				} else {
				  echo "0 results";
				}
				$sql = "SELECT * FROM clients WHERE Nom = 'admin'" ;

				$result = $conn->query($sql);
				$conn->close();
			?>
		</div></br>
	</div>
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