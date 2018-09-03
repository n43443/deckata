<?php

namespace app\model;

//
// Помощник работы с БД.
//
class M_MSQL{

    private static $instance;       // Объекта класса для паттерна Singleton

    private $host = 'localhost';    // Адрес хоста БД
    private $uresname = 'root';     // Имя пользователя БД
    private $password = '';         // Пароль пользователя БД
    private $dbname = 'deckata';    // Название БД

    private $db_connect;



    //
    // Паттерн Singleton
    //
    public static function Instance()
    {

        // Объект класса не создан
        if(self::$instance == NULL)
        {
            // Создаем объект класса
            self::$instance = new M_MSQL();
        }

        // Возвращаем объект класса
        return self::$instance;

    }




    //
    //  Подключение к БД.
    //
    public function __construct()
    {

        //  Подключение к БД
        $this->db_connect = mysqli_connect($this->host, $this->uresname, $this->password, $this->dbname);

    }





    //
    //  Запрос SQL выборки, единиченой записи
    //
    public function SelectRow($sql)
    {


    	//echo $sql; echo '<br>';

        // Получение резултата БД
        $query = mysqli_query($this->db_connect, $sql);

		
		// Если в массиве нет записей
		if(mysqli_num_rows($query) == 0){
			
			// Возвращаем ложь
			return FALSE;
		}
		
		// Если в массиве больше одной записи
		if(mysqli_num_rows($query) > 1){
			
			// Возвращаем ложь
			return FALSE;
		}
		
		
        // Получение данных таблицы
        $row = mysqli_fetch_assoc($query);

        // Возвращение данных таблицы
        return $row;
    }

	
	


    //
    //  Запрос SQL выборки, множественных записей
    //
    public function SelectRows($sql)
    {

    	//echo $sql;

        // Получение результата БД
        $query = mysqli_query($this->db_connect, $sql);


        // Создаем массив
        $rows = [];


		// Если в массиве нет записей
		if(mysqli_num_rows($query) == 0){
			
			// Возвращаем ложь
			return FALSE;
		}
		
		
        // Получение данных таблицы
        while($row = mysqli_fetch_assoc($query))
        {

            // Создание массива данных
            $rows[] = $row;
        }


        // Возвращение массива данных тиблцы
        return $rows;
    }
	
	
	
	
	
	//
	// Запрос SQL добавления записей
	//
	public function Insert($sql)
	{

		 //echo "<br />$sql <br />";

        //$sql = mysqli_real_escape_string($this->db_connect, $sql);
		
		// Выполнение SQL запроса
		mysqli_query($this->db_connect, $sql);
		
		// Возвращает идентификатор обнавленной строки
		return mysqli_insert_id($this->db_connect);
	}
	
	
	
	
	
	//
	// Запрос SQL обнолвения записей
	//
	public function Update($sql)
	{

		// Выполнение SQL запроса
		mysqli_query($this->db_connect, $sql);
		
		// Возвращает число обновленных строк
		return mysqli_affected_rows($this->db_connect);
	}
	
	
	
	
	
	//
	// Запрос SQL удаление записей
	//
	public function Delete($sql){

		//echo $sql;
		
		// Выполнение SQL запроса
		mysqli_query($this->db_connect, $sql);
		
		// Возвращает число удаленных строк
		return mysqli_affected_rows($this->db_connect);
	}
}
