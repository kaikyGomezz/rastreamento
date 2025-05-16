<?php
$mysqli = new mysqli(
  'switchyard.proxy.rlwy.net', // host
  'root',                     // usuário
  'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', // senha
  'railway',                 // banco
  40399                     // porta
);

if ($mysqli->connect_error) {
  die('Erro de conexão: ' . $mysqli->connect_error);
}
?>
