<!DOCTYPE html>
<html>
<head>
    <title>Projet Piscine</title>
    <link rel="stylesheet" type="text/css" href="enpage3.css">
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

    </br>
    <div class="barre-sport">
            <ul>
                <li><a href="coach_biking.php"><p><center>Revenir a la page biking</center></p></a></li>
            </ul>
    </div> </br></br></br>
    <div class="container1">
        <div class="thead-accueil">
            Coach M. Thierry :
        </div><HR> </br></br>
        <div class="voir-coach"></br>
            <img src="coach_biking.webp" width="80%" height="350px"></br>
                Coach : M. Thierry</br>
                Mail : <i>Jean.Thierry@omneseducations.Fr</i></br>
                Texto : <i>06 01 94 29 86</i></br></br>
        </div></br></br>
                <HR></br>
        </div>

<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'bookingcalendar');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $coaching = "Thierry";
    $stmt = $mysqli->prepare("select * from bookings where (date = ?) AND (Coach = ?)");
    $stmt->bind_param('ss', $date, $coaching);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $coach = "Thierry";

    $stmt = $mysqli->prepare("INSERT INTO bookings (name,timeslot, email, date, Coach) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $name,$timeslot, $email, $date, $coach);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Reservation enregistree</div>";
    $bookings[] = $timeslot;
    $stmt->close();
    $mysqli->close();
}

$duration = 60;
$cleanup = 0;
$start ="09:00";
$end = "18:00";

function timeslots($duration ,$cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart <$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;

}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <?php
  if($date == '2023-02-14'){
        ?>
            <h1>Toute l'equipe vous souhaite une agreable Saint-Valentin</h1>
            <img src="saintvalentin.jpg" width="100%" height="350px;">
        <?php
    }
    ?>
    <div class="container">
        <h1 class="text-center">Choisir votre heure de reservation pour le <?php echo date('d-m-Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo(isset($msg))?$msg:"";?>
            </div>
            <?php
                $timeslots = timeslots($duration, $cleanup, $start, $end);
                foreach($timeslots as $ts){
            ?>
            <div class="col-md-2">
                <div class="form-group">
                     <?php if(in_array($ts, $bookings)){ ?>
                        <button class="btn btn-danger"><?php echo $ts; ?></button>  
                    <?php }else{ ?>
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                    <?php } ?>
                </div>
            </div> 
            <?php }?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Creneau </label>
                            <input required type="text" readonly name="timeslot" id="timeslot" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre nom</label>
                            <input required type="text" name="name" class="">
                        </div>
                        <div class="form-group">
                            <label for="">votre mail</label>
                            <input required type="email" name="email" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre ville</label>
                            <input required type="text" name="ville" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre adresse</label>
                            <input required type="text" name="adresse" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre code Postal</label>
                            <input required type="text" name="postal" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre pays</label>
                            <input required type="text" name="pays" class="">
                        </div>
                        <div class="form-group">
                            <label for="">Votre numero de telephone</label>
                            <input required type="text" name="telephone" class="">
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit" name="submit">Reserver</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        }) 
    </script>
    <HR>
    <div class="container1">
        <div class="thead-accueil">
            Contactez le coach:<HR>
        </div>
    </div>
  </body>

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

</html>