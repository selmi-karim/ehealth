
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
        <link rel="stylesheet" media="all" href="../css/nouveaupatient.css">



    </head>

    <body>

        <?php
        session_start();
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
                                <li><a href="#">Deconnexion<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
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
            <?php
            // Connexion à la base de données
            try {
                //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi1189548-1');
                $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
            } catch (Exception $ex) {
                echo 'erreur';
            }
            if ($_GET['cin'] == -1)
                echo "<h1>Nouveau Patient</h1>";
            else {
                echo "<h1>Modifier</h1>";
                $reponse = $bdd->query('SELECT * FROM patients WHERE cin=\'' . $_GET['cin'] . '\'') or die(print_r($bdd->errorInfo()));
                $donnee = $reponse->fetch();
            }
            ?>
            <form id='redirection' method='post' >
                <br/><br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="Nom">Nom</span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="<?php if ($_GET['cin'] == -1) echo "Nom"; ?>" value="<?php if ($_GET['cin'] != -1) echo $donnee['nom']; ?>" onchange="verifNom()" aria-describedby="Nom">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="Prenom">Prenom</span>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="<?php if ($_GET['cin'] == -1) echo "Prenom"; ?>" onchange="verifPrenom()" value="<?php if ($_GET['cin'] != -1) echo $donnee['prenom']; ?>" aria-describedby="Prenom">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="Tel">Tel</span>
                            <input type="text" class="form-control" id="phone" name="phone" onchange="verifPhone()" placeholder="<?php if ($_GET['cin'] == -1) echo "Tel"; ?>" value="<?php if ($_GET['cin'] != -1) echo $donnee['tel']; ?>" aria-describedby="Tel">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="email">CIN</span>
                            <input type="text" class="form-control" id="CIN" name="CIN" onchange="verifCIN()" placeholder="<?php if ($_GET['cin'] == -1) echo "CIN"; ?>" value="<?php if ($_GET['cin'] != -1) echo $donnee['cin']; ?>" aria-describedby="email">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="birthdate">Date de naissance</span>
                            <input type="text" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="<?php if ($_GET['cin'] == -1) echo "Date de naissance"; ?>" value="<?php
                            if ($_GET['cin'] != -1) {                    //date de naissance
                                //date de naissance
                                $dateArray = explode('-', $donnee['date_de_naissance']);
                                $date = $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
                                echo $date;
                            };
                            ?>" aria-describedby="birthdate">
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="Adresse">Adresse</span>
                            <input type="text" class="form-control" id="address" name="address" onchange="verifAdresse()" placeholder="<?php if ($_GET['cin'] == -1) echo "Adresse"; ?>" value="<?php if ($_GET['cin'] != -1) echo $donnee['adresse']; ?>" aria-describedby="Adresse">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="infos">Autres infos</span>
                            <input type="text" id="info" name="info" class="form-control" placeholder="infos" aria-describedby="infos">
                        </div>
                    </div>
                </div>
                <br/><br/>
                <br/>
                <div class="row">
                    <div class="col-md-4 col-xs-4"></div>
                    <?php
                    if ($_GET['cin'] == -1)
                    //nouveau patient     
                        echo "<input type=\"submit\" onclick=\"ajoutPatient();return(ajoutPatient())\" \" class=\"submit col-md-4 col-xs-4 btn btn-success\" style=\"margin-bottom: 25px\" value=\"Ajouter\" />";
                    else
                    //modifier les donnees de patient    
                        echo "<input type=\"submit\" onclick=\"modifierPatient();return(modifierPatient())\" \" class=\"submit col-md-4 col-xs-4 btn btn-success\" style=\"margin-bottom: 25px\" value=\"Modifier\" />";
                    ?>
                </div>
            </form>
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
