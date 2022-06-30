<?php
require_once(ROOT_PATH . '/Controllers/CasteriaController.php');
$casteria = new CasteriaController();
$data = $_POST;
$casteria = $casteria->delete($data['data_delete']);


header("Location: ./contact.php");
?>
