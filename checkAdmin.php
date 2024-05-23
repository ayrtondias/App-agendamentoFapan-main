<?php
if($_SESSION['admin']==false) {
    header("location: menu.php");
}