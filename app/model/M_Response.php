<?php

namespace app\model;


use app\model\M_MSQL;



class M_Response
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

	
    public function ByCardId($card_id, $user_id){

        return M_MSQL::Instance()->SelectRow("SELECT * FROM `response` WHERE `card_id` = $card_id && `user_id` = $user_id ORDER BY `level_id` DESC LIMIT 1");
    }
	



}