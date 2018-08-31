<?php

namespace app\model;


use app\model\M_MSQL;



class M_Level
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

	
    public function ByLevel($level_id){
        return M_MSQL::Instance()->SelectRow("SELECT * FROM `level` WHERE `level_id` = '$level_id'");
    }




}