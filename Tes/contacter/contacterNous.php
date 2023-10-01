<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contacter.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Contacter Nous</title>
</head>

<body>

    <div class="page">
        <div class="panel">
          




        </div>



        <div class="contacter">
            <form class="formulaire">
                <span> une question ? un conseil ?</span>
                <h1 class="title">Contacter-nous</h1>
                <div class="input-field">
                    <!-- <i class="fa-solid fa-user"></i> -->
                    <i class='bx bx-user'></i>
                    <input type="text" placeholder="Nom" name="nom">

                </div>
                <div class="input-field">
                    <!-- <i class="fa-solid fa-envelope"></i> -->
                    <i class='bx bx-envelope'></i>
                    <input type="text" placeholder="E-mail" name="email">

                </div>
                <div class=" area">
                    <textarea placeholder="saisissez votre message ici..." class="message" name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <p class="erreur"></p>

                <input id="envoie" name="submit" type="submit" value="Envoyer" class="btn solid">

            </form>

        </div>

        <script src="contacter.js"></script>
</body>

</html>