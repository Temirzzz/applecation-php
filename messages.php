<?php
require_once('core/config.php');
require_once('core/functions.php');
require_once('template/message_header.php');
$conn = connect();
messages($conn);
sendMail ($conn);
?>

<div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-10 col-sm-12">
        <h1 class="text-center mt-3">Форма обратной связи</h1>
        <div class="chieps-field"></div>
        <form method="POST" class="mt-5">
            <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" class="form-control input-lastname" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control input-name" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="patronymic">Отчество</label>
                <input type="text" class="form-control input-patronymic" id="patronymic" name="patronymic">
            </div>
            <div class="form-group">
                <label for="date">Желаемая дата показа</label>
                <input type="date" class="form-control" id="date" name="mydate">
            </div>
            <div class="form-group">
                <label for="time">Желаемое время показа</label>
                <input type="time" class="form-control" id="time" name="time">
            </div>
            <div class="form-group">
                <label for="contactInfo">Контактная информация</label>
                <textarea type="text" class="form-control" id="contactinfo" name="contactinfo"></textarea>
            </div>
            <button type="submit" class="form-submit-btn btn btn-sm btn-primary">Submit</button>   
        </form>
        </div>
    </div>
</div>

<?
close ($conn);
require_once('template/footer.php'); 
?>