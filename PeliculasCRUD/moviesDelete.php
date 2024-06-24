<?php

include('../db.php');




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM movies WHERE id_movie=$id";



    if ($conn->query($sql) === TRUE) {
        header("Location: moviesAdmin.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

