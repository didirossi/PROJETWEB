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
			Consultez vos messages : <HR>
		</div>
		    <form action="Etat_coach.php" method="get">
		      Pour le client :
		      <input type="text" name="client" id="client"/></br>
		      Votre message : 
		      <input type="text" name="formulaire" id="formulaire"/></br>
		      <input type="submit" name="submit" /></br></br>
		    </form>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "Piscine";
			$taille = 0;
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SELECT * FROM Messagerie WHERE (Coachs ='$pseudo') ORDER BY ID DESC, Clients ASC" ;
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  $pseudo = $taille['Clients'];
			  while($row = $result->fetch_assoc()) {
			    $conn->close();
			    ?>
			      <HR>
			    <?php
			    if($pseudo == $row['Clients']){
			    	if($row['Etat'] == 1){
				      echo $row['Clients'] ." to " . $row['Coachs']."</br>";
				      echo $row['Message']."</br>"."</br>";
				    }
				    else{
				      echo $row['Coachs'] ." to " . $row['Clients']."</br>";
				      echo $row['Message']."</br>"."</br>";
				    }
				}
				else if($row['Etat'] == 2){
					$pseudo = $row['Clients'];
					if($row['Etat'] == 1){
				      echo $row['Clients'] ." to " . $row['Coachs']."</br>";
				      echo $row['Message']."</br>"."</br>";
				    }
				    else{
				      echo $row['Coachs'] ." to " . $row['Clients']."</br>";
				      echo $row['Message']."</br>"."</br>";
				    }
				}
			   	
			  }
			  echo "</table>";
			} else {
			  echo "0 results";
			}
			$conn->close();
		?>
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