<?php

function send_emailo($params)
{
extract($params, EXTR_OVERWRITE);	
	
$message_plain_text="";
$message_html="";

// echo "<br>ses_id=".$ses_id." ses=".$ses;

$plain_text = "";
$table = "";

// HTML письма
$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>' . $form_subject . '</title>
</head>
<body>';


$table .= '<tr style="background-color: #f8f8f8;">
            <td style="padding: 10px; border: #e9e9e9 1px solid;">' . $messo . '</td>
        </tr>';

// text/plain
$plain_text .= $ses . ": " . $messo . "\r\n";
		
		

$html .= '<table width="100%">
        <tr style="text-align: center;">
            <td style="padding: 0 10px; width: 100%; border: #e9e9e9 1px solid;" colspan="2">
                <h2>' . $form_subject . '</h2>
            </td>
        </tr>
        ' . $table . '
    </table>
</body>
</html>';

$boundary = "--" . md5(uniqid(time())); // генерируем разделитель

$headers = array(
    "MIME-Version" => "1.0",
    "Date" => date("r (T)"),
    "From" => $from_name." <" . $project_name . ">",
    "Reply-To" => $project_name,
    "X-Mailer" => "PHP/" . phpversion(),
    "Content-Type" => 'multipart/alternative; boundary="' . $boundary . '"',
);

// Текстовая версия письма
$message_plain_text .= "--$boundary" . "\n";

$message_plain_text .= "Content-Type: text/plain; charset=utf-8" . "\n";
$message_plain_text .= "Content-Transfer-Encoding: 8bit" . "\n\n";
$message_plain_text .= $form_subject . "\r\n" . $plain_text . "\n";

// HTML-версия письма
$message_html .= "--$boundary" . "\n";

$message_html .= "Content-Type: text/html; charset=utf-8" . "\n";
$message_html .= "Content-Transfer-Encoding: 8bit" . "\n\n";
$message_html .= $html . "\n";

$multipart_alternative = $message_plain_text . $message_html . "--$boundary--" . "\n";


// echo "<br>emailo=".$emailo." adopt=".adopt($form_subject)." multipart_alternative=".$multipart_alternative." project_name=".$project_name." table=".$table." headers=";
// var_dump($headers);


// exit();

if (!mail($emailo, adopt($form_subject), $multipart_alternative, $headers, "-f " . $project_name)) {
    $error = error_get_last();
    print_r($error["message"]);
	return $error["message"];
}	
else return "OK";	
	
}



function adopt($text)
{
    return "=?UTF-8?B?" . Base64_encode($text) . "?=";
}



?>