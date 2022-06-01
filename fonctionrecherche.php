<?php

if ( isset( $_GET['submit'] ) ) {
      $cherche = strtolower($_GET['cherche']); 
      if($cherche == 'Accueil'){
      	header('location: accueil.php');
      }
      else if($cherche == 'Activite'){
      	header('location: activite.php');
  	  }
  	  else if($cherche == 'Sports'){
      	header('location: sport.php');
  	  }
  	  else if($cherche == 'mon compte'){
      	header('location: VotreCompte.php');
  	  }
  	  else if($cherche == 'deconnexion'){
      	header('location: Identification.php');
  	  }
  	  else if($cherche == 'basketball'){
      	header('location: basketball.php');
  	  }
      else if($cherche == 'listes coachs'){
        header('location: Listes_Coachs.php');
      }
  	  else if($cherche == 'football'){
      	header('location: Football.php');
  	  }
  	  else if($cherche == 'tennis'){
      	header('location: Tennis.php');
  	  }
  	  else if($cherche == 'natation'){
      	header('location: Natation.php');
  	  }
  	  else if($cherche == 'plongeon'){
      	header('location: Plongeon.php');
  	  }
  	  else if($cherche == 'rugby'){
      	header('location: Rugby.php');
  	  }
  	  else if(($cherche == 'muscu') OR ($cherche == 'rolland')){
      	header('location: musculation.php');
  	  }
  	  else if(($cherche == 'fitness') OR ($cherche == 'martin')){
      	header('location: Fitness.php');
  	  } 
  	  else if(($cherche == 'biking') OR ($cherche == 'thierry')){
      	header('location: Biking.php');
  	  }
  	  else if(($cherche == 'cardio') OR ($cherche == 'camille')){
      	header('location: Cardio_training.php');
  	  }
  	  else if(($cherche == 'cours') OR ($cherche == 'johan')){
      	header('location: Cours_Collectifs.php');
  	  }
  	  else if($cherche == 'planning basketball'){
      	header('location: basketball.php');
  	  }
  	  else if($cherche == 'planning football'){
      	header('location: Football.php');
  	  }
  	  else if($cherche == 'planning tennis'){
      	header('location: Tennis.php');
  	  }
  	  else if($cherche == 'planning natation'){
      	header('location: Natation.php');
  	  }
  	  else if($cherche == 'planning plongeon'){
      	header('location: Plongeon.php');
  	  }
  	  else if($cherche == 'planning rugby'){
      	header('location: Rugby.php');
  	  }
  	  else if($cherche == 'planning muscu'){
      	header('location: Coach_Muscu.php');
  	  }
  	  else if($cherche == 'planning fitness'){
      	header('location: coach_fitness.php');
  	  }
  	  else if($cherche == 'planning biking'){
      	header('location: Coach_biking.php');
  	  }
  	  else if($cherche == 'planning cardio'){
      	header('location: Coach_cardio.php');
  	  }
  	  else if($cherche == 'planning cours'){
      	header('location: Coach_collectif.php');
  	  }
      else if($cherche == 'fitness park'){
        header('location: coach_muscu.php');
      }
      else if($cherche == 'stade football'){
        header('location: football.php');
      }
      else if($cherche == 'stade rugby'){
        header('location: rugby.php');
      }
  	  else{
  	  	header('location: recherche.php');
  	  	
  	  }
}
?>