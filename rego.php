<?php
session_start();
require_once("class_m.php");

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);


extract($data, EXTR_OVERWRITE);


$ses="";
$emailo="d44.a1@yandex.ru";

$email=strtolower($email);
$message_plain_text="";
$message_html="";

// Тема письма
$form_subject = "Сообщение от ".$name;

// От кого
$project_name = "max.semv@gmail.com";
$from_name = "Юридический офис Ваш юрист";

$messo="Текст сообщения:".$text."<br>Имя:".$name."<br>email:".$email."<br>Телефон:".$tel."<br>Субъект:".$sub;

$paramos=compact('ses', 'messo', 'form_subject', 'project_name', 'emailo', 'from_name');

// echo "<br>paramos";
// var_dump($paramos);

$senos = send_emailo($paramos);
echo $senos;

?>