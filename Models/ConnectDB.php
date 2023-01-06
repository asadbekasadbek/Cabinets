<?php

namespace Models;

use PDO;
use PDOException;

error_reporting(E_ALL);
date_default_timezone_set('Asia/Tashkent');

class ConnectDB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";

    /**
     * @param string $servername
     * @param string $username
     * @param string $password
     */
    public function __construct(string $servername= "localhost", string $username= "root", string $password= "root")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function connectDB()
    {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=cabinets", $username, $password);
            // установить режим ошибки PDO в исключение
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}