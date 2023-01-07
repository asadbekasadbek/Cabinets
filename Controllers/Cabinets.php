<?php

namespace Controllers;

use PDO;

class Cabinets
{
    public function freeCabinets($connect)
    {
        $sql1 = "SELECT * FROM `free_cabinets`";
        $result = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION['free_cabinets'] = $result;
        }else{
            $_SESSION['free_cabinets']=[];
        }

    }

    public function reservedCabinets($connect)
    {
        $sql1 = "SELECT * FROM `reserved_сabinets`";
        $result = $connect->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION['reserved_сabinets'] = $result;
        }else{
            $_SESSION['reserved_сabinets']=[];
        }

    }
}