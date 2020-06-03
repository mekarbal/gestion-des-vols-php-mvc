<?php 
require_once("Config.php");
class Vol extends Config{

    private $id_flight;
    private $n_flight;
    private $depart;
    private $distination;
    private $date_flight;
    private $hour_flight;
    private $minute_flight;
    private $price;
    private $total_places;
    private $statut;

    function __construct(){
        $this->table_name = "flight";
        $this->id_name = "id_flight";
        Config::__construct();
    }

    function __destruct(){
        Config::__destruct();
    }

    public function get_data(){
        return [
            "n_flight"      =>  $this->n_flight,
            "depart"        =>  $this->depart,
            "distination"   =>  $this->distination,
            "date_flight"   =>  $this->date_flight,
            "hour_flight"   =>  $this->hour_flight,
            "minute_flight" =>  $this->minute_flight,
            "price"         =>  $this->price,
            "total_places"  =>  $this->total_places,
            "statut"     =>  $this->statut
        ];
    }

    public function add_new($post, $names){
        $reg = true;

        $this->n_flight     = $this->eng_data($post, $names[0],$reg);
        $this->depart       = $this->eng_data($post, $names[1],$reg); 
        $this->distination  = $this->eng_data($post, $names[2],$reg);
        $this->date_flight  = $this->eng_data($post, $names[3],$reg);
        $this->hour_flight  = $this->eng_data($post, $names[4],$reg);
        $this->minute_flight= $this->eng_data($post, $names[5],$reg);
        $this->total_places = $this->eng_data($post, $names[6],$reg);
        $this->price        = $this->eng_data($post, $names[7],$reg);
        $this->statut    = $this->eng_data($post, $names[8],$reg);

        if($reg){
            
            $query = "INSERT INTO {$this->table_name} (n_flight, depart, distination, date_flight,hour_flight,minute_flight, total_places, price, statut) VALUES ('{$this->n_flight}', '{$this->depart}', '{$this->distination}','{$this->date_flight}','{$this->hour_flight}', '{$this->minute_flight}',{$this->total_places}, {$this->price}, {$this->statut})";
            
            $result = $this->mysqli->query($query);
            if($result){
                if($result->affected_rows == 1){
                    $this->id_flight = $this->mysqli->insert_id;
                    $this->has_field = true;
                    return true;
                }
            }else{
            die("Error in : " . $query . "<br>" . mysqli_error($this->mysqli));
            }
        }else{
            return false;
        }
    }

    public function get_by_id($id){
        $query = "SELECT * FROM flight WHERE {$this->id_name} = {$id}";
        $result = $this->mysqli->query($query);
        if($result){
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->id           = $row["id_flight"];
                $this->n_flight     = $row["n_flight"];
                $this->depart       = $row["depart"];
                $this->distination  = $row["distination"]; 
                $this->date_flight  = $row["date_flight"];
                $this->hour_flight  = $row["hour_flight"];
                $this->minute_flight= $row["minute_flight"];
                $this->price        = $row["price"];
                $this->total_places = $row["total_places"];
                $this->statut       = $row["statut"];
                $this->has_field    = true;

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