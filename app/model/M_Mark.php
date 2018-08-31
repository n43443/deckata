<?php

namespace app\model;


use app\model\M_MSQL;



class M_Mark
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

	
	/*
	 * Выбрать катетории по индентификатору пользователя
	 */
	public function All($user_id){
		
		return M_MSQL::Instance()->SelectRows("SELECT * FROM `mark` WHERE `user_id` = '$user_id'");
	}



    public function Add($card_id, $user_id){

        M_MSQL::Instance()->Insert("INSERT INTO `mark` SET `card_id` = '$card_id', `user_id` = '$user_id'");
    }


    public function Remove($card_id, $user_id){

        M_MSQL::Instance()->Delete("DELETE FROM `mark` WHERE `card_id` = '$card_id' && `user_id` = '$user_id'");
    }

}