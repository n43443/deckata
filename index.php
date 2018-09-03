<?php



include_once 'auth.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);


// Автозагрузка классов
function __autoload($classname){

    // Меняем обратный слеш на прямой.
    $replace_classname = str_replace('\\','/',$classname);

    // Подключаем файла.
    require_once( __DIR__ . '/'.$replace_classname.'.php');
}


// Проверяем запрашивается какая-либо страница
if(isset($_GET['page'])){
	
	// Убираем все лишние символы из запроса
	$controller = preg_replace ("/^[^a-z]*$/", "", $_GET['page']);;
	
	// Переводим перавую букву в заглавную
	$controller = ucfirst($controller);
	
} else {
	
	// Если не одна страница не запрашивается, выводим страницу по умолчанию
	$controller = "Index";
}


// Добавляем к запросу контроллера пространство имени
$controller = "app\\controller\\C_" . $controller;

// Создаем объек контроллера и вызываем его метод
$controller = new $controller;
$controller->Request();




