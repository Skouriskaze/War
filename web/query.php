<?php
$server = 'localhost';
$username = 'root';
$password = 'password';
$database = 'cardHistory';

$conn = mysqli_connect($server, $username, $password) or die("Connection Failed");
mysqli_select_db($conn, $database) or die("Database selection failed");

$search = $_REQUEST["search"];

$sql = "SELECT * FROM War WHERE player1 LIKE '$search'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Name1</th><th>Name2</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["player1"]."</td><td>".$row["player2"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);




?>
