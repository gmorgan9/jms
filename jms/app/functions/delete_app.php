<?php

// DELETE
if(isset($_GET['appid'])) {
    $id = $_GET['appid'];

    $sql = "DELETE FROM applications WHERE appid=$id";
    $result = mysqli_query($conn, $sql);
}
// END DELETE

?>