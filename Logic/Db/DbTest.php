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

    public function test_GetQuery()
    {
        $db = new Db();
        $sql = "SELECT id FROM gamesite.game_project t WHERE proj_name='Game 5'";
        $result = $db->getQuery($sql);
        self::assertEquals(24, $result['id']);
    }

}
