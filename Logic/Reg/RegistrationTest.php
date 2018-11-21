<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 19.11.2018
 * Time: 0:41
 */

include "../Db/Db.php";
include "Registration.php";
use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    public $post = [
        'new_email' => 'test@testemail',
        'new_password' =>'test',
        'age' => 18,
        'region' => 'eu',
        ];

    public function testInsert_user_data()
    {
        $db = new Db();
        $reg = new Registration($db->conn, $this->post);
        $region = $this->post['region'];
        $result = $reg->insert_user_data();
        self::assertEquals(True, $result);
    }

    public function testSign_up()
    {
        $db = new Db();
        $reg = new Registration($db->conn, $this->post);
        $reg->sign_up();
        $sql = "SELECT password FROM users where email='$reg->email'";
        $result=$db->getQuery($sql);
        self::assertEquals(True,
            password_verify ($this->post['new_password'] , $result['password']) );
    }

}
