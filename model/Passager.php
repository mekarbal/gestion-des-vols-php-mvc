<?php 
require_once("Config.php");
class Passager extends Config{

    private $id_user;
    private $id_flight;
    private $id_resevation;
    private $first_name;
    private $last_name;
    private $passport;

    function __construct(){
        $this->table_name = "passagers";
        $this->id_name = "id_travler";
        Config::__construct();
    }

    function __destruct(){
        Config::__destruct();
    }

    public function get_data(){
        return [
            "id_user"        =>  $this->id_user,
            "id_flight"      =>  $this->id_flight,
            "id_resevation"  =>  $this->id_resevation,
            "first_name"     =>  $this->first_name,
            "last_name"      =>  $this->last_name,
            "passport"       =>  $this->passport
        ];
    }

    public function add_new($post, $names){
        $saved = true;

        $this->id_user         = $this->eng_data($post, $names[0],$saved);
        $this->id_flight       = $this->eng_data($post, $names[1],$saved);
        $this->id_resevation   = $this->eng_data($post, $names[2],$saved);
        $this->first_name      = $this->eng_data($post, $names[3],$saved); 
        $this->last_name       = $this->eng_data($post, $names[4],$saved); 
        $this->passport        = $this->eng_data($post, $names[5],$saved); 

        if($saved){
            $query .= "INSERT INTO {$this->table_name} (id_user, id_flight, id_resevation, first_name, last_name, passport ) 
                        VALUES
                         ({$this->id_user}, {$this->id_flight}, {$this->id_resevation}, '{$this->first_name}', '{$this->last_name}', '{$this->passport}')";

            $result = $this->mysqli->query($query);
            if($result){
                $this->id_flight = $this->mysqli->insert_id;
                $this->has_field = true;
                return true;
            }else{
                die("Error in : " . $query . "<br>" . $this->mysqli->error. "<br>Error number: " . $this->mysqli->errno);
            }
        }else{
            return $this;
        }
    }

    public function get_by_id($id){
        $query = "SELECT * FROM {$this->table_name} WHERE {$this->id_name} = {$id}";
        $result = $this->mysqli->query($query);
        if($result){
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->id            = $row["id_travler"];
                $this->id_user       = $row["id_user"];
                $this->id_flight     = $row["id_flight"];
                $this->id_resevation = $row["id_resevation"];
                $this->first_name    = $row["first_name"];
                $this->last_name     = $row["last_name"];
                $this->passport      = $row["passport"];
                $this->has_field       = true;

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