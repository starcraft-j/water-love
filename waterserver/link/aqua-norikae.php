<?php
if($_GET['add']){
  $add = $_GET['add'];
}

$id = "https://h.accesstrade.net/sp/cc?rk=0100p33700bp82&add=".$add; 

header("Location:".$id);
