<?php
class ZarzadzajProduktami{
    private $link;

    public function __construct() {
        require '../cfg.php';
        $this->link = $link;
    }


    public function PokazProdukty() {
        require '../cfg.php';
        $produkty = mysqli_query($link, "SELECT * FROM produkty_sklep");
        echo "<div class='przedmioty-lista'>";
        $today = date("y-m-d");
        foreach ($produkty as $x) {
            echo "<div class='przedmioty-element'>";
            $produkty_id = $x['id'];
            echo '<img src="'. $x['zdjecie'] .'" style="width: 350px; height: 250px;"><br>';
            echo "<b>". $x['tytul'] ."</b>";
            echo '<br>Opis: ';
            echo $x['opis'];
            echo '<br>Data utworzenia: ';
            echo $x['data_utworzenia'];
            echo 'Data modyfikacji: ';
            echo $x['data_modyfikacji'];
            echo '<br>Data wygasniecia: ';
            echo $x['data_wygasniecia'];
            echo '<br>Cena netto: ';
            echo $x['cena_netto'];
            echo " zł";
            echo '<br>Podatek vat: ';
            echo $x['podatek_vat'];
            echo " %";
            echo '<br>Ilość sztuk: ';
            echo $x['ilosc_sztuk'];
            echo '<br>Status: ';
            echo $x['status_dostepnosci'];
            echo '<br>Kategoria: ';
            $kategoria_id = $x['kategoria'];
            $kategoria = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE id='$kategoria_id'");
            foreach($kategoria as $y){
                echo $y['nazwa'];
            }
            echo '<br>Gabaryty produktu: ';
            echo $x['gabaryt_produktu'];
            echo '<br><br><a href="?edytuj_produkt=' . $x['id'] . '"><button type="submit" class="btn-edytuj_produkt">Edytuj</button></a>';
            echo ' <a href="?usun_produkt=' . $x['id'] . '"><button type="submit" class="btn-usun_produkt">Usuń</button></a>';
            echo '<br><br><br>';
            echo "</div>";
        }
        echo "</div>";
    }
    public function DodajProdukt() {
        require '../cfg.php';
        echo "<h2>Doawanie produktów</h2>";
        echo "<form method='post'>";
        echo "<label>Tytuł produktu: </label>";
        echo "<input type='text' name='tytul-produktu' id='tytul-produktu'><br>";
        echo "<label>Opis produktu: </label>";
        echo "<input type='text' name='opis-produktu' id='opis-produktu'><br>";
        echo "<label>Data utworzenia produktu: </label>";
        echo "<input type='date' name='data-utworzenia-produktu' id='data-utworzenia-produktu'><br>";
        echo "<label>Data wygaśnięcia: </label>";
        echo "<input type='date' name='data-wygasniecia-produktu' id='data-wygasniecia-produktu'><br>";
        echo "<label>Cena netto produktu: </label>";
        echo "<input type='text' name='cena-netto-produktu' id='cena-netto-produktu'><br>";
        echo "<label>Podatek vat produktu: </label>";
        echo "<input type='text' name='podatek-vat-produktu' id='podatek-vat-produktu'><br>";
        echo "<label>Ilość sztuk produktu: </label>";
        echo "<input type='text' name='ilosc-sztuk-produktu' id='ilosc-sztuk-produktu'><br>";
        echo "<label>Status dostępności produktu: </label>";
        echo "<select name='status-dostepnosci-produktu' id='status-dostepnosci-produktu'><br>";
        echo "<option>Dostepny</option>";
        echo "<option>Niedostepny</option>";
        echo "</select><br>";
        echo "<label>Kategoria produktu: </label>";
        echo "<select name='kategoria-produktu' id='kategoria-produktu'><br>";
        $podkategorie = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE NOT matka='0'");
        foreach ($podkategorie as $x) {
            $wybor = $x['nazwa'];
            $kategoria_id = $x['id'];
            echo "<option value=$kategoria_id>$wybor</option>";
        }
        echo "</select><br>";
        echo "<label>Gabaryty produktu: </label>";
        echo "<input type='text' name='gabaryty-produktu' id='gabaryty-produktu'><br>";
        echo "<label>Link do zjęcia produktu: </label>";
        echo "<input type='text' name='zdjecie-produktu' id='zdjecie-produktu'><br>";
        echo "<br><button class='btn' type='submit' name='save'>Dodaj</button>";
        echo "</form>";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tytul = $_POST['tytul-produktu'];
            $opis = $_POST['opis-produktu'];
            $data_utworzenia = $_POST['data-utworzenia-produktu'];
            $data_wygasniecia = $_POST['data-wygasniecia-produktu'];
            $cena_netto = $_POST['cena-netto-produktu'];
            $podatek_vat = $_POST['podatek-vat-produktu'];
            $ilosc_sztuk = $_POST['ilosc-sztuk-produktu'];
            $status_dostepnosci = $_POST['status-dostepnosci-produktu'];
            $kategoria = $_POST['kategoria-produktu'];
            $gabaryty = $_POST['gabaryty-produktu'];
            $zdjecie = $_POST['zdjecie-produktu'];
            mysqli_query($link, "INSERT INTO produkty_sklep (tytul, opis, data_utworzenia, data_wygasniecia, cena_netto, podatek_vat, ilosc_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) VALUES
            ('$tytul', '$opis', '$data_utworzenia', '$data_wygasniecia', '$cena_netto', '$podatek_vat', '$ilosc_sztuk', '$status_dostepnosci', '$kategoria', '$gabaryty', '$zdjecie');");
            echo "<script>window.location.href='../admin/produkty_sklep.php'</script>";
        }
    }

    public function UsunProdukt() {
        require '../cfg.php';
        if (isset($_GET['usun_produkt'])) {
            $produkt_id = $_GET['usun_produkt'];
            mysqli_query($link, "DELETE FROM produkty_sklep WHERE id='$produkt_id' LIMIT 1");
            echo "<script>window.location.href='../admin/produkty_sklep.php'</script>";
        }
    }

    public function EdytujProdukt(){
        require '../cfg.php';
        $id = $_GET['edytuj_produkt'];
        $produkt = mysqli_query($link, "SELECT * FROM produkty_sklep WHERE id=$id LIMIT 1");
        foreach($produkt as $x){
            $tytul_old = $x['tytul'];
            $opis_old = $x['opis'];
            $data_utworzenia_old = $x['data_utworzenia'];
            $data_wygasniecia_old = $x['data_wygasniecia'];
            $cena_netto_old = $x['cena_netto'];
            $podatek_vat_old = $x['podatek_vat'];
            $ilosc_sztuk_old = $x['ilosc_sztuk'];
            $status_dostepnosci_old = $x['status_dostepnosci'];
            $kategoria_old = $x['kategoria'];
            $gabaryty_old = $x['gabaryt_produktu'];
            $zdjecie_old = $x['zdjecie'];
        }
        echo "<h2>Edycja produktu</h2>";
        echo "<form method='post'>";
        echo "<label for='edytuj-tytul-produktu'>Tytuł produktu: </label>";
        echo "<input type='text' name='edytuj-tytul-produktu' id='edytuj-tytul-produktu' value='$tytul_old'><br>";
        echo "<label for='edytuj-opis-produktu'>Opis produktu: </label>";
        echo "<input type='text' name='edytuj-opis-produktu' id='edytuj-opis-produktu' value='$opis_old'><br>";
        echo "<label for='edytuj-data-utworzenia-produktu'>Data utworzenia produktu: </label>";
        echo "<input type='date' name='edytuj-data-utworzenia-produktu' id='edytuj-data-utworzenia-produktu' value='$data_utworzenia_old'><br>";
        echo "<label for='edytuj-data-wygasniecia-produktu'>Data wygasniecia produktu: </label>";
        echo "<input type='date' name='edytuj-data-wygasniecia-produktu' id='edytuj-data-wygasniecia-produktu' value='$data_wygasniecia_old'><br>";
        echo "<label for='edytuj-cena-netto-produktu'>Cena netto produktu: </label>";
        echo "<input type='text' name='edytuj-cena-netto-produktu' id='edytuj-cena-netto-produktu' value='$cena_netto_old'><br>";
        echo "<label for='edytuj-podatek-vat-produktu'>Podatek vat produktu: </label>";
        echo "<input type='text' name='edytuj-podatek-vat-produktu' id='edytuj-podatek-vat-produktu' value='$podatek_vat_old'><br>";
        echo "<label for='edytuj-ilosc-sztuk-produktu'>Ilość sztuk produktu: </label>";
        echo "<input type='text' name='edytuj-ilosc-sztuk-produktu' id='edytuj-ilosc-sztuk-produktu' value='$ilosc_sztuk_old'><br>";
        echo "<label for='edytuj-status-dostepnosci-produktu'>Status dostępności produktu: </label>";
        echo "<select name='edytuj-status-dostepnosci-produktu' id='edytuj-status-dostepnosci-produktu' value='$status_dostepnosci_old'><br>";
        echo "<option>Dostepny</option>";
        echo "<option>Niedostepny</option>";
        echo "</select><br>";
        echo "<label for='edytuj-kategoria-produktu'>Kategoria produktu: </label>";
        echo "<select name='edytuj-kategoria-produktu' id='edytuj-kategoria-produktu' value='$kategoria_old'><br>";
        $podkategorie = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE NOT matka='0'");
        foreach ($podkategorie as $x) {
            $wybor = $x['nazwa'];
            $kategoria_id = $x['id'];
            echo "<option value=$kategoria_id>$wybor</option>";
        }
        echo "</select><br>";
        echo "<label for='edytuj-gabaryty-produktu'>Gabaryty produktu: </label>";
        echo "<input type='text' name='edytuj-gabaryty-produktu' id='edytuj-gabaryty-produktu' value='$gabaryty_old'><br>";
        echo "<label for='edytuj-zdjecie-produktu'>Link do zjęcia produktu: </label>";
        echo "<input type='text' name='edytuj-zdjecie-produktu' id='edytuj-zdjecie-produktu' value='$zdjecie_old'><br>";
        echo "<br><button class='btn' type='submit' name='save'>Zapisz</button>";
        echo "</form>";

        if (isset($_POST['save'])){
            $today = date("y.m.d");
            $produkt_id = $_GET['edytuj_produkt'];
            $tytul = $_POST['edytuj-tytul-produktu'];
            $opis = $_POST['edytuj-opis-produktu'];
            $data_utworzenia = $_POST['edytuj-data-utworzenia-produktu'];
            $data_wygasniecia = $_POST['edytuj-data-wygasniecia-produktu'];
            $cena_netto = $_POST['edytuj-cena-netto-produktu'];
            $podatek_vat = $_POST['edytuj-podatek-vat-produktu'];
            $ilosc_sztuk = $_POST['edytuj-ilosc-sztuk-produktu'];
            $status_dostepnosci = $_POST['edytuj-status-dostepnosci-produktu'];
            $kategoria = $_POST['edytuj-kategoria-produktu'];
            $gabaryty = $_POST['edytuj-gabaryty-produktu'];
            $zdjecie = $_POST['edytuj-zdjecie-produktu'];
            mysqli_query($link, "UPDATE produkty_sklep SET tytul='$tytul', opis='$opis', data_utworzenia='$data_utworzenia', data_wygasniecia='$data_wygasniecia', cena_netto='$cena_netto', podatek_vat='$podatek_vat', ilosc_sztuk='$ilosc_sztuk', status_dostepnosci='$status_dostepnosci', kategoria='$kategoria', gabaryt_produktu='$gabaryty', zdjecie='$zdjecie', data_modyfikacji='$today' WHERE id='$produkt_id' LIMIT 1");
            echo "<script>window.location.href='../admin/produkty_sklep.php'</script>";
        }
    }
}

$produkty= new ZarzadzajProduktami();

echo '<br><button type="submit" class="btn-dodaj_produkt"><a href="?dodaj_produkt">Dodaj produkt</a></button>';
if (isset($_GET['dodaj_produkt'])) {
    $produkty->DodajProdukt();
}
if (isset($_GET['edytuj_produkt'])) {
    $produkty->EdytujProdukt();
}
$produkty->PokazProdukty();
$produkty->UsunProdukt();
