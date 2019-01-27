<?php

namespace Logic;
require_once 'Db/Db.php';

/**
 * Класс Manager - отвечает за запросы к базе данных.
 *
 * Предоставляяет методы для подготовленных и обычных запросов.
 * @package Logic
 */
class Manager {
    protected $dbconn;

    function __construct() {
        $this->dbconn = \Db::getConnection();
    }

    /**
     * Метод для подготовленного запроса одного элемента с множеством полей
     * @param $sql
     * @param $parameters
     * @return array|null
     */
    function getPreparedAssocResult($sql, $parameters) {
        $result = $this->getPreparedResult($sql,$parameters);
        return $result->fetch_assoc();
    }

    /**
     * Метод для подготовленного запроса многих элементов с множеством полей
     * @param $sql
     * @param $parameters
     * @return mixed
     */
    function getPreparedMultipleAssocResult($sql, $parameters) {
        $result = $this->getPreparedResult($sql,$parameters);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Метод для обычного запроса множества элементов с множеством полей
     * @param $sql
     * @return mixed
     */
    function getMultipleAssocResult($sql) {
        return $this->dbconn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Метод для обычного запроса одного элемента с множеством полей
     * @param $sql
     * @return array|null
     */
    function getAssocResult($sql) {
        return $this->dbconn->query($sql)->fetch_assoc();
    }

    /**
     * @param $sql
     * @return bool|\mysqli_result
     */
    function getResult($sql) {
        return $this->dbconn->query($sql);
    }

    /**
     * Метод осуществляет подготовку шаблона запроса и его выполнение
     *
     * call_user_func_array вызывает bind_papram() динамически
     * подставляя аргументы из массива $parameters
     * @param $sql - шаблон запроса
     * @param array $parameters - параметры для подстановки в шаблон.
     * Содержит тип параметров и ссылки на параметры
     * @return bool|\mysqli_result
     */
    public function getPreparedResult(&$sql, &$parameters) {
        $stmt = $this->dbconn->prepare($sql);
        call_user_func_array(array($stmt, 'bind_param'), $this->refValues($parameters));
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * @param $arr
     * @return array массив параметров для функции bind_param
     */
    protected function refValues($arr) {
        $refs = array();
        foreach ($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
}