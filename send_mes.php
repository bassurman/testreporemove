<?php

# Абсолютный путь
$path = dirname(__FILE__) . '/';

# Подключение конфигов
include_once $path . 'config.inc.php';

$prod = $_POST['prod'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$filename = $_POST['filename']; 
$count = $_POST['count']; 
$message = $_POST['message']; 
$delivery = $_POST['delivery']; 
$payment = $_POST['payment']; 
$colorA = $_POST['colorA']; 
$colorB = $_POST['colorB']; 
$side = $_POST['side'];





$name = addslashes($name);
$name = htmlspecialchars($name);
$name = stripslashes($name);
$name = trim($name);

$email = addslashes($email);
$email = htmlspecialchars($email);
$email = stripslashes($email);
$email = trim($email);

$phone = addslashes($phone);
$phone = htmlspecialchars($phone);
$phone = stripslashes($phone);
$phone = trim($phone);

$count = addslashes($count);
$count = htmlspecialchars($count);
$count = stripslashes($count);
$count = trim($count);


if (empty($message)){
$message='не указан';
}else{
$message = addslashes($message);
$message = htmlspecialchars($message);
$message = stripslashes($message);
$message = trim($message);
}

if(!$name || strlen($name)>25 || strlen($name)<3) {
echo "Неправильно заполнено поле \"Ваше имя\" (3-25 символов)!";
exit;
}

//Проверка email адреса
function isEmail($email){
return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
} 
			
if($email == ''){
echo "Пожалуйста, введите Ваш email!";
exit;
}else if(!isEmail($email)) {
echo "Вы ввели неправильный e-mail. Пожалуйста, исправьте его!";
exit;
}

//Проверка наличия введенного номера телефона
if (empty($phone)){
echo "Необходимо указать номер телефона!";
exit;
}

if (empty($count)){
$count='0';
}

$date = date("Y-m-d H:i:s");

sleep(2);

$path = dirname(__FILE__) . '/';

# Подключение к базе данных
include_once $path.'modules/db.inc.php';
$zakaz = "INSERT INTO zakaz ( date, product, name, email, phone, file, side, sidea, sideb, quantity, payment, delivery, message ) VALUES ('{$date}', '{$prod}', '{$name}', '{$email}', '{$phone}', '{$filename}', '{$side}', '{$colorA}', '{$colorB}', '{$count}', '{$payment}', '{$delivery}', '{$message}')";
@mysql_query($zakaz, $db) or die(mysql_errno($db) . ": " . mysql_error($db). "\n");

echo "Ваш заказ принят. В бижайшее время на указанный Вами номер перезвонит оператор!";

$title = "Новый заказ поступил на vipart.by";
$mess = "Новый заказ печать '".$prod."'. Для просмотра перейдите в <a href='http://vipart.by/admin/zakaz.php'>Админпанель</a>";
// функция отправляет письмо. 
mail($config['email'], $title, $mess, 'From: vipart.by'); 

?>