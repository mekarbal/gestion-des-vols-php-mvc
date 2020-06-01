<?php 
require_once("AllFunction.php");
class Vol extends Functions{

    private $id_flight;
    private $n_flight;
    private $depart;
    private $distination;
    private $date_flight;
    private $hour_flight;
    private $minute_flight;
    private $price;
    private $total_places;
    private $is_active;

    function __construct(){
        $this->table_name = "flight";
        $this->id_name = "id_flight";
        Functions::__construct();
    }

    function __destruct(){
        Functions::__destruct();
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
            "is_active"     =>  $this->is_active
        ];
    }

    public function create_new($post, $names){
        $reg = true;

        $this->n_flight     = $this->eng_data($post, $names[0],$reg);
        $this->depart       = $this->eng_data($post, $names[1],$reg); 
        $this->distination  = $this->eng_data($post, $names[2],$reg);
        $this->date_flight  = $this->eng_data($post, $names[3],$reg);
        $this->hour_flight  = $this->eng_data($post, $names[4],$reg);
        $this->minute_flight= $this->eng_data($post, $names[5],$reg);
        $this->total_places = $this->eng_data($post, $names[6],$reg);
        $this->price        = $this->eng_data($post, $names[7],$reg);
        $this->is_active    = $this->eng_data($post, $names[8],$reg);

        if($reg){
            
            $query = "INSERT INTO {$this->table_name} (n_flight, depart, distination, date_flight,hour_flight,minute_flight, total_places, price, is_active) VALUES ('{$this->n_flight}', '{$this->depart}', '{$this->distination}','{$this->date_flight}','{$this->hour_flight}', '{$this->minute_flight}',{$this->total_places}, {$this->price}, {$this->is_active})";
            
            $result = $this->mysqli->query($query);
            if($result){
                if($result->affected_rows == 1){
                    $this->id_flight = $this->mysqli->insert_id;
                    $this->has_row = true;
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
                $this->minute_flight  = $row["minute_flight"];
                $this->price        = $row["price"];
                $this->total_places = $row["total_places"];
                $this->is_active    = $row["is_active"];
                $this->has_row      = true;

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