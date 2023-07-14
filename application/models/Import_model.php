<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Import_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function importData($data) {

        $res = false ;
        foreach ($data as $key => $value) {

        $this->db->where($value);
        $exists  = $this->db->get('schedule')->result();

        //echo $this->db->last_query();
        //print_r($exists);

        if(empty($exists)){
            $res = $this->db->insert('schedule',$value) ;
        } 

    // if($exists){    
    //   //  unset($data[$key]);

    //     echo $key ;
    //  } 
    }
        //echo $this->db->last_query();
          //print_r($data);

           //  $res = $this->db->insert_batch('schedule',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }


           
      
        }


     function getCoursename($category,$subcategory,$coursename,$arabicname) {

      //echo "arabicname" . $arabicname ;
        $this->db->select("id", false);
        $this->db->from('courses');
        $this->db->where('category_id',$category);
        if(!empty($subcategory)){
           $this->db->where('subcategory_id',$subcategory);
        }
       
        $this->db->like('product_name', $coursename, 'before'); 
       
        $query = $this->db->get();
        $row = $query->row();
      if ($query->num_rows() > 0) {
           return $row->id;
        } else {
        
        $name = array( 
         'product_name' =>$coursename,
         'program_title_arabic' =>$arabicname,
          'description' =>"",
           'category_id' =>$category,
         'subcategory_id' => $subcategory 
        );
        $this->db->insert('courses', $name);
        return $this->db->insert_id();
        }
    }
    

    function getCategory($category) {
       $this->db->select("id", false);
        $this->db->from('category');
        $this->db->like('category_name', $category, 'before'); 
       
        $query = $this->db->get();
        $row = $query->row();
      if ($query->num_rows() > 0) {
           return $row->id;
        } else {
        
        $name = array( 
         'category_name' =>$category
        );
        $this->db->insert('category', $name);
        return $this->db->insert_id();
        }
    }


function getsubCategory($category,$subcategory) {

  if(!empty($subcategory)){
     $this->db->select("id", false);
        $this->db->from('subcategory');
        $this->db->where('category_id',$category);
        $this->db->like('subcategory_name', $subcategory, 'before'); 
       
        $query = $this->db->get();
        $row = $query->row();
      if ($query->num_rows() > 0) {
           return $row->id;
        } else {
        
        $name = array( 
         'subcategory_name' =>$subcategory,
         'category_id'=>$category
        );
        $this->db->insert('subcategory', $name);
        return $this->db->insert_id();
        }
      }else{

       return "" ;
    }

    }
      }
?>