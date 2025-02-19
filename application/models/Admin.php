<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Admin extends CI_Model {

        function saveData($tbl,$data)
        {
            $this->db->insert($tbl,$data);
            return true;
        }
        public function getData($sql)
        {
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function updateData($sql)
        {
            $query=$this->db->query($sql);
            return $query;
        } 
        public function deleteData($sql)
        {
            $query=$this->db->query($sql);
            return $query;
        }

    }