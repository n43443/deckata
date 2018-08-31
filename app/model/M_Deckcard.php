<?php

namespace app\model;


use app\model\M_MSQL;



class M_Deckcard
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


    public function Add($deck_id, $card_id){

        return M_MSQL::Instance()->Insert("INSERT INTO `deckcard` SET `deck_id` = '$deck_id',  `card_id` = '$card_id'");
    }


    public function ByDeck($deck_id){

        return M_MSQL::Instance()->SelectRows("SELECT * FROM `deckcard` WHERE `deck_id` = $deck_id");
    }


    public function Remove($card_id){
        return M_MSQL::Instance()->Delete("DELETE FROM `deckcard` WHERE `card_id` = '$card_id'");
    }


    public function AllDefects($user_id){
        return M_MSQL::Instance()->SelectRows("SELECT * FROM `deckcard` WHERE `user_id` = $user_id, `deskcard_mark` = '1'");
    }
}