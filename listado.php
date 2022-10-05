<?php
// PHP Data Objects(PDO) Connection:
try {
    $conn = new PDO("sqlsrv:server = tcp:wqmsiasa.database.windows.net,1433; Database = wqms-iasadb", "wqmsiasa", "CalidadAgua2022");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$sql = "SELECT TOP (5) * FROM dbo.iotwqmstable ORDER BY received_at DESC"; //Seleccion ultimo valor
//$sql = "SELECT Temperatura, Turbidez, device_id, received_at FROM dbo.iotwqmstable ORDER BY received_at"; // Seleccion todos los valores
foreach ($conn->query($sql) as $row) {
    echo $row["Temperatura"]."|".$row["Turbidez"]."|".$row["device_id"]."|".$row["received_at"]. ",";
}
?>
