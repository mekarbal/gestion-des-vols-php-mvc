<?php 
 abstract class Config{
    protected $mysqli;
    protected $has_field = false; // this table is has a field ?
    protected $id = null;
    protected $table_name = null;
    protected $id_name = null;

    function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "vols_mvc");
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
    }

    function __destruct(){
        $this->mysqli->close();
    }

    public function row(){
        return $this->has_field;
    }

    public function get_id(){
        return $this->id;
    }

    protected function eng_data($post,$name,&$saved){
        if(isset($post[$name]) && trim($post[$name]) !== ""){
            return $this->mysqli->real_escape_string(trim($post[$name]));
        }else{
            $saved = false;
            return null;
        }
    }
    public function update_row_table($assoc){
        $query = "UPDATE {$this->table_name} SET ";
        foreach($assoc as $key => $val){
            $query .= "{$key} = ";
            $query .= (gettype($val) == "string") ? "'{$val}'" : "{$val},";
        }
        $query = rtrim($query, ","); //remove the last , from the query
        $query .= " WHERE {$this->id_name} = {$this->id}";
        $result = mysqli_query($this->mysqli,$query);
        if($result){
            if(mysqli_affected_rows($this->mysqli) == 1){
                return true;
            }
        }else{
            die("Error in : " . $query . "<br>" . mysqli_error($this->mysqli));
        }
        return false;
    }

 }
?>