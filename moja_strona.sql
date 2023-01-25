-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2023, 11:35
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_sklep`
--

CREATE TABLE `kategorie_sklep` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kategorie_sklep`
--

INSERT INTO `kategorie_sklep` (`id`, `matka`, `nazwa`) VALUES
(1, 0, 'Kurtki '),
(18, 0, 'Spodnie'),
(19, 1, 'Kurtki Zimowe'),
(20, 18, 'Spodnie długie'),
(21, 0, 'Buty'),
(22, 21, 'Buty Zimowe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna.html', '<td>\r\n    <div class=\"text\">\r\n    \r\n    <p>\r\n        <h1><b><i>Oscary 2022</h1></b></i>\r\n        <b>\"CODA\" Sian Heder został w nocy z niedzieli na poniedziałek uhonorowany trzema Oscarami - za najlepszy film, scenariusz adaptowany i drugoplanową rolę Troya Kotsura. Najwięcej - aż sześć statuetek, m.in. za ../img/ęcia i montaż - powędrowało do twórców \"Diuny\" Denisa Villeneuve\'a.</b>\r\n        <img src=\"img/image1.jfif\" class=\"small-image\" alt=\"Description of the image\" style=\"float:right; object-fit: cover;\">\r\n        <img src=\"img//oscar.jfif\" class=\"small-image\" alt=\"Statuetka oscara\" style=float:right;>\r\n    </p>\r\n    <p>\r\n    Po ubiegłorocznej pandemicznej odsłonie - kiedy Oscary wręczano na dworcu kolejowym Union Station w Los Angeles, a część artystów nie mogła przyjechać do Stanów Zjednoczonych - uroczystość powróciła do hollywoodzkiego Dolby Theatre. Po raz pierwszy od kilku lat impreza miała znów \"gospodarzy\". Obowiązki prowadzących pełniły aktorki Wanda Sykes, Amy Schumer i Regina Hall.\r\n    </p>\r\n    <img src=\"img/image5.jfif\"class-\"small-image\" alt=\"dworzec union station\" style=\"float:right; object-fit: cover;\">\r\n    <p>\r\n        <img src=\"img/image2.jfif\" alt=\"oscar\" class=\"small-image\" style=\"float:left; object-fit: cover;\">\r\n        Najważniejsza nagroda - Oscar dla najlepszego filmu - trafiła tej nocy do \"CODA\" w reż. Sian Heder. Opowieść o dziewczynie, która jest jedyną słyszącą osobą w najbliższej rodzinie doceniono już wcześniej m.in. Główną Nagrodą Jury podczas festiwalu w Sundance, nagrodą Amerykańskiej Gildii Aktorów Filmowych oraz dwiema statuetkami BAFTA. Tej nocy twórcy obrazu zostali uhonorowani trzykrotnie - za najlepszy film, scenariusz adaptowany (Heder), a także w kategorii najlepszy aktor drugoplanowy (Troy Kotsur).\r\n        <img src=\"img/image3.jfif\" alt=\"oscar\" class=\"small-image\" style=\"float:right; object-fit: cover;\">                </p>\r\n    <p>\r\n    Odbierając laur, producent Patrick Wachsberger podziękował Amerykańskiej Akademii Filmowej za \"docenienie filmu o miłości, o rodzinie w tym trudnym czasie\", a także za umożliwienie obrazowi \"zapisanie się na kartach historii\". \"Gratulacje dla pozostałych nominowanych. Wasze filmy też są niesamowite i to wielki zaszczyt dla nas być tutaj z wami. To nie było łatwe. W pierwszym dniu na planie wszyscy mieli przyjść o 4 rano i łowić ryby, a tymczasem zapowiedziano wielki sztorm na morzu. Wtedy problemy dopiero się zaczynały, ale udało się utrzymać tę łódkę na falach. Byłaś najlepszym kapitanem, jakiego można sobie wymarzyć\" - powiedział, zwracając się do Sian Heder.\r\n    </p>\r\n    <p>\r\n        <img src=\"img/zdj/image4.jfif\" class=\"small-image\" alt=\"Patrick Wachsberger\" style=\"float:left; object-fit: cover;\">\r\n    </p>\r\n</td>', 1),
(2, '2022_index.html', '\r\n            <td>\r\n                <div class=\"text\">\r\n                <p>\r\n                <h1><b>Coda</h1><b>\r\n                <b>„CODA” Sian Heder został w nocy z niedzieli na poniedziałek uhonorowany trzema Oscarami – za najlepszy film, scenariusz adaptowany i drugoplanową rolę Troya Kotsura. Najwięcej – aż sześć statuetek, m.in. za zdjęcia i montaż – powędrowało do twórców „Diuny” Denisa Villeneuve\'a.</b>\r\n                <img src=\"img/oscar.jfif\" style=float:right; height=300px;>\r\n                </p>\r\n                <p>\r\n                Po ubiegłorocznej pandemicznej odsłonie - kiedy Oscary wręczano na dworcu kolejowym Union Station w Los Angeles, a część artystów nie mogła przyjechać do Stanów Zjednoczonych - uroczystość powróciła do hollywoodzkiego Dolby Theatre. Po raz pierwszy od kilku lat impreza miała znów \"gospodarzy\". Obowiązki prowadzących pełniły aktorki Wanda Sykes, Amy Schumer i Regina Hall.\r\n                </p>\r\n                <p>\r\n                Najważniejsza nagroda - Oscar dla najlepszego filmu - trafiła tej nocy do \"CODA\" w reż. Sian Heder. Opowieść o dziewczynie, która jest jedyną słyszącą osobą w najbliższej rodzinie doceniono już wcześniej m.in. Główną Nagrodą Jury podczas festiwalu w Sundance, nagrodą Amerykańskiej Gildii Aktorów Filmowych oraz dwiema statuetkami BAFTA. Tej nocy twórcy obrazu zostali uhonorowani trzykrotnie - za najlepszy film, scenariusz adaptowany (Heder), a także w kategorii najlepszy aktor drugoplanowy (Troy Kotsur).\r\n                </p>\r\n            </td>\r\n', 1),
(3, '2021_index.html', '\r\n            <td>\r\n                <div class=\"text\">\r\n                <p>\r\n                <h1><b>Nomadland</h1><b>\r\n                <b>\"Nomadland\" otrzymał statuetkę dla najlepszego filmu na 93. gali rozdania Oscarów, a Chloe Zhao - jako drugą kobietę w historii - doceniono również nagrodą za reżyserię. W kategoriach aktorskich triumfowali Frances McDormand (\"Nomadland\"), Anthony Hopkins (\"Ojciec\"), Daniel Kaluuya (\"Judas and the Black Messiah\") i Yeo-Jong Yun (\"Minari\"). Statuetka za zdjęcia nie trafiła do Dariusza Wolskiego - zdobył ją Erik Messerschmidt za film \"Mank\". Najświeższe informacje, filmy i zdjęcia znajdziecie w naszej relacji.</b>\r\n                <img src=\"img/2021zdj.jfif\" style=float:right; height=300px;>\r\n                </p>\r\n                <p>\r\n                Nomadland nie jest częstym doświadczeniem w kinie, tym bardziej cieszyć powinni się widzowie w Polsce, którzy jeszcze zdołali załapać się na film Chloé Zhao na dużym ekranie. Reżyserka proponuje bowiem wyjątkowo zrealizowaną produkcję o dokumentalnych charakterze, podbudowaną autentycznymi występami nomadów oraz kapitalnymi zdjęciami. Równie interesujące są kulisy jego powstawania oraz wcześniejsze kontakty reżyserki z kulturą osób świadomie wybierających życie blisko natury i podróżujących po Stanach Zjednoczonych w swoich vanach, które stanowią dla nich nie tylko środek transportu, ale też miejsce zamieszkania.\r\n                </p>\r\n            </td>\r\n', 1),
(4, '2020_index.html', '\r\n            <td>\r\n                <div class=\"text\">\r\n                <p>\r\n                <h1>Parasite<h1>\r\n                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac faucibus nibh. Pellentesque nec imperdiet velit, et lacinia diam. Quisque massa sem, pulvinar ut massa sed, facilisis interdum ante. Nam at mauris quis lorem dictum ultricies non sed purus. Mauris auctor non nulla at sodales. Fusce mattis interdum aliquam. Duis vitae rutrum purus. Vestibulum nec augue ligula. Sed dignissim iaculis velit, sed iaculis est rhoncus quis. Donec pharetra vehicula augue eget efficitur.\r\n                <img src=\"img/2020zdj.jfif\" style=float:right; height=300px;>\r\n                </p>\r\n            </td>\r\n', 1),
(5, '2019_index.html', '\r\n            <td>\r\n                <div class=\"text\"\r\n                <p>\r\n                <h1>Green Book</h1>\r\n                <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac faucibus nibh. Pellentesque nec imperdiet velit, et lacinia diam. Quisque massa sem, pulvinar ut massa sed, facilisis interdum ante. Nam at mauris quis lorem dictum ultricies non sed purus. Mauris auctor non nulla at sodales. Fusce mattis interdum aliquam. Duis vitae rutrum purus. Vestibulum nec augue ligula. Sed dignissim iaculis velit, sed iaculis est rhoncus quis. Donec pharetra vehicula augue eget efficitur.</b>\r\n                <img src=\"img/2019zdj.jfif\" style=float:right; height=300px;>\r\n                </p>\r\n                <p>\r\n                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac faucibus nibh. Pellentesque nec imperdiet velit, et lacinia diam. Quisque massa sem, pulvinar ut massa sed, facilisis interdum ante. Nam at mauris quis lorem dictum ultricies non sed purus. Mauris auctor non nulla at sodales. Fusce mattis interdum aliquam. Duis vitae rutrum purus. Vestibulum nec augue ligula. Sed dignissim iaculis velit, sed iaculis est rhoncus quis. Donec pharetra vehicula augue eget efficitur.\r\n                </p>\r\n\r\n            </td>\r\n', 1),
(6, 'filmy.html', '<td>\r\n    <div class=\"content\">\r\n\r\n        <h2>Oscar 2022</h2></br></br>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0pmfrE1YL4I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n        </br></br>\r\n\r\n        <h2>Oscar 2021</h2></br></br>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6sxCFZ8_d84\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n\r\n\r\n\r\n        <h2>Oscar 2020</h2></br></br>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5xH0HfJHsaY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n\r\n\r\n        <h2>Oscar 2019</h2></br></br>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QkZxoko_HC0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n\r\n        </br></br></br>\r\n    </div>\r\n</td>', 1),
(7, 'opcje_index.html', '\r\n            <td>\r\n                <div class=\"content\">\r\n                    <h2 style=\"text-align: center\">Zmiana koloru strony</h2>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#FCFF33\')\"><span>Zółty</span></button></div>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#FF3F33\')\"><span>Czerwony</span></button></div>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#335BFF\')\"><span>Niebieski</span></button></div>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#A833FF\')\"><span>Fioletowy</span></button></div>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#33FF3F\')\"><span>Zielony</span></button></div>\r\n                    <div style=\"float: left\"><button class=\"button\" onclick=\"changeBackground(\'#112233\')\"><span>Domyślny</span></button></div>\r\n                </div>\r\n                <div style=\"clear: both\">\r\n                    <h2 style=\"text-align: center\">jQueryTest</h2>\r\n                    <div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, a się powiększe</div>\r\n                        <script>\r\n                            $(\"#animacjaTestowa1\").on(\"click\", function(){\r\n                                $(this).animate({\r\n                                     width: \"500px\",\r\n                                    opacity: 0.4,\r\n                                    fontSize: \"3em\",\r\n                                    borderWidth: \"10px\"\r\n                                    }, 1500);\r\n                            });\r\n                        </script>\r\n\r\n                    <div id=\"animacjaTestowa2\" class=\"test-block\"><span>Najedź, a się powiększe</span></div>\r\n                        <script>\r\n                            $(\"#animacjaTestowa2\").on({\r\n                                \"mouseover\" : function() {\r\n                                    $(this).animate({\r\n                                        width:300,\r\n                                    }, 800);\r\n                                },\r\n                                \"mouseout\" : function() {\r\n                                    $(this).animate({\r\n                                         width: 200\r\n                                    }, 800);\r\n                                }\r\n                            });\r\n                        </script>\r\n            </td>\r\n\r\n\r\n', 1),
(8, 'kontakt_index.html', '\r\n            <td>\r\n                <div class=\"text\"\r\n                <p>\r\n                <h1>Proszę o kontakt na adres mailowy: 162689@student.uwm.edu.pl</h1>\r\n                <img src=\"img/Kontaktzdj.jpg\" style=float:right; height=300px>\r\n                </p>\r\n                \r\n            </td>\r\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty_sklep`
--

CREATE TABLE `produkty_sklep` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) DEFAULT NULL,
  `opis` varchar(255) DEFAULT NULL,
  `data_utworzenia` date NOT NULL,
  `data_modyfikacji` date DEFAULT NULL,
  `data_wygasniecia` date DEFAULT NULL,
  `cena_netto` int(11) NOT NULL,
  `podatek_vat` int(11) NOT NULL,
  `ilosc_sztuk` int(11) NOT NULL,
  `status_dostepnosci` varchar(50) NOT NULL,
  `kategoria` int(11) DEFAULT NULL,
  `gabaryt_produktu` varchar(50) NOT NULL,
  `zdjecie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `produkty_sklep`
--

INSERT INTO `produkty_sklep` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES
(0, 'KURTKA MĘSKA ZIMOWA CZARNA OZONEE O/M800Z', 'KURTKA MĘSKA Z NAJNOWSZEJ KOLEKCJI, POSIADA KAPTUR Z ODPINANYM FUTERKIEM, MODNE PIKOWANIA, KIESZENIE PO BOKACH NA ZAMEK ORAZ DWIE KIESZENIE W ŚRODKU, MATERIAŁ: 100% NYLON, PODSZEWKA: 100% POLIESTER, MODEL (182 CM, 87 KG) MA NA SOBIE ROZMIAR M.', '2023-01-01', '2023-01-02', '2024-01-01', 279, 23, 500, 'DOSTĘPNY', 19, 'XXL', 'https://ozonee.pl/pol_pm_Kurtka-meska-zimowa-czarna-OZONEE-O-M800Z-52280_4.jpg'),
(0, 'SPODNIE MĘSKIE CHINO MATERIAŁOWE CIEMNO-NIEBIESKIE OZONEE NB/MP0160BS', 'SPODNIE MATERIAŁOWE TYPU CHINOS Z NAJNOWSZEJ KOLEKCJI, POSIADAJĄ MODNY FASON ORAZ KIESZENIE Z PRZODU I Z TYŁU, MATERIAŁ: 98% BAWEŁNA, 2% ELASTAN, MODEL (182 CM, 87 KG) MA NA SOBIE ROZMIAR 32.', '2023-01-01', NULL, '2024-01-01', 99, 23, 500, 'Dostepny', 20, 'XXL', 'https://ozonee.pl/pol_il_Spodnie-meskie-chino-materialowe-ciemno-niebieskie-OZONEE-NB-MP0160BS-52343.jpg'),
(0, 'SNEAKERSY WYSOKIE BEŻOWE OZONEE G/271', 'BUTY MĘSKIE TYPU TRAMPKI SNEAKERSY Z NAJNOWSZEJ KOLEKCJI, MODEL WYKONANY Z MATERIAŁU ZAMSZOWEGO, OKRĄGŁY NOSEK, WNĘTRZE MATERIAŁ TEKSTYLNY, PODESZWA TWORZYWO SZTUCZNE', '2023-01-01', NULL, '2024-01-01', 99, 23, 500, 'Dostepny', 19, 'XXL', 'https://ozonee.pl/pol_pm_Sneakersy-wysokie-bezowe-OZONEE-G-271-41335_1.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie_sklep`
--
ALTER TABLE `kategorie_sklep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie_sklep`
--
ALTER TABLE `kategorie_sklep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
