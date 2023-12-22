<?php

$connect = mysqli_connect(
    'mysql-service',# MySQL service name
    'php_docker',  # MySQL username
    'password',    # MySQL password
    'php_docker'   # MySQL database name
);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$table_name = "php_docker_table";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connect, $query);

if (!$response) {
    die("Query failed: " . mysqli_error($connect));
}

echo "<strong>$table_name: </strong>";
while ($row = mysqli_fetch_assoc($response)) {
    echo "<p>".$row['title']."</p>";
    echo "<p>".$row['body']."</p>";
    echo "<p>".$row['date_created']."</p>";
    echo "<hr>";
}

mysqli_close($connect);
?>
