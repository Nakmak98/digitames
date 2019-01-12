<?php
namespace Logic;

require_once 'Db/Db.php';
class Search
{
    protected $db;
    protected $request;
    protected $results=[];

    function __construct($post)
    {
        $this->db = \Db::getConnection();
        $this->request = $post['search'];
    }

    function getRequest(){
       return $this->request;
    }

    function getResult(){
        return $this->results;
    }
    function find(){
        $pattern='%'.$this->request.'%';
        $sql = "SELECT * FROM game_project where proj_name like '$pattern' ";
        $result = $this->db->query($sql);
        while ($row = $result->fetch_assoc()){
            array_push($this->results,$row);  //todo Я знаю, что есть fetchAll но меня он не устраивал
        }
        return $this->results;
    }
}