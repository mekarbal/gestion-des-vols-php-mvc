<?php 
require_once("Config.php");
require_once("../model/Vol.php");
class Reservation extends Config{

    private $id_flight;
    private $id_user;
    private $date_resevation;

    function __construct(){
        $this->table_name = "Reservation";
        $this->id_name = "id_resevation";
        Config::__construct();
    }

    function __destruct(){
        Config::__destruct();
    }

    public function get_data(){
        return [
            "id_flight"         =>  $this->id_flight,
            "id_user"           =>  $this->id_user,
            "date_resevation"   =>  $this->date_resevation
        ];
    }

    public function add_new($post, $names){
        $saved = true;

        $this->id_flight  = $this->eng_data($post, $names[0],$saved);
        $this->id_user    = $this->eng_data($post, $names[1],$saved); 

        if($saved){
            $query = "INSERT INTO {$this->table_name} (id_flight, id_user) VALUES ({$this->id_flight}, {$this->id_user})";
            
            $result = $this->mysqli->query($query);
            if($result){
                $this->id = $this->mysqli->insert_id;
                $this->has_field = true;
                return true;
            }else{
                die("Error in : " . $query . "<br>" . $this->mysqli->error );
            }
        }else{
            return false;
        }
    }

    public function getId($id){
        $query = "SELECT * FROM {$this->table_name} WHERE {$this->id_name} = {$id}";
        $result = $this->mysqli->query($query);
        if($result){
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->id               = $row["id_resevation"];
                $this->id_flight        = $row["id_flight"];
                $this->id_user          = $row["id_user"];
                $this->date_resevation  = $row["date_resevation"]; 
                $this->has_field          = true;

                $result->free_result();
                return $this;
            }else{
                return false;
            }
        }else{
            die("Error in : " . $query . "<br>" . $this->mysqli->error);
        }
    }
}
?>