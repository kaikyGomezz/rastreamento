<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include '../conexao.php';

    function getCoordinates($location) {
        $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($location);
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: rastreamentoApp/1.0\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);
        if (!empty($data)) {
            return [$data[0]['lat'], $data[0]['lon']];
        }
        return [null, null];
    }

    $placa_cavalo = $_POST['placa_cavalo'];
    $placa_carreta = $_POST['placa_carreta'];
    $status = $_POST['status'];
    $localizacao = $_POST['localizacao'];
    $destino = $_POST['destino'];

    // Coletar coordenadas
    list($latitude, $longitude) = getCoordinates($localizacao);
    list($destino_lat, $destino_lon) = getCoordinates($destino);

    $stmt = $mysqli->prepare("INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude, destino_lat, destino_lon) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $placa_cavalo, $placa_carreta, $status, $localizacao, $destino, $latitude, $longitude, $destino_lat, $destino_lon);

    if ($stmt->execute()) {
        header("Location: checkin.php?success=1");
        exit();
    } else {
        echo "Erro ao salvar os dados.";
    }

    $stmt->close();
    $mysqli->close();
}
?>
