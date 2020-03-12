<?php

namespace DB;

use R;

// Если $instance пуст устанавливается соединение с базой

class DB {

        protected $sql_connection;
        protected static $instance;

        function __construct()
        {

            $this->sql_connection = R::setup(constant('DSN'), constant('DB_USER'), constant('DB_PASSWORD'));
            if (!R::testConnection()) {
                throw new Exception('Database connection problem');
            }

        }

        public static function instance()
        {
            if (self::$instance === null) {
                self::$instance = new self;
            }
            return self::$instance;
        }

    }
