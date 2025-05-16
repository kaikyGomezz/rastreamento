<?php
include("../conexao.php");

// Função para buscar latitude e longitude com base no endereço
function buscarCoordenadas($endereco) {
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($endereco);

    $context = stream_context_create([
        'http' => [
            'header' => "User-Agent: sistema-caminhoes"
        ]
    ]);

    $resposta = file_get_contents($url, false, $context);
    $dados = json_decode($resposta, true);

    if (!empty($dados) && isset($dados[0]['lat']) && isset($dados[0]['lon'])) {
        return [
            'latitude' => $dados[0]['lat'],
            'longitude' => $dados[0]['lon']
        ];
    } else {
        return null;
    }
}

// Coletar os dados do formulário
$placa_cavalo = $_POST['placa_cavalo'];
$placa_carreta = $_POST['placa_carreta'];
$status = $_POST['status'];
$localizacao = $_POST['localizacao'];
$destino = $_POST['destino'];

// Buscar coordenadas a partir do destino digitado
$coordenadas = buscarCoordenadas($destino);

if ($coordenadas) {
    $latitude = $coordenadas['latitude'];
    $longitude = $coordenadas['longitude'];

    // Inserir no banco de dados
    $sql = "INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude)
            VALUES ('$placa_cavalo', '$placa_carreta', '$status', '$localizacao', '$destino', $latitude, $longitude)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Check-in enviado com sucesso!'); window.location.href='checkin.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }

} else {
    echo "<script>alert('Não foi possível encontrar a localização do destino informado. Verifique o endereço.'); window.history.back();</script>";
}

$conn->close();
?>
