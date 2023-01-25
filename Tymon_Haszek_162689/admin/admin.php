<?php
require'../cfg.php';
function FormularzLogowania() {   
        $wynik = '
        <div class="logowanie1">
        <h1 class="heading">Logowanie do panelu administratora:</h1>
            <div class="logowanie">
                <form method="POST" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
                    <table class="logowanie tab">
                        <tr><td class="log4_t"></td><td><input type="text" name="login_email" placeholder="login" class="text-login" /></td></tr>
                        <tr><td class="log4_t"></td><td><input type="password" name="login_pass" placeholder="hasło" class="text-pass" /></td></tr> 
                        <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="btn-login" value="Zaloguj" /></td></tr>             
                    </table>
                </form>
            </div>
        </div>
        ';
        if(isset($_POST['login_email']) || isset($_POST['login_pass'])) {
            $_SESSION['login'] = $_POST['login_email'];
            $_SESSION['password'] = $_POST['login_pass'];
        }
        return $wynik;
}

function ListaPodstron() {
    require '../cfg.php';

    
    $query = "SELECT id, page_title FROM page_list";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_array($result)) {
        
        echo "<tr>
              <td>".$row['id']."</td>
              <td>".$row['page_title']."</td>
              <td><button class='btn-delete'><a href='?edit=". $row['id']."'>Edytuj</button></td>
              <td><button class='btn-delete'><a href='?delete=". $row['id']."'>Usuń</button></td>
              </tr>";
        
    }
}

function EdytujtPodstrone() {
    require '../cfg.php';
    if(isset($_GET['edit'])){
        $id_clear = $_GET['edit'];
        $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
        $result = mysqli_query($link, $query);
        foreach($result as $row){
            echo "<form method='post'>
                 tytuł strony<br>
                 <input type='text' name='page_title' id='page_title' value=".$row['page_title'].">
                 <br>
                 zawartość strony<br>
                 <textarea type='text' name='page_content' id='page_content'>".$row['page_content']."</textarea>
                 <br><br><button class='btn-edit' type='submit' name='save'>zapisz</button>
                 </form>";
            if ($_SERVER['REQUEST_METHOD']==='POST'){
                $page_title=$_POST['page_title'];
                $page_content=$_POST['page_content'];
                $query="UPDATE page_list SET page_title='$page_title', page_content='$page_content' WHERE id='$id_clear'"; 
                mysqli_query($link, $query);
                echo "<script>window.location.href='../admin/admin.php'</script>";
    
            }
    
        }
    }
   
        
}

function DodajNowaPodstrone() {
    require '../cfg.php';
    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $content = mysqli_real_escape_string($link, $_POST['content']);
        $active = mysqli_real_escape_string($link, $_POST['active']);
        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$title', '$content', '$active')";
        mysqli_query($link, $query);
    }   
    echo '
    <form method="POST" action="admin.php?action=addnewsubpage">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea>
        <label for="active">Active:</label>
        <input type="checkbox" name="active" id="active" value="1">
        <input type="submit" name="submit" value="Dodaj podstronę">
    </form>
    ';
}

function UsunPodstrone() {
    require '../cfg.php';
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM page_list WHERE id='$id' LIMIT 1";
        $result = mysqli_query($link, $query);
        echo "<script>window.location.href='../admin/admin.php'</script>";
    }
   
}


echo"<table>";
echo ListaPodstron();
echo"</table>";
echo DodajNowaPodstrone();
echo EdytujtPodstrone();
echo UsunPodstrone();


?>


