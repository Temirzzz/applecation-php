<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

function connect(){
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function select ($conn) {
    $offset = 0;
    $sql = "SELECT * FROM messages ORDER BY id DESC"; //обязательный отступ после OFFSET
   
    $result = mysqli_query($conn, $sql);
    $a = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    }
    return $a;
}


function messages ($conn) {
    if (isset($_POST['lastname']) AND $_POST['name'] AND $_POST['patronymic'] AND $_POST['mydate'] AND $_POST['time'] AND $_POST['contactinfo']) {
        $lastname = trim($_POST['lastname']);
        $name = trim($_POST['name']);
        $patronymic = trim($_POST['patronymic']);
        $mydate = $_POST['mydate'];
        $time = $_POST['time'];
        $contactinfo = trim($_POST['contactinfo']);
    
        

        $sql = "INSERT INTO messages (lastname, name, patronymic, date, time, contactinfo) VALUES ('$lastname', '$name', '$patronymic', '$mydate', '$time', '$contactinfo')";
        

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function sendMail ($conn) {
    if (isset($_POST['lastname']) AND $_POST['name'] AND $_POST['patronymic'] AND $_POST['mydate'] AND $_POST['time'] AND $_POST['contactinfo']) {
        $lastname = trim($_POST['lastname']);
        $name = trim($_POST['name']);
        $patronymic = trim($_POST['patronymic']);
        $mydate = $_POST['mydate'];
        $time = $_POST['time'];
        $contactinfo = trim($_POST['contactinfo']);

        $recepient = "temir1201@mail.ru";
        $sitename = "IFORA";

        $message = "Фамилия: $lastname \r\nИмя: $name \r\nОтчество: $patronymic \r\nДата: $mydate \r\nВремя: $time \r\nКонтактная информация: $contactinfo";
        var_dump($message);

        $pagetitle = "Новая заявка с сайта \"$sitename\"";

        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=\utf-8";

        mail($recepient, $pagetitle, $message, $headers);  
        header('Location: ./'); 
    }
}

function genHash ($length = 5) {
    $symbol = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
    $code = "";
    for ($i = 0; $i < $length; $i++) {
        $code .= $symbol[rand(0, strlen($symbol) -1)];
    }
    return $code;
}

function close ($conn) {
    mysqli_close($conn);
}