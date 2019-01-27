<?php
/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 23.01.2019
 * Time: 4:21
 */

namespace Logic\Db\tests;
require_once "../Manager.php";
use Logic\Manager;
use PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase {
    public $preparedQuery;
    public $simpleQuery;
    public $manager;
    public $columnNumber;
    public $parameter;
    public $parameters;


    protected function setUp() {
        $this->manager = new Manager();
        $this->preparedQuery = "SELECT * FROM gamesite.user_data WHERE id = ?";
        $this->simpleQuery = "SELECT * FROM gamesite.user_data";
        $this->parameter = 1;
        $this->parameters[] = "i";
        $this->parameters[] = &$this->parameter;
        $this->columnNumber = 6;
    }

    public function testGetMultipleAssocResult() {
        $result = $this->manager->getMultipleAssocResult($this->simpleQuery);
        self::assertArrayHasKey(0, $result);
    }

    public function testGetMultipleAssocResultReturnMoreThanOneElement() {
        $result = $this->manager->getMultipleAssocResult($this->simpleQuery);
        self::assertGreaterThan(1, $result);
    }

    public function testGetResult() {
        $result = $this->manager->getResult($this->simpleQuery);
        self::assertNotFalse($result);
    }

    public function testGetAssocResult() {
        $result = $this->manager->getAssocResult($this->simpleQuery);
        self::assertArrayHasKey('nickname', $result);
    }

    public function testGetAssocResultReturnOnlyOneElement() {
        $result = $this->manager->getAssocResult($this->simpleQuery);
        self::assertCount($this->columnNumber, $result);
    }

    public function testGetPreparedAssocResultReturnOnlyOneElement() {
        $result = $this->manager->getPreparedAssocResult($this->preparedQuery, $this->parameters);
        self::assertCount($this->columnNumber, $result);
    }

    public function testGetPreparedAssocResult() {
        $result = $this->manager->getPreparedAssocResult($this->preparedQuery, $this->parameters);
        self::assertArrayHasKey('nickname', $result);
    }


    public function testGetPreparedMultipleAssocResult() {
        $result = $this->manager->getPreparedMultipleAssocResult($this->preparedQuery, $this->parameters);
        self::assertNotFalse($result);
    }

    public function testGetPreparedMultipleAssocResultReturnMoreThanOneElement() {
        $result = $this->manager->getPreparedMultipleAssocResult($this->preparedQuery, $this->parameters);
        self::assertNotFalse($result);
    }

    public function testGetPreparedResult() {
        $result = $this->manager->getPreparedResult($this->preparedQuery, $this->parameters);
        self::assertNotFalse($result);
    }
}
