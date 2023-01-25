<?php
    function showPage($alias) {
        require 'cfg.php';
        $alias = mysqli_real_escape_string($link, $alias);
        $query = "SELECT page_content FROM page_list WHERE alias='$alias' LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        return empty($row) ? '[page not found]' : $row['page_content'];
    }
?>
