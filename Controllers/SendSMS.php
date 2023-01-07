<?php

namespace Controllers;

use Models\ConnectDB;
use PDO;

class SendSMS
{
    //authorization: Bearer токен устарел  нужно новы чтобы отправить смс
    public static function sendSms(){

        $curl = curl_init();
        $telephone='';
        $body='';
        foreach ($_SESSION['user'] as $value) {

            $telephone=$value['telephone'];
        }
        $telephone =preg_replace('/[^0-9]/', '', $telephone);

        $connect = new ConnectDB();
        $connect = $connect->connectDB();
        $cabinet_id = $_POST['cabinet_id'];
        $sql1 = "SELECT * FROM free_cabinets WHERE id='$cabinet_id'   LIMIT 1";
        $result = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $value) {
            $body ='номер кабинета--'. $value['number_cabinet']."--начало бронирования Кабинета--".$value['start_booking_cabinet'];
            $body.=" --конец бронирования Кабинета--".$value['end_cabinet_booking'];

        }


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connect.routee.net/sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"body\": \"$body\",\"to\" : \"$telephone\",\"from\":+998993870844 \"amdTelecom\"}",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer 12dc9fe4-7df4-4786-8d7a-a46d307687f4",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $_SESSION['sms_success'] = 'вы успешно забронировали Кабинет';
        } else {
            $_SESSION['sms_error'] = "Извините мы не могли отправить SMS ваш токен устарел";
            header('Location: /profile');
        }
    }

}


