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

//    public function testInsert_user_data()
//    {
//
//    }

    public function testSign_up()
    {
        $db = new Db();
        $reg = new Registration($db, $this->post);
        $reg->sign_up();
        $sql = "SELECT password FROM users where email='$reg->email'";
        $result=$db->getQuery($sql);
        self::assertEquals($this->post['new_password'], $result['password']);
    }

    public function testEmail_exist()
    {
        $db = new Db();
        $reg = new Registration($db, $this->post);
        self::assertEquals(true,$reg->email_exist());
    }

    public function test__construct()
    {
        $db = new Db();
        $reg = new Registration($db, $this->post);
        self::assertEquals($reg->email,'test@testemail');
    }

    public function testGet_user_id()
    {
        $db = new Db();
        $reg = new Registration($db, $this->post);
        self::assertInternalType('string',$reg->get_user_id());
    }
}
