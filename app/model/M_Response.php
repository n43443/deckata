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

        return M_MSQL::Instance()->SelectRow("SELECT * FROM `response` WHERE `card_id` = $card_id && `user_id` = $user_id ORDER BY `response_id` DESC LIMIT 1");
    }


    public function Add($card_id, $response_result, $level_id, $user_id){

        $time = time();

        return M_MSQL::Instance()->Insert("INSERT INTO `response` SET `card_id` = '$card_id', `response_result` = '$response_result', `level_id` = '$level_id', `user_id` = '$user_id', `response_date` = $time");
    }


    public function getLevelFail($card_id, $user_id){

        $response = M_MSQL::Instance()->SelectRow("SELECT * FROM `response` WHERE `card_id` = $card_id && `user_id` = $user_id && `response_result` = '0'  ORDER BY `level_id` DESC LIMIT 1");

        if($response){

            $response1 = M_MSQL::Instance()->SelectRow("SELECT * FROM `response` WHERE `response_id` < '$response[response_id]' && `card_id` = $card_id && `user_id` = $user_id && `response_result` = '1'  ORDER BY `level_id` DESC LIMIT 1");

            return $response1['level_id'];
        } else {

            return '1';
        }



    }


    /*
     * Получить уровень для карточки
     */

    public function getLevel($card_id, $user_id){

        $response = M_MSQL::Instance()->SelectRow("SELECT * FROM `response` WHERE `card_id` = $card_id && `user_id` = $user_id ORDER BY `response_id` DESC LIMIT 1");

        if($response == FALSE) {

            $response['level_id'] = '1';
        }

        return $response['level_id'];
    }




}