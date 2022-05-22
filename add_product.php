<?php
    include('connect.php');
    $name = $_POST['client_name'];
    $weight = $_POST['client_weight'];
    $height = $_POST['client_height'];
    $fat = $_POST['client_fat'];

    echo "Name: $name <br>";
    echo "Weight: $weight <br>";
    echo "Height: $height <br>";
    echo "Fat: $fat <br>";

    $query = "INSERT INTO clients (name, weight, height, fat) VALUES ('{$name}', {$weight}, {$height}, {$fat})";

    $result = mysqli_query($conn, $query);

    mysqli_close($conn);

    if($result){
        header('Location: ' . '/eder/');
    }
?>
    
