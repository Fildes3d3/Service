<?php
error_reporting (E_ALL);
$conn = mysqli_connect ("localhost","test","test", "phpmysqlservice");	
if (!$conn) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
    echo "Valoarea errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Succes: Conexiunea la MySQL a fost stabilită!" . PHP_EOL;
echo "Informație despre host: " . mysqli_get_host_info($conn) . PHP_EOL;


?>
