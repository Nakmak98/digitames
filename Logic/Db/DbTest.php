<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 10.11.2018
 * Time: 16:45
 */

include "Db.php";
use PHPUnit\Framework\TestCase;

class DbTest extends TestCase
{

    public function test_constuct()
    {
        $db = new Db();
        self::assertEquals("gamesite", $db->db);
    }
}
