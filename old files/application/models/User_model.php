<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
    }

  function getRows($params = array()){

         

        $this->db->select('a.*, b.product_price');
        $this->db->from('industry_products a');

        $this->db->join('industry_product_price_size_det b', 'a.id = b.product_id and b.status ="Y"');
        

        if(!empty($params['search']['searchtext'])){
           $this->db->where('product_name like "%'.$params['search']['searchtext'].'%" ');
        }


        if(!empty($params['search']['category'])){
           
         $this->db->where('category In('.$params['search']['category'].')');
        }

        if(!empty($params['search']['pricerange'])){

            $pricerange = explode(' - ', $params['search']['pricerange']) ;

            $price1 = explode('SAR ', $pricerange[0]);
            $price2 = explode('SAR ', $pricerange[1]);

           

           
           $this->db->where('b.product_price between '.$price1[1].' and '.$price2[1].'');
        }

         if(!empty($params['search']['colors'])){

              $colors = explode(',', $params['search']['colors']) ;

              $this->db->group_start();

            foreach ( $colors as $color) {
                $this->db->or_where("FIND_IN_SET(".$color.", colors_available )", null, false);         
            }       

             $this->db->group_end();


           
           //$this->db->where('colors_available In('.$params['search']['colors'].')');
        }

         if(!empty($params['search']['sizes'])){

             $sizes = explode(',', $params['search']['sizes']) ;

              $this->db->group_start();

            foreach ( $sizes as $siz) {
                $this->db->or_where("FIND_IN_SET(".$siz.", sizes_available )", null, false);         
            }       

             $this->db->group_end();

 
        }

         if(!empty($params['search']['gender'])){

            $gender = explode(',', $params['search']['gender']) ;

              $this->db->group_start();

            foreach ( $gender as $gen) {
                $this->db->or_where("FIND_IN_SET(".$gen.", genders )", null, false);         
            }       

             $this->db->group_end();
           
            
        }

 

         
        $this->db->where('a.status','Y');

        if(!empty($params['search']['sortby'])){

            $sortby = $params['search']['sortby'] ;

        if( $sortby=='latest'){
            $this->db->order_by("created_on","desc");

        } else if($sortby  == 'low_high'){

                $this->db->order_by("product_price","asc");
        }else if($sortby  == 'high_low'){

                $this->db->order_by("product_price","desc");
        }
                    

         }else{
    
        $this->db->order_by("product_name","asc");
        }
      
       $this->db->group_by("a.id");

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        


        //get records
        $query = $this->db->get();
        //return fetched data

// echo $this->db->last_query() ;
//print_r($this->db->last_query());
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

    

    function getSchools($params = array()){

         

        $this->db->select('*');
        $this->db->from('school_master');

        

        if(!empty($params['search']['searchtext'])){

             $this->db->group_start();

            $this->db->where('school_name like "%'.$params['search']['searchtext'].'%" ');
            $this->db->or_where('ar_school_name like "%'.$params['search']['searchtext'].'%" ');


             $this->db->group_end();


                   }

 

         
        $this->db->where('status','Y');

        if(!empty($params['search']['sortby'])){

            $sortby = $params['search']['sortby'] ;

        if( $sortby=='latest'){
            $this->db->order_by("created_on","desc");

        } else if($sortby  == 'low_high'){

                $this->db->order_by("product_price","asc");
        }else if($sortby  == 'high_low'){

                $this->db->order_by("product_price","desc");
        }
                    

         }else{
    
        $this->db->order_by("school_name","asc");
        }
      
  

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        


        //get records
        $query = $this->db->get();
        //return fetched data

// echo $this->db->last_query() ;
//print_r($this->db->last_query());
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }


function gettrainings($params = array()){

 
         

        $this->db->select('a.*, b.id cid');
        $this->db->from('training_courses a');
        
          $this->db->join('companies b', 'a.company_id = b.id');
         
        
         

        if(!empty($params['search']['company'])){
           
            $this->db->where('a.company_id In('.$params['search']['company'].')');
        }

         

 

        


       // $this->db->where('start_date >= ',date('Y-m-d'));
       
       $this->db->where('a.status','Y');
       $this->db->where('b.status','Y');

         $this->db->order_by("training_name","asc");


       
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        


        //get records
        $query = $this->db->get();
        //return fetched data
  
        return ($query->num_rows() > 0)?$query->result_array():FALSE;


    }

    
    function get_type_name_by_id($type,$fieldid, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $fieldid => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }
        }
    }

    function getServiceScheduleSlots($duration, $start,$end)
{
        $start = new DateTime($start);
        $end = new DateTime($end);
        $start_time = $start->format('H:i');
        $end_time = $end->format('H:i');
        $i=0;
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;
            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] = $start;
                $time[$i]['end'] = $end;
            }
        }
        return $time;
  }

}