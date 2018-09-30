<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 9/29/18
 * Time: 6:28 PM
 */

main::start();

class main {

    static public function start() {
        $records = csv::getRecords();
        $table = html::generateTable($records);
        system::printPage($table);
    }
}

class csv {

    static public function getRecords() {

        $records = 'test';
    return $records;
    }
}

class html {

    static public function generateTable($records) {

        $table = $records;

        return $table;
    }
}

class system {

    static public function printPage($page) {

        echo $page;
    }

}
