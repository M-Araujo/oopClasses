<?php
require_once 'log.php';

class User {

    public $name;
    public $age;
    public $gender;
    public $skills;
    private $mobile;
    private $address;
    private $dataFile = 'userList.json';


    public function __construct($name,$age,$mobile,$address,$gender,$skills){

        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->skills = $skills;
        $this->mobile = $mobile;
        $this->address = $address;
    }


    public function save(){
        try{
            if(filesize($this->dataFile) == 0){
                $file = fopen($this->dataFile, "c");
                $txt = '{ "data" : ['. json_encode($this,true) . ']}';
                fwrite($file, $txt);
            }else{
                $file = fopen($this->dataFile, "r+");
                $txt = json_encode($this,true).']}';
                fseek($file, -2, SEEK_END);
                fwrite($file, ",\n". $txt);
            }
            fclose($file);
            $log = new Log('Created new record.');
        }catch(Exception $e){
            echo 'Error. ' . $e;
            $log = new Log('New user registration failed');
        } 
    }
    
}

if(isset($_POST['submitBtn'])){

    $field_name = stripslashes(htmlspecialchars($_POST['name']));
    $field_age = stripslashes(htmlspecialchars($_POST['age']));
    $field_mobile = stripslashes(htmlspecialchars($_POST['mobile']));
    $field_address = stripslashes(htmlspecialchars($_POST['address']));
    $field_gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $field_skills = stripslashes(htmlspecialchars($_POST['skills']));

    $all_form_fields_not_empty = !empty($field_name) && !empty($field_age) && !empty($field_mobile) 
                            && !empty($field_address) && !empty($field_gender) && !empty($field_skills);

    if($all_form_fields_not_empty){
        $user = new User($field_name,$field_age,$field_mobile,$field_address,$field_gender,$field_skills);
        $user->save();

    }else{
        echo 'Please, fill all the fields';
    }

    

}
