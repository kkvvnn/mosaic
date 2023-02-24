<?php

$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$text = $_REQUEST['text'];
$count = $_REQUEST['count'];
$title = $_REQUEST['title'];

$vendor_code = $_REQUEST['vendor_code'];
$img_url = $_REQUEST['img_url'];
$price = $_REQUEST['price'];
$current_date = date("Y-m-d H:i:s");


$msg = "Новая заявка на сайте! $current_date \n $title \n Имя: $name \n Телефон: $phone \n Артикул: $vendor_code \n Количество: $count \n Цена: $price р. \n Текст: $text \n";

// $token = '6288254612:AAEn_lvb60hiAGqBK3TZPaSeruQNeBMgl1M';
// $telegram_admin_id = '1141469797';

// file_get_contents('https://api.telegram.org/bot'. $token .'/sendMessage?chat_id='. $telegram_admin_id .'&text=' . urlencode($msg));


$token = '6288254612:AAEn_lvb60hiAGqBK3TZPaSeruQNeBMgl1M';

$arrayQuery = array(
    // 'chat_id' => 1141469797,
    'chat_id' => -842047189,
    'caption' => $msg,
    'photo' => curl_file_create($img_url)
);		
$ch = curl_init('https://api.telegram.org/bot'. $token .'/sendPhoto');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

header("Location: /index.php");
exit;