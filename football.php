<!DOCTYPE html>
<html>
<head>
	<title>Projet Piscine</title>
	<link rel="stylesheet" type="text/css" href="Style.Css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="Accueil2.php">Accueil</a></li>
			<li><a href="Activite.php">Activites Sportives</a></li>
			<li><a href="Sport.php">Sports de competition</a></li>
			<li><a href="Salle.html">Salle de sport</a></li>
			<li><a href="VotreCompte.php">Votre compte</a></li>
			<li><a href="Accueil2.php"><img id="logo" src="Logo_Projet.png" width="100px" height="80px"></a></li>
		</ul>
	</nav>
	</br></br>

	<div class="container1">
		<div class="thead-accueil">
			Tout savoir sur le football avec OMNES : <HR></br>
		</div>
		<div class="container1">
			Deux équipes de 11 joueurs dont un gardien de but (plus trois remplaçants) s'affrontent autour d'un ballon rond le plus souvent en cuir. Les matchs ne peuvent se disputer à moins de 7 joueurs par équipe (gardien compris). Les joueurs ne peuvent toucher le ballon ni avec les mains ni avec les bras.</br></br>
			<img src="presentation_football.webp" width="90%" height="350px"></br></br>
			
		</div>
	</div>
	
	<div class="container1">
		<div class="thead-accueil">
			Planning pour les seances de Football-Ball avec coach M. Ancellotti: <HR>
		</div>
		<div class="">
		<?php
			function build_calendar($month, $year) {
			     $mysqli = new mysqli('localhost', 'root', 'root', 'bookingcalendar');
			     $daysOfWeek = array('LUNDI','MARDI','MERCREDI','JEUDI','VENDREDI','SAMEDI', 'DIMANCHE');
			     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
			     $numberDays = date('t',$firstDayOfMonth);
			     $dateComponents = getdate($firstDayOfMonth);
			     $monthName = $dateComponents['month'];
			     $dayOfWeek = $dateComponents['wday'];
			     $datetoday = date('Y-m-d');
			    
			    if($monthName == "January"){
			        $mois = "Janvier";
			    }
			    elseif($monthName == "February"){
			        $mois = "Fevrier";
			    }
			    elseif($monthName == "March"){
			        $mois = "Mars";
			    }
			    elseif($monthName == "April"){
			        $mois = "Avril";
			    }
			    elseif($monthName == "May"){
			        $mois = "Mai";
			    }
			    elseif($monthName == "June"){
			        $mois = "Juin";
			    }
			    elseif($monthName == "July"){
			        $mois = "Juillet";
			    }
			    elseif($monthName == "August"){
			        $mois = "Aout";
			    }
			    elseif($monthName == "September"){
			        $mois = "Septembre";
			    }
			    elseif($monthName == "October"){
			        $mois = "Octobre";
			    }
			    elseif($monthName == "November"){
			        $mois = "Novembre";
			    }
			    elseif($monthName == "December"){
			        $mois = "Decembre";
			    }
			    
			    $calendar = "<table class='table table-bordered'>";
			    $calendar .= "<center><h1><font color='grey'>Agenda pour $mois $year pour le Football</font></h1>";
			    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Mois precedent</a> ";
			        
			    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Mois suivant</a></center><br>";
			      $calendar .= "<tr>";
			     foreach($daysOfWeek as $day) {
			          $calendar .= "<th  class='header'>$day</th>";
			     } 
			     $currentDay = 1;
			     $calendar .= "</tr><tr>";
			     if ($dayOfWeek > 0) { 
			         for($k=0;$k<$dayOfWeek;$k++){
			                $calendar .= "<td  class='empty'></td>"; 

			         }
			     }
			    
			     
			     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
			  
			     while ($currentDay <= $numberDays) {
			          if ($dayOfWeek == 7) {
			               $dayOfWeek = 0;
			               $calendar .= "</tr><tr>";
			          }
			          
			          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
			          $date = "$year-$month-$currentDayRel";
			          
			            $dayname = strtolower(date('l', strtotime($date)));
			            $eventNum = 0;
			            $today = $date==date('Y-m-d')? "today" : "";

			         if(($date =="2022-12-25")OR($date =="2022-01-01")OR($date =="2022-04-18")OR($date =="2022-05-01")OR($date =="2022-05-08")OR($date =="2022-05-25")OR($date =="2022-06-06")OR($date =="2022-07-14")){
			            $calendar.="<td><h2><center><font color='grey'>$currentDay</font></center></h2> <button class='btn btn-danger btn-xs'>Jour ferie</button>";
			         }
			         elseif(($dayOfWeek == 0) OR ($dayOfWeek == 3)){
			            $calendar.="<td><h2><center><font color='grey'>$currentDay</font></center></h2> <button class='btn btn-danger btn-xs'>Jour de repos</button>";
			         }
			         elseif($date<date('Y-m-d')){
			             $calendar.="<td><h2><center><font color='grey'>$currentDay</font></center></h2> <button class='btn btn-danger btn-xs'>Creneau errone</button>";
			         }
			         else{
			             $calendar.="<td class='$today'><h2><center><font color='grey'>$currentDay</font></center></h2> <a href='reservation_football.php?date=".$date."' class='btn btn-success btn-xs'>Creneau disponible</a>";
			         } 
			          $calendar .="</td>";
			          $currentDay++;
			          $dayOfWeek++;
			     }
			     if ($dayOfWeek != 7) { 
			     
			          $remainingDays = 7 - $dayOfWeek;
			            for($l=0;$l<$remainingDays;$l++){
			                $calendar .= "<td class='empty'></td>"; 
			         }
			     }
			     $calendar .= "</tr>";
			     $calendar .= "</table>";
			     echo $calendar;
			}
			    
			?>

			    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			    <style>
			       @media only screen and (max-width: 760px),
			        (min-device-width: 802px) and (max-device-width: 1020px) {
			            table, thead, tbody, th, td, tr {
			                display: block;
			            }
			            .empty {
			                display: none;
			            }
			            th {
			                position: absolute;
			                top: -9999px;
			                left: -9999px;
			            }
			            tr {
			                border: 1px solid #ccc;
			            }

			            td {
			                border: none;
			                border-bottom: 1px solid #eee;
			                position: relative;
			                padding-left: 50%;
			            }
			            td:nth-of-type(1):before {
			                content: "Sunday";
			            }
			            td:nth-of-type(2):before {
			                content: "Monday";
			            }
			            td:nth-of-type(3):before {
			                content: "Tuesday";
			            }
			            td:nth-of-type(4):before {
			                content: "Wednesday";
			            }
			            td:nth-of-type(5):before {
			                content: "Thursday";
			            }
			            td:nth-of-type(6):before {
			                content: "Friday";
			            }
			            td:nth-of-type(7):before {
			                content: "Saturday";
			            }
			        }
			        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
			            body {
			                padding: 0;
			                margin: 0;
			            }
			        }
			        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
			            body {
			                width: 495px;
			            }
			        }
			        @media (min-width:641px) {
			            table {
			                table-layout: fixed;
			            }
			            td {
			                width: 33%;
			            }
			        }
			        
			        .row{
			            margin-top: 20px;
			        }
			        
			        .today{
			            background:yellow;
			        }
			    </style>

			    <div class="container">
			        <div class="row">
			            <div class="col-md-12">
			                <?php
			                     $dateComponents = getdate();
			                     if(isset($_GET['month']) && isset($_GET['year'])){
			                         $month = $_GET['month']; 			     
			                         $year = $_GET['year'];
			                     }else{
			                         $month = $dateComponents['mon']; 			     
			                         $year = $dateComponents['year'];
			                     }
			                    echo build_calendar($month,$year);
			                ?>
			            </div>
			        </div>
			    </div>

	</div>
</div></div></div></div>

	<div class="container1">
		<div class="thead-accueil">
			Contacter le coach : <HR>
		</div>
		    <form action="Etat_Muscu.php" method="get">
		      <input type="text" name="formulaire" id="formulaire"/>
		      <input type="submit" name="submit" /></br></br>
		    </form>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "Piscine";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM Messagerie WHERE (Coachs ='Ancellotti') AND(Clients = 'arthur') ORDER BY ID DESC" ;
		$taille = 0;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
		    $conn->close();
		    ?>
		      <HR>
		    <?php
		    if($row['Etat'] == 1){
		      echo $row['Clients'] ." to " . $row['Coachs']."</br>";
		      echo $row['Message']."</br>"."</br>";
		      $taille++;
		    }
		    else{
		      echo $row['Coachs'] ." to " . $row['Clients']."</br>";
		      echo $row['Message']."</br>"."</br>";
		      $taille++;
		    }
		    if($taille == 10){
		      break;
		    }
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
		$conn->close();
		?>
	</div>

	<div class="container1">
		<div class="thead-accueil">
			Contact via Audio ou Video ? 
		</div>
		<a href="https://discord.com/channels/980544952574562304/980545287506501642">Rejoindre le serveur discord</a>
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
	            <p><a href="https://fr.linkedin.com/school/omneseducation/"><img src="linkedin_logo.png" width="55px" height="28px"></a></p>
	            <p><a href="https://m.facebook.com/pg/omneseducationgroup/posts/?ref=page_internal"><img src="facebook_logo.webp" width="55px" height="28px"></a></p>
	            <p><a href="https://www.instagram.com/omneseducationgroup/"><img src="logo_insta.png" width="55px" height="28px"></a></p>
        </div>
	    </br></br></br></br>
	</footer>
</body>
</html>