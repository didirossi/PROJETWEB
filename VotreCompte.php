<?php $pseudo = $_GET['data'];?>

<!DOCTYPE html>
<html>
<head>
	<title>Projet Piscine</title>
	<link rel="stylesheet" type="text/css" href="enpage.Css">
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
			Votre compte : <?php echo $pseudo;?></br>
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
                $today = date("Y-m-d");
                $sql = "SELECT * FROM clients " ;

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  	if($row['Prenom'] == $pseudo){
                  		echo "Votre ID : ".$row['ID'] . "</br>";
	                    echo "Votre Nom : ".$row['Nom'] . "</br>";
	                    echo "Votre Prenom : ".$row['Prenom'] . "</br>";
	                    echo "Votre Anniv : ".$row['Anniv'] . "</br>";
	                    echo "Votre Mail : ".$row['Mail'] . "</br>";
	                    echo "Votre Etat : ".$row['Etat'] . "</br>";
	                    echo "Votre photo :"."<img src='{$row['Photo']}' width='300px' height='200px'"."</br>";
                  	}
                  }
                } else {
                }
                $result = $conn->query($sql);
                $conn->close();

			?>
		</div>

	</div>

<div class="container1">
	<div class="container1">
		<div class="thead-accueil">
			Espace client - Vos futurs Rendez-vous : 
		</div><HR></br></br>
		<img src="espace_Client.jpg" width="100%" height="350px"></br></br>
		<div class="thead-accueil">
			Les futurs rendez-vous : <HR></br>
		</div>
		<div class="Rdv">
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
				$sql = "SELECT * FROM calendrier WHERE (Clienteles = '$pseudo') AND (Planning >= '$today')" ;

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  	echo "<table border=\"1\">";
				  	echo "<tr>";
					echo "<th>" . "Planning" . "</th>";
					echo "<th>" . "Heure" . "</th>";
					echo "<th>" . "Organisation" . "</th>";
					echo "<th>" . "Coach" . "</th>";
					echo "<th>" . "Clienteles" . "</th>"; 
					echo "</tr>";
				  while($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo "<td>".$row['Planning'] . "</td>";
				    echo "<td>".$row['Heure'] . "</td>";
				    echo "<td>".$row['Organisation'] . "</td>";
				    echo "<td>".$row['Coach'] . "</td>";
				    echo "<td>".$row['Clienteles'] . "</td>";
				    echo "</tr>";
				  }
				  echo "</table>";
				} else {
				  echo "0 results";
				}

				$result = $conn->query($sql);
				$conn->close();
			?>
		</div></br></div>
		<div class="container1">
			<div class="thead-accueil">
				Souhait d'annuler un rendez-vous ?<HR>
			</div>
			<form action="update_Client.php" method="GET">
				<input type="date" name="date">
				<input type="time" name="time">
				<input type="submit" name="submit">
			</form>
		</div>
		<div class="container1">
			<div class="thead-accueil">
			Vos anciens rendez-vous : <HR></br>
		</div>
		<div class="Rdv">
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
				$sql = "SELECT * FROM calendrier WHERE (Clienteles = '$pseudo') AND (Planning < '$today')" ;

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  	echo "<table border=\"1\">";
				  	echo "<tr>";
					echo "<th>" . "Planning" . "</th>";
					echo "<th>" . "Heure" . "</th>";
					echo "<th>" . "Organisation" . "</th>";
					echo "<th>" . "Coach" . "</th>";
					echo "<th>" . "Clienteles" . "</th>"; 
					echo "</tr>";
				  while($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo "<td>".$row['Planning'] . "</td>";
				    echo "<td>".$row['Heure'] . "</td>";
				    echo "<td>".$row['Organisation'] . "</td>";
				    echo "<td>".$row['Coach'] . "</td>";
				    echo "<td>".$row['Clienteles'] . "</td>";
				    echo "</tr>";
				  }
				  echo "</table>";
				} else {
				  echo "0 results";
				}
				$result = $conn->query($sql);
				$conn->close();

			?>
		</div></br></br></div></div>
	

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