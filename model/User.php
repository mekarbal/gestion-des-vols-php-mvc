<?php 
require_once("AllFunction.php");
class User extends Functions{
    private $first_name;
    private $last_name;
    private $nationality;
    private $passport;
    private $cin;
    private $email;
    private $phone;
    private $password_user;
    private $role;

    function __construct(){
        $this->table_name = "clients";
        $this->id_name = "id_user";
        Functions::__construct();
    }

    function __destruct(){
        Functions::__destruct();
    }

    public function get_data(){
        return [
            "first_name"    =>  $this->first_name,
            "last_name"     =>  $this->last_name,
            "nationality"   =>  $this->nationality,
            "passport"      =>  $this->passport,
            "cin"           =>  $this->cin,
            "email"         =>  $this->email,
            "phone"         =>  $this->phone,
            "role"          =>  $this->role
        ];
    }

    public function create_new($post, $names=[]){
        $saved = true;
        $this->first_name    = $this->eng_data($post, $names[0],$saved);
        $this->last_name     = $this->eng_data($post, $names[1],$saved);
        $this->nationality   = $this->eng_data($post, $names[3],$saved);
        $this->passport      = $this->eng_data($post, $names[4],$saved);
        $this->cin           = $this->eng_data($post, $names[5],$saved);
        $this->email         = $this->eng_data($post, $names[6],$saved);
        $this->phone         = $this->eng_data($post, $names[7],$saved);
        $this->password_user = $this->eng_data($post, $names[8],$saved);
        $this->role          = "user";

        if($saved){
            $query = "INSERT INTO {$this->table_name} (first_name, last_name, cin, passport, nationality,  email, password_user, phone, role) 
            VALUES 
            ('{$this->first_name}', '{$this->last_name}', '{$this->cin}','{$this->passport}', '{$this->nationality}', '{$this->email}', '{$this->password_user}', '{$this->phone}', '{$this->role}') ";
            
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

    public function get_by_id($id){
        $query = "SELECT * FROM {$this->table_name} WHERE {$this->id_name} = {$id}";
        $result = $this->mysqli->query($query);
        if($result){
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->id            = $row["id_user"];
                $this->first_name    = $row["first_name"];
                $this->last_name     = $row["last_name"];
                $this->nationality   = $row["nationality"];
                $this->passport      = $row["passport"];
                $this->cin       = $row["cin"];
                $this->email         = $row["email"];
                $this->phone         = $row["phone"];
                $this->password_user = $row["password_user"];
                $this->role          = $row["role"];
                $this->has_row       = true;
                $result->free_result();
                return $this;
            }else{
                return false;
            }
        }else{
            die("Error in : " . $query . "<br>" . $this->mysqli->error);
        }
    }

    public function login($post,$names=[]){
        $saved = true;
        $email          = $this->eng_data($post,$names[0],$saved);
        $password_user  = $this->eng_data($post,$names[1],$saved);
        if($saved){
            $query = "SELECT * FROM {$this->table_name} WHERE email = '{$email}' AND password_user = '{$password_user}' LIMIT 1";
            $result = $this->mysqli->query($query);

            if($result){
                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                                $this->id            = $row["id_user"];
                                $this->first_name    = $row["first_name"];
                                $this->last_name     = $row["last_name"]; 
                                $this->nationality   = $row["nationality"];
                                $this->passport      = $row["passport"];
                                $this->cin           = $row["cin"];
                                $this->email         = $row["email"];
                                $this->phone         = $row["phone"];
                                $this->password_user = $row["password_user"];
                                $this->role          = $row["role"];
                                $this->has_row       = true;
                    $result->free_result();
                    return true;
                }else{
                    return false;
                }
            }else{
                die("Error in : " . $query . "<br>" . $this->mysqli->error);
            }
        }
    }
}
?>