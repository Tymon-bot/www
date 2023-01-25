<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

/* po tym komentarzu będzie kod do dynamicznego ładowania stron */

$idp = isset($_GET['idp']) ? $_GET['idp'] : null;

switch ($idp) {
    case '2022':
        $strona = file_exists('html/2022_index.html') ? 'html/2022_index.html' : 'html/error.html';
        break;
    case '2021':
        $strona = file_exists('html/2021_index.html') ? 'html/2021_index.html' : 'html/error.html';
        break;
    case '2020':
        $strona = file_exists('html/2020_index.html') ? 'html/2020_index.html' : 'html/error.html';
        break;
    case '2019':
        $strona = file_exists('html/2019_index.html') ? 'html/2019_index.html' : 'html/error.html';
        break;
    case 'kontakt':
        $strona = file_exists('html/kontakt_index.php') ? 'html/kontakt_index.php' : 'html/error.html';
        break;
    case 'filmy':
        $strona = file_exists('html/filmy.html') ? 'html/filmy.html' : 'html/error.html';
        break;
    case 'opcje':
        $strona = file_exists('html/opcje_index.html') ? 'html/opcje_index.html' : 'html/error.html';
        break;
    case null:
        $strona = file_exists('html/glowna.html') ? 'html/glowna.html' : 'html/error.html';
        break;
    default:
        $strona = 'html/error.html';
        break;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" content="Tymon Haszek" />
    <title>Oscary</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="js/kolorujtlo.js" type="text/javascript" async></script>
    <script src="js/timedate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    function showContactForm() {
        document.getElementById("contact-form").style.display = "block";
    }
    </script>

  </head>
  <body onload="startClock()">
<table style="width: 100%">
        <tr>
                <div class="title">
                    <b>Oscary</b>
                </div>
                <div id="zegarek"></div>
                <div id="data"></div>
        </tr>
        <tr>
            <td>
            <div class="menu">
                    <a href="?idp=">Strona głowna</a>
                </div>
                <div class="menu">
                    <a href="?idp=2022">2022</a>
                </div>
                <div class="menu">
                    <a href="?idp=2021">2021</a>
                </div>
                <div class="menu">
                    <a href="?idp=2020">2020</a>
                </div>
                <div class="menu">
                    <a href="?idp=2019">2019</a>
                </div>
                <div class="menu">
                    <a href="?idp=kontakt">Kontakt</a>
                </div>
                <div class="menu">
                    <a href="?idp=filmy">Filmy</a>
                </div>
                <div class="menu">
                    <a href="?idp=opcje">Opcje</a>
                </div>
                <div class="menu">
                    <a href="./admin/koszyk.php">Koszyk</a>
                </div>
            </td>
        </tr>
        <tr>
            <?php
                include($strona);
            ?>
        </tr>
       
</table>

<?php
 $nr_indeksu = '162689';
 $nrGrupy = '1';
 echo ('Autor: Tymon Haszek ' .$nr_indeksu .' Grupa: ' .$nrGrupy);
?>
</body>
</html>
