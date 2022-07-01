<?php
require_once(ROOT_PATH . '/Models/Casteria.php');

class CasteriaController
{
    private $request;
    private $Casteria;

    public function __construct()
    {
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクトの生成
        $this -> Casteria = new Casteria();
    }

    public function index()
    {
        $casteria = $this -> Casteria -> findAll();
        $params = [
            'casteria' => $casteria
        ];
        return $params;
    }

    public function insert()
    {
      // var_dump($_POST);
        $this -> Casteria -> insertdata($this->request['post']);
    }

    public function get($id)
    {
       //var_dump($_GET);
        $params = $this -> Casteria -> getdata($id);
        return $params;
    }

    public function update($data)
    {
        $this -> Casteria -> updatedata($data);
    }

    public function delete($data)
    {
        $this -> Casteria -> deletedata($data);
    }

}
