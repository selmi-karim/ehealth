<?php
session_start();
$cin = $_GET['cin']
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
        <link rel="stylesheet" media="all" href="../css/historique.css">



    </head>

    <body>
        <?php
        // Connexion à la base de données

        try {
            //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
            $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
        } catch (Exception $ex) {
            echo 'erreur';
        }
        //requette de selection
        $reponse = $bdd->query('SELECT * FROM patients WHERE cin=\'' . $_GET['cin'] . '\'') or die(print_r($bdd->errorInfo()));
        $donnee = $reponse->fetch();
        ?>
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
                    <li class="sidebar-brand">
                        <a href="#">
                            Mes Patients
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#">
                            Calendrier (Coming Soon)
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#" class="active">
                            <?php echo $donnee['nom'] . "  " . $donnee['prenom'] ?>
                        </a>
                    </li>
                    <li>
                        <?php
                        echo "<a href = \"profil.php?cin=$cin\">Profil</a>";
                        ?>        

                    </li>
                    <li>
                        <a href="#" class="active">Historique</a>
                    </li>
                    <li>
                        <?php
                        echo "<a href = \"ordonnance.php?cin=$cin\">Ordonnance</a>";
                        ?>        

                    </li>

                </ul>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 ordonnance">
            <div class="oordonnance">
                <div class="row">
                    <div class="medinfo col-xs-7">
                        <h3>Dr. Foulen Ben Foulen</h3>
                        <h4>Cariologue</h4>
                        <h5>12 rue des médecins, 1002 Tunis<br> Tél: 71 123 456</h5>
                    </div>

                </div>
                <div class="row ">

                    <br>
                    <div class="patientname col-xs-6" >John Doe</div>
                    <div class="  date col-xs-6" >30/08/2015</div>
                </div>
                <div class="ordcontent">
                    <table>
                        <tr>
                            <td class="note">
                                <p>ceci est une note qui peut parfois etre un peu longue, et quand meme la taille de ce champ s'adapte automatiquement</p>
                            <td>
                        </tr>
                        <tr>
                            <td class="medicament">
                                <p>ceci est un medicament</p>
                            <td>
                        </tr>
                        <tr>
                            <td class="medicament">
                                <p>ceci est un medicament</p>
                            <td>
                        </tr>
                        <tr>
                            <td class="medicament">
                                <p>ceci est un medicament</p>
                            <td>
                        </tr>
                        <tr>
                            <td class="note">
                                <p>ceci est une note qui peut parfois etre un peu longue, et quand meme la taille de ce champ s'adapte automatiquement</p>
                            <td>
                        </tr>
                    </table>
                </div>
                <!-- jQuery -->
            </div>
        </div>

        <div class="col-md-3 col-xs-12 historique">
            <h2>Historique</h2>
            <table class="table table-striped">
                <tr>
                    <th>
                        consulter
                    </th>
                    <th>
                        date
                    </th>
                </tr>
                <tr>
                    <td>
                        <a href="" class="glyphicon glyphicon-arrow-left" style="float:left"/>
                    </td>
                    <td>
                        21/5/2014
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="" class="glyphicon glyphicon-arrow-left" style="float:left"/>
                    </td>
                    <td>
                        21/5/2014
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="" class="glyphicon glyphicon-arrow-left" style="float:left"/>
                    </td>
                    <td>
                        21/5/2014
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="" class="glyphicon glyphicon-arrow-left" style="float:left"/>
                    </td>
                    <td>
                        21/5/2014
                    </td>
                </tr>
            </table>
        </div>
            <!--<script src="../js/loggedin.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Bootstrap Core JavaScript--> 
        <script src="../js/elastic.js"></script>
        <script src="../js/ordonnance.js"></script>
        <script src="../js/controlSignUp.js"></script>
    </body>
</html>
