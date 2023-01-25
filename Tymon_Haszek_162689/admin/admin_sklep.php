<?php
class ZarzadzajKategoriami {
    private $link;

    public function __construct() {
        require '../cfg.php';
        $this->link = $link;
    }

    public function PokazKategorie() {
        $kategorie = mysqli_query($this->link, "SELECT * FROM kategorie_sklep WHERE matka='0'");
        foreach ($kategorie as $x) {
            $kategoria_id = $x['id'];
            echo $x['nazwa'];
            echo ' ';
            echo '<a href="?usun_kategorie=' . $x['id'] . '"><button type="submit" class="btn-usun_kategorie">Usuń</button></a>';
            echo '<a href="?edytuj_kategorie=' . $x['id'] . '"><button type="submit" class="btn-edytuj_kategorie">Edytuj</button></a>';
            echo '<br>';
            $podkategorie = mysqli_query($this->link, "SELECT * FROM kategorie_sklep WHERE matka=$kategoria_id");
            foreach ($podkategorie as $y) {
                echo '&#8627 ';
                echo $y['nazwa'];
                echo ' ';
                echo '<a href="?usun_podkategorie=' . $y['id'] . '"><button type="submit" class="btn-usun_podkategorie">Usuń</button></a>';
                echo '<a href="?edytuj_podkategorie=' . $y['id'] . '"><button type="submit" class="btn-edytuj_podkategorie">Edytuj</button></a>';
                echo '<br>';
            }
        }
    }
    public function DodajKategorie() {
        require '../cfg.php';
        echo '<h2>Dodawanie kategorii</h2>';
        echo '<form method="post">';
        echo '<label>Nazwa kategorii:</label>';
        echo '<input type="text" name="kategoria-nazwa" id="kategoria-nazwa"><br>';
        echo '<button class="btn" type="submit" name="save">Dodaj</button>';
        echo '</form>';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kategoria = $_POST['kategoria-nazwa'];
            mysqli_query($link, "INSERT INTO kategorie_sklep (nazwa) VALUES ('$kategoria');");
            header('Location: ./admin_sklep.php');
        }
    }
    public function DodajPodkategorie() {
        require '../cfg.php';
        echo ("<h2>Dodawanie podkategorii</h2>");
        echo ("<form method='post'>");
        echo ("<label for='kategoria'>Głowna kategoria </label>");
        echo ("<select name='kategoria-id' id='kategoria-id'>");
        $kategoria = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE matka='0'");
        foreach ($kategoria as $x) {
            $wybor = $x['nazwa'];
            $kategoria_id = $x['id'];
            echo ("<option value=$kategoria_id>$wybor</option>");
        }
        echo ("</select></br>");
        echo ("<label for='status'>Nazwa podkategorii:</label></br>");
        echo ("<input type='text' name='podkategoria-nazwa' id='podkategoria-nazwa'></br>");
        echo ("<button class='btn' type='submit' name='save'>Dodaj</button>");
        echo ("</form>");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $podkategoria_nazwa = $_POST['podkategoria-nazwa'];
            $kategoria_id = $_POST['kategoria-id'];
            // $kategoria_id = $_GET['kategoria-id'];
            mysqli_query($link, "INSERT INTO kategorie_sklep (nazwa, matka) VALUES ('$podkategoria_nazwa', '$kategoria_id') LIMIT 1;");
            header('Location: ./admin_sklep.php');
        }
    }
    public function UsunKategorie() {
        if (isset($_GET['usun_kategorie'])) {
            $categoryId = $_GET['usun_kategorie'];
            $checkForSubcategories = mysqli_query($this->link, "SELECT COUNT(1) FROM kategorie_sklep WHERE matka=$categoryId");
            if ((int) mysqli_fetch_row($checkForSubcategories)[0] === 0) {
                mysqli_query($this->link, "DELETE FROM kategorie_sklep WHERE id='$categoryId' LIMIT 1");
                header('Location: ./admin_sklep.php');
            } 
            else {
                echo ("<h2>Aby usunąc kategorię należy usunąć wszystkie podkategorie!");
            }
        }
    }
    public function UsunPodkategorie() {
        require '../cfg.php';
        if (isset($_GET['usun_podkategorie'])) {
            $podkategoria_id = $_GET['usun_podkategorie'];
            mysqli_query($link, "DELETE FROM kategorie_sklep WHERE id='$podkategoria_id' LIMIT 1");
            header('Location: ./admin_sklep.php');
        }
    }
    public function EdytujKategorie(){
        require '../cfg.php';
        if(isset($_GET['edytuj_kategorie']) && isset($_POST['edytuj_kategorie'])){
            $kategoria_id = $_GET['edytuj_kategorie'];
            $nowa_nazwa = $_POST['edytuj_kategorie'];
            mysqli_query($link, "UPDATE kategorie_sklep SET nazwa='$nowa_nazwa' WHERE id='$kategoria_id' LIMIT 1 ");
            header('Location: ./admin_sklep.php');
        }
        else {
            echo "<section>";
            echo "<h2>Edycja kategorii</h2>";
            echo "<form method='post'>";
            echo "<label for='edytuj_kategorie'>Nowa nazwa kategorii:</label><br>";
            echo "<input type='text' name='edytuj_kategorie' id='edytuj_kategorie'>";
            echo "<button class='btn' type='submit' name='save'>Zapisz</button>";
            echo "</from>";
            echo "</section>";
        }
    }
    public function EdytujPodkategorie(){
        require '../cfg.php';

        echo "<section>";
        echo "<form method='post'>";
        echo "<h2>Edycja podkategorii</h2>";
        echo "<label for='edytuj_podkategorie'>Wybierz kategorię </label>";
        echo "<select name='edytuj_podkategorie' id='edytuj_podkategorie'>";
        $podkategorie = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE matka='0'");
        foreach ($podkategorie as $x) {
            $wybor = $x['nazwa'];
            $kategoria_id = $x['id'];
            echo "<option value=$kategoria_id>$wybor</option>";
        }
        
        echo "</select></br>";
        echo "<label for='edytuj_podkategorie_nazwa'>Nowa nazwa podkategorii:</label></br>";
        echo "<input type='text' name='edytuj_podkategorie_nazwa' id='edytuj_podkategorie_nazwa'>";
        echo "<button class='btn' type='submit' name='save'>Zapisz</button>";
        echo "</form>";
        echo "</section>";

        if (isset($_POST['edytuj_podkategorie_nazwa'])) {
            $podkategoria_id = $_GET['edytuj_podkategorie'];
            $podkategoria_nazwa = $_POST['edytuj_podkategorie_nazwa'];
            $kategoria_is = $_POST['edytuj_podkategorie'];
            mysqli_query($link, "UPDATE kategorie_sklep SET nazwa='$podkategoria_nazwa', matka='$kategoria_is' WHERE id='$podkategoria_id' LIMIT 1");
            header('Location: ./admin_sklep.php');
        }
    }
}
    


$sklep = new ZarzadzajKategoriami();
$sklep->PokazKategorie();

echo ('</br><a href="?dodaj_kategorie"><button type="submit" class="btn-dodaj_kategorie">Dodaj kategorie</button></a>');

if (isset($_GET['dodaj_kategorie'])) {
    $sklep->DodajKategorie();
}

echo ('</br><a href="?dodaj_podkategorie"><button type="submit" class="btn-dodaj_podkategorie">Dodaj podkategorie</button></a>');

if (isset($_GET['dodaj_podkategorie'])) {
    $sklep->DodajPodkategorie();
}

if (isset($_GET['edytuj_kategorie'])) {
    $sklep->EdytujKategorie();
}

if (isset($_GET['edytuj_podkategorie'])) {
    $sklep->EdytujPodkategorie();
}

$sklep->UsunKategorie();
$sklep->UsunPodkategorie();
?>