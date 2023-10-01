<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in and Sign Up Form</title>
    <script src="https://kit.fontawesome.com/84ea18e375.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../SignUp-signin/css/mystyle.css">

</head>

<body>

    <div class="container">
        <div class="forms-container">

            <div class="signin-signup">

                <form action="" method="post" class="sign-in-form" id="sign-in-form">
                    <h2 class="title">Bienvenue</h2>
                    <div class="input-field">
                        <i style="margin-top:7px;" class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="E-mail" name="adresseIn" id="email">

                    </div>

                    <div class="input-field password">
                        <i style="margin-top:7px;" class="fas fa-lock i"></i>
                        <input type="password" placeholder="Mot de passe" name="passwordIn" id="password">

                    </div>

                    <div style=" " class="sevenir">
                        <input type='checkbox' name='check' value='check' id='check' />
                        <label style=" font-weight:600">se souvenir de moi</label>
                    </div>
                    <div style="color:red;" id="resultat"></div>
                    <div class="div-button">
                        <input classe="btn-hover" name="submit" type="submit" value="Se Connecter" class="btn solid">
                        <!-- <p id="p"> Ou continuer avec </p>
                    
                    <button  classe ="btn-hover" class="btn-google solid"><a href="#" > <i  id="btn" class="fa-brands fa-google"></i></a> 
                       <span>google</span> 
                    </button> -->

                    </div>
                    <a class="oublie" href="#">mot de passe oublié ?</a>
                </form>
                <div id="recup" class="recup">

                    <?php include 'oublie.php' ?>

                    <!-- <div class="reussi-oublie">
                <h3 class = "title-verif">Vérifiez votre boîte de réception</h3>
                 <span style="text-align: justify">Si nous avons trouvé un compte correspondant au nom d'utilisateur
                     ou à l'adresse email fournis, nous vous avons envoyé votre mot de passe.
                 </span>
                </div> -->

                </div>
                <form id="sign-up-form" action="" method="post" class="sign-up-form">
                    <!--
                         <?php
                            // if (!empty($errors)) : 
                            ?>
                        <p> une erreur <p>
                            
                    <?php
                    //endif; 
                    ?> -->
                    <h2 class="title">Bienvenue</h2>
                    <div class="input-field">
                        <i class="fas fa-user i"></i>
                        <input type="text" placeholder="Nom" name="nomUp" id="nomUp">

                    </div>
                    <div style="color:red;font-size:11px;" id="nomP"></div>

                    <div class="input-field">
                        <i class="fas fa-user i"></i>
                        <input type="text" placeholder="Prénom" name="prenomUp" id="prenomUp">

                    </div>
                    <div style="color:red;font-size:11px;" id="prenomP"></div>


                    <div class="input-field">
                        <i class="fa-solid fa-school"></i>
                        <input type="text" placeholder="Etablissement" name="etablissement" id="etablissement">

                    </div>
                    <div style="color:red;font-size:11px;" id="etablissementP"></div>
                    <div class="input-field">
                        <i class="fa-solid fa-book"></i>
                        <input type="text" placeholder="Spécialité" name="specialite" id="specialite">

                    </div>
                    <div style="color:red;font-size:11px;" id="specialiteP"></div>
                    <div class="input-field">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input type="date" placeholder="Date de naissance" name="date" id="date">


                    </div>

                    <div style="color:red;font-size:11px;" id="dateP"></div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="E-mail" name="emailUp" id="emailUp">

                    </div>
                    <div style="color:red;font-size:11px;" id="emailP"></div>
                    <div class="input-field">
                        <i class="fas fa-lock i"></i>
                        <input type="password" placeholder="Mot de passe" name="passwordUp" id="passwordUp">

                    </div>
                    <div style="color:red;font-size:11px;" id="passwordP"></div>
                    <div class="input-field">
                        <i class="fas fa-lock i"></i>
                        <input type="password" placeholder="Confirmez votre mot de passe" name="passwordConf" id="passwordConf">

                    </div>
                    <div style="color:red;font-size:11px;" id="passwordConfP"></div>
                    <div class="div-button">
                        <input id="inscrir" type="submit" name="submit" value="S'inscrire" class="btn solid">


                        <!-- <p> Ou Continuer avec </p>
                    
                        
                            
                        
                    <button  id ="btn-hover" class="btn-google solid"><a href="#" > <i  id="btn" class="fa-brands fa-google"></i></a> 
                       <span>google</span>  -->
                        </button>

                    </div>

                </form>
            </div>

        </div>


        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Vous n'étes pas encore sur CERBO ?</h3>

                    <button class="btn transparent" id="sign-up-btn">Inscrivez-vous</button>
                </div>

                <img src="img/logo2.svg" alt="logo" class="image">
            </div>


            <div class="panel right-panel">
                <div class="content">
                    <h3>Vous êtes déjà membre ?</h3>
                    <button class="btn transparent" id="sign-in-btn">Connectez-vous</button>

                </div>

                <img id="image" src="img/connexion4.svg" alt="connexion" class="image">

            </div>

        </div>
    </div>


    <script src="app2.js"></script>

</body>


</html>