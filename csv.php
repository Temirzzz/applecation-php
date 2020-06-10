<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');
require_once('core/config.php');
require_once('core/functions.php');
$conn = connect();



if (isset($_POST["export_csv"])) {
  
    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=download.csv");
    $out = fopen("php://output", "w");
    fputcsv($out, array('id', 'lastname', 'name', 'patronymic', 'date', 'time', 'contactinfo'));
    $sql = "SELECT * FROM messages ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($out, $row);
    }
    fclose($out);  
}
close ($conn);
?>