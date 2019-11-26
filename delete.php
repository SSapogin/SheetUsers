<?php
require 'config.php';

$id = $_GET['id'];
$sql = 'DELETE FROM `user` WHERE `id` = ?';
$query = $connect->prepare($sql);
$query->execute([$id]);

header('Location: /');

?>
