<?php
// Saya Ihsan Ghozi Zulfikar NIM 2103303 mengerjakan soal Latihan Praktikum 11
// dalam mata kuliah DPBO untuk keberkahanNya maka
// saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");

$tp = new TampilPasien();

if(isset($_POST['add'])){
    $tp->onFormAdd($_POST);
}else if(isset($_POST['edit'])){
    $tp->onFormEdit($_POST);
}else if(isset($_GET['add'])){
    $tp->showAddForm();
}else if(isset($_GET['edit'])){
    $tp->showEditForm($_GET['edit']);
}else if(isset($_GET['delete'])){
    $tp->onFormDelete($_GET['delete']);
}else{
    $tp->tampil();
}
