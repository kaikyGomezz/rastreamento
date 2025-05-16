<?php
$mysqli = new mysqli(
  'switchyard.proxy.rlwy.net',
  'root',
  'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES',
  'railway',
 40399
);

if ($mysqli->connect_error) {
  die('Erro na conexão: ' . $mysqli->connect_error);
}
?>
