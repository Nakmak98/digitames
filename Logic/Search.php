<?php
namespace Logic;

require_once 'Db/Db.php';
class Search
{
    protected $db;
    protected $request;
    protected $results=[];

    function __construct($search_request)
    {
        $this->db = \Db::getConnection();
        $this->request = $search_request;
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
        $this->results=$result->fetch_all(MYSQLI_ASSOC);
        return $this->results;
    }
}