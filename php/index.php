
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MNCA Météo</title>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
        <script type="text/javascript" src="../js/button_index.js"></script> 
        <link rel="shortcut icon" href="../image/neige.gif">
    </head>
    <body>
<?php
session_start ();

if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Page de notre section membre</title>';
	echo '</head>';

	echo '<body>';
	echo 'Bienvenue '. $_SESSION['login'];
	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="../../api/logout.php">Déconnection</a>';
}
else {
    header ('location: ../html/connexion.html');
}
$url = "http://172.20.10.2/api/weather/index.php?id=1";
$json = file_get_contents($url);
$result = json_decode($json, true);
?>

        <header class="header">
            <div class="title">
                <h1>MNCA</h1>   
            </div>
            
            <div class="navigation">
                
                <input type="checkbox" class="toggle-menu">
                <div class="hamburger"></div>
                
                <ul class="menu">
                    <li><a href="index.php">Météo locale</a></li>
                    <li><a href="../html/meteo_france.html">Météo France</a></li>
                    <li><a href="../html/connexion.html">Connexion</a></li>
                    <li><a href="../html/inscription.html">Inscription</a></li>
                    <li><a href="../html/support.html">Support</a></li>
                </ul>
            </div>
        </header>
        
        <title>Cube 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    </head>
    <body>
        <div class="block-mesure ">
            <div class="texte">
                <p class="mesure-texte">Dernière mesure : </p>
        </div>

        <div class="petit-block-mesure">
            <div class="bouttons">
                <br>
                <button onclick="afficherTemp()" class="mesure-bouttons"><strong>Température</strong></button>
                <button onclick="cacherTemp()" class="mesure-bouttons"><strong>Humidité</strong></button>
            </div>
            
            <div class="mesure-container">
                <p class="mesure-temperature"><?php echo round($result[0]["temp"], 2); ?><span class="mesure-unite">°C</span></p>
                <p class="mesure-humidite display-none"><?php echo round($result[0]["hum"], 2); ?><span class="mesure-unite">%</span></p>
            </div> 
            <div>
                <?php
                    if ($result[0]["temp"] < 1 AND $result[0]["temp"] > -3 AND $result[0]["hum"] > 90)
                    echo "<img src='../image/neige.gif' class='picto'>\n";
                    
                    elseif ($result[0]["temp"] > 1 AND $result[0]["hum"] > 90)
                    echo "<img src='../image/pluie.gif' class='picto'>\n";
                    
                    else
                    echo "<img src='../image/soleil.gif' class='picto'>\n";
                    ?>
            </div>
            <div class="middle">
                <a class="btn" href="https://www.facebook.com/sharer.php">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn" href="https://twitter.com/intent/tweet/?url={url}&text={text}&via={via}">
                <i class="fab fa-twitter"></i>
                </a>
                <a class="btn" href="https://www.instagram.com/">
                <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="block-localisation container-sm">
        <br>
        <br>
        <br>
        <br>
        <div class="localisation-contenu">
            <h1>Autres fonctionnalités</h1>
            <p  class="text">Regardez la position de votre sonde directement sur le site ! <br> De plus, vous pouvez aussi observer l'évolution des températures enregistrées <br>par votre sonde sous forme de graphique !</p>
            <div class="block-localisation-bouttons">
                <button onclick="afficherLoc()" class="localisation-button1" ><b>Localisation</b></button>
                <button onclick="cacherLoc()" class="localisation-button2"><b>Graphique</b></button>
            </div>
        </div>
        

        <div class="localisation-visuel">
                <p class="localisation display-none" ><span><img src="../image/image.png" class="localisation-unite" width="350" height="300"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></span></p>
                <p class="graphique"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d228.800525801128!2d4.882900435289494!3d45.783252111762586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1673470872963!5m2!1sfr!2sfr" width="350" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius: 20px;"></iframe><span class="locasition-unite"></span></p> 
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>