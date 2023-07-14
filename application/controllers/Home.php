<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'vendor/autoload.php';


class Home extends CI_Controller {
    public function __construct() { 
        parent::__construct();
        
        // Load the admin model
        $this->load->model('Admin_model'); 
        $this->load->model('User_model'); 
        $this->load->library('Ajax_pagination');
        $this->perPage = 9;
        $this->perPageschool = 12;    
        $this->uri_segment = 3;
    }

  /*Function to set JSON output*/
  public function output($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
  }
   public function home()
  {  
   $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $this->session->set_userdata('lastpage', $this->router->fetch_method());
       $this->load->view('home/index');
  }
  public function index()
  {  
    $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $this->session->set_userdata('lastpage', $this->router->fetch_method());
       $this->load->view('home/index');
  }
  public function signup()
  {   
      $this->load->view('home/signin');
  }
  public function login()
  {   
     
       $this->load->view('home/login');
  }
  public function wishlist()
  {  
  $this->session->set_userdata('lastpage', $this->router->fetch_method());
   $homesession = $this->session->userdata('customerdet');
    if(empty($homesession)){ 
     echo false ;
     exit ;
    }

    $data['wishlist'] = $this->Admin_model->get_all_data('wishlist',array('user_id'=>$homesession['user_id']));
    $this->load->view('home/wishlist',$data);
  }
  public function about()
  {   
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
       $this->load->view('home/home');
  }
   public function profile()
  {   
     
    $homesession = $this->session->userdata('customerdet');
    if(empty($homesession)){ 
     echo false ;
     exit ;
    }

    $data['profile'] = $this->Admin_model->get_single_data('customer_master',array('id'=>$homesession['user_id'])) ;

    $data['addresses'] = $this->Admin_model->get_single_data('customer_address',array('customer_id'=>$homesession['user_id'])) ;


       $this->load->view('home/profile',$data);
  }
  public function industry()
  {   
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
      $data['categories'] = $this->Admin_model->get_all_data('categories',''); 
      $data['products'] = $this->Admin_model->get_all_data('industry_products','');
      $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('type'=>'I'));
      $data['colors'] = $this->Admin_model->get_all_data('color_master',array('type'=>'I'));


if(!empty($this->User_model->getRows())){
$totalRec = count($this->User_model->getRows());
}
else{
$totalRec = 0;
}


       //pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/ajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);



      $this->load->view('home/shop',$data);
  }

   function ajaxlisted(){



$conditions = array();
//calc offset number
$page = $this->input->post('page');
if(!$page){ 
$offset = 0;
}else{
$offset = $page;
}
 
//category filter
$category = "";
if(!empty($this->input->post('category'))){
$category = $this->input->post('category') ;
}
 
if(!empty($category)){
$conditions['search']['category'] = $category;
}
 

//price filter
$pricerange = "";
if(!empty($this->input->post('price'))){
$pricerange = $this->input->post('price') ;
}
 
if(!empty($pricerange)){
$conditions['search']['pricerange'] = $pricerange;
}

//color filter
$colors = "";
if(!empty($this->input->post('colors'))){
$colors = $this->input->post('colors') ;
}
 
if(!empty($colors)){
$conditions['search']['colors'] = $colors;
}

//gender filter
$gender = "";
if(!empty($this->input->post('gender'))){
$gender = $this->input->post('gender') ;
}
 
if(!empty($gender)){
$conditions['search']['gender'] = $gender;
}

 
//size filter
$sizes = "";
if(!empty($this->input->post('sizes'))){
$sizes = $this->input->post('sizes') ;
}
 
if(!empty($sizes)){
$conditions['search']['sizes'] = $sizes;
}

$sortby = "";
if(!empty($this->input->post('sortby'))){
$sortby = $this->input->post('sortby') ;
// $category=explode(',', $category);
}

if(!empty($sortby)){
$conditions['search']['sortby'] = $sortby;
}

$searchtext = "";
if(!empty($this->input->post('searchtext'))){
$searchtext = $this->input->post('searchtext') ;
// $category=explode(',', $category);
}

if(!empty($searchtext)){
$conditions['search']['searchtext'] = $searchtext;
}
 
//total rows count
if(!empty($this->User_model->getRows($conditions))){
$totalRec = count($this->User_model->getRows($conditions));
}
else{
$totalRec = 0;
}
//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/ajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);
//set start and limit
$conditions['start'] = $offset;
$conditions['limit'] = $this->perPage;
//get posts data
$data['products'] = $this->User_model->getRows($conditions);
//load the view 
$this->load->view('home/ajaxlisted', $data, false);
}


 public function alluniforms()
  {   
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
      $data['categories'] = $this->Admin_model->get_all_data('uniform_categories',''); 
      $data['products'] = $this->Admin_model->get_all_data('school_products','');
      $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('type'=>'S'));
      $data['colors'] = $this->Admin_model->get_all_data('color_master',array('type'=>'S'));

 $data['schools'] = $this->Admin_model->get_all_data('school_master','');
 $data['standards'] = $this->Admin_model->get_all_data('standard_master','');

if(!empty($this->User_model->getuniformRows())){
$totalRec = count($this->User_model->getuniformRows());
}
else{
$totalRec = 0;
}


       //pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/uniformajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);



      $this->load->view('home/uniform-shop',$data);
  }

function uniformajaxlisted(){



$conditions = array();
//calc offset number
$page = $this->input->post('page');
if(!$page){ 
$offset = 0;
}else{
$offset = $page;
}
 
//category filter
$school = "";
if(!empty($this->input->post('school'))){
$school = $this->input->post('school') ;
}
 
if(!empty($school)){
$conditions['search']['school'] = $school;
}
 

//price filter
$pricerange = "";
if(!empty($this->input->post('price'))){
$pricerange = $this->input->post('price') ;
}
 
if(!empty($pricerange)){
$conditions['search']['pricerange'] = $pricerange;
}

//color filter
$colors = "";
if(!empty($this->input->post('colors'))){
$colors = $this->input->post('colors') ;
}
 
if(!empty($colors)){
$conditions['search']['colors'] = $colors;
}

//gender filter
$gender = "";
if(!empty($this->input->post('gender'))){
$gender = $this->input->post('gender') ;
}
 
if(!empty($gender)){
$conditions['search']['gender'] = $gender;
}

 
//size filter
$sizes = "";
if(!empty($this->input->post('sizes'))){
$sizes = $this->input->post('sizes') ;
}
 
if(!empty($sizes)){
$conditions['search']['sizes'] = $sizes;
}

//size filter
$standards = "";
if(!empty($this->input->post('standards'))){
$standards = $this->input->post('standards') ;
}
 
if(!empty($sizes)){
$conditions['search']['standards'] = $standards;
}

$sortby = "";
if(!empty($this->input->post('sortby'))){
$sortby = $this->input->post('sortby') ;
// $category=explode(',', $category);
}

if(!empty($sortby)){
$conditions['search']['sortby'] = $sortby;
}

$searchtext = "";
if(!empty($this->input->post('searchtext'))){
$searchtext = $this->input->post('searchtext') ;
// $category=explode(',', $category);
}

if(!empty($searchtext)){
$conditions['search']['searchtext'] = $searchtext;
}
 
//total rows count
if(!empty($this->User_model->getuniformRows($conditions))){
$totalRec = count($this->User_model->getuniformRows($conditions));
}
else{
$totalRec = 0;
}
//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/uniformajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);
//set start and limit
$conditions['start'] = $offset;
$conditions['limit'] = $this->perPage;
//get posts data
$data['products'] = $this->User_model->getuniformRows($conditions);
//load the view 
$this->load->view('home/uniformajaxlisted', $data, false);
}




public function school()
  {   
    
      $this->session->set_userdata('lastpage', $this->router->fetch_method());
      $data['schools'] = $this->Admin_model->get_all_data('school_master',array('status' => 'Y'));
      


if(!empty($this->User_model->getSchools())){
$totalRec = count($this->User_model->getSchools());
}
else{
$totalRec = 0;
}


       //pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/schoollistajax';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPageschool;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);

$this->load->view('home/school-shop',$data);
  }

   function schoollistajax(){



$conditions = array();
//calc offset number
$page = $this->input->post('page');
if(!$page){ 
$offset = 0;
}else{
$offset = $page;
}
 
  
 

$sortby = "";
if(!empty($this->input->post('sortby'))){
$sortby = $this->input->post('sortby') ;
// $category=explode(',', $category);
}

if(!empty($sortby)){
$conditions['search']['sortby'] = $sortby;
}

$searchtext = "";
if(!empty($this->input->post('searchtext'))){
$searchtext = $this->input->post('searchtext') ;
// $category=explode(',', $category);
}

if(!empty($searchtext)){
$conditions['search']['searchtext'] = $searchtext;
}
 
//total rows count
if(!empty($this->User_model->getSchools($conditions))){
$totalRec = count($this->User_model->getSchools($conditions));
}
else{
$totalRec = 0;
}
//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'home/schoollistajax';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPageschool;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);
//set start and limit
$conditions['start'] = $offset;
$conditions['limit'] = $this->perPageschool;
//get posts data
$data['schools'] = $this->User_model->getSchools($conditions);
//load the view 
$this->load->view('home/schoollistajax', $data, false);
}


  
  public function getschooldet()
  {  

     $school = $this->input->post('schoolid') ;
     $schools = $this->Admin_model->get_single_data('school_master',array('id'=>$school));
     $levels = $schools->class_levels ;
     $type = $schools->school_type ;

     $data['schoolid'] =  $school  ;
     $data['logo'] =  $schools->school_logo  ;
     $data['type'] =   $type ;
     //$levels = explode(',',$levels);

    $this->db->select('standards');
     $this->db->where('id', $school);
     $this->db->where('status', 'Y');
     
     $standards = $this->db->get('school_master')->result_array();

    
     $lev = array();  
foreach($standards as $l){
$cls = explode(',',$l['standards']);
foreach($cls as $cl){
  $lev[] = $cl ;
} 
}
if(!empty($lev)){

  $this->db->select('id,standard_name');
  $this->db->where_in('id',  $lev);
  $data['classes'] = $this->db->get('standard_master')->result_array();
  
  $this->load->view('home/uniform_select',$data);
}else{
  echo false ;
}

    
  }

  function uniform_tosession(){
     $formdata =  $this->input->post('uniformdata');
    if(!empty($formdata)){
     parse_str($this->input->post('uniformdata'), $data_array);
     $uniformdata = array(
     'schoolid' => $data_array['schoolid'],
     'gender' =>  $data_array['gender'],
     'class' =>  $data_array['selected_class'],      
     );
     // Add uniform data in session
     $this->session->set_userdata('uniformdata', $uniformdata);
     if($uniformdata){
          echo 1 ;
     }else{
        echo 0 ;
     }
    }else{
     redirect('home/school', 'refresh');  
    }
  }


  public function uniform_details()
  {   
     $id = $this->uri->segment(3) ;
     $data['uniformdata'] = $this->Admin_model->get_single_data('school_products',array('id'=>$id));
         
     $pimages  = array();
     $pimage = '' ;
     $product_images = $this->Admin_model->get_all_data('school_product_images',array('product_id'=>$id)); 
    foreach($product_images as $images){
     $pimage .= "," .$images['product_images'];
    }
    $pimages  = explode(',',$pimage) ; 
    $data['product_images'] = $pimages ;
      $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$id,'status'=>'Y'));  
   //  $data['inventory'] = $this->get_stock_det($id); 
     $this->load->view('home/school-product-details', $data);
  }


  public function confirm_uniform(){
    $uniformsession = $this->session->userdata('uniformdata');
    if(!empty($uniformsession)){
   // $class_level = $this->Admin_model->get_type_name_by_id('standard_master','id',$uniformsession['class'],'type_id');


$levelstds = $this->Admin_model->get_type_name_by_id('school_master','id',$uniformsession['schoolid'],'levels_standards');

$levelstandards = json_decode($levelstds,true) ; 
$level = 0 ;
 foreach ($levelstandards as $lsval) { 

  if($lsval['standards'] == $uniformsession['class'] ){
    $level = $lsval['standards'] ;
  }


      }

    $get_uniforms = $this->Admin_model->get_all_data('uniform_school_relation',array('school_id'=>$uniformsession['schoolid'],'status'=>1 , 'find_in_set("'.$level.'", class_level) <> 0'));


    if($uniformsession['gender'] == 'male'){
        $gender = 1 ;
    }else if($uniformsession['gender'] == 'female'){
        $gender = 2 ;
    }
    $data = array();
    if(!empty($get_uniforms)){

  
      foreach($get_uniforms as $uniform){

          $this->db->where('id',$uniform['uniform_id']);
          $this->db->group_start();
          $this->db->where("find_in_set( $gender, genders)");
          $this->db->group_end();
          $uniformdata = $this->db->get('school_products')->row();

          if(!empty($uniformdata)){
                $udata[] = $uniformdata ;
                $schoolid[] = $uniformsession['schoolid'] ;
                $gender_selected[] = $gender ;
                $pimages  = array();
                $pimage = '' ;
                $product_images = $this->Admin_model->get_all_data('school_product_images',array('product_id'=>$uniform['uniform_id'])); 
              foreach($product_images as $images){
                $pimage .= "," .$images['product_images'];
              }
              $pimages  = explode(',',$pimage) ; 
          $product_images[] = $pimages ;
          $product_price[] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniform['uniform_id'],'status'=>'Y'));  
          }
          $data['uniformdata'] = $udata ;
          $data['schoolid'] = $schoolid ;
          $data['gender_selected'] = $gender_selected ;
          $data['product_images'] = $product_images ;
          $data['product_price'] = $product_price;  
      }
    }
     

 
    if(!empty( $data)){
        $this->load->view('home/confirm_uniform',$data);
    } else{
        redirect('home/school','refresh');
    }
    }else{
        redirect('home/school','refresh');
    }
  }


public function uniform(){
    $uniformsession = $this->session->userdata('uniformdata');
    if(!empty($uniformsession)){
   // $class_level = $this->Admin_model->get_type_name_by_id('standard_master','id',$uniformsession['class'],'type_id');

      $levelstds = $this->Admin_model->get_type_name_by_id('school_master','id',$uniformsession['schoolid'],'levels_standards');

$levelstandards = json_decode($levelstds,true) ; 
$level = 0 ;
 foreach ($levelstandards as $lsval) { 

  if($lsval['standards'] == $uniformsession['class'] ){
    $level = $lsval['standards'] ;
  }


      }


    $get_uniforms = $this->Admin_model->get_all_data('uniform_school_relation',array('school_id'=>$uniformsession['schoolid'],'status'=>1 , 'find_in_set("'.$level.'", class_level) <> 0'));
    if($uniformsession['gender'] == 'male'){
        $gender = 1 ;
    }else if($uniformsession['gender'] == 'female'){
        $gender = 2 ;
    }
    $data = array();
 
    if(sizeof($get_uniforms)>1 ){


        $udata = array() ;
        $schoolid  = array() ;
        $gender_selected  = array() ;
        $product_images = array() ;
        $product_price= array() ;


        
      foreach($get_uniforms as $uniform){

        $this->db->where('id',$uniform['uniform_id']);
        $this->db->group_start();
        $this->db->where("find_in_set( $gender, genders)");
        $this->db->group_end();
        $uniformdata = $this->db->get('school_products')->row();
      

        if(!empty($uniformdata)){
              $udata[] = $uniformdata ;
              $schoolid[] = $uniformsession['schoolid'] ;
              $gender_selected[] = $gender ;
              $pimages  = array();
              $pimage = '' ;
              $product_images = $this->Admin_model->get_all_data('school_product_images',array('product_id'=>$uniform['uniform_id'])); 
            foreach($product_images as $images){
              $pimage .= "," .$images['product_images'];
            }
            $pimages  = explode(',',$pimage) ; 
        $product_images[] = $pimages ;
        $product_price[] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniform['uniform_id'],'status'=>'Y'));  
        }
        
    }
        $data['uniformdata'] = $udata ;
        $data['schoolid'] = $schoolid ;
        $data['gender_selected'] = $gender_selected ;
        $data['product_images'] = $product_images ;
        $data['product_price'] = $product_price; 

       

      if(!empty( $data)){

       // echo 'from view' ;
      $this->load->view('home/confirm_uniform',$data);
      } else{
          redirect('home/school','refresh');
      }


    }else if(sizeof($get_uniforms) == 1 ){

      foreach($get_uniforms as $uniform){

        $this->db->where('id',$uniform['uniform_id']);
        $this->db->group_start();
        $this->db->where("find_in_set( $gender, genders)");
        $this->db->group_end();
        $uniformdata = $this->db->get('school_products')->row();

        if(!empty($uniformdata)){
              $data['uniformdata'] = $uniformdata ;
              $data['schoolid'] = $uniformsession['schoolid'] ;
              $data['gender_selected'] = $gender ;
              $pimages  = array();
              $pimage = '' ;
              $product_images = $this->Admin_model->get_all_data('school_product_images',array('product_id'=>$uniform['uniform_id'])); 
            foreach($product_images as $images){
              $pimage .= "," .$images['product_images'];
            }
            $pimages  = explode(',',$pimage) ; 
        $data['product_images'] = $pimages ;
        $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniform['uniform_id'],'status'=>'Y'));  
        }
    }

  if(!empty( $data)){
      $this->load->view('home/school-product-details',$data);
  } else{
      redirect('home/school','refresh');
  }

    }else{
      redirect('home/school','refresh');
  }
    
    }else{
        redirect('home/school','refresh');
    }
  }

  public function contact()
  {   
       $this->load->view('home/contact');
  }

 
  public function send_enquiry() {
    
    $firstname = $this->input->post('name');
    $email = $this->input->post('email');
    $subject = $this->input->post('subject');
    $phone = $this->input->post('phone');
    $message = $this->input->post('message');
    $message = $this->input->post('message');
    date_default_timezone_set('Asia/Riyadh');
    $today      = date("Y-m-d H:i:s");

     $Return = array('result'=>'', 'error'=>'');

    /* Server side PHP input validation */    
    if($this->input->post('name')==='') {
          $Return['error'] = "Please enter your name ";
    }else if($this->input->post('email')==='') {
          $Return['error'] = "Please enter a valid Email ID";
    } else if (filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL) === false)  {
     $Return['error'] = $this->Admin_model->translate("Invalid Email ID entered");
    } else if($this->input->post('phone')==='') {
          $Return['error'] = "Please enter Phone No.";
    }else if($this->input->post('subject')==='') {
          $Return['error'] = "Please add your subject of enquiry";
    }else if($this->input->post('message')==='') {
          $Return['error'] = "Please add your message ";
    }  


      if($Return['error']!=''){
        $output['status'] = 'ERROR';
        $output['message'] = $Return['error'];
        echo json_encode($output);
        exit ;
      }


    $fname = '' ;

     if(is_uploaded_file($_FILES['attachment']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['attachment']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["attachment"]["tmp_name"];
        $profile = "uploads/images/enquiry/";
        
        $name = basename($_FILES["attachment"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = round(microtime(true)).'_'.$name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
         
        $output['status'] = 'ERROR';
        $output['message'] = 'Invalid file format';
         echo json_encode($output);
         exit ;

      }
     
  }


    
    $data = array(
      'name' => $firstname ,
      'email' => $email,
      'phone' => $phone,
      'subject' => $subject,
      'message' => $message,
      'attachment' =>$fname,
      'created_on' => $today ,
      'status' => 1
    );

   $insert =  $this->db->insert('enquiry_messages',$data);
     
       
                
      
      if($insert){
         $output['status'] = 'SUCCESS';
         $output['message'] = 'Your enquiry has been sent.';
          
      } else {
        $output['status'] = 'ERROR';
        $output['message'] = 'Failed to send enquiry';
      }
      
    
    echo json_encode($output);
  }

 

  public function product_details()
  {   
     $id = $this->uri->segment(3) ;
     $data['product'] = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));
         
     $pimages  = array();
     $pimage = '' ;
     $product_images = $this->Admin_model->get_all_data('industry_product_images',array('product_id'=>$id)); 
    foreach($product_images as $images){

     
      $colors = explode( ',', $data['product']->colors_available) ;

      if(in_array($images['color_id'], $colors)){
         $pimage .= "," .$images['product_images'];
      }
 
    }

    $pimages  = explode(',',$pimage) ; 
    $data['product_images'] = $pimages ;
    $data['product_price'] = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$id,'status'=>'Y'),'product_price asc');  
   //  $data['inventory'] = $this->get_stock_det($id); 
     $this->load->view('home/product-details', $data);
  }
public function get_price_with_size(){
  $product = $this->input->post('product');
  $size = $this->input->post('size');

   $type = $this->input->post('type');

   $Return = array('price_det1'=>'','price_det2'=>'');


$price_det1 = '' ;
$price_det2 = '' ;
 

  if($type == 'industry'){
    $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=> $product ,'size_id' =>$size ,'status'=>'Y')); 
  }else{
    $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=> $product ,'size_id' =>$size ,'status'=>'Y')); 
  }

 $price = '' ;
 $offprice = '' ;


$price = ($product_price->offer_price != 0) ? $product_price->offer_price : $product_price->product_price ;

$offprice = ($product_price->offer_price != '0') ? '<del>SAR ' . $product_price->product_price .'</del>' :  '' ;

   $price_det1 =   '<span>SAR ' . $price . '</span> ';
   $price_det1 .= '<input type="hidden" name="product_price" value="'.   $price .'">';
   $price_det1 .= $offprice ;
 
                                         
  $Return['price_det1'] = $price_det1 ;
  $Return['price_det2'] = '<span>SAR '.  $price .'</span>' ;

 
$this->output($Return);
exit;


}

  public function get_stock_det($product_id){
   $inventory_data =  $this->Admin_model->get_all_data('industry_inventory', array('product_id',$product_id));
    //    foreach($inventory_data as $data){
    //    }
  }

  function addtocart()
  {
    
   $pagetype =  $this->input->post('pagetype');
   $type =  $this->input->post('type');
  if($pagetype == "detail"){
    parse_str($this->input->post('formdata'), $data_array);
   }else if($pagetype == "home" && $type == "industry")
   {
    $data_array['product_id']= $this->input->post('formdata');
    $product = $this->Admin_model->get_single_data('industry_products',array('id'=>$data_array['product_id']));
    $data_array['color_selected'] = explode(',', $product->colors_available)[0];
    $data_array['size_selected'] = explode(',', $product->sizes_available)[0];
    $data_array['gender_selected'] = explode(',', $product->genders)[0];
    $product_price= $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$data_array['product_id'],'status'=>'Y','size_id'=>$data_array['size_selected']));  
    $data_array['product_price'] =  $product_price->product_price;
   } //echo  $data_array->product_id;
   if( $type == 'industry'){
  // Set array for send data.
    $data = array(
      'id' => (int) $data_array['product_id'],
      'name' => htmlspecialchars($this->Admin_model->get_type_name_by_id('industry_products','id',$data_array['product_id'],'product_name') ),
      'price' => $data_array['product_price'],
      'qty' => 1,
        'color' =>$data_array['color_selected'],
      'size' =>$data_array['size_selected'],
      'gender'=>$data_array['gender_selected'],      
      'type' => 'industry'
      );   
   }else{
    $this->session->unset_userdata('uniformdata');
       // Set array for send data.
      $data = array(
        'id' => (int) $data_array['product_id'],
        'name' => htmlspecialchars($this->Admin_model->get_type_name_by_id('school_products','id',$data_array['product_id'],'product_name') ),
        'price' => $data_array['product_price'],
        'qty' => 1,
         // 'color' =>$data_array['color_selected'],
        'size' =>$data_array['size_selected'],
        'gender'=>$data_array['gender_selected'],          
        'type' => 'school'
        );   
    }
    $result = $this->cart->insert($data);
    if($result) {
      $Return['result'] = true;
      $rows = count($this->cart->contents());
      $Return['items'] = $rows;
    } else {
      $Return['result'] = false;
    }
    $this->output($Return);
    exit;
   
  }
  function quick_view(){
   $productid = $this->input->post('productid');
   $from = $this->input->post('from');

   if($from == 'industry'){
     $data['product'] = $this->Admin_model->get_single_data('industry_products',array('id'=>$productid));
     $data['product_price'] = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$productid,'status'=>'Y'));  
 
    }else{
        $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$productid,'status'=>'Y'));  
        $data['product'] = $this->Admin_model->get_single_data('school_products',array('id'=>$productid));
      }
      $data['folder'] = $from  ;
      $this->load->view('home/quick_view',$data) ;
  }

   function add_to_wishlist(){
    
    $homesession = $this->session->userdata('customerdet');
    if(empty($homesession)){ 
     echo false ;
     exit ;
    }


   $productid = $this->input->post('productid');
   $from = $this->input->post('from');

   if($from == 'industry'){
     $data['product'] = $this->Admin_model->get_single_data('industry_products',array('id'=>$productid));
     $data['product_price'] = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$productid,'status'=>'Y'));  



 
    }else{
        $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$productid,'status'=>'Y'));  
        $data['product'] = $this->Admin_model->get_single_data('school_products',array('id'=>$productid));
      }
      $data['folder'] = $from  ;

$wishlist = array('user_id'=> $homesession['user_id'],
'type' => $from,
'product_id'=> $productid,
'created_on'=> date('Y-m-d H:i')
);
     $this->Admin_model->insert_data('wishlist',$wishlist) ;


      $this->load->view('home/added_to_wishlist',$data) ;
  }


  
  function added_tocart(){
     $productid = $this->input->post('productid');
     $from = $this->input->post('from');
  
     if($from == 'industry'){
       $data['product'] = $this->Admin_model->get_single_data('industry_products',array('id'=>$productid));
     }else{
       $data['product'] = $this->Admin_model->get_single_data('school_products',array('id'=>$productid));
     }
     $data['folder'] = $from  ;
     $this->load->view('home/added_to_cart',$data) ;
    }

 
  function viewcart()
  {
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
    $this->load->view('home/cart');
  }

  function loadcartqty()
  {
  $rows = count($this->cart->contents());
  echo  $rows ;
  }
  function remove($rowid) {
      $viewname =  $_POST['viewname'] ;
  // Check rowid value.
      if ($rowid==="all"){
      // Destroy data which store in  session.
      $this->cart->destroy();
      }else{
      // Destroy selected rowid in session.
      $data = array(
      'rowid'   => $rowid,
      'qty'     => 0
      );
      // Update cart data, after cancle.
      $this->cart->update($data);
      }
      if($viewname=="checkout"){
          //echo $viewname ;
        $this->load->view('home/loadcheckout');
      }else if($viewname=="viewcart"){
          $this->load->view('home/loadcart');
          //echo $viewname ;
      }
      else if($viewname=="cart"){
          $this->viewcart();
          //echo $viewname ;
      }
      // This will show cancle data in cart.
      //redirect('user/home/viewcart');
  }

  function update_cart(){
      $viewname =  $this->input->post('viewname') ;
      //$this->load->library("cart");
      // Recieve post values,calcute them and update
      $rowid = $this->input->post('rowid');
      $price = $this->input->post('price');
      $qty = $this->input->post('qty');

      $data = array(
          'rowid' => $rowid,
          'price' => $price ,          
          'qty' => $qty
          );
     // print_r($data);
   $this->cart->update($data);
      if($viewname=="checkout"){
          //echo $viewname ;
        $this->load->view('home/loadcheckout');
      }else if($viewname=="viewcart"){
          $this->load->view('home/loadcart');
          //echo $viewname ;
      }
      }
  function checkout()
  { 

    $homesession = $this->session->userdata('customerdet');
    if(empty($homesession)){ 
     redirect('home/login');
    }

     $data['profile'] = $this->Admin_model->get_single_data('customer_master',array('id'=>$homesession['user_id'])) ;

    $data['addresses'] = $this->Admin_model->get_single_data('customer_address',array('customer_id'=>$homesession['user_id'])) ;


  
    $this->load->view('home/checkout',$data);
     
  }

  public function place_order()
  {   
     $Return = array('result'=>'', 'error'=>'');  
     if($Return['error']!=''){
        $this->output($Return);
    }

    $include_logo = false ;
    $fname = '' ;

     $homesession = $this->session->userdata('customerdet');
       $custId = $homesession['user_id'];

        $data = array(   
          'customer_id' => $custId ,
          'first_name' => $this->input->post('ltn__name'),
          'last_name'=>$this->input->post('ltn__lastname'),
          'email_address'=>$this->input->post('ltn__email'),
          'phone_no'=>$this->input->post('ltn__phone'),
          'company_name'=>$this->input->post('ltn__company'),
          'company_address'=>$this->input->post('ltn__company_address'),
          'address_line1'=>$this->input->post('address_line1'),
          'address_line2'=>$this->input->post('address_line2'),
          'city'=>$this->input->post('city'),
          'state'=>$this->input->post('state'),
          'zip_code'=>$this->input->post('zip_code'),
          'country'=>$this->input->post('country'),
          );

       

$exists = $this->Admin_model->get_single_data('customer_address',$data) ;

if(empty($exists)){
  $result = $this->Admin_model->insert_data('customer_address', $data);
  $addressId =  $this->db->insert_id();
$this->Admin_model->update_data('customer_address',array('customer_id'=> $custId),array('default_address'=>'N')) ;

$this->Admin_model->update_data('customer_address',array('customer_id'=> $custId,'id'=>$addressId ),array('default_address'=>'Y')) ;

}
          

          if($this->input->post('include_logo')){

            $include_logo = true ;

            if(is_uploaded_file($_FILES['identity_card']['tmp_name'])) {
              //checking image type
              $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
              $filename = $_FILES['identity_card']['name'];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              if(in_array($ext,$allowed)){
                $tmp_name = $_FILES["identity_card"]["tmp_name"];
                $profile = "uploads/images/industry/";
                $set_img = base_url()."uploads/images/industry/";
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["identity_card"]["name"]);
               // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
        
                $newfilename = round(microtime(true)).'_'.$name ;
                move_uploaded_file($tmp_name, $profile.$newfilename);
                $fname = $newfilename;
                 
         
          }else {
                $Return['error'] = $this->Admin_model->translate("Invalid file format");
              }
            if($Return['error']!=''){
              $this->output($Return);
            }
          }

          }


$paymentType = $this->input->post('paymentType') ;

if($paymentType == 'check'){

$cart = $this->cart->contents() ;
          foreach($cart as $cartdata){
               $order_data = array(
                    'customer_id' => $custId   ,
                    'order_details' => json_encode($cartdata),
                    'address_details' => json_encode($data),
                    'total_amount' => $cartdata['subtotal'],
                    'type' => $cartdata['type'],
                    'include_logo' => $include_logo,
                    'identity_card' => $fname ,
                    'paymentType' => $paymentType ,
                    'payment_status' => 'N',
                    'vat_amount' => 0,
                    'shipping_charge' => 0,
                    'created_on' => date('Y-m-d H:i:s'), 
                    'status' => 1,
                    'notes' => $this->input->post('ltn__message')
                 ) ;
            $result = $this->Admin_model->insert_data('order_master', $order_data);
          }

    if ($result == TRUE) {     
      //get setting info 
       $Return['result'] = 'Order Placed Successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;



}else{

  $cart = $this->cart->contents() ;
  $total = 0 ;
          foreach($cart as $cartdata){
               $order_data = array(
                    'customer_id' => $custId   ,
                    'order_details' => json_encode($cartdata),
                    'address_details' => json_encode($data),
                    'total_amount' => $cartdata['subtotal'],
                    'type' => $cartdata['type'],
                    'include_logo' => $include_logo,
                    'identity_card' => $fname ,
                    'payment_type' => $paymentType ,
                    'payment_status' => 'N',
                    'vat_amount' => 0,
                    'shipping_charge' => 0,
                    'created_on' => date('Y-m-d H:i:s'), 
                    'status' => 1,
                    'notes' => $this->input->post('ltn__message')
                 ) ;
            $cardpayment = $this->Admin_model->insert_data('order_master', $order_data);
            $total = $total + $cartdata['subtotal'] ;
          }

$checkoutId = $this->payment($total) ;

$checkout = array('result'=>'payment','checkoutId'=> $checkoutId) ;
echo json_encode($checkout) ;
exit ;

}        
   
  }


   public function hyperpay(){

    $data['checkoutId']= $this->input->get('id');
    $this->load->view('home/hyperpay',$data);


  }

  public function paymentstatus()
  {
     

  
  $resourcePath = $this->input->get('resourcePath');
  $id = $this->input->get('id');

 
  $url = "https://test.oppwa.com/v1/checkouts/".$id."/payment" ;
  $url .= "?entityId=8a8294174d0595bb014d05d829cb01cd";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $responseData = curl_exec($ch);
  if(curl_errno($ch)) {
    return curl_error($ch);
  }
  curl_close($ch);
if(!empty(  $responseData)){
  $responsearray = json_decode( $responseData,true);
  print_r( $responsearray );

}
 
}



  public function payment($amount){

  $url = "https://test.oppwa.com/v1/checkouts";
  $data = "entityId=8a8294174d0595bb014d05d829cb01cd" .
                "&amount=".$amount.
                "&currency=SAR" .
                "&paymentType=DB";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $responseData = curl_exec($ch);
  if(curl_errno($ch)) {
    return curl_error($ch);
  }
  curl_close($ch);
  
  if(!empty($responseData)){
    $responsearray = json_decode($responseData,true) ;
    
    $code = $responsearray['result']['code']  ;

    if($code == '000.200.100'){
      return $responsearray['id'] ;
    }

  }

  }

    public function submitsignup()
  {   
    $Return = array('result'=>'', 'error'=>'');
     
      if($this->input->post('phone')==='') {
        $Return['error'] = "Phone number Required";
      }  else if(!preg_match('/^[0-9]{9}+$/', $this->input->post('phone'))){
         $Return['error'] = "Invalid Phone Number, use 123456789 format";
      }     
      if($Return['error']!=''){
            $this->output($Return);
            exit ;
        }
      $data = array(   
      // 'name' => $this->input->post('name'),
      // 'email' => $this->input->post('email'),
      'phone_no' => $this->input->post('phone'),
        );
$exists = $this->db->get_where('customer_master',array('phone_no'=>$this->input->post('phone')))->row();


if(!empty($exists)){
    $result = 'exists' ;
} else{
   $result = $this->db->insert('customer_master',$data);
    $inserid =  $this->db->insert_id();

   
}
   
if(!empty($exists)){
$Return['result'] = 'User already signed-up. Please Login';
}else if ($result == TRUE) {
        $Return['result'] = 'Signed up successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }


      public function update_customer()
  {   
    $Return = array('result'=>'', 'error'=>'');

     $homesession = $this->session->userdata('customerdet');

     
      if($this->input->post('phone')==='') {
        $Return['error'] = "Phone number Required";

        $output['status'] = 'ERROR';
        $output['message'] = "Phone number Required";

      }  else if(!preg_match('/^[0-9]{9}+$/', $this->input->post('phone'))){
         $Return['error'] = "Invalid Phone Number, use 123456789 format";

        $output['status'] = 'ERROR';
        $output['message'] = "Invalid Phone Number, use 123456789 format";


      } else if($this->input->post('first_name') == ''){
        $Return['error'] = "Phone number Required";

        $output['status'] = 'ERROR';
        $output['message'] = "First Name required";
      }   


      if($Return['error']!=''){
            echo json_encode($output);
            exit ;
        }
      $data = array(   
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),

      'email_address' => $this->input->post('email'),
      'phone_no' => $this->input->post('phone'),
        );
 
      $this->db->where('id',$homesession['user_id']);
      $result = $this->db->update('customer_master',$data);

    if ($result == TRUE) {

        $output['status'] = 'SUCCESS';
        $output['message'] = 'Profile updated successfully.';


      
      } else {
        
        $output['status'] = 'ERROR';
        $output['message'] = 'Bug. Something went wrong, please try again';

      }
      
      echo json_encode($output);
    }


  public function otp()
  {   
       $this->load->view('home/otp');
  }
  
  public function sentotp()
  {   
    $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('phone')==='') {
      $Return['error'] = "Phone number Required";
    } 
    
    $this->db->where('phone_no',$this->input->post('phone'));
    $query = $this->db->get('customer_master');
    if ($query->num_rows() == 0){
      $Return['error'] = "Phone number does not exists";
    }

    if($Return['error']!=''){
          $this->output($Return);
          exit ;
      }

     // $otp = 1111;

     $otp =   rand(1000 , 9999);
      $data = array(   
      'otp' => $otp,
        );

        $this->db->where('phone_no',$this->input->post('phone'));
        $queryres = $this->db->get('customer_master')->row();

        $this->db->where('id',$queryres->id);
        $result = $this->db->update('customer_master',$data);
       

        $success = $this->sendSMS($this->input->post('phone'), $otp);
 
        if( $success == 'success'){

           if ($result == TRUE) {
              $Return['result'] = $queryres->phone;
            } else {
              $Return['error'] =  'Bug. Something went wrong, please try again';
            }

        }else{
            $Return['error'] =  $success;
        }

    $this->output($Return);
    exit;
  }

  public function verifyotp()
  {
    $Return = array('result'=>'', 'error'=>'');
    $phone =$this->input->post('phone');
    $resotp = $this->input->post('otp');
    $this->db->where('phone_no',$phone);
    $this->db->where('otp',$resotp);
    $this->db->where('status',1);
    $query = $this->db->get('customer_master');
    if ($query->num_rows() == 0){
      $Return['error'] = "Invalid otp";
    }
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }else{
      $this->db->where('phone_no',$phone);
      $this->db->update('customer_master',array('verified'=>1));

      $userdata = $this->Admin_model->get_single_data('customer_master',array('phone_no'=>$phone,'otp'=>$resotp,'verified'=>1));
     
    if (!empty($userdata)) {
      
        $session_data = array(
        'user_id' => $userdata->id,
        'username' => $userdata->first_name,
        'useremail' => $userdata->email_address,
        'userphone' => $userdata->phone_no,
         
        );

        // Add user data in session
        $this->session->set_userdata('customerdet', $session_data);
        $lan = $this->session->userdata('lang');
        if(empty($lan)){
        $this->session->set_userdata('lang', 'eng');
        $this->session->set_userdata('dir', 'ltr');
        }
         
        $Return['result'] = $this->Admin_model->translate('Logged In Successfully') ;        
        $this->output($Return);
    }
  }
}

public function redirect()
{
  $lastpage = $this->session->userdata('lastpage'); 
  redirect('home/'.$lastpage) ;
}


public function sendSMS($phone,$message){


$app_id = "LDk3A2ak3y9hPTslWraksIbp5YGaXSnrXDILr4Mo";
$app_sec = "lHVgIlw9NGjoAZADajVYvV7FqwSqlQrtytGfccrDr4690gIlBr1ibdvT2zNOaLTZrhL7hW93RayqpCYGVjHcxGGSQv3ruGPar1so";
$app_hash = base64_encode("{$app_id}:{$app_sec}");

$messages = [
    "messages" => [
        [
            "text" => 'Your One Time Passcode for KareemTex is '.$message,
            "numbers" => [$phone],
            "sender" => "KAREEMTEX"
        ]
    ]
];

$url = "https://api-sms.4jawaly.com/api/v1/account/area/sms/send";
$headers = [
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Basic {$app_hash}"
];

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($messages));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

$response_json = json_decode($response, true);

if ($status_code == 200) {
    if (isset($response_json["messages"][0]["err_text"])) {
        return $response_json["messages"][0]["err_text"];
    } else {
       // echo "تم الارسال بنجاح  " . " job id:" . $response_json["job_id"];
      return 'success' ;
    }
} elseif ($status_code == 400) {
    return $response_json["message"];
} elseif ($status_code == 422) {
    return "نص الرسالة فارغ";
} else {
    return "محظور بواسطة كلاودفلير. Status code: {$status_code}";
}
}

public function logout() {
  $session = $this->session->userdata('customerdet'); 
  $sess_array = array('customerdet' => '');
  $this->session->sess_destroy();
  $Return['result'] = 'Successfully Logout.';
  redirect(base_url().'home', 'refresh');
}
   
 
}