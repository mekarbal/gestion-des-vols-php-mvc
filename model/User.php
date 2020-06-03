<?php 
require_once("Config.php");
class User extends Config{
    private $first_name;
    private $last_name;
    private $address;
    private $passport;
    private $cin;
    private $email;
    private $phone;
    private $password_user;
    private $role;

    function __construct(){
        $this->table_name = "clients";
        $this->id_name = "id_user";
        Config::__construct();
    }

    public function get_data(){
        return [
            "first_name"    =>  $this->first_name,
            "last_name"     =>  $this->last_name,
            "address"       =>  $this->address,
            "passport"      =>  $this->passport,
            "cin"           =>  $this->cin,
            "email"         =>  $this->email,
            "phone"         =>  $this->phone,
            "role"          =>  $this->role
        ];
    }

    public function add_new($post, $names=[]){
        $saved = true;
        $this->first_name    = $this->eng_data($post, $names[0],$saved);
        $this->last_name     = $this->eng_data($post, $names[1],$saved); 
        $this->address       = $this->eng_data($post, $names[2],$saved);
        $this->passport      = $this->eng_data($post, $names[3],$saved);
        $this->cin           =   $this->eng_data($post, $names[4],$saved);
        $this->email         = $this->eng_data($post, $names[5],$saved);
        $this->phone         = $this->eng_data($post, $names[6],$saved);
        $this->password_user = md5($this->eng_data($post, $names[7],$saved));
        $this->role          = "user";

        if($saved){
            $query = "INSERT INTO {$this->table_name} (";
            $query .= "first_name, last_name, cin, passport, address,  email, password_user, phone, role) VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->cin}','{$this->passport}', '{$this->address}','{$this->email}', '{$this->password_user}', '{$this->phone}', '{$this->role}') ";
          

            $result = mysqli_query($this->mysqli, $query);
            if($result){
                if(mysqli_affected_rows($this->mysqli) == 1){
                    $this->id =  mysqli_insert_id($this->mysqli);
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
        $query = "SELECT * FROM {$this->table_name} WHERE {$this->id_name} = {$id}";
        $result = mysqli_query($this->mysqli, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $this->id            = $row["id_user"];
                $this->first_name    = $row["first_name"];
                $this->last_name     = $row["last_name"];
                $this->address       = $row["address"];
                $this->passport      = $row["passport"];
                $this->cin           = $row["cin"];
                $this->email         = $row["email"];
                $this->phone         = $row["phone"];
                $this->password_user = $row["password_user"];
                $this->role          = $row["role"];
                $this->has_field       = true;
                mysqli_free_result($result);
                return $this;
            }else{
                return false;
            }
        }else{
            die("Error in : " . $query . "<br>" . mysqli_error($this->mysqli));
        }
    }

    public function login($post,$names=[]){
        $saved = true;
        $email          = $this->eng_data($post,$names[0],$saved);
        $password_user  = $this->eng_data($post,$names[1],$saved);
        if($saved){
            $query = "SELECT * FROM {$this->table_name} ";
            $query .= "WHERE email = '{$email}' AND password_user = '{$password_user}' LIMIT 1";
            $result = mysqli_query($this->mysqli, $query);

            if($result){
                if($result->num_rows == 1){
                    $row = mysqli_fetch_assoc($result);
                    $this->id            = $row["id_user"];
                    $this->first_name    = $row["first_name"];
                    $this->last_name     = $row["last_name"];
                    $this->address       = $row["address"];
                    $this->passport      = $row["passport"];
                    $this->cin           = $row["cin"];
                    $this->email         = $row["email"];
                    $this->phone         = $row["phone"];
                    $this->password_user = $row["password_user"];
                    $this->role          = $row["role"];
                    $this->has_field       = true;
                    mysqli_free_result($result);
                    return true;
                }else{
                    return false;
                }
            }else{
                die("Error in : " . $query . "<br>" . mysqli_error($this->mysqli));
            }
        }
    }
}
?>