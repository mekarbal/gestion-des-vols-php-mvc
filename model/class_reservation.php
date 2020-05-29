<?php 
require_once("inheret_functions.php");
class Reservation extends Functions{

    private $id_flight;
    private $id_user;
    private $date_resevation;

    function __construct(){
        $this->table_name = "Reservation";
        $this->id_name = "id_resevation";
        Functions::__construct();
    }

    function __destruct(){
        Functions::__destruct();
    }

    public function get_data(){
        return [
            "id_flight"         =>  $this->id_flight,
            "id_user"           =>  $this->id_user,
            "date_resevation"   =>  $this->date_resevation
        ];
    }

    public function create_new($post, $names){
        $issafe = true;

        $this->id_flight  = $this->safe_data($post, $names[0],$issafe);
        $this->id_user    = $this->safe_data($post, $names[1],$issafe); 

        if($issafe){
            $query = "INSERT INTO {$this->table_name} (";
            $query .= "id_flight, id_user";
            $query .= ") VALUES (";
            $query .= "{$this->id_flight}, {$this->id_user})";

            $result = $this->mysqli->query($query);
            if($result){
                $this->id = $this->mysqli->insert_id;
                $this->has_row = true;
                return true;
            }else{
                die("Error in : " . $query . "<br>" . $this->mysqli->error);
            }
        }else{
            return false;
        }
    }

    public function create_from_id($id){
        $query = "SELECT * FROM {$this->table_name} WHERE {$this->id_name} = {$id}";
        $result = $this->mysqli->query($query);
        if($result){
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->id               = $row["id_resevation"];
                $this->id_flight        = $row["id_flight"];
                $this->id_user          = $row["id_user"];
                $this->date_resevation  = $row["date_resevation"]; 
                $this->has_row          = true;

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