<?php
ini_set("display_errors", 1);
error_reporting(E_ALL | E_STRICT | E_DEPRECATED);

// $tel="7982538576";
$tel = file_get_contents('php://input');

function validate_russian_phone_number($tel)
{
    $tel = trim((string)$tel);
    if (!$tel) return false;
    $tel = preg_replace('#[^0-9+]+#uis', '', $tel);
    if (!preg_match('#^(?:\\+?7|8|)(.*?)$#uis', $tel, $m)) return false;
    $tel = '+7' . preg_replace('#[^0-9]+#uis', '', $m[1]);
    if (!preg_match('#^\\+7[0-9]{10}$#uis', $tel, $m)) return false;
    return $tel;
}

if (validate_russian_phone_number($tel)!=False) echo validate_russian_phone_number($tel); else echo "";

?>