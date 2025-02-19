<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Admin_model extends CI_Model {
        
        public function __construct(){
            parent::__construct();
            $this->load->helper('string');
            //$this->load->library('image_lib');
        }
        // select from database
        public function getData($sql){	
            $query = $this->db->query($sql);
            return $query;
        }
        public function saveData($tbl,$data){
            $this->db->insert($tbl, $data);
            return $this->db->insert_id();
        }
        public function saveSQL($sql){
            $this->db->query($sql);
            return $this->db->affected_rows();
        }
        public function updateSql($sql){
            $this->db->query($sql);
            return ($this->db->affected_rows() <= 0) ? false : true;
        }
        function deleteData($sql)
        {
            $query = $this->db->query($sql);
            return $query;
        }
        public function updateSql_2($sql){				//return number of affected rows
            $this->db->query($sql);
            return $this->db->affected_rows();
        }
        public function updateData($tbl,$data,$where){
            $this->db->update($tbl, $data, $where);
            // return $this->db->last_query(); exit();
            return ($this->db->affected_rows() <= 0) ? false : true;	//on success return true else false
        }
        public function createTbl($sql){
            return $this->db->query($sql);
        }
        public function getAllData($sql){								//process result in controller
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        public function getAllData2($sql){								//process result in view 
            return $this->db->query($sql);
        }
        public function getOneData($sql){
            $query = $this->db->query($sql);
            foreach ($query->result_array() as $row){
          echo $row["P_CODE"]."|".$row["P_CTGRY"]."|".$row["QUANTITY"]."|".$row["RATE"];
            }
        }
       public function getAllSymptoms()
       {
        $sql="SELECT DISTINCT symptoms_type FROM symptoms";
        $query = $this->db->query($sql);
       return $query->result_array();
       }
       public function getAllDiseases()
       {
       $query = $this->db->get('test_tbl');
        return $query->result_array();
       }
       public function updateDataProfile($id,$data)
       {
        $this->db->where('id',$id);
       $query= $this->db->update('users',$data);
      }
      public function updateDataProfileimg($id,$data1)
       {
        $this->db->where('id',$id);
        $query= $this->db->update('users',$data1);
          
       }
       public function userpasswordupdate($id,$hashed_password)
       {
        $data1=[
            'KUNJI'=>$hashed_password
            ];
        $this->db->where('id',$id);
        $query= $this->db->update('users',$data1);
          
       }
      public function gettestname()
      {
        $query = $this->db->query("SELECT * FROM test ORDER BY test_id DESC LIMIT 1");
        foreach($query->result() as $row)
        {
        $symptom_id= $row->symptoms;
        $query1 = $this->db->query("SELECT DISTINCT diseases_id  FROM symptoms where id IN($symptom_id)");
                    //  $count= $query1->num_rows();
        $des_id = $delim = "";
        foreach($query1->result() as $row1)
        {   
                        
         $des_id .= $delim."'".$row1->diseases_id."'";
        $delim = ",";
                        
        }
        $sql = "SELECT d.*,tt.*  FROM diseases d,test_tbl tt where d.id IN ($des_id) and tt.id=d.test_id";
        $aa=$this->db->query($sql);
        return $aa->result();
         }
        
      } 

    }