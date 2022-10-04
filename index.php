<?php
// PHP Data Objects(PDO) Connection:
try {
    $conn = new PDO("sqlsrv:server = tcp:wqmsiasa.database.windows.net,1433; Database = wqms-iasadb", "wqmsiasa", "CalidadAgua2022");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("Connection Successful");
    echo("<br>");
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$sql = "SELECT TOP (1) * FROM dbo.iotwqmstable ORDER BY received_at DESC"; //Seleccion ultimo valor
//$sql = "SELECT Temperatura, Turbidez, device_id, received_at FROM dbo.iotwqmstable ORDER BY received_at"; // Seleccion todos los valores
foreach ($conn->query($sql) as $row) {
    echo "\n Temperatura: " . $row["Temperatura"]. " - Turbidez: " . $row["Turbidez"]. " - Dispositivo: " . $row["device_id"]. "- Fecha: ".$row["received_at"]. "<br>";
}
?>
