<?php
require_once('core/config.php');
require_once('core/functions.php');
require_once('template/header_admin.php');
$conn = connect();
$data = select($conn);
require_once('./check.php');
close ($conn);
?>

<h1 class="text-center mt-3 mb-5">Панель администратора</h1>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
                $out = '<table class="table table-striped text-center">';

                $out .= "<tr>
                <th>id</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Информация</th>
                </tr>";

                for ($i = 0; $i < count($data); $i++) {
                    $out .= "<tr>";
                    $out .= "<td class='id'>{$data[$i]['id']}</td>";
                    $out .= "<td>{$data[$i]['lastname']}</td>";
                    $out .= "<td>{$data[$i]['name']}</td>";
                    $out .= "<td>{$data[$i]['patronymic']}</td>";
                    $out .= "<td>{$data[$i]['date']}</td>";
                    $out .= "<td>{$data[$i]['time']}</td>";
                    $out .= "<td>{$data[$i]['contactinfo']}</td>";
                    $out .= "</tr>";  
                }
                $out .= '</table>';

                echo "$out";
            ?>
        </div>
        <form action="excel.php" method="POST">
            <input type="submit" name="export_ecxel" class="btn btn-success mb-2" value="Export to Exel">
        </form>
        <form action="csv.php" method="POST">
            <input type="submit" name="export_csv" class="btn btn-info" value="Export to CSV">
        </form>
    </div>
</div>