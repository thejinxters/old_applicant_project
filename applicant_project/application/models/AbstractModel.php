<?php
abstract Class AbstractModel extends CI_Model{
    
    //create var contact to store contact info
    protected $contact;
    
    /*
     * Constructor
     * Loads MySQL database connection
     * Instantiates $contact
     */
    public function __construct() {
        parent::__construct();
        //CI load of database
        $this->load->database();
        
        //Create null contact for setting and loading
        $this->contact = array(
            'id'    => NULL,
            'name'  => NULL,
            'email' => NULL
        );
    }
    
    /*
     * Saves current contact to database
     */
    public function save() {
        //Check to see if a database item already exists
        if ($this->contact['id'] != NULL) {
            $query = "UPDATE " . $this->_table . " SET ";
            $query .= "name = '{$this->contact['name']}', ";
            $query .= "email = '{$this->contact['email']}' ";
            $query .= "WHERE " . $this->_pk . " = " . $this->contact['id'];
        }
        //if no database item exists
        else{
            $query  = "INSERT INTO " . $this->_table . " (name, email) ";
            $query .= "VALUES ('{$this->contact['name']}', '{$this->contact['email']}')";
        }
        
        //run respective query
        $result = $this->db->query($query);
        
        //check query
        if($result && $this->db->affected_rows() == 1){
            $this->contact['id'] = $this->db->insert_id();
        }
        else{
            echo "database save failed";
        }
        
    }
    
    /*
     * Loads contact info from database
     * @param int $id
     * @return AbstractModel
     */
    public function load($id){
        //create query for load
        $query =  "SELECT * ";
        $query .= "FROM " . $this->_table . " ";
        $query .= "WHERE " . $this->_pk . " = " . $id;
        $result = $this->db->query($query);
        //Test for query error
        if(!$result){
            die("database load failed");
        }
        
        //assign loaded data to contacts
        $row = $result->row();
        $this->contact = array(
            'id'    => $row->id,
            'name'  => $row->name,
            'email' => $row->email
        );
        
        //return class
        return $this;
    }
    
    /*
     * Deletes current contact
     * @param int $id
     */
    public function delete($id = NULL) {
        //if there is no argument of id
        if ($id == NULL) {
            $query = "DELETE FROM " . $this->_table . " ";
            $query .= "WHERE " . $this->_pk . " = " . $this->contact['id'];
        } 
        // if there is an id argument
        else {
            $query = "DELETE FROM " . $this->_table . " ";
            $query .= "WHERE " . $this->_pk . " = " . $id;
        }
        
        //execute query
        $result = $this->db->query($query);
        
        //test execution
        if($result && $this->db->affected_rows() == 1){
        }
        else{
            echo "database delete failed";
        }
    }

    /*
     * Gets contact data from stored contact
     * @param string $key
     */
    public function getData($key=false){       
        //if no argument of key, return everything
        if($key==false){
            return $this->contact;
        }
        //key argument given, thus only return data associated with the key
        else{
            return $this->contact[$key];
        }
    }
    
    /*
     * Sets Contact Data
     * @param (string, array) $arr
     * @param string $value
     * @return AbstractModel
     */
    public function setData($arr, $value=false){
        //if input is an array, add each value to contact
        if (gettype($arr)== 'array'){
            foreach ($arr as $key => $arrValue) {
                $this->contact[$key] = $arrValue;
            }
        }
        //if there is only a single value, set that value
        else{
            $this->contact[$arr] = $value;
        }
        //return class
        return $this;
    }
}