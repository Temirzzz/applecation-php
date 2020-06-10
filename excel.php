<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');
require_once('core/config.php');
require_once('core/functions.php');
$conn = connect();

$output = '';
if (isset($_POST["export_ecxel"])) {
    $sql = "SELECT * FROM messages ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
            <tr>
                <th>Id</th>
                <th>Lastname</th>
                <th>Name</th>
                <th>Patronymic</th>
                <th>Date</th>
                <th>Time</th>
                <th>Contact info</th>
            </tr>
        ';
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["lastname"].'</td>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["patronymic"].'</td>
                    <td>'.$row["date"].'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["contactinfo"].'</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls; charset=utf-8");
        header("Content-Disposition: attachment; filename=download.xls");
        echo "$output";
    }
}
close ($conn);
?>