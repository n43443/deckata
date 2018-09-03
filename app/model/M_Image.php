<?php

namespace app\model;


use app\model\M_MSQL;



class M_Image
{

    private static $instance;   // Объект класса для паттерна Singleton



    //
    // Паттерн Singleton
    //
    public static function Instance()
    {

        // Объект класса не создан
        if(self::$instance == NULL)
        {
            // Создает объект класса
            self::$instance = new self();
        }

        // Возвращение объект класса
        return self::$instance;

    }

	
    public function Add($title){

        $title = addslashes($title);

        $uploaded_date = time();
        return M_MSQL::Instance()->Insert("INSERT INTO `image` SET `image_title` = '$title' , `image_uploaded_date` = '$uploaded_date'");
    }

    public function List(){
        return M_MSQL::Instance()->SelectRows("SELECT * FROM `image` ORDER BY `image_id` DESC LIMIT 8");
    }


}