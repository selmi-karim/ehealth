
<?php
session_start();
?>
<!DOCTYPE html>
<html >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenue - eHealth</title>
        <!--<link rel="stylesheet" href="../css/reset.css">-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/loggedin.css">
        <link rel="stylesheet" media="all" href="../css/ordonnance.css">



    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" rel='home' href="#" title="accueil ehealth">
                        <img class="logo" src="../images/ehealth.png">
                    </a>    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dr. <?php echo $_SESSION['nom']; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profil<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                                <li><a href="#">Support<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="pagesPHP/deconnecte.php">Deconnexion<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!--left menu-->
        <div class="col-md-3 col-xs-12 leftMenu">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand ">
                        <a href="#" class="active">
                            Mes Patients
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#">
                            Calendrier (Coming Soon)
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 patients">
            <h1>Mes Patients</h1>
            <table class="table table-striped">

                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Nom & Prenom
                    </th>
                    <th>
                        Date de naissance
                    </th>
                    <th>
                        Profil
                    </th>
                </tr>


                <?php
                // Connexion à la base de données
                $compteur = 1;
                try {
                    //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
                    $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
                } catch (Exception $ex) {
                    echo 'erreur';
                }
                //jointure :D
                $reponse = $bdd->query('SELECT * FROM patients WHERE email_med=\'' . $_SESSION['email'] . '\'') or die(print_r($bdd->errorInfo()));
                while ($donnee = $reponse->fetch()) {
                    echo "<tr>";
                    echo "<td>";
                    echo $compteur++;
                    echo "</td>";
                    echo "<td>";
                    echo $donnee['nom'] . " " . $donnee['prenom'];
                    echo "</td>";
                    echo "<td>";
                    //date de naissance
                    $dateArray = explode('-', $donnee['date_de_naissance']);
                    $date = $dateArray[2].'/'.$dateArray[1].'/'.$dateArray[0];
                    echo $date;
                    echo "</td>";
                    echo "<td>";
                    $cin=$donnee['cin'];
                    echo "<a href = \"profil.php?cin=$cin \" class = \"glyphicon glyphicon-user\" style = \"float:left\" />";    
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <a href="nouveaupatient.php?cin=-1" >
               <button type = "button" class = "btn btn-success"><span class = "glyphicon glyphicon-plus-sign"  style = "float: left; color: black; margin: 2px"></span> &nbsp;
                    Nouveau Patient</button> </a>
        </div>
                <!--<script src = "../js/loggedin.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Bootstrap Core JavaScript--> 
        <script src="../js/elastic.js"></script>
        <script src="../js/ordonnance.js"></script>
    </body>
</html>
