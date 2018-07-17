<?php
	//получаем имя кнопки
	$name = $_POST['data'];
	//переменные для подключения к БД
	$host = 'localhost';
	$database = 'phonebdsik';
	$username = 'root';
	$password = '';
	//подключаемся к серверу
	$link = mysql_connect($host, $username, $password) or die ('Ошибка ' . mysql_error());
	//подключаемся к БД
	mysql_select_db($database, $link) or die ("Ошибка ". mysql_error());

	//конструкцией switch .. case проверяем какая кнопка была нажатая
	switch ($name) {
		case 'Apple': {
			//выбираем телефоны Apple
			$res = mysql_query("SELECT name FROM catalog_device WHERE catalog_device.brendID = 1");
			while ($row = mysql_fetch_assoc($res)) {
				$phones['name'][] = $row['name'];
			}
			$message = 'Все хорошо';
			break;
		};
		case 'Samsung': {
			//выбираем телефоны Samsung
			$res = mysql_query("SELECT name FROM catalog_device WHERE catalog_device.brendID = 6");
			while ($row = mysql_fetch_assoc($res)) {
				$phones['name'][] = $row['name'];
			}
			$message = 'Все хорошо';
			break;
		};
		case 'Lenovo': {
			//выбираем телефоны Lenovo
			$res = mysql_query("SELECT name FROM catalog_device WHERE catalog_device.brendID = 12");
			while ($row = mysql_fetch_assoc($res)) {
				$phones['name'][] = $row['name'];
			}
			$message = 'Все хорошо';
			break;
		};
		case 'HTC': {
			//выбираем телефоны HTC
			$res = mysql_query("SELECT name FROM catalog_device WHERE catalog_device.brendID = 8");
			while ($row = mysql_fetch_assoc($res)) {
				$phones['name'][] = $row['name'];
			}
			$message = 'Все хорошо';
			break;
		};
		case 'LG': {
			//выбираем телефоны LG
			$res = mysql_query("SELECT name FROM catalog_device WHERE catalog_device.brendID = 9");
			while ($row = mysql_fetch_assoc($res)) {
				$phones['name'][] = $row['name'];
			}
			$message = 'Все хорошо';
			break;
		};
		default:
			$message = 'Не удалось извлечь данные из базы';
	}
	//инициализируем массив для отправки данных полученные из БД
	$out = array (
		"message" => $message,
		"phones" => $phones
	);

	header('Content-Type: text/json; charset=utf-8');

	echo json_encode($out);
?>