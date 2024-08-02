<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['login_id']))
	    header('location:login.php');
?>

    <section class="content">
      <?php $page = isset($_GET['page']) ? $_GET['page']:'home' ?>
         <?php 
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';
            }
          ?>
</body>
</html>
