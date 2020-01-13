<?php
class MySQL
{
    var $server = "localhost";
    var $username = "new";
    var $password = "Old@626204";
    var $dbname = "divum";

    var $conn = null;

    function connect()
    {
        if (!isset($this->conn))
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

        //Check Connection
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->connect_error);
        }
    }
    
    function close (){
        if(isset($this->conn))
            $this->conn->close();
    }
    function write (){
        $this->connect();
       // $res = $this->conn->query($sql);
       $sql = "INSERT INTO MyGuests (firstname, lastname, email)
       VALUES ('John', 'Doe', 'john@example.com')";
       
       if ($this->conn->query($sql) === TRUE) {
           echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . $this->conn->error;
       }
        $this->conn->close();

    }
    function GetDataTable($sql){
        $this->connect();
        $res = $this->conn->query($sql);
        $this->conn->close();
        return $res;
    }
}
