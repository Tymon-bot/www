<?php
        session_start();
        if (isset($_POST["dodaj_do_koszyka"])){
            if (isset($_SESSION["koszyk"])) {
                $lista_produktow_id = array_column($_SESSION['koszyk'], "id_produktu");
                if (!in_array($_GET["id"], $lista_produktow_id)) {
                    $count = count($_SESSION["koszyk"]);
                    $lista_produktow = array(
                        'id_produktu' => $_GET["id"],
                        'tytul_produktu' => $_POST["ukryty_tytul"],
                        'cena_produktu' => $_POST["ukryta_cena"],
                        'ilosc_produktu' => $_POST["ilosc"]
                    );
                    $_SESSION["koszyk"][$count] = $lista_produktow;
                }
                else {
                    echo '<script>alert("Ten przedmiot jest już dodany")</script>';
                    echo "<script>window.location.href='../admin/koszyk.php'</script>";
                }
            }
            else {
                $lista_produktow = array(
                    'id_produktu' => $_GET["id"],
                    'tytul_produktu' => $_POST["ukryty_tytul"],
                    'cena_produktu' => $_POST["ukryta_cena"],
                    'ilosc_produktu' => $_POST["ilosc"]
                );
                $_SESSION["koszyk"][0] = $lista_produktow;
            }
        }

        if (isset($_GET["action"])) {
            if ($_GET["action"] == "usun") {
                foreach($_SESSION["koszyk"] as $keys => $values){
                    if ($values["id_produktu"] == $_GET["id"]) {
                        unset($_SESSION["koszyk"][$keys]);
                        echo '<script>alert("Usunięto przedmiot")</script>';
                        echo "<script>window.location.href='../admin/koszyk.php'</script>";
                    }
                }
            }
        }

        require '../cfg.php';
        echo "<button><a href='./end_sesion.php'>Powrót do strony głównej</a></button>";
        $produkty = mysqli_query($link, "SELECT * FROM produkty_sklep ORDER BY id ASC");
        if (mysqli_num_rows($produkty) > 0) {
            while ($row = mysqli_fetch_array($produkty)) {
                echo "<div>";
                echo '<form method="post" action="?action=dodaj&id='.$row['id'].'">';
                echo '<img src="'. $row['zdjecie'] .'" style="width: 350px; height: 250px;"><br>';
                echo $row['tytul'];
                echo "<br>";
                echo $row['opis'];
                echo "<br>";
                echo "Cena: ";
                echo $row['cena_netto'] + ($row['cena_netto'] * $row['podatek_vat'] / 100);
                echo " zł";
                echo "<br>";
                $kategoria_id = $row['kategoria'];
                $kategoria = mysqli_query($link, "SELECT * FROM kategorie_sklep WHERE id='$kategoria_id'");
                foreach($kategoria as $y){
                    echo "Kategoria: ";
                    echo $y['nazwa'];
                }
                echo "<br>";
                echo "Status: ";
                echo $row['status_dostepnosci'];
                echo "<br>";
                echo "Gabaryty: ";
                echo $row['gabaryt_produktu'];
                echo "<br>";
                echo "Ilość: ";
                echo "<input type='text' name='ilosc' value=1 />";
                echo "<input type='hidden' name='ukryty_tytul' value=". $row['tytul'] ." />";
                echo "<input type='hidden' name='ukryta_cena' value=". $row['cena_netto'] + ($row['cena_netto'] * $row['podatek_vat'] / 100)." />";
                echo "<input type='submit' name='dodaj_do_koszyka' value='Dodaj do koszyka' />";
                echo "</form>";
                echo "</div>";
            }
        }
        if(!empty($_SESSION["koszyk"])){
            echo "<h2>KOSZYK</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th width='20%'>Przedmiot</th>";
            echo "<th width='20%'>Ilość</th>";
            echo "<th width='20%'>Cena za sztukę</th>";
            echo "<th width='20%'>Suma</th>";
            echo "<th width='20%'></th>";
            echo "</td>";
            if(!empty($_SESSION["koszyk"])) {
                $suma = 0;
                foreach ($_SESSION["koszyk"] as $keys => $values) {
                    echo "<tr>";
                    echo "<td>".$values['tytul_produktu']."</td>";
                    echo "<td>".$values['ilosc_produktu']."</td>";
                    echo "<td>".$values['cena_produktu']."zł</td>";
                    echo "<td>".number_format($values['ilosc_produktu'] * $values['cena_produktu'], 2)."zł</td>";
                    echo "<td><button><a href='?action=usun&id=".$values['id_produktu']."'>Usuń</a></button></td>";
                    $suma = $suma + ($values['ilosc_produktu'] * $values['cena_produktu']);
                }
                echo "<tr>";
                echo "<td colspan='3' align='right'>Suma</td>";
                echo "<td align='right'>". number_format($suma, 2)."zł</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
?>