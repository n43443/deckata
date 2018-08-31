<?php

namespace app\model;


use app\model\M_MSQL;



class M_Deck
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
	public function ByUserId($user_id){
		
		return M_MSQL::Instance()->SelectRows("SELECT * FROM `decks` WHERE `user_id` = '$user_id'");
	}


    /*
     * Создать новую колоду
     */
    public function add($deck_title, $user_id){
        return M_MSQL::Instance()->Insert("INSERT INTO `decks` set `deck_title` = '$deck_title', `user_id` = '$user_id'");
    }

}