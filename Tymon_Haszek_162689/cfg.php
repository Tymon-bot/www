<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = 'moja_strona';
    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    if (!$link) echo('<b>przerwane połączenie z bazą danych');
    if (!mysqli_select_db($link, $baza)) echo('nie wybrano bazy danych');
    $login = 'admin';
    $pass = 'admin';
?>