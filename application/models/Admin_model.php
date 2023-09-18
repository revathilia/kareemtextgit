<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
    }



//get data row from table with conditions
public function get_single_data($table,$condition= '',$orderby = ''){
  

  if($orderby){
     $this->db->order_by( $orderby);
  }

         if($condition){
        $this->db->where($condition);
       }
        $result =  $this->db->get($table)->row();
        return $result ; 
}



function if_column_exists( $table, $column ) {
    
    
    if ( empty ( $table ) || empty ( $column ) ) {
        return FALSE;
    }
    if ( $result = $this->db->query( "SHOW COLUMNS FROM $table LIKE '$column'" ) ) {
        if ( !empty($result->result_array())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

public function get_OrderTotal($type='',$date = ''){
    $this->db->select('coalesce(sum(total_amount + vat_amount+shipping_charge-discount),0)totalAmount , count(id)totalCount from order_master') ;
  if($type !=''){
    $this->db->where('type',$type);
  }
   
if($date !=''){
    $this->db->where('created_on',date('Y-m-d'));
}
return  $this->db->get()->row() ;

}


public function get_customers_list($type='',$date = ''){
    
    $session = $this->session->userdata('superadmindet');
    $logged_in_role =  $this->Admin_model->get_type_name_by_id('user_roles','id',$session['userrole'],'belongs_to')  ;
   

    $this->db->select('*') ;
    $this->db->from('customer_master a');
    $this->db->join('order_master b', 'a.id = b.customer_id and a.status ="Y"');
      

 if($logged_in_role == 'school'){
    $this->db->where('b.type','school');
 }else if($logged_in_role == 'industry'){
    $this->db->where('b.type','industry');
 }

return  $this->db->get()->result_array() ;

}

//get all data from table with conditions
public function get_all_data($table,$condition= '',$orderby = ''){
  
if($orderby){
     $this->db->order_by( $orderby);
}

if (  $this->Admin_model->if_column_exists( $table, 'status' ) == TRUE ) {
     $this->db->where('status !=','D');
}


    
       if($condition){
        $this->db->where($condition);
       }

      // print_r($condition);
        $result =  $this->db->get($table)->result_array();
  
        return $result ; 
 

}


// insert data to table and return inserted id
 public function insert_data($table,$data){

   $result = $this->db->insert($table,$data);
   return $this->db->insert_id(); 

 }


 //update existing table data with condition
 public function update_data($table,$condition= '',$data){
    
    if($condition){
        $this->db->where($condition);
       }
    $result = $this->db->update($table,$data);
    
  return true ;



    
 }


 //delete table data with condition
 public function delete_data($table,$condition= ''){
     if($condition){
        $this->db->where($condition);
       }
    $result = $this->db->delete($table,$condition);
    return $result ;
 }

 //delete table data with condition
 public function check_id_exists($table,$id){
     
    $this->db->where('id',$id);

    if (  $this->Admin_model->if_column_exists( $table, 'status' ) == TRUE ) {
     $this->db->where('status !=','D');
    }

    
    $result = $this->db->get($table)->row();
    if(!empty($result)){
      return true ;
    }else{
      return false ;
    }
 }


 //delete table data with condition
 public function get_product_stock($type,$pid){
      
      if($type == 'school'){
        $inventory =  $this->Admin_model->get_all_data('school_inventory',array('product_id'=>$pid)) ;
      }else if($type='industry'){
        $inventory =  $this->Admin_model->get_all_data('industry_inventory',array('product_id'=>$pid));
      }
      $qty = 0 ;
    
    foreach($inventory as $inv){
      if($inv['type'] == 'add'){
        $qty = $qty + $inv['quantity'];
      }else{
        $qty = $qty - $inv['quantity'] ;
      }
      
    }

    return $qty ;

 }


public function get_module($method,$type)
{ 
    //$this->db->where('belongs_to',$type);
    $this->db->where("FIND_IN_SET('".$method."',read_methods)<> 0"); 
    $read = $this->db->get('modules')->row();
 
    //$this->db->where('belongs_to',$type);
    $this->db->where("FIND_IN_SET('".$method."',write_methods)<> 0" ); 
    $write = $this->db->get('modules')->row();
 
 
    if(!empty($read)){
        $result = array('type'=>'read','value'=>$read);
        return $result ;
    }else  if(!empty($write)){
         $result = array('type'=>'write','value'=>$write);
        return $result ;
    }else{
        $result = array('type'=>'na','value'=>'');
        return $result ; 
    }


}


 

    function select_html($from,$fieldid, $name, $field, $type, $class, $e_match = '', $condition = '', $c_match = '', $onchange = '', $condition_type = 'single', $is_none = '')
    {
        $return = '';
        $other = '';
        $multi = 'no';
        $phrase = 'Choose a ' . $name;
        if ($class == 'demo-cs-multiselect') {
            $other = 'multiple';
            $name = $name . '[]';
            if ($type == 'edit') {
                $e_match = json_decode($e_match);
                if ($e_match == NULL) {
                    $e_match = array();
                }
                $multi = 'yes';
            }
        }
        $return = '<select name="' . $name . '" onChange="' . $onchange . '(this.value,this)" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" data-hide-disabled="true" >';
        if (!is_array($from)) {
            if ($condition == '') {
                $all = $this->db->get($from)->result_array();
            } else if ($condition !== '') {
                if ($condition_type == 'single') {
                    $all = $this->db->get_where($from, array(
                        $condition => $c_match
                    ))->result_array();
                } else if ($condition_type == 'multi') {
                    $this->db->where_in($condition, $c_match);
                    $all = $this->db->get($from)->result_array();
                }
            }
            if ($is_none == 'none') {
                $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
            } else {
                $return .= '<option value="">Choose one</option>';
            }
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row[$fieldid] . '">' . $row[$field] . '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row[$fieldid] . '" ';
                    if ($multi == 'no') {
                        if ($row[$fieldid] == $e_match) {
                            $return .= 'selected=."selected"';
                        }
                    } else if ($multi == 'yes') {
                        if (in_array($row[$fieldid], $e_match)) {
                            $return .= 'selected=."selected"';
                        }
                    }
                    $return .= '>' . $row[$field] . '</option>';
                }
            endforeach;
        } else {
            $all = $from;
            if ($is_none == 'none') {
                $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
            } else {
                $return .= '<option value="">Choose one</option>';
            }
            foreach ($all as $row):
                if ($type == 'add') {
                    $return .= '<option value="' . $row . '">';
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->Admin_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    $return .= '</option>';
                } else if ($type == 'edit') {
                    $return .= '<option value="' . $row . '" ';
                    if ($row == $e_match) {
                        $return .= 'selected=."selected"';
                    }
                    $return .= '>';
                    if ($condition == '') {
                        $return .= ucfirst(str_replace('_', ' ', $row));
                    } else {
                        $return .= $this->Admin_model->get_type_name_by_id($condition, $row, $c_match);
                    }
                    $return .= '</option>';
                }
            endforeach;
        }
        $return .= '</select>';
        return $return;
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

   
 

public function translate($string)
  {   

 $session = $this->session->userdata('lang');


     if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
      $this->session->set_userdata('dir', 'ltr');
    }  

     $language =  $this->session->userdata('lang');


    if($language=='eng'){
        $language='English' ;
    }elseif($language=='ar'){
        $language='Arabic' ;
    }
    $translatedstring = "";
     $translatedstring =  $this->Admin_model->get_type_name_by_id('translation_strings','string', $string, $language);

     if($translatedstring==""){
         return $string  ;
     }else{
         return  $translatedstring ;
     }
    
  }


 public function apitranslate($string,$language)
  {
    if($language=='eng'){
        $language='English' ;
    }elseif($language=='ar'){
        $language='Arabic' ;
    }
    $translatedstring = "";
     $translatedstring =  $this->Admin_model->get_type_name_by_id('translation_strings','string', $string, $language);

     if($translatedstring==""){
         return $string  ;
     }else{
         return  $translatedstring ;
     }
    
  }
  
}