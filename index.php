<html>
<header><title>This is title</title>
    <link rel="stylesheet" href="styles/styles.css"></header>
<body>
Welcome <br>

<?php
$servername = "localhost";
$username = "root";
$password = "yoyo";
$dbname = "userSystem";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" ." name:".  $row["navn"]." email:".$row["email"]." id:".$row['id'];
    }
} else {
    echo "0 results";
}
echo "<br>";


// SELECT navn,rolle FROM users,userRoles,roles WHERE users.id=userRoles.id AND roles.id=userRoles.roleID
$sql = "SELECT navn,rolle FROM users,userRoles,roles WHERE users.id=userRoles.id AND roles.id=userRoles.roleID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" ." name:".  $row["navn"]." rolle:".$row["rolle"];
    }
} else {
    echo "0 results";
}
//$conn->close();
?>

<h1>Data vises i tabel</h1>
<table>

    <tr>

        <td>
            Navn
        </td>
        <td>
            Email
        </td>
    </tr>

    <?php
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row["navn"];
            echo "</td>";
            echo "<td>";
            echo $row["email"];
            echo "</td>";
            echo "</tr>";

        }
    } else {
        echo "0 results";
    }
    echo "<br>";
    $conn->close();
?>

</table>

<form action="index.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
</form>

</body>
</html>
