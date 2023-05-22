<?php
class controller
{
    private $conn;
    public $id;
    public $name;
    public $email;
    public $designation;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getall()
    {
        $sql = "select * from emp";

        $res = $this->conn->query($sql);

        //$res->execute();

        return $res;
    }

    public function createPost(){
        $sql="insert into emp(id,name,email,designation) values('$this->id','$this->name','$this->email','$this->designation')";

        $res=$this->conn->query($sql);
         
        return $res;
    }
    public function getbyid(){
        $sql="select  * from emp where id='$this->id'";

        $res=$this->conn->query($sql);

        return $res;
    }

    public function delete(){
        $sql="delete  from emp where id='$this->id'";

        $res=$this->conn->query($sql);

        return $res;   
     }

    public function update(){
        $sql="update emp set name='$this->name',email='$this->email',designation='$this->designation' where id='$this->id'";

        $res=$this->conn->query($sql);

        return $res; 
    }
}
?>