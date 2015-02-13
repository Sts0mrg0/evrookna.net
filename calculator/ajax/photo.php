<?php
	
	/*if($_POST["photo"]) {

		$name = "screens/".time().'.png'; // Генерируем имя файла

		file_put_contents($name, base64_decode( $_POST["photo"] )); // Создаем файл и раскодируем наш код

		echo $name; // Выводим имя файла

	}*/
	
if($_POST["photo"]) {
	$data = $_POST["photo"];
	$name = md5($data).time();
	/*$name = generatePassword(30);*/
	$file = "screens/$name.png";
	if (!file_exists($file)) {
		$image = str_replace(" ", "+", $data);
		$image = substr($image, strpos($image, ","));
		file_put_contents($file, base64_decode($image));
	}
	/*echo '/calculator/ajax/'.$file;*/
	echo $name;
}
?>