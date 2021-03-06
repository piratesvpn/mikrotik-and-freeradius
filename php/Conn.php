<?php

    require_once 'config.php';

    class Conn{

        private static $instance;

        public static function getInstance(){

            if(!isset(self::$instance)){
                try {
                    self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='. DB_NAME,DB_USER,DB_PASS);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            return self::$instance;
        }

        public static function prepare($sql){
            try {
                return self::getInstance()->prepare($sql);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return null;
            }
        }
    }

?>
