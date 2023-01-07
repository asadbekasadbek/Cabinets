<?php

namespace Controllers;

use Models\ConnectDB;
use PDO;

class SendMail
{
    public static function sendMail()
    {


        $to = '';
        $subject = '';
        $message = '';
        $headers = 'From:Tset@mail.ru\r\n';


        $number_cabinet='';
        $start_booking_cabinet="";
        $end_cabinet_booking="";
        $user_name='';
        $id='';

        foreach ($_SESSION['user'] as $value) {
            $to = $value['email'];
            $subject = 'вы забронировали Кабинет--' . $value['full_name'];
            $user_name =$value['full_name'];
        }
        $connect = new ConnectDB();
        $connect = $connect->connectDB();
        $cabinet_id = $_POST['cabinet_id'];
        $sql1 = "SELECT * FROM free_cabinets WHERE id='$cabinet_id'   LIMIT 1";
        $result = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION['free_cabinets_success'] = 'вы успешно забронировали Кабинет';
            foreach ($result as $value) {
                $message ='номер кабинета--'. $value['number_cabinet']."\nначало бронирования Кабинета--".$value['start_booking_cabinet'];
                $message.="\nконец бронирования Кабинета--".$value['end_cabinet_booking'];

                $number_cabinet=$value['number_cabinet'];
                $start_booking_cabinet=$value['start_booking_cabinet'];
                $end_cabinet_booking=$value['end_cabinet_booking'];
                $id=$value['id'];
            }
        } else {
            $_SESSION['ваш заказ принят, вы забронировали кабинет'] = "Извините мы не нашли ваш запрос кабинет";
            header('Location: /profile');
        }
         $mail=   mail($to,$subject,$message,$headers);
         if($mail){
              $sql2= "DELETE FROM free_cabinets WHERE id='$id'";
              $connect->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
              $sql3="INSERT INTO `reserved_сabinets` (`id`, `number_cabinet`, `start_booking_cabinet`, `end_cabinet_booking`, `user_name`) VALUES (NULL, '$number_cabinet', '$start_booking_cabinet', '$end_cabinet_booking', '$user_name');";
              $connect->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
         }
         header('Location: /profile');
    }
}