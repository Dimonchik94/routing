<?php

namespace System;

use DB\DB;

class Model {

    protected $connection;

    function __construct(){
        $this->connection = DB::instance();
    }

}