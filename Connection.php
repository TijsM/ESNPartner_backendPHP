<?php
    class DB {

        public function testConnection(){
            echo 'in test connection';
        }

        public function connect() {
            $server = 'localhost';
            $db = 'esn_partner';
            $user = 'root';
            $pwd = '';

            // 'mysql:host=localhost;dbname=keatest;charset=utf8';
            $DSN = 'mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8';
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $connections_to_db = new PDO($DSN, $user, $pwd, $options); 
            } catch (PDOException $e) {
                echo 'Connection unsuccessful';
                die('Connection unsuccessful: ' . $connections_to_db->connect_error());
                exit();
            }
            
            return($connections_to_db);   
        }

        /**
         * Closes a connection to the database
         * 
         * @param the connection object to disconnect
         */
        public function disconnect($conobj) {
            $conobj = null;
        }
    }
