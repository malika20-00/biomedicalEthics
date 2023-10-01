<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Admin</title>
    <!-- material icon  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET -->

    <link rel="stylesheet" href="./asserts/css/communStyle.css">
    <link rel="stylesheet" href="./asserts/css/condidats.css">
    <link rel="stylesheet" href="./asserts/css/RepStyle.css" />

</head>
<?php session_start(); ?>

<body class="<?php if ($_SESSION['dark'] == 1) {
                    echo 'dark-theme-variables';
                }; ?>">
    <?php

    if (!isset($_SESSION['email'])) {
        header("Location:../accueil/accueil.php");
    } else {
        if ($_SESSION['Admin'] == 0) {
            header("Location:../accueil/accueil.php");
        }
    ?>
        <div class="container">
            <aside>
                <div class="top">

                    <div class="logo">
                        <img class="img" src="./asserts/logo.png">
                        <h2 style="color:#6fa9a5;margin:auto">CERBO</h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                <div class="sidebar">
                    <a href="index.php">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Tableau de Bord </h3>
                    </a>
                    <a href="../tes/contenu/contenu.php">
                        <span class="material-icons-sharp">home</span>
                        <h3>Home </h3>
                    </a>
                    <a href="condidats.php">
                        <span class="material-icons-sharp">person_outline</span>
                        <h3>Candidats</h3>
                    </a>
                    <a href="demandes.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Demandes</h3>
                    </a>
                    <a href="cours.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Les cours</h3>
                    </a>
                    <a href="examen.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Examen</h3>
                    </a>
                    <a href="messages.php" class="active">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Messages</h3>
                        <span class="message-count">

                            <?php
                            require_once("../db.php");
                            $resultat = $db->query("SELECT * FROM  messages");
                            $res = $resultat->rowCount();
                            echo $res;
                            ?>
                        </span>
                    </a>
                    <a href="parametres.php">
                        <span class="material-icons-sharp">settings</span>
                        <h3>Paramètres</h3>
                    </a>
                    <a href="../deconnection.php">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Déconnexion</h3>
                    </a>
                </div>
            </aside>
            <!-- ---------------------- END OF ASIDE -------------------------- -->
            <main>
                <h1 class="title">Réponse </h1>
                <?php

                $id = $_GET['id'];
                $resultat = $db->query("SELECT * FROM messages WHERE idmssg=$id");
                $article = $resultat->fetch(PDO::FETCH_OBJ);
                ?>
                <div id="div-reponse">
                    <div class="form-reponse">
                        <form id="formulaire" method="post">
                            <div class="input-field">
                                <label for="email">Email :</label>
                                <input id="email" name="email" class=" input  message input_dark_id <?php if ($_SESSION['dark'] == 1) {
                                                                                                        echo 'input_dark';
                                                                                                    } else echo 'input_light'; ?>" value="<?php echo   $article->email; ?>" readonly>
                            </div>

                            <div class="input-field">
                                <label>Message :</label>

                                <p id="message" class=" input  message input_dark_id <?php if ($_SESSION['dark'] == 1) {
                                                                                            echo 'input_dark';
                                                                                        } else echo 'input_light'; ?>"><?php echo   $article->message; ?></p>
                            </div>

                            <div>
                                <label for="response">Votre Réponse :</label>

                                <textarea name="response" id="area" placeholder="Tapez la réponse ici..." id="response" cols="50" rows="10" class="input message input_dark_id <?php if ($_SESSION['dark'] == 1) {
                                                                                                                                                                                    echo 'input_dark';
                                                                                                                                                                                } else echo 'input_light'; ?>"></textarea>
                            </div>

                            <div class="env-ann">
                                <input id="repondre" type="submit" value="Envoyer">
                                <button id="annuler"><a href="messages.php">Annuler</a></button>
                            </div>
                        </form>
                    </div>
                </div>
                <p id="erreur" class="erreurRepondre"></p>
            </main>
            <div id="right-gap" class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>

                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey , <b>
                                    <?php

                                    $resultat = $db->query("SELECT * FROM admins ");
                                    $article = $resultat->fetch(PDO::FETCH_OBJ);
                                    echo   $article->prenom;
                                    ?>
                                </b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="photoProfilFormateur/<?php echo   $_SESSION['photoProfil']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $db = null;
    } ?>
    <script src="./Js/index.js"></script>

</body>

</html>