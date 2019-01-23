<?php
namespace Logic;
require_once 'Manager.php';

class Search
{
    protected $manager;
    public $request;

    function __construct($search_request)
    {
        $this->manager = new Manager();
        $this->request = $search_request;
    }

    function find(){
        $pattern='%'.$this->request.'%';
        $sql = "SELECT * FROM game_project where proj_name like ?";
        $param_arr[] = "s";
        $param_arr[] = &$pattern;
        $result = $this->manager->getPreparedMultipleAssocResult($sql, $param_arr);
        return $result;
    }
}