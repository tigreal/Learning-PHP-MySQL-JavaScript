<?php

require_once "login.php";
try {
    $pdo= new PDO($attr, $user,$pass,$opt);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(),(int)$e->getCode());
}

$query="describe cats";
$result = $pdo->query($query);

echo "<table><tr><th>Columnas</th><th>Type</th><th>Null</th><th></th>Key</th><th>Default</th><th>Extra</th></tr>";
while ($row = $result->fetch(PDO::FETCH_NUM)) {
    echo "<tr>";
    for($k=0;$k<4;$k++){
        echo "<td>". htmlspecialchars($row[$k])."</td>";


    }
    echo "<tr>";

}
echo "</table>";

?>