<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


 

class Admin extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the admin model
        $this->load->model('Admin_model'); 


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


   public function index()
  {   
   
    $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $data['user_type'] = 'admin' ;

    $this->load->view('admin/login',$data);
  }

  public function school_login()
  {   
   
    $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $data['user_type'] = 'school' ;

    $this->load->view('admin/login',$data);
  }


  public function industry_login()
  {   
   
    $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'eng');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $data['user_type'] = 'industry' ;

    $this->load->view('admin/login',$data);
  }

  
  

   public function accessdenied()
   {
     $this->load->view('admin/accessdenied');
   }

   public function accessdeniedm()
   {
     $this->load->view('admin/accessdeniedm');
   }
  public function login() {
  
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $type = $this->input->post('user_type');  
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>'', 'error'=>'');
    
    /* Server side PHP input validation */
    if($username==='') {
      $Return['error'] = $this->Admin_model->translate('Invalid username')  ;
    } elseif($password===''){
      $Return['error'] = $this->Admin_model->translate('Invalid Password');
    }
    if($Return['error']!=''){
      $this->output($Return);
    }
    
//get data from users table for the entered username and password
$userdata = $this->Admin_model->get_single_data('users',array('user_name'=>$username,'password'=>md5($password),'belongs_to'=>$type));
     
    if (!empty($userdata)) {
      
        $session_data = array(
        'user_id' => $userdata->id,
        'username' => $userdata->user_name,
        'useremail' => $userdata->user_email,
        'userrole' => $userdata->user_role,
        'usertype' => $userdata->belongs_to,
         
        );

        // Add user data in session
        $this->session->set_userdata('superadmindet', $session_data);

        $lan = $this->session->userdata('lang');

        if(empty($lan)){
        $this->session->set_userdata('lang', 'eng');
        $this->session->set_userdata('dir', 'ltr');
        }
         
        $Return['result'] = $this->Admin_model->translate('Logged In Successfully') ;      
           
        $this->output($Return);
         
      } else {
        $Return['error'] =$this->Admin_model->translate('Invalid Credentials');
        $this->output($Return);
      }
  }


      
  public function dashboard()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    $logged_in_role =  $this->Admin_model->get_type_name_by_id('user_roles','id',$session['userrole'],'belongs_to')  ;
  

    if ($logged_in_role == 'admin'){

      $data['totalCustomers'] = $this->Admin_model->get_all_data('customer_master',array('status'=>'Y'));
      $data['totalSales'] = $this->Admin_model->get_OrderTotal();
      $data['totalOrders'] = $this->Admin_model->get_OrderTotal();
      $data['totalenquiries'] = $this->Admin_model->get_all_data('enquiry_messages');
  
      $data['industryOrders'] = $this->Admin_model->get_OrderTotal('industry');
      $data['schoolOrders'] = $this->Admin_model->get_OrderTotal('school');


      $data['totalSalesToday'] = $this->Admin_model->get_OrderTotal('','today');
      $data['totalOrdersToday'] = $this->Admin_model->get_OrderTotal('','today');
      $data['totalenquiriesToday'] = $this->Admin_model->get_all_data('enquiry_messages',array( 'created_on'  => date('Y-m-d')));
      $data['industryOrdersToday'] = $this->Admin_model->get_OrderTotal('industry','today'); 
      $data['schoolOrdersToday'] = $this->Admin_model->get_OrderTotal('school','today'); 
 

      
      $data['pendingEnquiries'] = $this->Admin_model->get_all_data('enquiry_messages',array('status !='=>3));    
      $data['pendingschoolOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'school','order_status'=>1));
      $data['pendingindustryOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'industry','order_status'=>1));
            
    }else if ($logged_in_role == 'school' ){

      $data['totalCustomers'] = $this->Admin_model->get_all_data('customer_master',array('status'=>'Y'));
      $data['totalSales'] = $this->Admin_model->get_OrderTotal();
      $data['totalOrders'] = $this->Admin_model->get_OrderTotal();
      $data['totalenquiries'] = $this->Admin_model->get_all_data('enquiry_messages');
  
      $data['industryOrders'] = $this->Admin_model->get_OrderTotal('industry');
      $data['schoolOrders'] = $this->Admin_model->get_OrderTotal('school');


      $data['totalSalesToday'] = $this->Admin_model->get_OrderTotal('','today');
      $data['totalOrdersToday'] = $this->Admin_model->get_OrderTotal('','today');
      $data['totalenquiriesToday'] = $this->Admin_model->get_all_data('enquiry_messages',array( 'created_on'  => date('Y-m-d')));
      $data['industryOrdersToday'] = $this->Admin_model->get_OrderTotal('industry','today'); 
      $data['schoolOrdersToday'] = $this->Admin_model->get_OrderTotal('school','today'); 
 

      
      $data['pendingEnquiries'] = $this->Admin_model->get_all_data('enquiry_messages',array('status !='=>3));    
      $data['pendingschoolOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'school','order_status'=>1));
      $data['pendingindustryOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'industry','order_status'=>1));
    
    
    }else if ($logged_in_role == 'industry' ){

      $data['totalCustomers'] = $this->Admin_model->get_all_data('customer_master',array('status'=>'Y'));
      $data['totalSales'] = $this->Admin_model->get_OrderTotal('industry');
      $data['totalOrders'] = $this->Admin_model->get_OrderTotal('industry');
      $data['totalenquiries'] = $this->Admin_model->get_all_data('enquiry_messages');
  
      $data['industryOrders'] = $this->Admin_model->get_OrderTotal('industry');
      $data['schoolOrders'] = $this->Admin_model->get_OrderTotal('school');


      $data['totalSalesToday'] = $this->Admin_model->get_OrderTotal('industry','today');
      $data['totalOrdersToday'] = $this->Admin_model->get_OrderTotal('industry','today');
      $data['totalenquiriesToday'] = $this->Admin_model->get_all_data('enquiry_messages',array( 'created_on'  => date('Y-m-d')));
      $data['industryOrdersToday'] = $this->Admin_model->get_OrderTotal('industry','today'); 
      $data['schoolOrdersToday'] = $this->Admin_model->get_OrderTotal('school','today'); 
 

      
      $data['pendingEnquiries'] = $this->Admin_model->get_all_data('enquiry_messages',array('status !='=>3));    
      $data['pendingschoolOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'school','order_status'=>1));
      $data['pendingindustryOrders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'industry','order_status'=>1));
    

    }

      
    $data['pendingEnquiries'] = $this->Admin_model->get_all_data('enquiry_messages',array('status !='=>3));
    $data['closedEnquiries'] = $this->Admin_model->get_all_data('enquiry_messages',array('status'=>3));


    $data['title'] = 'Dashboard';
    $this->load->view('admin/dashboard', $data);
  }

  public function getdashboard()
  {
     $data['fromdate'] = $this->input->post('fromdate'); 
     $data['todate'] = $this->input->post('todate'); 
     $data['services'] = $this->Admin_model->get_all_data('services',array('status'=>'Y'));
 
    $this->load->view('admin/loaddashboard', $data);
  }
   


   public function roles()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $data['roledet'] = $this->Admin_model->get_all_data('user_roles','','belongs_to asc'); 

     

    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
 
    if( $getval){
      $this->load->view('admin/list_roles', $data);
    }else{
      redirect('admin/accessdenied');
    }
 
  }
   


 public function newrole()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }


    $data['modules']=$this->Admin_model->get_all_data('modules','') ;
    $data['permissions']=$this->Admin_model->get_single_data('permissions') ;


     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

if( $getval){
  $this->load->view('admin/add_role',$data);
}else{
  redirect('admin/accessdenied');
}
    
  }


  public function addrole()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }


   


   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('role_name')==='') {
          $Return['error'] = $this->Admin_model->translate('Add role name') ;
    }  else if($this->input->post('belongs_to')===''){
      $Return['error'] = $this->Admin_model->translate('Select the role belongs to which department') ;
    }
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
      $read=$this->input->post('read');
$write=$this->input->post('write');


$readaccess = array();
$writeaccess  = array();


if($read){
  for ($i=0; $i < sizeof($read) ; $i++) { 
  if(!empty($read[$i])){
     $readaccess[]= $read[$i]  ;
  }
  }
}

if($write){
  for ($i=0; $i < sizeof($write) ; $i++) { 
   if(!empty($write[$i])){
    $writeaccess[]= $write[$i] ;
  }
 }
}

        
    if($Return['error']!=''){
          $this->output($Return);
      }


       $data = array(   
    'role_name' => $this->input->post('role_name'),
    'status' => 'Y',
    'belongs_to' => $this->input->post('belongs_to'),
    'created_on'=>date('Y-m-d')
      );

    //send data to model for inserting
    $roleid = $this->Admin_model->insert_data('user_roles', $data);


     
    $read = implode(',',$readaccess);
    $write = implode(',',$writeaccess);
 

    $data = array(   
    'role' => $roleid,
    'read' => $read,
    'write' => $write,
      );

 $result = $this->Admin_model->insert_data('permissions', $data);

 

    
  
    if ($result) {
               
       $Return['result'] = $this->Admin_model->translate('User role added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editrole()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
//get id from url
$id = $this->uri->segment(3) ;

//get data from user roles table for selected id
$users = $this->Admin_model->get_single_data('user_roles',array('id'=>$id));
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'role_name'=>$users->role_name,'belongs_to'=>$users->belongs_to);
}

$data['modules']=$this->Admin_model->get_all_data('modules','') ;
$data['permissions']=$this->Admin_model->get_single_data('permissions',array('role'=>$id)) ;


$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

if( $getval){
$this->load->view('admin/edit_role', $data);
}else{
  redirect('admin/accessdenied');
}

  }



  public function update_role()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('role_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Role name required");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('roleid') ;
      
  
 
    $data = array(
         
   
    'role_name' => $this->input->post('role_name'),
    'status' => 'Y',
     
    );

     
  $result = $this->Admin_model->update_data('user_roles',array('id'=>$id), $data);

    $read=$this->input->post('read');
$write=$this->input->post('write');


$readaccess = array();
$writeaccess  = array();


if($read){
  for ($i=0; $i < sizeof($read) ; $i++) { 
  if(!empty($read[$i])){
     $readaccess[]= $read[$i]  ;
  }
  }
}

if($write){
  for ($i=0; $i < sizeof($write) ; $i++) { 
   if(!empty($write[$i])){
    $writeaccess[]= $write[$i] ;
  }
 }
}

        
    if($Return['error']!=''){
          $this->output($Return);
      }

     
    $read = implode(',',$readaccess);
    $write = implode(',',$writeaccess);
 

    $data = array(   
    'read' => $read,
    'write' => $write,
      );

    $result =  $this->Admin_model->update_data('permissions',array('role'=>$id),$data);


    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('User role updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
   

    public function modules()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['moduledet'] = $this->Admin_model->get_all_data('modules',''); 

// $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
// if( $getval){
//   $this->load->view('admin/list_modules', $data);
// }else{
//   redirect('admin/accessdenied');
// }   

      $this->load->view('admin/list_modules', $data);
  }
   


 public function newmodule()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
    //  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    // if( $getval){
    //   $this->load->view('admin/add_module');
    // }else{
    //   redirect('admin/accessdenied');
    // }
$this->load->view('admin/add_module');
   
  }


  public function addmodule()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('module_name')==='') {
          $Return['error'] = "Add module name ";
    }else if($this->input->post('belongs_to')==='') {
          $Return['error'] = "Select belongs to ";
    } else if($this->input->post('read_methods')==='') {
          $Return['error'] = "Add read methods";
    }else if($this->input->post('write_methods')==='') {
          $Return['error'] = "Add write methods ";
    }    

 $read = explode(',',$this->input->post('read_methods'));

 $write = explode(',',$this->input->post('write_methods'));

  foreach ($read as $value) {
      if(!method_exists($this, $value)){ 
          $Return['error'] = $this->Admin_model->translate("Invalid read method");   
        } 
  }
  foreach ($write as $wvalue) {
      if(!method_exists($this, $wvalue)){
          $Return['error'] = $this->Admin_model->translate("Invalid write method");   
        } 
  }


  if($Return['error']!=''){
          $this->output($Return);
      }

    $data = array(   
    'module_name' => $this->input->post('module_name'),
    'read_methods'=>$this->input->post('read_methods'),
    'write_methods'=>$this->input->post('write_methods'),
    'belongs_to'=>$this->input->post('belongs_to'),
    'status' => 'Y',
    'created_on'=>date('Y-m-d')
      );
    $result = $this->Admin_model->insert_data('modules', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Module added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editmodule()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $modules = $this->Admin_model->get_single_data('modules',array('id'=>$id));

 $data = array();
if (isset($modules)){
    $data  = array('id'=>$modules->id,'module_name'=>$modules->module_name,'belongs_to'=>$modules->belongs_to,'read_methods'=>$modules->read_methods,'write_methods'=>$modules->write_methods);
}
    // $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    // if( $getval){
    //   $this->load->view('admin/edit_module', $data);
    // }else{
    //   redirect('admin/accessdenied');
    // }
$this->load->view('admin/edit_module', $data);
  
    
  }



  public function update_module()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('module_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Module name required");
    }  

    $read = explode(',',$this->input->post('read_methods'));

    $write = explode(',',$this->input->post('write_methods'));

  foreach ($read as $value) {
      if(!method_exists($this, $value)){
          $Return['error'] = $this->Admin_model->translate("Invalid read method");   
        } 
  }
  foreach ($write as $wvalue) {
      if(!method_exists($this, $wvalue)){
          $Return['error'] = $this->Admin_model->translate("Invalid write method");   
        } 
  }

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('moduleid') ;
      
  
 
    $data = array(
         
   
    'module_name' => $this->input->post('module_name'),
    'read_methods'=>$this->input->post('read_methods'),
    'write_methods'=>$this->input->post('write_methods')
     
    );

    
    $result = $this->Admin_model->update_data('modules',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Module updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
   

   public function banners()
  {   
    

    $data['title'] = 'Dashboard';
    $data['data'] = $this->Admin_model->get_all_data('banners') ;
    $this->load->view('admin/banners', $data);
  }
      
public function new_banner()
  {   
    $data['title'] = 'Dashboard';
    $data['pages'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
    $this->load->view('admin/add_banner', $data);
  }


        public function add_banner()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
       $Return = array('result'=>'', 'error'=>'');
           
        if(empty($_FILES['image']['name'])){
          $Return['error'] = "Image Required ";
        }else if($this->input->post('page_type')==='') {
            $Return['error'] = "Select type";
        } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
    
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array( 'png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/banners/";
          
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
          $newfilename = 'banner_'.round(microtime(true)).'.'.$ext;
  
          //$newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
        
    
 
       
        $data = array(   
         
        'image' => $image,
        'type' => $this->input->post('type'),
        // 'banner_title' => $this->input->post('banner_title'),
        // 'banner_title_ar' => $this->input->post('banner_title_ar'),
        'banner_content' => $this->input->post('banner_content'),
      'banner_content_ar' => $this->input->post('banner_content_ar'),
      // 'banner_btn_text' => $this->input->post('banner_btn_text'),
      // 'banner_btn_text_ar' => $this->input->post('banner_btn_text_ar'),
        'status' => 'Y'
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->db->insert('banners',$data);
       $inserid =  $this->db->insert_id();
    
     
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Banner added successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }
        public function edit_banner()
        {
        $session = $this->session->userdata('superadmindet');
            if(empty($session)){ 
              redirect('admin');
            }

         $data['pages'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('banners',array('id'=>$id)) ;
    
           $this->load->view('admin/edit_banner', $data);
            
        }

      public function update_banner()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
        $id = $this->input->post('id');
    
       $Return = array('result'=>'', 'error'=>'');
           
        /* Server side PHP input validation */    
         
         $image = $this->input->post('old_image') ;
        
         if(empty($_FILES['image']['name']) && empty($image)) {
          $Return['error'] = "Image Required ";
        }else if($this->input->post('page_type')==='') {
            $Return['error'] = "Select type";
        } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
    
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/banners/";
          $set_img = base_url()."uploads/images";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
         $newfilename = 'banner_'.round(microtime(true)).'.'.$ext;
  
         // $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
        
    
 
       
        $data = array(   
         
        'image' => $image,
        'type' => $this->input->post('type'),
        // 'banner_title' => $this->input->post('banner_title'),
        // 'banner_title_ar' => $this->input->post('banner_title_ar'),
        'banner_content' => $this->input->post('banner_content'),
        'banner_content_ar' => $this->input->post('banner_content_ar'),
        // 'banner_btn_text' => $this->input->post('banner_btn_text'),
        // 'banner_btn_text_ar' => $this->input->post('banner_btn_text_ar'),
        'status' => 'Y'
          );
 
        $result = $this->Admin_model->update_data('banners',array('id'=>$id),$data);
      
       $inserid =  $this->db->insert_id();
    
       
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Banner updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }



  public function categories()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['categories'] = $this->Admin_model->get_all_data('categories',''); 
   


      $this->load->view('admin/list_categories', $data);
  }
   
  

 public function newcategory()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/add_category');
    }else{
      redirect('admin/accessdenied');
    }   
  }


  public function addcategory()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Add category name ";
    }else if($this->input->post('ar_category_name')==='') {
          $Return['error'] = "Add category name - Arabic";
    }    
 

    if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'category_name' => $this->input->post('category_name'),
     'ar_category_name' => $this->input->post('ar_category_name'),
    'status' => 'Y',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
      );
    $result = $this->Admin_model->insert_data('categories', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Category added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editcategory()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $category = $this->Admin_model->get_single_data('categories',array('id'=>$id));
 $data['category'] = array('id'=>$category->id,'category_name'=>$category->category_name,'ar_category_name'=>$category->ar_category_name);
  
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/edit_category', $data);
    }else{
      redirect('admin/accessdenied');
    } 
  
    
  }



  public function update_category()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Category name required");
    } else if($this->input->post('ar_category_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Category name - Arabic required");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('categoryid') ;
      
   
    $data = array(   
   
    'category_name' => $this->input->post('category_name'),
    'ar_category_name' => $this->input->post('ar_category_name'),
     
    );

    
    $result = $this->Admin_model->update_data('categories',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Category updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
    
   

  public function sizes_i()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 


$data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'I')); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_i_sizes', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   
  

 public function new_i_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 

    if( $getval){
    $this->load->view('admin/add_i_size', $data);
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function add_i_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('size_name')==='') {
          $Return['error'] = "Add size name ";
    }else if($this->input->post('description')==='') {
          $Return['error'] = "Add description";
    } 
        
    
  if($Return['error']!=''){
          $this->output($Return);
  }


  $measurement=$this->input->post('measurement');
  $value=$this->input->post('value'); 

  if(!empty( $measurement)){
    for ($i=0; $i < sizeof($measurement) ; $i++) { 
    if( empty($value[$i]) || $value[$i] == 0 ){
      $Return['error'] = "Add Value for all measurements";
    }
    }
  }
  if(!empty( $measurement)){
    for ($i=0; $i < sizeof($measurement) ; $i++) { 
    
      $measureData[$measurement[$i]] =  $value[$i] ; 
         
   
    }
  }

   
    $data = array(   
    'size' => $this->input->post('size_name'),
    'description'=>$this->input->post('description'),
    'size_chart' => json_encode( $measureData) ,
    'belongs_to' => 'admin', 
    'type'=> 'I',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
     
      );

  $exists = $this->Admin_model->get_single_data('size_master',array('belongs_to'=>'admin','type'=>'I','size' => $this->input->post('size_name') )); 
    if(!empty($exists)){
       $Return['error'] = "The size already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->insert_data('size_master', $data);
    }

    
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Size added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function edit_i_size()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $sizes = $this->Admin_model->get_single_data('size_master',array('id'=>$id));

 $data = array();
if (isset($sizes)){
    $data  = array('id'=>$sizes->id,'size_name'=>$sizes->size,'description'=>$sizes->description,'size_chart' => $sizes->size_chart);
}
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

   $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 

    if( $getval){
    $this->load->view('admin/edit_i_size', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_i_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

     $id =$this->input->post('sizeid') ;
       
    /* Server side PHP input validation */    
    if($this->input->post('size_name')==='') {
          $Return['error'] = "Add size name ";
    }else if($this->input->post('description')==='') {
          $Return['error'] = "Add description";
    }
         
    if($Return['error']!=''){
          $this->output($Return);
      }

      $measurement=$this->input->post('measurement');
      $value=$this->input->post('value'); 
    
      if(!empty( $measurement)){
        for ($i=0; $i < sizeof($measurement) ; $i++) { 
        if( empty($value[$i]) || $value[$i] == 0 ){
          $Return['error'] = "Add Value for all measurements";
        }
        }
      }
 
      
      if(!empty( $measurement)){
        for ($i=0; $i < sizeof($measurement) ; $i++) { 
        
          $measureData[$measurement[$i]] =  $value[$i] ; 
             
       
        }
      }

 
    $data = array(   
    'size' => $this->input->post('size_name'),
      'description' => $this->input->post('description')  ,
      'size_chart' => json_encode( $measureData) ,    
      );
    
     $exists = $this->Admin_model->get_single_data('size_master',array('belongs_to'=>'admin',
       'type'=>'I','size' => $this->input->post('size_name'), 'id !='=>$id )); 
    if(!empty($exists)){
       $Return['error'] = "The size already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->update_data('size_master',array('id'=>$id), $data);
    }

    
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Size details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   
 

public function sizes_s()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 


$data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'S')); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_s_sizes', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   
  

 public function new_s_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 


    if( $getval){
    $this->load->view('admin/add_s_size',$data);
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function add_s_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('size_name')==='') {
          $Return['error'] = "Add size name ";
    }else if($this->input->post('description')==='') {
          $Return['error'] = "Add description";
    } 
        
    
  if($Return['error']!=''){
          $this->output($Return);
      }

      $measurement=$this->input->post('measurement');
      $value=$this->input->post('value'); 
    
      if(!empty( $measurement)){
        for ($i=0; $i < sizeof($measurement) ; $i++) { 
        if( empty($value[$i]) || $value[$i] == 0 ){
          $Return['error'] = "Add Value for all measurements";
        }
        }
      }
    if(!empty( $measurement)){
      for ($i=0; $i < sizeof($measurement) ; $i++) { 
      
        $measureData[$measurement[$i]] =  $value[$i] ;     
     
      }
    }

   
    $data = array(   
    'size' => $this->input->post('size_name'),
    'description'=>$this->input->post('description'),
    'belongs_to' => 'admin', 
    'type' => 'S',
    'size_chart' => json_encode( $measureData) ,
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
     
      );

      $exists = $this->Admin_model->get_single_data('size_master',array('belongs_to'=>'admin','type'=>'S','size' => $this->input->post('size_name') )); 
    if(!empty($exists)){
       $Return['error'] = "The size already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->insert_data('size_master', $data);
    }
   
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Size added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function edit_s_size()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $sizes = $this->Admin_model->get_single_data('size_master',array('id'=>$id));

 $data = array();
if (isset($sizes)){
    $data  = array('id'=>$sizes->id,'size_name'=>$sizes->size,'description'=>$sizes->description,'size_chart' => $sizes->size_chart);
}
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
   $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 

    if( $getval){
    $this->load->view('admin/edit_s_size', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_s_size()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

     $id =$this->input->post('sizeid') ;
       
    /* Server side PHP input validation */    
    if($this->input->post('size_name')==='') {
          $Return['error'] = "Add size name ";
    }else if($this->input->post('description')==='') {
          $Return['error'] = "Add description";
    }
         
    if($Return['error']!=''){
          $this->output($Return);
      }
  

      $measurement=$this->input->post('measurement');
      $value=$this->input->post('value'); 
    
      if(!empty( $measurement)){
        for ($i=0; $i < sizeof($measurement) ; $i++) { 
        if( empty($value[$i]) || $value[$i] == 0 ){
          $Return['error'] = "Add Value for all measurements";
        }
        }
      }
      if(!empty( $measurement)){
        for ($i=0; $i < sizeof($measurement) ; $i++) { 
        
          $measureData[$measurement[$i]] =  $value[$i] ; 
             
       
        }
      }

    $data = array(   
    'size' => $this->input->post('size_name'),
      'description' => $this->input->post('description')   ,
      'size_chart' => json_encode( $measureData) ,   
      );

       $exists = $this->Admin_model->get_single_data('size_master',array('belongs_to'=>'admin',
       'type'=>'S','size' => $this->input->post('size_name'), 'id !='=>$id )); 
    if(!empty($exists)){
       $Return['error'] = "The size already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->update_data('size_master',array('id'=>$id), $data);
    }
   

    
   
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Size details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   
 


  
public function colors_i()
{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 


$data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'I')); 


$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/list_i_colors', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function new_i_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/add_i_color');
  }else{
    redirect('admin/accessdenied');
  }
  

 
}


public function add_i_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');
     
  /* Server side PHP input validation */    
  if($this->input->post('color_name')==='') {
        $Return['error'] = "Select color";
  } 
      
  
if($Return['error']!=''){
        $this->output($Return);
    }

 
  $data = array(   
  'color_name' => $this->input->post('color_name'),
  'color_code'=>$this->input->post('color_code'),
  'type' =>'I',
  'belongs_to' => 'admin',
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );
  $result = $this->Admin_model->insert_data('color_master', $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Color added successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

 public function edit_i_color()
{
  $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
      
$id = $this->uri->segment(3) ;
$colors = $this->Admin_model->get_single_data('color_master',array('id'=>$id));

$data = array();
if (isset($colors)){
  $data  = array('id'=>$colors->id,'color_code'=>$colors->color_code,'color_name'=>$colors->color_name);
}
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
 
  if( $getval){
  $this->load->view('admin/edit_i_color', $data);

  }else{
    redirect('admin/accessdenied');
  }


  
}



public function update_i_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

 $Return = array('result'=>'', 'error'=>'');

   $id =$this->input->post('colorid') ;
     
  /* Server side PHP input validation */    
  if($this->input->post('color_code')==='') {
        $Return['error'] = "Select color ";
  }  
       
  if($Return['error']!=''){
        $this->output($Return);
    }



  $data = array(   
  'color_code' => $this->input->post('color_code'),
  'color_name' => $this->input->post('color_name'),
   
    );
  
  $result = $this->Admin_model->update_data('color_master',array('id'=>$id), $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Color details updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}
 
 
public function colors_s()
{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 


$data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'S')); 


$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/list_s_colors', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function new_s_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/add_s_color');
  }else{
    redirect('admin/accessdenied');
  }
  

 
}


public function add_s_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');
     
  /* Server side PHP input validation */    
  if($this->input->post('color_name')==='') {
        $Return['error'] = "Select color";
  } 
      
  
if($Return['error']!=''){
        $this->output($Return);
    }

 
  $data = array(   
  'color_name' => $this->input->post('color_name'),
  'color_code'=>$this->input->post('color_code'),
  'type' => 'S',
  'belongs_to' => 'admin',
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );
  $result = $this->Admin_model->insert_data('color_master', $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Color added successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

 public function edit_s_color()
{
  $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
      
$id = $this->uri->segment(3) ;
$colors = $this->Admin_model->get_single_data('color_master',array('id'=>$id));

$data = array();
if (isset($colors)){
  $data  = array('id'=>$colors->id,'color_code'=>$colors->color_code,'color_name'=>$colors->color_name);
}
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
 
  if( $getval){
  $this->load->view('admin/edit_s_color', $data);

  }else{
    redirect('admin/accessdenied');
  }


  
}



public function update_s_color()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

 $Return = array('result'=>'', 'error'=>'');

   $id =$this->input->post('colorid') ;
     
  /* Server side PHP input validation */    
  if($this->input->post('color_code')==='') {
        $Return['error'] = "Select color ";
  }  
       
  if($Return['error']!=''){
        $this->output($Return);
    }



  $data = array(   
  'color_code' => $this->input->post('color_code'),
  'color_name' => $this->input->post('color_name'),
   
    );
  
  $result = $this->Admin_model->update_data('color_master',array('id'=>$id), $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Color details updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}
 

 
public function industry_products()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['products'] = $this->Admin_model->get_all_data('industry_products',''); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_industry_products', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   


 public function new_industry_product()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'I')); 
    $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'I')); 
    $data['products'] = $this->Admin_model->get_all_data('industry_products'); 
    $data['genders'] = $this->Admin_model->get_all_data('genders'); 
    $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 
   


    if( $getval){
    $this->load->view('admin/add_industry_product',$data);
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function add_industry_product()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('product_name')==='') {
          $Return['error'] = "Add product name ";
    }else if($this->input->post('ar_product_name')==='') {
          $Return['error'] = "Add product name - Arabic ";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select Category";
    }else if($this->input->post('colors')==='') {
      $Return['error'] = "Select Colors Available";
}else if($this->input->post('sizes')==='') {
  $Return['error'] = "Select Sizes Available";
}   else if(empty($_FILES['product_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Product Image Required");
    }
    

  if($Return['error']!=''){
          $this->output($Return);
      }

       $fname = "";
      
       if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['product_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["product_image"]["tmp_name"];
        $profile = "uploads/images/industry/";
        $set_img = base_url()."uploads/images/industry/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["product_image"]["name"]);
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

  
 if(!empty($this->input->post('related_products'))){
  $related_products = implode(',',$this->input->post('related_products')) ;
 
 }else{
  $related_products= '' ;
 }

 if(!empty($this->input->post('colors'))){
  $colors = implode(',',$this->input->post('colors')) ;
 
 }else{
  $colors= '' ;
 }

 if(!empty($this->input->post('sizes'))){
  $sizes = implode(',',$this->input->post('sizes')) ;
 
 }else{
  $sizes= '' ;
 }

 if(!empty($this->input->post('tags'))){
  $tags = implode(',',$this->input->post('tags')) ;
 
 }else{
  $tags= '' ;
 }
 

 if(!empty($this->input->post('measurements'))){
  $measurements = implode(',',$this->input->post('measurements')) ;
 
 }else{
  $measurements= '' ;
 }


   
    $data = array(   
    'product_name' => $this->input->post('product_name'),
    'ar_product_name' => $this->input->post('ar_product_name'),
    'product_code' => $this->input->post('product_code'),
    'category'=>$this->input->post('category_name'),
    'related_products'=>$related_products,
    // 'is_unisex'=>$this->input->post('is_unisex'),  
    'colors_available'=>$colors,
    'sizes_available'=>$sizes,
    'measurements' => $measurements,
    'tags'=>$tags,
    'description'=>$this->input->post('description'),
    'long_description'=>$this->input->post('long_description'),
    'ar_description'=>$this->input->post('ar_description'),
    'ar_long_description'=>$this->input->post('ar_long_description'),
    'product_image' => $fname ,
    'status' => 'Y',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
     
      );
    $result = $this->Admin_model->insert_data('industry_products', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Product added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function edit_industry_product()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;

 
 $products = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));

 $data = array();
if (isset($products)){
    $data['product']  = array('id'=>$products->id,'product_name'=>$products->product_name,'ar_product_name'=>$products->ar_product_name,'product_code'=>$products->product_code, 'category'=>$products->category,'related_products'=>$products->related_products, 'colors_available' => $products->colors_available,'sizes_available' => $products->sizes_available,'tags'=>$products->tags,'genders'=>$products->genders, 
      'description'=>$products->description, 'long_description'=>$products->long_description, 
      'ar_description'=>$products->ar_description, 'ar_long_description'=>$products->ar_long_description,
    'product_image'=>$products->product_image,'measurements'=>$products->measurements,'product_code'=>$products->product_code);
}
 
    $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'I')); 
    $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'I')); 
    $data['products'] = $this->Admin_model->get_all_data('industry_products'); 
    $data['genders'] = $this->Admin_model->get_all_data('genders');
    $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 

   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/edit_industry_product', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_industry_product()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
        $fname =  $this->input->post('iconname') ;

    /* Server side PHP input validation */    
    if($this->input->post('product_name')==='') {
      $Return['error'] = "Add product name ";
    }else if($this->input->post('ar_product_name')==='') {
      $Return['error'] = "Add product name - Arabic";
    } else if($this->input->post('category')===''){
      $Return['error'] = "Select category";
    }  else if(empty($fname) && empty($_FILES['product_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Product Image Required");
    }
        
   

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('productid') ;
      
  
   if(!empty($_FILES['product_image']['name'])){
  if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
        $filename = $_FILES['product_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["product_image"]["tmp_name"];
          $profile = "uploads/images/industry/";
           
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["product_image"]["name"]);
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
  

  
 if(!empty($this->input->post('related_products'))){
  $related_products = implode(',',$this->input->post('related_products')) ;
 
 }else{
  $related_products= '' ;
 }

 if(!empty($this->input->post('colors'))){
  $colors = implode(',',$this->input->post('colors')) ;
 
 }else{
  $colors= '' ;
 }

 if(!empty($this->input->post('sizes'))){
  $sizes = implode(',',$this->input->post('sizes')) ;
 
 }else{
  $sizes= '' ;
 }

 if(!empty($this->input->post('tags'))){
  $tags = implode(',',$this->input->post('tags')) ;
 
 }else{
  $tags= '' ;
 }

 if(!empty($this->input->post('genders'))){
  $genders = implode(',',$this->input->post('genders')) ;
 
 }else{
  $genders= '' ;
 }

 if(!empty($this->input->post('measurements'))){
  $measurements = implode(',',$this->input->post('measurements')) ;
 
 }else{
  $measurements= '' ;
 }
 


 
    $data = array(   
      'product_name' => $this->input->post('product_name'),
      'ar_product_name' => $this->input->post('ar_product_name'),
      'product_code' => $this->input->post('product_code'),
       'category'=>$this->input->post('category_name'),
       'product_image' => $fname  ,
       'related_products'=> $related_products,
       // 'is_unisex'=>$this->input->post('is_unisex'),  
       'colors_available'=> $colors,
       'sizes_available'=> $sizes,
       'measurements' => $measurements,
       'tags'=> $tags,
       'genders' => $genders ,
       'description'=>$this->input->post('description'),
       'long_description'=>$this->input->post('long_description'),
       'ar_description'=>$this->input->post('ar_description'),
      'ar_long_description'=>$this->input->post('ar_long_description'),
     
      );
    
    $result = $this->Admin_model->update_data('industry_products',array('id'=>$id), $data);
    if ($result == TRUE) {

       $Return['result'] = 'Product updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   
  
  public function get_colors(){
     
  $id= $this->input->post('product_id');
 
  $type = $this->input->post('type');
  if( $type == 'industry'){
    $colors = $this->Admin_model->get_type_name_by_id('industry_products','id',$id,'colors_available');
 
  }else{
    $colors = $this->Admin_model->get_type_name_by_id('school_products','id',$id,'colors_available');
 
  }


  $list = '' ;
 

  if(!empty($colors)){

    $colors = explode(',',$colors);
   
   
      foreach ($colors as  $color) { 
  
    

      $list .= '<option value="'.$color.'">'.$this->Admin_model->get_type_name_by_id('color_master','id',$color,'color_name').'</option> '; 


         }  
  
     
  }

 

  if(!empty($list)){
    echo  $list ;
  }
 

  }

    
  public function get_sizes(){
     
    $id= $this->input->post('product_id');

    $type = $this->input->post('type');
    if( $type == 'industry'){
      $sizes = $this->Admin_model->get_type_name_by_id('industry_products','id',$id,'sizes_available');
  
    }else{
      $sizes = $this->Admin_model->get_type_name_by_id('school_products','id',$id,'sizes_available');
  
    }
   
  
     
if(!empty($sizes)){
  $sizes = explode(',',$sizes);
    $list = '' ;
    foreach ($sizes as  $size) { 
      $list .= '<option value="'.$size.'">'.$this->Admin_model->get_type_name_by_id('size_master','id',$size,'size').'</option> '; 
       } 
}
        
   
   if(!empty($list)){
    echo  $list ;
   }
   
  
    }


    public function get_product_images(){
     
      $id= $this->input->post('product_id');
      $colorId= $this->input->post('color_id');
  
      $type = $this->input->post('type');
      if( $type == 'industry'){
        $images = $this->Admin_model->get_single_data('industry_product_images',array('product_id'=>$id,'color_id'=>$colorId)) ;
    
      }else{
        $images = $this->Admin_model->get_single_data('school_product_images',array('product_id'=>$id,'color_id'=>$colorId)) ;
      }

      $data['folder'] =  $type ;
     
     if(!empty($images)){
      $data['images'] = $images->product_images ;
      $this->load->view('admin/get_product_images', $data) ;
     }
    
      }
    


    public function get_class_types(){
     
      $id= $this->input->post('schoolid');
      $uniformid= $this->input->post('uniformid');

     $existing = $this->Admin_model->get_single_data('uniform_school_relation',array('school_id'=>$id,'uniform_id'=>$uniformid,'status'=>1));


$levels = array();
     if(!empty($existing)){
      $levels =explode(',',  $existing->class_level) ;
     }


      
      $class_levels = $this->Admin_model->get_type_name_by_id('school_master','id',$id,'class_levels');
      $list = '' ;    
      if(!empty($class_levels)){
    
        $class_levels = explode(',',$class_levels);
           foreach ($class_levels as $level) { 

           if($this->Admin_model->check_id_exists('class_type_master',$level)){  

            $selected  = '' ;
            if(in_array($level, $levels)){
              $selected = 'selected' ;
            }
      
          $list .= '<option value="'.$level.'" '.$selected.' >'.$this->Admin_model->get_type_name_by_id('class_type_master','id',$level,'class_type').'</option> '; 
    
             }    }   
      }      
      if(!empty($list)){
        echo  $list ;
      }
      }
  
public function industry_product_images()

{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

  $id = $this->uri->segment(3) ;
  $products = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));

$data['colors'] = explode(',',$products->colors_available) ;
$data['products'] = $products ;

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/industry_product_images', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function add_industry_product_images()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');

 $existingImages = $this->input->post('edit_img');
     
  /* Server side PHP input validation */    
  if ($this->input->post('colors')==='') {
        $Return['error'] = "Select Available Color";
  } else if(!is_uploaded_file($_FILES['image']['tmp_name'][0]) &&  !isset($existingImages) ) {
    $Return['error'] = $this->Admin_model->translate("Product Image(s) Required");
  }
     

    if($Return['error']!=''){
        $this->output($Return);
    }

     $fname = "";
    
     $attachment  = $_FILES["image"]['name'];
     for($i = 0; $i < sizeof($attachment); $i++){
     if(is_uploaded_file($_FILES['image']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     } else {
     $Return['error'] = "Invalid file format. Check the uploaded image";
     $this->output($Return);
     exit;
     }
     }
     }
     $images = array();
     $n=0;
     for($i = 0; $i < sizeof($attachment); $i++){
     $n++;
     if(is_uploaded_file($_FILES['image']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     $tmp_name = $_FILES["image"]["tmp_name"][$i];
     $profile = "uploads/images/industry/";
     $set_img = base_url()."uploads/images/industry/";
     // basename() may prevent filesystem traversal attacks;
     // further validation/sanitation of the filename may be appropriate
     $name = basename($_FILES["image"]["name"][$i]);
     $newfilename = 'IND_'.round(microtime(true)).$n.'.'.$ext;
     move_uploaded_file($tmp_name, $profile.$newfilename);
     $fname = $newfilename;
     $images[] =  $fname ;
     } else {
     $Return['error'] = "Invalid file format";
     $this->output($Return);
     exit;
     }
     }
     }
     $imagein = implode( ',',  $images);
     
   

     $insertimages = "";
        if($imagein!=="" && $existingImages!=="")
        {
          $insertimages = $imagein.','. $existingImages;
        }
        else if($imagein=="")
        {
           $insertimages = $existingImages;
        }else if($existingImages=="")
        {
           $insertimages = $imagein;
        }


 
  $data = array(   
  'product_id' => $this->input->post('product_id'),
  'color_id'=>$this->input->post('colors'),
  'product_images' => $insertimages ,
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );

 $existing = $this->Admin_model->get_single_data('industry_product_images',array('product_id' => $this->input->post('product_id'),
  'color_id'=>$this->input->post('colors'))) ;

  if($existing){
    $result = $this->Admin_model->update_data('industry_product_images',array('product_id' => $this->input->post('product_id'),
    'color_id'=>$this->input->post('colors')) , $data);
  }else{
    $result = $this->Admin_model->insert_data('industry_product_images', $data);
  }
 

  
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Images updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}
 
public function school_product_images()

{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

  $id = $this->uri->segment(3) ;
  $products = $this->Admin_model->get_single_data('school_products',array('id'=>$id));

$data['colors'] = explode(',',$products->colors_available) ;
$data['products'] = $products ;

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/school_product_images', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function add_school_product_images()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');

 $existingImages = $this->input->post('edit_img');
     
  /* Server side PHP input validation */    
  if ($this->input->post('colors')==='') {
        $Return['error'] = "Select Available Color";
  } else if(!is_uploaded_file($_FILES['image']['tmp_name'][0]) &&  !isset($existingImages) ) {
    $Return['error'] = $this->Admin_model->translate("Product Image(s) Required");
  }
     

    if($Return['error']!=''){
        $this->output($Return);
    }

     $fname = "";
    
     $attachment  = $_FILES["image"]['name'];
     for($i = 0; $i < sizeof($attachment); $i++){
     if(is_uploaded_file($_FILES['image']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     } else {
     $Return['error'] = "Invalid file format. Check the uploaded image";
     $this->output($Return);
     exit;
     }
     }
     }
     $images = array();
     $n=0;
     for($i = 0; $i < sizeof($attachment); $i++){
     $n++;
     if(is_uploaded_file($_FILES['image']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     $tmp_name = $_FILES["image"]["tmp_name"][$i];
     $profile = "uploads/images/school/";
     $set_img = base_url()."uploads/images/school/";
     // basename() may prevent filesystem traversal attacks;
     // further validation/sanitation of the filename may be appropriate
     $name = basename($_FILES["image"]["name"][$i]);
     $newfilename = 'IND_'.round(microtime(true)).$n.'.'.$ext;
     move_uploaded_file($tmp_name, $profile.$newfilename);
     $fname = $newfilename;
     $images[] =  $fname ;
     } else {
     $Return['error'] = "Invalid file format";
     $this->output($Return);
     exit;
     }
     }
     }
     $imagein = implode( ',',  $images);
     
   

     $insertimages = "";
        if($imagein!=="" && $existingImages!=="")
        {
          $insertimages = $imagein.','. $existingImages;
        }
        else if($imagein=="")
        {
           $insertimages = $existingImages;
        }else if($existingImages=="")
        {
           $insertimages = $imagein;
        }


 
  $data = array(   
  'product_id' => $this->input->post('product_id'),
  'color_id'=>$this->input->post('colors'),
  'product_images' => $insertimages ,
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );

 $existing = $this->Admin_model->get_single_data('school_product_images',array('product_id' => $this->input->post('product_id'),
  'color_id'=>$this->input->post('colors'))) ;

  if($existing){
    $result = $this->Admin_model->update_data('school_product_images',array('product_id' => $this->input->post('product_id'),
    'color_id'=>$this->input->post('colors')) , $data);
  }else{
    $result = $this->Admin_model->insert_data('school_product_images', $data);
  }
 

  
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Images updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

public function school_product_price()

{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

  $id = $this->uri->segment(3) ;
  $products = $this->Admin_model->get_single_data('school_products',array('id'=>$id));

$data['sizes'] = explode(',',$products->sizes_available) ;
$data['products'] = $products ;

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/school_product_price', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function add_school_product_price()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');

 $existingImages = $this->input->post('edit_img');
    
    
    $size=$this->input->post('size');
    $price=$this->input->post('price');
    $offerprice=$this->input->post('offerprice');

    if(!empty( $size)){
      for ($i=0; $i < sizeof($size) ; $i++) { 
      if( empty($price[$i]) || $price[$i] == 0 ){
        $Return['error'] = "Add Price for all sizes";
      }
      }
    }
    
    if($Return['error']!=''){
      $this->output($Return);
  }

  $fname = $this->input->post('sizechart');
  if(!empty($_FILES['image']['name'])){
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
          //checking image type
          $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
          $filename = $_FILES['image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(in_array($ext,$allowed)){
            $tmp_name = $_FILES["image"]["tmp_name"];
            $profile = "uploads/images/school/";
             
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["image"]["name"]);
           // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
    
            $newfilename = 'size_'.round(microtime(true)).'_'.$name ;
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


  if(!empty( $size)){
    for ($i=0; $i < sizeof($size) ; $i++) { 
    
        $data = array(   
        'product_id' => $this->input->post('product_id'),
        'size_id'=>$size[$i],
        'product_price' => $price[$i],
        'offer_price' =>$offerprice[$i],
        'status' => 'Y',
        'size_chart' => $fname,
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
        );

          $existing = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id' => $this->input->post('product_id'),
          'size_id'=>$size[$i]  )) ;
        
          if($existing){
            $result = $this->Admin_model->update_data('school_product_price_size_det',array('product_id' => $this->input->post('product_id'),
            'size_id'=>$size[$i]) , array('status'=>'N'));
           
          } 

          $result = $this->Admin_model->insert_data('school_product_price_size_det', $data);
 
    }
  }

 



  
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Price details updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}


public function industry_product_price()

{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

  $id = $this->uri->segment(3) ;
  $products = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));

$data['sizes'] = explode(',',$products->sizes_available) ;
$data['products'] = $products ;

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/industry_product_price', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function add_industry_product_price()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');

 $existingImages = $this->input->post('edit_img');
    
    
    $size=$this->input->post('size');
    $price=$this->input->post('price');
    $offerprice=$this->input->post('offerprice');

    if(!empty( $size)){
      for ($i=0; $i < sizeof($size) ; $i++) { 
      if( empty($price[$i]) || $price[$i] == 0 ){
        $Return['error'] = "Add Price for all sizes";
      }
      }
    }
    
    if($Return['error']!=''){
      $this->output($Return);
  }

  $fname = $this->input->post('sizechart');
  if(!empty($_FILES['image']['name'])){
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
          //checking image type
          $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
          $filename = $_FILES['image']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(in_array($ext,$allowed)){
            $tmp_name = $_FILES["image"]["tmp_name"];
            $profile = "uploads/images/industry/";
             
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["image"]["name"]);
           // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
    
            $newfilename = 'size_'.round(microtime(true)).'_'.$name ;
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


  if(!empty( $size)){
    for ($i=0; $i < sizeof($size) ; $i++) { 
    
      $data = array(   
        'product_id' => $this->input->post('product_id'),
        'size_id'=>$size[$i],
        'product_price' => $price[$i],
        'offer_price' =>$offerprice[$i],
        'status' => 'Y',
        'size_chart' => $fname,
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
         
          );

          $existing = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id' => $this->input->post('product_id'),
          'size_id'=>$size[$i]  )) ;
        
          if($existing){
            $result = $this->Admin_model->update_data('industry_product_price_size_det',array('product_id' => $this->input->post('product_id'),
            'size_id'=>$size[$i]) , array('status'=>'N'));
           
          } 

          $result = $this->Admin_model->insert_data('industry_product_price_size_det', $data);
 
          


    }
  }

 



  
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Price details updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

  
public function industry_inventory()
{  
 $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

   $products = $this->Admin_model->get_all_data('industry_products',array('status'=>'Y')); 
   foreach($products as $p){
    $qty = 0 ;

    

    $inventory =  $this->Admin_model->get_all_data('industry_inventory',array('product_id'=>$p['id']),"id asc"); 
    foreach($inventory as $inv){
      if($inv['type'] == 'add'){
        $qty = $qty + $inv['quantity'];
      }else{
        $qty = $qty - $inv['quantity'] ;
      }
      $updated = $inv['created_on'] ;
    }

    $data['products'][] = array('pid'=>$p['id'],'name' => $p['product_name'],'ar_name' => $p['ar_product_name'],'qty' => $qty, 'updated' => $updated  ) ;
     
  }
   
$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/list_industry_stock', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 
public function view_industry_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
$id = $this->input->post('id');
$type = $this->input->post('type');
  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  $data['pId'] = $id ;
 
  $data['products'] = $this->Admin_model->get_all_data('industry_inventory', array('product_id'=>$id),'id desc'); 
   
 
 if( $getval ){
   $this->load->view('admin/view_industry_stock',$data) ;
 }else{
   redirect('admin/accessdeniedm');
 }
 
}

public function new_industry_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
$id = $this->input->post('id');
$type = $this->input->post('type');
  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  $data['pId'] = $id ;
  $data['type'] = $type ;
  $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'I')); 
  $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'I')); 
  $data['products'] = $this->Admin_model->get_all_data('industry_products'); 
 
 if( $getval ){
   $this->load->view('admin/create_industry_stock',$data) ;
 }else{
   redirect('admin/accessdeniedm');
 }
 
}


public function add_industry_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');
     
  /* Server side PHP input validation */    
  if($this->input->post('product_id')==='') {
        $Return['error'] = "Select product ";
  }else if($this->input->post('colors')==='') {
        $Return['error'] = "Select Available Color";
  } else if($this->input->post('sizes')==='') {
    $Return['error'] = "Select Available Size";
}  else if($this->input->post('quantity')==='') {
  $Return['error'] = "Add Quantity";
}  
  




if($Return['error']!=''){
        $this->output($Return);
    }

    
    


 
  $data = array(   
  'product_id' => $this->input->post('product_id'),
   
  'color'=>implode(',',$this->input->post('colors')),
  'size'=>implode(',',$this->input->post('sizes')),
  'quantity' => $this->input->post('quantity'),
  
  'type' => $this->input->post('entry_type'),
   
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );
  $result = $this->Admin_model->insert_data('industry_inventory', $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Stock added successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

 public function edit_industry_stock()
{
  $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
      
$id = $this->uri->segment(3) ;
$products = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));

$data = array();
if (isset($products)){
  $data['product']  = array('id'=>$products->id,'product_name'=>$products->product_name,'product_code'=>$products->product_code, 'category'=>$products->category,'related_products'=>$products->related_products,'is_unisex'=>$products->is_unisex, 'product_image'=>$products->product_image);
}
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/edit_industry_product', $data);

  }else{
    redirect('admin/accessdenied');
  }


  
}



public function update_industry_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

 $Return = array('result'=>'', 'error'=>'');
     
      $fname =  $this->input->post('iconname') ;

  /* Server side PHP input validation */    
  if($this->input->post('product_name')==='') {
    $Return['error'] = "Add product name ";
  } else if($this->input->post('category')===''){
    $Return['error'] = "Select category";
  }  else if(empty($fname) && empty($_FILES['product_image']['name'])){
    $Return['error'] = $this->Admin_model->translate("Product Image Required");
  }
      
 

      
  if($Return['error']!=''){
        $this->output($Return);
    }


$id =$this->input->post('productid') ;
    

 if(!empty($_FILES['product_image']['name'])){
if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['product_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["product_image"]["tmp_name"];
        $profile = "uploads/images/industry/";
         
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["product_image"]["name"]);
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



  $data = array(   
    'product_name' => $this->input->post('product_name'),
   // 'product_code' => $this->input->post('product_code'),
     'category'=>$this->input->post('category_name'),
     'product_image' => $fname  ,
    // 'related_products'=>$this->input->post('related_products'),
    // 'is_unisex'=>$this->input->post('is_unisex'),  
   
    );
  
  $result = $this->Admin_model->update_data('industry_products',array('id'=>$id), $data);
  if ($result == TRUE) {

     $Return['result'] = 'Product updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}
  
 
 //school 

  public function classTypes()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

    $data['categories'] = $this->Admin_model->get_all_data('class_type_master',''); 
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/list_classTypes', $data);
    }else{
      redirect('school_productsl/accessdenied');
    }
     
  }
   
  

 public function newclassType()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/add_classType');
    }else{
      redirect('admin/accessdenied');
    }
   
   
  }


  public function addclassType()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Add level name ";
    }   
 

    if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'class_type' => $this->input->post('category_name'),
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
      );
    $result = $this->Admin_model->insert_data('class_type_master', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Level added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editclassType()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $category = $this->Admin_model->get_single_data('class_type_master',array('id'=>$id));
 $data['category'] = array('id'=>$category->id,'category_name'=>$category->class_type);
  
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/edit_classType', $data);
    }else{
      redirect('admin/accessdenied');
    } 
  
    
  }



  public function update_classType()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Level name required");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('categoryid') ;
      
   
    $data = array(   
   
    'class_type' => $this->input->post('category_name'),
     
    );

    
    $result = $this->Admin_model->update_data('class_type_master',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Level updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
    
 
 
 
  public function standards()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['categories'] = $this->Admin_model->get_all_data('standard_master',''); 
   

      $this->load->view('admin/list_standards', $data);
  }
   
  

 public function newstandard()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    
    if( $getval){
      $this->load->view('admin/add_standard');
    }else{
    //  redirect('admin/accessdenied');
    }
   
   
  }


  public function addstandard()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('standard_name')==='') {
      $Return['error'] = "Add standard name ";
    } else if($this->input->post('type_id')===''){
      $Return['error'] = "Select level";
    }  
 

    if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'standard_name' => $this->input->post('standard_name'),
    'type_id' => $this->input->post('type_id'),
    'status' => 'Y',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
      );
    $result = $this->Admin_model->insert_data('standard_master', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Standard added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editstandard()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $standard = $this->Admin_model->get_single_data('standard_master',array('id'=>$id));
 $data['standard'] = array('id'=>$standard->id,'standard_name'=>$standard->standard_name,'type_id'=>$standard->type_id);
  
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/edit_standard', $data);
    }else{
      redirect('admin/accessdenied');
    } 
  
    
  }



  public function update_standard()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    /* Server side PHP input validation */    
    if($this->input->post('standard_name')==='') {
      $Return['error'] = "Add standard name ";
    } else if($this->input->post('type_id')===''){
      $Return['error'] = "Select level";
    }  
 

    if($Return['error']!=''){
          $this->output($Return);
      }

    

  $id =$this->input->post('standardid') ;
      
   
    $data = array(   
   
      'standard_name' => $this->input->post('standard_name'),
      'type_id' => $this->input->post('type_id'),
     
    );

    
    $result = $this->Admin_model->update_data('standard_master',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Standard updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }


  

  public function schools()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    
    $data['schooldet'] = $this->Admin_model->get_all_data('school_master',array('status !='=>'D')) ;
   
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
     $this->load->view('admin/list_schools', $data);
    }else{
      redirect('admin/accessdenied');
    }

   
  }

  public function  viewuniforms(){
    $session = $this->session->userdata('superadmindet');
    $schoolId = $this->input->post('schoolId'); ;
    $data['schoolId'] = $schoolId;
     
   $uniforms = $this->Admin_model->get_all_data('uniform_school_relation', array('school_id'=>$schoolId,'status'=>1));

 
     $Uvalues = array();


    $get_classlevels = array();
   foreach ($uniforms as $value){
    
    $get_classlevels = $this->Admin_model->get_all_data('uniform_school_relation',array('school_id'=>$schoolId,'status'=>1 , 'uniform_id' => $value['uniform_id']));

    

  if(!empty($get_classlevels)){
    foreach ($get_classlevels as $cval) {
 
    if($this->Admin_model->check_id_exists('school_products',$cval['uniform_id'])){

      $Uvalues[] = array('class_level' =>$cval['class_level'], 'unformId'=>$cval['uniform_id']);

    }

   }
  }




   }


 
  

   
    $data['uniforms'] =  $Uvalues ;

 
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
   
   if( $getval ){
     $this->load->view('admin/viewuniforms',$data) ;
   }else{
     redirect('admin/accessdeniedm');
   }
  
  } 
   


 public function newschool()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    $data['levels'] =  $this->Admin_model->get_all_data('class_type_master',array('status'=>'Y'));
     
    $data['standards'] =  $this->Admin_model->get_all_data('standard_master',array('status'=>'Y'));
     

     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
    $this->load->view('admin/add_school',$data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }


  public function addschool()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');

    $standards = $this->input->post('standards');
    $levels = $this->input->post('class_levels');

       
    /* Server side PHP input validation */    
    if($this->input->post('school_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Add school name");
    } else if($this->input->post('ar_school_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Add school name - Arabic");
    }  else if(empty($_FILES['school_logo']['name'])){
      $Return['error'] = $this->Admin_model->translate("Logo Required");
    }else if($levels[0] == '0'){
      $Return['error'] = $this->Admin_model->translate("Select class level(s)");
    }else if(empty($standards) || $standards[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select standard(s)");
    }

    


        
    if($Return['error']!=''){
          $this->output($Return);
      }


      $class_levels = array();
      $standard_details = array();
      $levels_standards = array();
for($i = 0; $i < sizeof($levels) ; $i++){
if( $levels[$i] !=='' && $levels[$i] !=='0'){

 

if($standards[$i]==='') {
$Return['error'] = "Select Standards";
} else if($levels[$i] ===''){
  $Return['error'] = "Select Class levels";
}

 if($Return['error']!=''){
      $this->output($Return);
  }



$class_levels[] = $levels[$i] ;
$stds = array();

for($k=0; $k < sizeof( $standards[$i]) ;$k++){
$standard_details[] = $standards[$i][$k] ;
$stds[] = $standards[$i][$k]  ;
}

$levels_standards[] = array('class_levels' => $levels[$i],
  'standards' => $stds );


}

} 

 
  

  $fname = "";
      
       if(is_uploaded_file($_FILES['school_logo']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['school_logo']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["school_logo"]["tmp_name"];
        $profile = "uploads/images/school/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["school_logo"]["name"]);
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

    
    $data = array(   
    'school_name' => $this->input->post('school_name'),
    'ar_school_name' => $this->input->post('ar_school_name'),
    'class_levels' => implode(',', $class_levels),
    'standards' => implode(',', $standard_details),
    'levels_standards' => json_encode($levels_standards),
    'school_type' => $this->input->post('school_type'),
    // 'description' => $this->input->post('description'),
    // 'ar_description' => $this->input->post('ar_description'),
    'status' => 'Y',
    'school_logo' => $fname  ,
    'created_by'=>$session['user_id'],
    'created_on'=>date('Y-m-d')
      );
    $result = $this->Admin_model->insert_data('school_master', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('School added successfully');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editschool()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $school = $this->Admin_model->get_single_data('school_master',array('id'=>$id)) ;

 
 
 $data = array();
if (isset($school)){
    $data  = array('id'=>$school->id,'school_name'=>$school->school_name,'ar_school_name'=>$school->ar_school_name,'class_levels'=>$school->class_levels,'standards'=>$school->standards,'levels_standards'=>$school->levels_standards,'school_type'=>$school->school_type, 'school_logo'=>$school->school_logo);
}

$data['levels'] =  $this->Admin_model->get_all_data('class_type_master');
$data['data_standards'] =  $this->Admin_model->get_all_data('standard_master');

 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
   $this->load->view('admin/edit_school', $data);
    }else{
      redirect('admin/accessdenied');
    }
  
    
  }



  public function update_school()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

    $fname =  $this->input->post('iconname') ;

    $standards = $this->input->post('standards');
    $levels = $this->input->post('class_levels');


       
    /* Server side PHP input validation */    
    if($this->input->post('school_name')==='') {
          $Return['error'] = $this->Admin_model->translate("School name required");
    }else if($this->input->post('ar_school_name')==='') {
          $Return['error'] = $this->Admin_model->translate("School name - Arabic required");
    }   else if(empty($fname) && empty($_FILES['school_logo']['name'])){
      $Return['error'] = $this->Admin_model->translate("School logo Required");
    }else if(empty($levels) || $levels[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select class level(s)");
    }else if(empty($standards) || $standards[0] == '' ){
      $Return['error'] = $this->Admin_model->translate("Select standard(s)");
    }

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

 $class_levels = array();
      $standard_details = array();
      $levels_standards = array();
for($i = 0; $i < sizeof($levels) ; $i++){
if( $levels[$i] !=='' && $levels[$i] !=='0'){

 

if($standards[$i]==='') {
$Return['error'] = "Select Standards";
} else if($levels[$i] ===''){
  $Return['error'] = "Select Class levels";
}

 if($Return['error']!=''){
      $this->output($Return);
  }



$class_levels[] = $levels[$i] ;
$stds = array();

for($k=0; $k < sizeof( $standards[$i]) ;$k++){
$standard_details[] = $standards[$i][$k] ;
$stds[] = $standards[$i][$k]  ;
}

$levels_standards[] = array('class_levels' => $levels[$i],
  'standards' => $stds );


}

} 

  $id =$this->input->post('schoolid') ;
     

    
 if(!empty($_FILES['school_logo']['name'])){
  if(is_uploaded_file($_FILES['school_logo']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
        $filename = $_FILES['school_logo']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["school_logo"]["tmp_name"];
          $profile = "uploads/images/school/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["school_logo"]["name"]);
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
      
    
 

    $data = array(
         
   
      'school_name' => $this->input->post('school_name'),
      'ar_school_name' => $this->input->post('ar_school_name'),
      'class_levels' => implode(',', $class_levels),
      'standards' => implode(',', $standard_details),
      'levels_standards' => json_encode($levels_standards),
      'school_type' => $this->input->post('school_type'),
      // 'description' => $this->input->post('description'),
      // 'ar_description' => $this->input->post('ar_description'),
      'school_logo' => $fname  ,
      
     
    );

    
    $result = $this->Admin_model->update_data('school_master',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('School updated successfully');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

  
public function school_status()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      
      $this->Admin_model->update_data('school_master',array('id'=>$id),array('status'=>$status));
    
 return $id ; 

    }else{

      return 'false' ;
       
    }

  }


public function school_products()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['products'] = $this->Admin_model->get_all_data('school_products',''); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_school_products', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   


 public function new_school_product ()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

      
  $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['products'] = $this->Admin_model->get_all_data('school_products'); 
  $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 
  $data['genders'] = $this->Admin_model->get_all_data('genders'); 

  $data['schools'] = $this->Admin_model->get_all_data('school_master',array('status'=>'Y'));
  $data['levels'] = $this->Admin_model->get_all_data('class_type_master',array('status'=>'Y'));

   
    if( $getval){
    $this->load->view('admin/add_school_product',$data);
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function add_school_product()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');

    $schools = $this->input->post('school');
    $levels = $this->input->post('class_levels');
       
    /* Server side PHP input validation */    
    if($this->input->post('product_name')==='') {
          $Return['error'] = "Add product name ";
    }else if($this->input->post('ar_product_name')==='') {
          $Return['error'] = "Add product name - Arabic ";
    }   else if(empty($_FILES['product_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Product Image Required");
    }else if($schools[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select school(s)");
    }else if($levels[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select level(s)");
    }
       
    
  

  

  if($Return['error']!=''){
          $this->output($Return);
      }

       $fname = "";
      
       if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['product_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["product_image"]["tmp_name"];
        $profile = "uploads/images/school/";
        $set_img = base_url()."uploads/images/school/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["product_image"]["name"]);
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



$attachment1  = $_FILES["image1"]['name'];
     for($i = 0; $i < sizeof($attachment1); $i++){
     if(is_uploaded_file($_FILES['image1']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image1']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     } else {
     $Return['error'] = "Invalid file format. Check the uploaded image";
     $this->output($Return);
     exit;
     }
     }
     }
     $images = array();
     $n=0;
     for($i = 0; $i < sizeof($attachment1); $i++){
     $n++;
     if(is_uploaded_file($_FILES['image1']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image1']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     $tmp_name = $_FILES["image1"]["tmp_name"][$i];
     $profile = "uploads/images/school/";
     $set_img = base_url()."uploads/images/school/";
     // basename() may prevent filesystem traversal attacks;
     // further validation/sanitation of the filename may be appropriate
     $name = basename($_FILES["image1"]["name"][$i]);
     $newfilename = 'IND_'.round(microtime(true)).$n.'.'.$ext;
     move_uploaded_file($tmp_name, $profile.$newfilename);
    
     $images[] =   $newfilename ;
     } else {
     $Return['error'] = "Invalid file format";
     $this->output($Return);
     exit;
     }
     }
     }
     $imagein = implode( ',',  $images);


  
 if(!empty($this->input->post('related_products'))){
  $related_products = implode(',',$this->input->post('related_products')) ;
 
 }else{
  $related_products= '' ;
 }


    $color = $this->input->post('colors') ;
 if(!empty($this->input->post('colors'))){
  $colors = implode(',',$this->input->post('colors')) ;
 
 }else{
  $colors= '' ;
 }

  $size = $this->input->post('sizes') ;
 if(!empty($this->input->post('sizes'))){
  $sizes = implode(',',$this->input->post('sizes')) ;
 
 }else{
  $sizes= '' ;
 }

 if(!empty($this->input->post('tags'))){
  $tags = implode(',',$this->input->post('tags')) ;
 
 }else{
  $tags= '' ;
 }

 if(!empty($this->input->post('genders'))){
  $genders = implode(',',$this->input->post('genders')) ;
 
 }else{
  $genders= '' ;
 }
 

 if(!empty($this->input->post('measurements'))){
  $measurements = implode(',',$this->input->post('measurements')) ;
 
 }else{
  $measurements= '' ;
 }

   
    $data = array(   
    'product_name' => $this->input->post('product_name'),
    'ar_product_name' => $this->input->post('ar_product_name'),
    'category' => $this->input->post('category_name'),
    'related_products'=>$related_products,
    'colors_available'=>$colors,
    'sizes_available'=>$sizes,
    'genders' => $genders,
    'measurements' => $measurements,
    'tags'=>$tags,
    'description' => $this->input->post('description'),
    'long_description' => $this->input->post('long_description'),

    'ar_description' => $this->input->post('ar_description'),
    'ar_long_description' => $this->input->post('ar_long_description'),
    'belongs_to' => 'industry' ,
    'product_image' => $fname ,
    'status' => 'Y',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
     
      );
    $uniformId = $this->Admin_model->insert_data('school_products', $data);


  $data = array(   
  'product_id' => $uniformId,
  'color_id'=> 0,
  'product_images' => $imagein ,
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
    );
 
 $insertImages = $this->Admin_model->insert_data('school_product_images', $data);


 

if(!empty( $size)){
    for ($i=0; $i < sizeof($size) ; $i++) { 
    
        $data = array(   
        'product_id' => $uniformId,
        'size_id'=>$size[$i],
        'product_price' => 0,
        'offer_price' =>0,
        'status' => 'Y',
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
        );
        
        $result = $this->Admin_model->insert_data('school_product_price_size_det', $data);
 
    }
  }else{
     $data = array(   
        'product_id' => $uniformId,
        'size_id'=>0,
        'product_price' => 0,
        'offer_price' =>0,
        'status' => 'Y',
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
        );

        $result = $this->Admin_model->insert_data('school_product_price_size_det', $data);
  }
   
 


if(!empty( $uniformId )){

      $class_levels = array();
       
for($i = 0; $i < sizeof($schools) ; $i++){
if( $schools[$i] !=='' && $schools[$i] !=='0'){

 

if($schools[$i]==='') {
$Return['error'] = "Select Schools";
} else if($levels[$i] ===''){
  $Return['error'] = "Select Class levels";
}

 if($Return['error']!=''){
      $this->output($Return);
  }

   $data = array(
      'school_id' => $schools[$i],
      'uniform_id' => $uniformId,
      'class_level' => (!empty($levels[$i])) ? implode(',',$levels[$i]) :  '' ,
      'status' => 1,
      'created_on'=>date('Y-m-d'),
      'created_by'=>$session['user_id']
               
              );


 $existing = $this->Admin_model->get_single_data('uniform_school_relation',array('uniform_id' => $uniformId,'school_id' =>$schools[$i] )) ;

if(!empty( $existing)){
   $result = $this->Admin_model->update_data('uniform_school_relation',array('uniform_id' => $uniformId,'school_id' =>$schools[$i] ),array('status'=>0)) ;
}

$result = $this->Admin_model->insert_data('uniform_school_relation',$data);
 


}

} 


}


    if ($uniformId  == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Product added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function edit_school_product()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $products = $this->Admin_model->get_single_data('school_products',array('id'=>$id));

 $data = array();
if (isset($products)){
    $data['product']  = array('id'=>$products->id,'product_name'=>$products->product_name,'ar_product_name'=>$products->ar_product_name,'category'=>$products->category,
    'product_code'=>$products->product_code,  'is_unisex'=>$products->is_unisex, 'product_image'=>$products->product_image,'related_products'=>$products->related_products, 'colors_available' => $products->colors_available,'sizes_available' => $products->sizes_available,'tags'=>$products->tags,'genders'=>$products->genders, 'description'=>$products->description, 'long_description'=>$products->long_description,'ar_description'=>$products->ar_description, 'ar_long_description'=>$products->ar_long_description, 'measurements' =>$products->measurements,'product_code'=> $products->product_code );
}
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');


  $data['schools'] = $this->Admin_model->get_all_data('school_master',array('status'=>'Y'));
  $data['levels'] = $this->Admin_model->get_all_data('class_type_master',array('status'=>'Y'));
  $data['school_relation'] = $this->Admin_model->get_all_data('uniform_school_relation',array('status'=> 1, "uniform_id"=> $id));


   
      $images = $this->Admin_model->get_single_data('school_product_images',array('product_id'=>$id,'color_id'=>0)) ;

      $data['folder'] =  'school' ;
     
     if(!empty($images)){
      $data['additionalimages'] = $images->product_images ;
}

      
  $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['products'] = $this->Admin_model->get_all_data('school_products'); 
  $data['genders'] = $this->Admin_model->get_all_data('genders');
  $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 
 

    if( $getval){
    $this->load->view('admin/edit_school_product', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_school_product()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
        $fname =  $this->input->post('iconname') ;

    $schools = $this->input->post('school');
    $levels = $this->input->post('class_levels');

    /* Server side PHP input validation */    
    if($this->input->post('product_name')==='') {
      $Return['error'] = "Add product name ";
    } else if($this->input->post('ar_product_name')==='') {
      $Return['error'] = "Add product name - Arabic";
    } else if(empty($fname) && empty($_FILES['product_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Product Image Required");
    }else if($schools[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select school(s)");
    }else if(empty($levels) || $levels[0] == ''){
      $Return['error'] = $this->Admin_model->translate("Select level(s)");
    }
        
   

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('productid') ;
      
  
   if(!empty($_FILES['product_image']['name'])){
  if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
        $filename = $_FILES['product_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["product_image"]["tmp_name"];
          $profile = "uploads/images/school/";
           
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["product_image"]["name"]);
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


 $attachment1  = $_FILES["image1"]['name'];
     for($i = 0; $i < sizeof($attachment1); $i++){
     if(is_uploaded_file($_FILES['image1']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image1']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     } else {
     $Return['error'] = "Invalid file format. Check the uploaded image";
     $this->output($Return);
     exit;
     }
     }
     }
     $images = array();
     $n=0;
     for($i = 0; $i < sizeof($attachment1); $i++){
     $n++;
     if(is_uploaded_file($_FILES['image1']['tmp_name'][$i])) {
     //checking image type
     $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
     $filename = $_FILES['image1']['name'][$i];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(in_array($ext,$allowed)){
     $tmp_name = $_FILES["image1"]["tmp_name"][$i];
     $profile = "uploads/images/school/";
     $set_img = base_url()."uploads/images/school/";
     // basename() may prevent filesystem traversal attacks;
     // further validation/sanitation of the filename may be appropriate
     $name = basename($_FILES["image1"]["name"][$i]);
     $newfilename = 'IND_'.round(microtime(true)).$n.'.'.$ext;
     move_uploaded_file($tmp_name, $profile.$newfilename);
     
     $images[] = $newfilename;
     } else {
     $Return['error'] = "Invalid file format";
     $this->output($Return);
     exit;
     }
     }
     }
     $imagein = implode( ',',  $images);


$existingImages = $this->input->post('edit_img');

 $insertimages = "";
        if($imagein!=="" && $existingImages!=="")
        {
          $insertimages = $imagein.','. $existingImages;
        }
        else if($imagein=="")
        {
           $insertimages = $existingImages;
        }else if($existingImages=="")
        {
           $insertimages = $imagein;
        }
if(!empty($insertimages)){
   $imageData = array(  
    'product_id' => $id,
    'color_id' => 0 ,
    'product_images' => $insertimages ,
    );
 
}

        
 



 if(!empty($this->input->post('related_products'))){
  $related_products = implode(',',$this->input->post('related_products')) ;
 
 }else{
  $related_products= '' ;
 }

 if(!empty($this->input->post('colors'))){
  $colors = implode(',',$this->input->post('colors')) ;
 
 }else{
  $colors= '' ;
 }

 $size = $this->input->post('sizes');
 if(!empty($this->input->post('sizes'))){
  $sizes = implode(',',$this->input->post('sizes')) ;
 
 }else{
  $sizes= '' ;
 }

 if(!empty($this->input->post('tags'))){
  $tags = implode(',',$this->input->post('tags')) ;
 
 }else{
  $tags= '' ;
 }

 if(!empty($this->input->post('genders'))){
  $genders = implode(',',$this->input->post('genders')) ;
 
 }else{
  $genders= '' ;
 }

 
 if(!empty($this->input->post('measurements'))){
  $measurements = implode(',',$this->input->post('measurements')) ;
 
 }else{
  $measurements= '' ;
 }
 

 
    $data = array(   
      'product_name' => $this->input->post('product_name'),
      'ar_product_name' => $this->input->post('ar_product_name'),
      'product_code' => $this->input->post('product_code'),
      'category' => $this->input->post('category_name'),
      'product_image' => $fname  ,
      'related_products'=>$related_products,
      'colors_available'=>$colors,
      'sizes_available'=>$sizes,
      'genders' => $genders,
      'measurements' => $measurements,
      'tags'=> $tags,
      'description' => $this->input->post('description'),
      'long_description' => $this->input->post('long_description'),
      'ar_description' => $this->input->post('ar_description'),
      'ar_long_description' => $this->input->post('ar_long_description'),
     
      );
    
    $result = $this->Admin_model->update_data('school_products',array('id'=>$id), $data);
$uniformId  = $id ;

    if(!empty( $uniformId )){

      $class_levels = array();
       
for($i = 0; $i < sizeof($schools) ; $i++){
if( $schools[$i] !=='' && $schools[$i] !=='0'){
if($schools[$i]==='') {
$Return['error'] = "Select Schools";
} else if($levels[$i] ===''){
  $Return['error'] = "Select Class levels";
}

 if($Return['error']!=''){
      $this->output($Return);
  }
   $data = array(
      'school_id' => $schools[$i],
      'uniform_id' => $uniformId,
      'class_level' => (!empty($levels[$i])) ? implode(',',$levels[$i]) :  '' ,
      'status' => 1,
      'created_on'=>date('Y-m-d'),
      'created_by'=>$session['user_id']
               
              );

   $existing = $this->Admin_model->get_single_data('uniform_school_relation',array('uniform_id' => $uniformId,'school_id' =>$schools[$i] )) ;

if(!empty( $existing)){
   $result = $this->Admin_model->update_data('uniform_school_relation',array('uniform_id' => $uniformId,'school_id' =>$schools[$i] ),array('status'=>0)) ;
}

$result = $this->Admin_model->insert_data('uniform_school_relation',$data);

    }
  } 
}


    //  $pimages = $this->Admin_model->update_data('school_product_images',array('product_id' => $id,
    // 'color_id'=>0) , $imageData);

      $existing = $this->Admin_model->get_single_data('school_product_images',array('product_id' => $id,
  'color_id'=>0)) ;

      if(!empty($imageData)){

  if($existing){
    $result = $this->Admin_model->update_data('school_product_images',array('product_id' => $id,
    'color_id'=>0) , $imageData);
  }else{
    $result = $this->Admin_model->insert_data('school_product_images', $imageData);
  }
      }

        $existing = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id' => $uniformId,
          'status' =>'Y' )) ;


if(empty( $existing)){

if(!empty( $size)){
    for ($i=0; $i < sizeof($size) ; $i++) { 
    
        $data = array(   
        'product_id' => $uniformId,
        'size_id'=>$size[$i],
        'product_price' => 0,
        'offer_price' =>0,
        'status' => 'Y',
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
        );
        
        $result = $this->Admin_model->insert_data('school_product_price_size_det', $data);
 
    }
  }else{
     $data = array(   
        'product_id' => $uniformId,
        'size_id'=>0,
        'product_price' => 0,
        'offer_price' =>0,
        'status' => 'Y',
        'created_on'=>date('Y-m-d'),
        'created_by'=>$session['user_id']
        );

        $result = $this->Admin_model->insert_data('school_product_price_size_det', $data);
  }


}
       
 

    if ($result == TRUE) {

       $Return['result'] = 'Product updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }


  public function uniform_categories()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['categories'] = $this->Admin_model->get_all_data('uniform_categories',''); 
   

      $this->load->view('admin/list_uniform_categories', $data);
  }
   
  

 public function newuniformcategory()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/add_uniform_category');
    }else{
      redirect('admin/accessdenied');
    }   
  }


  public function adduniformcategory()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Add category name ";
    }  else if($this->input->post('ar_category_name')==='') {
          $Return['error'] = "Add category name - Arabic";
    }   
 

    if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'category_name' => $this->input->post('category_name'),
     'ar_category_name' => $this->input->post('ar_category_name'),
    'status' => 'Y',
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
      );
    $result = $this->Admin_model->insert_data('uniform_categories', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Category added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function edituniformcategory()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
    $category = $this->Admin_model->get_single_data('uniform_categories',array('id'=>$id));
    $data['category'] = array('id'=>$category->id,'category_name'=>$category->category_name,'ar_category_name'=>$category->ar_category_name);
  
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/edit_uniform_category', $data);
    }else{
      redirect('admin/accessdenied');
    } 
  
    
  }



  public function update_uniform_category()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Category name required");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('categoryid') ;
      
   
    $data = array(   
   
    'category_name' => $this->input->post('category_name'),

    'ar_category_name' => $this->input->post('ar_category_name'),
     
    );

    
    $result = $this->Admin_model->update_data('uniform_categories',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Category updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
    
 
  
  
public function school_inventory()
{  

$session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  } 

   $products = $this->Admin_model->get_all_data('school_products',array('status'=>'Y')); 
   foreach($products as $p){
    $qty = 0 ;

    $inventory =  $this->Admin_model->get_all_data('school_inventory',array('product_id'=>$p['id']),"id asc"); 
    foreach($inventory as $inv){
      if($inv['type'] == 'add'){
        $qty = $qty + $inv['quantity'];
      }else{
        $qty = $qty - $inv['quantity'] ;
      }
      $updated = $inv['created_on'] ;
    }

    $data['products'][] = array('pid'=>$p['id'],'name' => $p['product_name'],'ar_name' => $p['ar_product_name'],'qty' => $qty, 'updated' => $updated  ) ;
     
  }
   
$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/list_uniform_stock', $data);
  }else{
    redirect('admin/accessdenied');
  }
    
}
 


public function new_uniform_stock()
{   
  $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
$id = $this->input->post('id');
$type = $this->input->post('type');
  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  $data['pId'] = $id ;
  $data['type'] = $type ;
  $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['colors'] = $this->Admin_model->get_all_data('color_master',array('belongs_to'=>'admin','type'=>'S')); 
  $data['products'] = $this->Admin_model->get_all_data('school_products'); 
 
 if( $getval ){
   $this->load->view('admin/create_uniform_stock',$data) ;
 }else{
   redirect('admin/accessdeniedm');
 }
}

public function view_uniform_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
$id = $this->input->post('id');
$type = $this->input->post('type');
  
  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  $data['pId'] = $id ;
 
  $data['products'] = $this->Admin_model->get_all_data('school_inventory', array('product_id'=>$id),'id desc'); 
   
 
 if( $getval ){
   $this->load->view('admin/view_uniform_stock',$data) ;
 }else{
   redirect('admin/accessdeniedm');
 }
 
}


public function add_uniform_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
 $Return = array('result'=>'', 'error'=>'');
     
  /* Server side PHP input validation */    
  if($this->input->post('product_id')==='') {
        $Return['error'] = "Select product ";
  }else if($this->input->post('colors')==='') {
        $Return['error'] = "Select Available Color";
  } else if($this->input->post('sizes')==='') {
    $Return['error'] = "Select Available Size";
}  else if($this->input->post('quantity')==='') {
  $Return['error'] = "Add Quantity";
}  
     
  




if($Return['error']!=''){
        $this->output($Return);
    }

    


 
  $data = array(   
  'product_id' => $this->input->post('product_id'),
   
  'color'=>implode(',',$this->input->post('colors')),
  'size'=>implode(',',$this->input->post('sizes')),
  'quantity' => $this->input->post('quantity'),
   
  'type' => $this->input->post('entry_type'),
   
  'created_on'=>date('Y-m-d'),
  'created_by'=>$session['user_id']
   
    );
  $result = $this->Admin_model->insert_data('school_inventory', $data);
  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Stock added successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

 public function edit_uniform_stock()
{
  $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }
      
$id = $this->uri->segment(3) ;
$products = $this->Admin_model->get_single_data('school_inventory',array('id'=>$id));

$data = array();
if (isset($products)){
  $data['product']  = array('id'=>$products->id,'product_name'=>$products->product_name,'product_code'=>$products->product_code, 'category'=>$products->category,'related_products'=>$products->related_products,'is_unisex'=>$products->is_unisex, 'product_image'=>$products->product_image);
}
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  if( $getval){
  $this->load->view('admin/edit_uniform_product', $data);

  }else{
    redirect('admin/accessdenied');
  }


  
}



public function update_uniform_stock()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

 $Return = array('result'=>'', 'error'=>'');
     
      $fname =  $this->input->post('iconname') ;

  /* Server side PHP input validation */    
  if($this->input->post('product_name')==='') {
    $Return['error'] = "Add product name ";
  } else if($this->input->post('category')===''){
    $Return['error'] = "Select category";
  }  else if(empty($fname) && empty($_FILES['product_image']['name'])){
    $Return['error'] = $this->Admin_model->translate("Product Image Required");
  }
      
 

      
  if($Return['error']!=''){
        $this->output($Return);
    }


$id =$this->input->post('productid') ;
    

 if(!empty($_FILES['product_image']['name'])){
if(is_uploaded_file($_FILES['product_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['product_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["product_image"]["tmp_name"];
        $profile = "uploads/images/industry/";
         
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["product_image"]["name"]);
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



  $data = array(   
    'product_name' => $this->input->post('product_name'),
   // 'product_code' => $this->input->post('product_code'),
     'category'=>$this->input->post('category_name'),
     'product_image' => $fname  ,
    // 'related_products'=>$this->input->post('related_products'),
    // 'is_unisex'=>$this->input->post('is_unisex'),  
   
    );
  
  $result = $this->Admin_model->update_data('school_inventory',array('id'=>$id), $data);
  if ($result == TRUE) {

     $Return['result'] = 'Stock added successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}
  

public function uniform_school_relation()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['products'] = $this->Admin_model->get_all_data('school_products',''); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/uniform_school_relation', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   
 

  
public function login_status_service()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      
      $this->Admin_model->update_data('services',array('id'=>$id),array('login_required'=>$status));
    
 return $id ; 

    }else{

      return 'false' ;
       
    }


 
  }
   

   

   public function changeservicessort()
{
   $session = $this->session->userdata('superadmindet');
   
  //$data['question'] = $this->input->post('qid')  ;

 // $serviceid = $this->input->post('serviceid') ;

//$data['serviceid'] =$serviceid ;
   // $question = $this->Admin_model->get_all_data('services',array('service_id'=>$serviceid,'status !='=>'deleted' ));


 $services = $this->Admin_model->get_all_data('services',array('status !='=>'delete' ));

  $marks = array();
foreach ($services as $key => $row)
{
    $marks[$key] = $row['ordering'];
    
}
array_multisort($marks, SORT_ASC, $services);
  
#apply multisort method
$data['services'] = $services;


   

    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/changeserviceorder',$data);
    }else{
      redirect('admin/accessdeniedm');
    }

   
}

public function updateservicessort(){

  $services  = $this->input->post('services');

  for ($i=0; $i < count($services) ; $i++) { 

$this->db->where('id',$services[$i]);
$this->db->where('status!=','delete');
$this->db->update('services',array('ordering'=>$i+1));

     
  }  

return true ;
}



       public function initialscreens()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
    
 $datas = $this->Admin_model->get_single_data('initial_screens') ;
 
 $data = array();
if (isset($datas)){
    $data  = array('basic'=>$datas->basic,'ar_basic'=>$datas->ar_basic,'supporting'=>$datas->supporting,'ar_supporting'=>$datas->ar_supporting);
}

 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
   $this->load->view('admin/initialscreens', $data);
    }else{
      redirect('admin/accessdenied');
    }
  
    
  }
 

public function changesort()
{
   $session = $this->session->userdata('superadmindet');
   
  $data['question'] = $this->input->post('qid')  ;

  $serviceid = $this->input->post('serviceid') ;

$data['serviceid'] =$serviceid ;
   $question = $this->Admin_model->get_all_data('questions',array('service_id'=>$serviceid,'status !='=>'deleted' ));

  $marks = array();
foreach ($question as $key => $row)
{
    $marks[$key] = $row['sorting_order'];
    
}
array_multisort($marks, SORT_ASC, $question);
  
#apply multisort method
$data['questions'] = $question;


   

    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/changesort',$data);
    }else{
      redirect('admin/accessdeniedm');
    }

   
}

public function updatesort(){

  $questions  = $this->input->post('question');

  for ($i=0; $i < count($questions) ; $i++) { 

$this->db->where('id',$questions[$i]);
$this->db->update('questions',array('sorting_order'=>$i+1));

     
  }  

return true ;
}


public function subquestions()
   {
     $session = $this->session->userdata('superadmindet');
   
      $data['servicedet'] = $this->Admin_model->get_all_data('services','') ;
       
       $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
   //  if( $getval){
   // $this->load->view('admin/sub_questions',$data) ;
   //  }else{
   //    redirect('admin/accessdenied');
   //  }
$this->load->view('admin/sub_questions',$data) ;
  
     
   }

public function getquestions()
{
   $session = $this->session->userdata('superadmindet');
   
   $serviceid = $this->input->post('serviceid');
   
   $this->load->view('admin/getquestions',$data) ;
}

public function getoptions()
{
   $session = $this->session->userdata('superadmindet');
   
   $questionid = $this->input->post('questionid');
   $data['options'] = $this->Admin_model->get_single_data('questions',array('id'=>$questionid));
   
   $this->load->view('admin/getoptions',$data) ;
}

 

 
   
 
public function changepassword()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
   //  $id = $session['user_id'];


 
 $id = $this->uri->segment(3);
if(empty($id )){
  $id = $session['user_id'] ;
}


$users = $this->Admin_model->get_single_data('users',array('id'=>$id));

 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'user_name'=>$users->user_name,'user_email'=>$users->user_email);
}
//print_r($data);
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/changepassword', $data);
    }else{
      $this->load->view('admin/accessdenied');
   
    }


   
  }


 function emailexists()
  {

$Return = array('result'=>'', 'error'=>'');

$email  = $this->input->post('email');
 
if($this->input->post('email')==='') {
$Return['error'] = $this->Admin_model->translate("Email field is empty");
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)  {
 $Return['error'] = $this->Admin_model->translate("Invalid Email ID");
} 

if($Return['error']!=''){
$this->output($Return);
}

$data  = $this->Admin_model->get_single_data('users',array('user_email'=>$email)) ;

if(empty($data)){
   $Return['error'] = $this->Admin_model->translate("Email Id does not exists");
  } 

$this->output($Return);
exit ;

}


 function checkemail()
  {

$Return = array('result'=>'', 'error'=>'');

$email  = $this->input->post('email');


 
if($this->input->post('email')==='') {
$Return['error'] = $this->Admin_model->translate("Email field is empty");
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)  {
 $Return['error'] = $this->Admin_model->translate("Invalid Email ID");
} 

if($Return['error']!=''){
$this->output($Return);
}

$conditions = array('user_email'=>$email) ;

$userid = $this->input->post('userid') ;
if($userid){
$conditions['id !='] = $this->input->post('userid') ;
}

$data  = $this->Admin_model->get_single_data('users',$conditions) ;

if(!empty($data)){
   $Return['error'] = $this->Admin_model->translate("Email Id already exists");
  } 

$this->output($Return);
exit ;

}


public function request_password(){

$session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
     $id = $session['user_id'];

     $email = $this->input->post('email');

$Return = array('result'=>'', 'error'=>'');

if($this->input->post('email')==='') {
$Return['error'] = $this->Admin_model->translate("Email field is empty");
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)  {
 $Return['error'] = $this->Admin_model->translate("Invalid Email ID");
} 

if($Return['error']!=''){
$this->output($Return);
}


$data  = $this->Admin_model->get_single_data('users',array('user_email'=>$email)) ;
 
if($data->id !=  $id){
  $Return['error'] =$this->Admin_model->translate("Enter your registered Email ID") ;
}

  if($Return['error']!=''){
          $this->output($Return);
   }

$data = array('user_id'=> $id, 'status'=>'new','created_on'=>date('Y-m-d'));
$request =   $this->Admin_model->insert_data('password_request',$data) ;

if($request){
 $Return['result'] = $this->Admin_model->translate("Your request submitted successfully");
}

 $this->output($Return);
 exit;
}

public function update_password()
{
  $id = $this->input->post('userid');
   


//echo $this->db->last_query();
   $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('newpass')==='')
    {
       $Return['error'] = $this->Admin_model->translate('Password required');
    } 
    else if(strlen($this->input->post('newpass')) < 6)
    {
       $Return['error'] = $this->Admin_model->translate('The password must be at least 6 characters');
    }
    else if($this->input->post('newpass')!==$this->input->post('repass'))
    {
       $Return['error'] = $this->Admin_model->translate('The password confirmation does not match');
    }
    if($Return['error']!=''){
          $this->output($Return);
      }
    $data = array
    (
      'password' => md5($this->input->post('newpass'))
    );
     
    $result = $this->Admin_model->update_data('users',array('id'=>$id),$data);

   $email = $this->Admin_model->get_single_data('users',array('id'=>$id))->user_email;
  
            $subject ='Password changed successfully - KareemTex ';
            
            $message ='Your request for new password has been processed, Your new password is <b>'.$this->input->post('newpass').'</b>.';   

            $message  .= ' <a href="'. base_url()  .'/admin">Click here to login</a> ' ;        
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype("html");
            $this->email->from('liai.revathikv@gmail.com', 'KareemTex ');
            $this->email->to($email); 
            $this->email->subject($subject);
            $this->email->message($message);  
            $this->email->send();


   
    if($result == TRUE)
    {


      $newrequest = $this->Admin_model->get_all_data('password_request',array('status'=>'new','user_id'=>$id)) ;

if($newrequest){
  $this->Admin_model->update_data('password_request',array('status'=>'new','user_id'=>$id),array('status'=>'changed')) ;
}

      $Return['result'] = $this->Admin_model->translate('Password changed successfully.');
    }
    else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
}


public function forgotpassword()
  {  
    $this->load->view('admin/forgotpassword');
  }


public function reset_password()
{
     


//echo $this->db->last_query();
   $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('email')==='')
    {
       $Return['error'] = $this->Admin_model->translate('Enter email id');
    }  
     

$userdata  = $this->Admin_model->get_single_data('users',array('user_email'=>$this->input->post('email'))) ;

if(empty($userdata)){
   $Return['error'] = $this->Admin_model->translate("Email Id does not exists");
  } 


    if($Return['error']!=''){
          $this->output($Return);
      }
      $password = rand(100000 , 999999);

    $data = array
    (
      'password' => md5($password)
    );
     
    $result = $this->Admin_model->update_data('users',array('id'=>$userdata->id),$data);

    

            $email = $this->input->post('email');
  
            $subject ='Forgot Password - KareemTex ';
            
            
            // $message ='Your request for new password has been processed successfully.<br> Your new password is <b>'.$password.'</b>.'; 
            
            $message =" Hi, ".$userdata->user_name.", <br><br>" ;
            $message .=" There was recently a request for password for your KareemTex account.<br><br>

            Please, keep this in your records so you do not forget it.<br><br>
            
            Your username: <b>$userdata->user_name</b><br>
            Your email address: <b> $userdata->user_email </b><br>
            Your new password: <b> $password </b><br><br>" ;

            $message .=' <a href="'. base_url()  .$userdata->belongs_to.'">Click here to login</a> <br><br>' ; 
            
            $message  .="Thank you,<br>
            Team KareemTex " ;


            $message  .= ' <a href="'. base_url()  .$userdata->belongs_to.'">Click here to login</a> ' ;        
           
           $send = $this->sendemail($email, $subject, $message) ;

 

   if($result == TRUE)
    {
       $Return['result'] = 'Password changed successfully. New password sent to your email';
    }
    else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
}



function sendemail($to, $subject, $message){
  /* Load PHPMailer library */
  

  $this->load->library("phpmailer_library");
  $mail = $this->phpmailer_library->load();


 

  /* SMTP configuration */
  $mail->isSMTP();
 $mail->Priority = 1;
// MS Outlook custom header
// May set to "Urgent" or "Highest" rather than "High"
$mail->AddCustomHeader("X-MSMail-Priority: High");
// Not sure if Priority will also set the Importance header:
$mail->AddCustomHeader("Importance: High");
  $mail->Host     = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'kareemtex007@gmail.com';
  $mail->Password = 'rawkbxmgmjbnmkkp';
  $mail->SMTPSecure = 'ssl';
  $mail->Port     = 465;
 
  $mail->setFrom('kareemtex007@gmail.com', 'KareemTex');
  $mail->addReplyTo('kareemtex007@gmail.com', 'KareemTex');
  //$mail->AddBCC("liai.revathikv@gmail.com", 'KareemTex');
 
  /* Add a recipient */
  $mail->addAddress($to);

 
   
  /* Email subject */
  $mail->Subject = $subject ;
 
  /* Set email format to HTML */
  //$mail->isHTML(true);
  $mail->isHTML();
 
  /* Email body content */
  $mailContent = $message  ;
    
  //$mail->AddEmbeddedImage("uploads/services/madeen.png", "my-attach", "Instructions.png");
  $mail->Body =  $mailContent ;

 
  /* Send email */
  if(!$mail->send()){
      echo 'Mail could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;

  }else{
      return true;
  }
}



 public function users()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'User List';
    $data['superadmindet'] = $this->Admin_model->get_all_data('users','','belongs_to asc') ;

    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
        $this->load->view('admin/listuser', $data);
    }else{
      redirect('admin/accessdenied');
    }


   
  }
   


 public function newuser()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
    
          
    $data['roles']=$this->Admin_model->get_all_data('user_roles','','belongs_to asc') ;

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/adduser', $data);
    }else{
      redirect('admin/accessdenied');
    }
   
  }


  public function adduser()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('user_name')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('user_name'))!=1) {
      $Return['error'] = "Only letters are allowed in username!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if(!empty($this->Admin_model->get_single_data('users',array('user_email'=>$this->input->post('email'))))){
      $Return['error'] = "Email Id already exists";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed in contact number!!!";
    }
     else if($this->input->post('password')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('password')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('password')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    } else if($this->input->post('role')==='') {
       $Return['error'] = "User role required";
    }
      
 
 


    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
    $username = $this->input->post('user_name');
    $email = $this->input->post('email');
 

    $password = md5($this->input->post('password'));
 
  
  
    $data = array(
     
     
    'user_name' => $username,
     
    'user_email' => $this->input->post('email'),
    'password' => $password,
    'status' => 'Y',
    'user_role' => $this->input->post('role'),
    'belongs_to' => $this->Admin_model->get_type_name_by_id('user_roles','id',$this->input->post('role'),'belongs_to'),
    
    'created_on' => date('Y-m-d')
      
    );

    

     $result  = "";
      if($this->input->post('submit')=='true'){
          $result = $this->Admin_model->insert_data('users', $data);
      

    if ($result) {
      
      //get setting info 
       
       $Return['result'] = 'user added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
  }
    $this->output($Return);
    exit;
  }

   public function edituser()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
    $users = $this->Admin_model->get_single_data('users',array('id'=>$id)) ;
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'username'=>$users->user_name,'email'=>$users->user_email, 'role'=>$users->user_role);
}
    
    $data['roles']=$this->Admin_model->get_all_data('user_roles','','belongs_to asc') ;
  

  $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/edit_user', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }



  public function update_user()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('username')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('username'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if(!empty($this->Admin_model->get_single_data('users',array('user_email'=>$this->input->post('email'),'id !='=>$this->input->post('userid'))))){
      $Return['error'] = "Email Id already exists";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed!!!";
    } else if($this->input->post('role')==='') {
       $Return['error'] = "User role required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
          exit ;
      }
  

  $id =$this->input->post('userid') ;
      
    $username = $this->input->post('username');
    $email = $this->input->post('email');


  
 
 
    $data = array(
         
    'user_name' => $username,
    'user_email' => $this->input->post('email'),
    'user_role' => $this->input->post('role'), 
    
    'belongs_to' => $this->Admin_model->get_type_name_by_id('user_roles','id',$this->input->post('role'),'belongs_to'),
        
    );
 
     
        $result = $this->Admin_model->update_data('users',array('id'=>$id), $data);

 
  

    if ($result) {
      
      //get setting info 
       
       $Return['result'] = 'User detail updated successfully.';
      
    } else {
      $Return['error'] =  'Nothing to update';
    }
  
    $this->output($Return);
    exit;
  }
    

public function reset_pass()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
   if($this->input->post('password')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('password')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('password')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('userid') ;
    
 
    $data = array(
         
    'password' => md5($this->input->post('password')),
            
    );

    
    $result = $this->Admin_model->update_data('users',array('id'=>$id));
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'User detail updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   


  public function order_report()
  {
  
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
    $data['statuses'] =  $this->Admin_model->get_all_data('order_status');

    $data['status']=($this->input->get('status')) ? $this->input->get('status') : '';
    $data['type']=($this->input->get('type')) ? $this->input->get('type') : '';
    $data['date']=($this->input->get('date')) ? $this->input->get('date') : '';


    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/request_report', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }



public function request_det()
{
   $session = $this->session->userdata('superadmindet');
   $fromdate = $this->input->post('fromdate');
   $todate = $this->input->post('todate');
   $type = $this->input->post('type');
   $status = $this->input->post('status');

//$data['orders'] = $this->Admin_model->get_all_data('order_master',array('type'=>$type));

$conditions = array() ;  

if($type<>'all'){
  $conditions['type'] =    $type ;
}

if($status){
  $conditions['order_status'] =    $status ;
}

if($fromdate){
  $conditions['created_on >='] =    $fromdate ;
}
if($todate){
  $conditions['created_on <='] =    $todate ;
}

 $orderby = ' created_on desc ' ;

  $data['orders'] = $this->Admin_model->get_all_data('order_master',$conditions,$orderby );

  $this->load->view('admin/request_result',$data) ;

  
}


   public function  statushistory(){
     $session = $this->session->userdata('superadmindet');
     $requestid = $this->input->post('requestid'); ;
   $data['requestid'] = $requestid;

    $data['history'] = $this->Admin_model->get_all_data('status_update_history',array('request_id' => $requestid));

  // echo $this->db->last_query();
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/statushistory',$data) ;
    }else{

      $this->load->view('admin/accessdeniedm') ;
    }

    // $this->load->view('admin/update_status',$data) ;
   }

   


 public function  adduniformtoschool(){
     $session = $this->session->userdata('superadmindet');
     $uniformid = $this->input->post('uniformid'); ;
     $data['uniformid'] = $uniformid;
      
    $data['schools'] = $this->Admin_model->get_all_data('school_master',array('status !='=>'N'));
    $data['uniforms'] = $this->Admin_model->get_all_data('school_products');
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    
    if( $getval ){
      $this->load->view('admin/adduniformtoschool',$data) ;
    }else{
      redirect('admin/accessdeniedm');
    }
   
   }  

public function add_uniform_to_school(){
    $session = $this->session->userdata('superadmindet');

$Return = array('result'=>'', 'error'=>'');

$uniformid = $this->input->post('uniformid');

if(empty($uniformid)){
$Return['error'] = "Invalid request";
}

if($Return['error']!=''){
$this->output($Return);
}  

 

$data = array(
'school_id' => $this->input->post('school_id'),
'uniform_id' => $this->input->post('uniform_id'),
'class_level' => implode(',',$this->input->post('class_level')),
'status' => 1,
'created_on'=>date('Y-m-d'),
'created_by'=>$session['user_id']
);


$result = $this->Admin_model->insert_data('uniform_school_relation',$data);

 $existing = $this->Admin_model->get_single_data('uniform_school_relation',array( 
'uniform_id' => $this->input->post('uniform_id')
,'school_id' => $this->input->post('school_id') )) ;

if(!empty( $existing)){
   $result = $this->Admin_model->update_data('uniform_school_relation',array( 
'uniform_id' => $this->input->post('uniform_id')
  ,'school_id' =>$this->input->post('school_id') ),array('status'=>0)) ;
}

$result = $this->Admin_model->insert_data('uniform_school_relation',$data);



if($result){
  $Return['result'] = 'Uniform added to School successfully.';
  
}  
$this->output($Return);
exit;


} 


public function  viewschools(){
  $session = $this->session->userdata('superadmindet');
  $uniformid = $this->input->post('uniformid'); ;
  $data['uniformid'] = $uniformid;
   
 $data['schools'] = $this->Admin_model->get_all_data('uniform_school_relation', array('uniform_id'=>$uniformid,'status'=>1));
 
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
 
 if( $getval ){
   $this->load->view('admin/viewschools',$data) ;
 }else{
   redirect('admin/accessdeniedm');
 }

}  

    
  public function order_status_update(){
    $session = $this->session->userdata('superadmindet');
    $Return = array('result'=>'', 'error'=>'');

    $orderid = $this->input->post('orderid');

    if(empty($orderid)){
      $Return['error'] = "Invalid request";
    }

    if($Return['error']!=''){
    $this->output($Return);
    }  

    $data = array('order_status' => $this->input->post('status'),
                  'notes' => $this->input->post('remarks')
                  );
   $result = $this->Admin_model->update_data('order_master', array('id'=> $orderid),$data);


   $statusdata = array('order_id' => $this->input->post('orderid'),
   'status' => $this->input->post('status'),
               'remarks' => $this->input->post('remarks'),
               'updated_by' => $session['user_id'],
               'created_date' => date('Y-m-d h:i:s')
               );


   $this->db->insert('status_update_history',$statusdata) ;

 

// $custexists = $this->db->get_where('customers',array('id'=>$customerid))->row() ;
// if(!empty($custexists)){
// $token = $this->db->get_where('customers',array('id'=>$customerid))->row()->token;

// }else{
//   $token = '' ;
// }

// if(!empty($token)){
//    $send = $this->notification($token,'Order status updated', $msg,"admin" );
// } 


   if($result){
      $Return['result'] = 'Status updated successfully.';
      
    }  
    $this->output($Return);
    exit;


   } 


public function symptoms()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['symptoms'] = $this->Admin_model->get_all_data('symptoms',''); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_symptoms', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   


 public function newsymptom()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/add_symptom');
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function addsymptom()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('symptom_name')==='') {
          $Return['error'] = "Add symptom name ";
    }else if($this->input->post('ar_symptom_name')==='') {
          $Return['error'] = "Add symptom name in arabic";
    }else if($this->input->post('dis_group')==='') {
          $Return['error'] = "Add group name";
    }else if(strlen($this->input->post('dis_group')) != 1)
    {
       $Return['error'] = 'Group name should be single character';
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('dis_group'))!=1) {
      $Return['error'] = "Only letters are allowed in group name";
    }else if(!empty($this->Admin_model->get_single_data('symptoms',array('group_name'=>$this->input->post('dis_group'))))){
       $Return['error'] = "Group name already exists";
    }
        
    
  if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'symptom_name' => $this->input->post('symptom_name'),
     'ar_symptom_name' => $this->input->post('ar_symptom_name'),
    'group_name'=>$this->input->post('dis_group'),
     
      );
    $result = $this->Admin_model->insert_data('symptoms', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Symptom added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function editsymptom()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 $modules = $this->Admin_model->get_single_data('symptoms',array('id'=>$id));

 $data = array();
if (isset($modules)){
    $data  = array('id'=>$modules->id,'symptom_name'=>$modules->symptom_name,'ar_symptom_name'=>$modules->ar_symptom_name, 'dis_group'=>$modules->group_name);
}
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/edit_symptom', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_symptom()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

     $id =$this->input->post('symptomid') ;
       
    /* Server side PHP input validation */    
    if($this->input->post('symptom_name')==='') {
          $Return['error'] = "Add symptom name ";
    }else if($this->input->post('ar_symptom_name')==='') {
          $Return['error'] = "Add symptom name in arabic";
    }else if($this->input->post('dis_group')==='') {
          $Return['error'] = "Add group name";
    }else if(strlen($this->input->post('dis_group')) != 1)
    { 
     $Return['error'] = 'Group name should be single character';
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('dis_group'))!=1) {
      $Return['error'] = "Only letters are allowed in group name";
    }else if(!empty($this->Admin_model->get_single_data('symptoms',array('group_name'=>$this->input->post('dis_group'),'id !='=>$id)))){
       $Return['error'] = "Group name already exists";
    }
        
   

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  


      
  
 
    $data = array(   
    'symptom_name' => $this->input->post('symptom_name'),
      'ar_symptom_name' => $this->input->post('ar_symptom_name'),
    'group_name'=> $this->input->post('dis_group'),
     
      );
    
    $result = $this->Admin_model->update_data('symptoms',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Symptom updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   
 
 

  
  
    
 


  public function changelanguage()
    {   
      
      $session = $this->session->userdata('lang');
      $lang = $this->input->post('lang');

       

      if($lang == 'eng'){
         $this->session->set_userdata('dir', 'ltr');
       }else{
         $this->session->set_userdata('dir', 'rtl');
       }
 
      if(!empty($session)){
        $this->session->set_userdata('lang', $lang);
      }else{
        $this->session->set_userdata('lang', 'eng');
        $this->session->set_userdata('dir', 'ltr');
         
      }

     //echo $this->session->userdata('lang').' - '.$this->session->userdata('dir') ;
    }


public function translation()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'String List';
    $data['stringdet'] = $this->Admin_model->get_all_data('translation_strings','') ;
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/liststrings', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }


  public function addstring()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Translation List';
     
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
     $this->load->view('admin/addstring', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }
   



  public function new_string()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('string')==='') {
          $Return['error'] = "String required";
    }   else if($this->input->post('english')==='') {
       $Return['error'] = "English translation required";
    } else if($this->input->post('arabic')==='') {
       $Return['error'] = "Arabic translation required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
    $string =  $this->input->post('string');
    $English =  $this->input->post('english');
    $Arabic =  $this->input->post('arabic');
 
 
    $data = array(
         
    'string' => $string,
    'English' => $English,
    'Arabic' => $Arabic,
        
    );
 
    $result = $this->db->insert('translation_strings', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Translation details added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   
public function editstring()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
   $id = $this->uri->segment(3) ;
 
 

 
$strings = $this->Admin_model->get_single_data('translation_strings',array('id'=>$id));
 
 
 $data = array();
if (isset($strings)){
    $data  = array('id'=>$strings->id,'string'=>$strings->string,'English'=>$strings->English,'Arabic'=>$strings->Arabic);
}
  
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
     $this->load->view('admin/edit_string', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }


public function update_string()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('string')==='') {
          $Return['error'] = "String required";
    }   else if($this->input->post('english')==='') {
       $Return['error'] = "English translation required";
    } else if($this->input->post('arabic')==='') {
       $Return['error'] = "Arabic translation required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('stringid') ;

    $string = $this->input->post('string');
    $English = $this->input->post('english');
    $Arabic = $this->input->post('arabic');
 
 
    $data = array(
         
    'string' => $string,
    'English' => $English,
    'Arabic' => $Arabic,
        
    );

    
    $result = $this->Admin_model->update_data('translation_strings',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Translation details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }


 public function checkaccess($role,$method,$type) {


$permissions = $this->Admin_model->get_single_data('permissions',array('role'=>$role));

 


 if(!empty($permissions)){

  $read = explode(',', $permissions->read) ;
  $write = explode(',', $permissions->write) ;

  


  $result = $this->Admin_model->get_module($method,$type);
 
    

  


  if($result['type']=='read'){
   $moduleid =  $result['value']->id ;
 

      if(in_array($moduleid, $read)){
        return true ;
      }else{
        return false ;
      }
 
  }else if($result['type']=='write'){
    $moduleid =  $result['value']->id ;

      if(in_array($moduleid, $write)){
        return true ;
      }else{
        return false ;
      }
  }else{
    return false ;
  }
 }else{
    return false ;
  }

  

  //echo $result['type'];
 }
  public function logout() {
  
    $session = $this->session->userdata('superadmindet');
     
        
    // Removing session data
   
    $sess_array = array('superadmindet' => '');
    $this->session->sess_destroy();
    $Return['result'] = 'Successfully Logout.';
    redirect('main', 'refresh');
  }


public function checkorder()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }

    
      $sql= "SELECT count(id) as new FROM notification ";
      $query= $this->db->query($sql)->row();
      //echo $query->neword ;
      //echo $curorder ;

      if($query->new  > 0  )
      { 
        echo $query->new ;
      }else{
        echo 0 ;
      }
      // echo $res;

  }

  public function listnofy()
  { $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
      $this->load->view('admin/notifications');
  }



 public function delete_notifications()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
      

      $this->db->where('request_id !=','');
      $this->db->delete('notification');
         
  }
  
   public function delete_eachnotifications()
  {
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
      $id = $this->input->post('id');
          $this->db->where('id',$id);
      $this->db->delete('notification');
  }


// new works------------------------------------------------------------


   
  
 



   public function editmessage()
    {
       $session = $this->session->userdata('superadmindet');
    if(empty($session))
    { 
      redirect('admin');
    } 

          $this->load->view('admin/sendnotification');
    }

   public function sendmessage()
    {
        $Return = array('result'=>'', 'error'=>'');

        if($this->input->post('title')==='') {
       $Return['error'] = "Title required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

      $msg = $this->input->post('message');
      $title = $this->input->post('title');

      $cust_type = $this->input->post('cust_type');

       $this->db->select('token');
      if($cust_type == "guest")
      {
        $this->db->where('type','guest');

      }else if ($cust_type == "user") {

         $this->db->where('type','exist');

      }else if ($cust_type == "all") {

         $this->db->group_start();
         $this->db->where('type','guest');
         $this->db->or_where('type','exist');
         $this->db->group_end();
      }


      
      $cust = $this->db->get('customers')->result_array();

      foreach ($cust as $key ) {
        if(!empty($key['token'])){ 
          // $this->sendnotification($key['token'], $title, $msg,"dashboard" );
            $send = $this->notification($key['token'],$title, $msg,"admin" );
           //echo $send ;
        }
      }
       $Return['result'] = 'Notification sent Successfully.';
        $this->output($Return);
        exit; 
    }




  public function notification($tok,$tit,$bod,$type) 

   {
      $url = "https://fcm.googleapis.com/fcm/send";
      $token = $tok;
      $serverKey = 'AAAA3j7rwZw:APA91bEKu7OK5ITH2tmdNEp-90uEZ4wlE_K4ZDdyCocvQx8C3S6HaHak018sXGO1vtxqnlEKRj-uJF8TnGwYE0mBb6tYDisdz-LgyBP-lvsZ4LjEoeElunGsZmqRsWtDtIixKm9spGIs';
      $title = $tit;
      $body = $bod;
      //$type = "pickup";
      $notification = array('title' =>$title , 'body' => $body, 'data'=>$type,'sound' => 'default', 'badge' => '1');
      $arrayToSend = array('to' => $token , 'notification' => $notification,'data' => $notification,'priority'=>'high');
      $json = json_encode($arrayToSend);
      $headers = array();
      $headers[] = 'Content-Type: application/json';
      $headers[] = 'Authorization: key='. $serverKey;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
      curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      $result = curl_exec($ch);

      // Close cURL resource
      curl_close($ch);
      return $result;

      //$send = notification($cval['token'],"New Trip Assigned", "A new trip has been assigned to you" );
  }

 

public function map()
{
$data['briefdet'] = $this->Admin_model->get_single_data('brief',array('id'=>'1')) ;
  $this->load->view('admin/editmap',$data);

}
   
 

 
     
 public function delete_entry()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $table = $this->input->post('table');
    $this->Admin_model->delete_data($table,array('id'=>$id));
    
    return true ;
    
  }




      public function change_status()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    $table = $this->input->post('table');
    $this->Admin_model->update_data($table,array('id'=>$id),array('status'=>$status));
    return $id ; 

    
  }

  function industry_orders(){

    

    $data['orders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'industry'),'id desc');
    $this->load->view('admin/list_orders',$data);
  }

   public function invoice() {

    $id = $this->uri->segment(3) ;

$data['order'] = $this->Admin_model->get_single_data('order_master',array('id'=> $id ) );
    
$data['address'] = $this->Admin_model->get_single_data('contact_us_page',array('id'=>1))->box3_value ;     $this->load->view('home/invoice',$data);
  }
  
 
  function order_status(){

    $session = $this->session->userdata('superadmindet');
    $orderid = $this->input->post('orderid'); ;
    $data['orderid'] = $orderid;
     
   $data['order'] = $this->Admin_model->get_single_data('order_master', array('id'=>$orderid));

  $data['statuses'] =  $this->Admin_model->get_all_data('order_status');
   
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
   
   if( $getval ){
     $this->load->view('admin/update_status',$data) ;
   }else{
     redirect('admin/accessdeniedm');
   }
 
  }

  

  function uniform_orders(){
    $data['orders'] = $this->Admin_model->get_all_data('order_master',array('type'=>'school'),'id desc');
    $this->load->view('admin/list_orders',$data);
  }

   //measurements
  public function enquiries()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 


 $date =($this->input->get('date')) ? $this->input->get('date') : '';
 $status =($this->input->get('status')) ? $this->input->get('status') : '';

 if(!empty($date)){
   $filter['DATE(created_on)'] = date('Y-m-d') ;
 }else if(!empty($status)){
  $filter['status'] =  $status ;
 } else{
  $filter = '' ;
 }

     $data['enquiries'] = $this->Admin_model->get_all_data('enquiry_messages',$filter,'id desc'); 
     
     $this->load->view('admin/list_enquiries', $data);
  }

   public function  enquirystatus(){
     $session = $this->session->userdata('superadmindet');
     $requestid = $this->input->post('requestid'); ;
    $data['enquiryid'] = $requestid;


    $status = $this->Admin_model->get_single_data('enquiry_messages',array('id' => $requestid,'status !='=>'closed'));

    $status = $status->status ;

    $data['statuses'] =  $this->Admin_model->get_all_data('enquiry_status');


    $data['reqstatus'] = $this->Admin_model->get_single_data('enquiry_messages',array('id' => $requestid));
    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  
    if( $getval && !empty($status) ){
      $this->load->view('admin/update_enquiry_status',$data) ;
    }  
    else{
       redirect('admin/accessdeniedm');
    }   
   }

    
     public function enquiry_status_update(){
        $session = $this->session->userdata('superadmindet');

    $Return = array('result'=>'', 'error'=>'');

    $requestid = $this->input->post('enquiryid');

if(empty($requestid)){
  $Return['error'] = "Invalid request";
}

if($Return['error']!=''){
$this->output($Return);
}  

     

    $data = array('status' => $this->input->post('status'),
                  'remarks' => $this->input->post('remarks')
                  );
   $result = $this->Admin_model->update_data('enquiry_messages', array('id'=> $requestid),$data);

   $this->db->insert('enquiry_status_update_history',array('enquiry_id'=>$requestid,'remarks'=>$this->input->post('remarks'),'status' => $this->input->post('status'),'created_date'=>date('Y-m-d h:i:s'),'updated_by'=>$session['user_id'])) ;
 


   if($result){
      $Return['result'] = 'Status updated successfully.';
      
    }  
    $this->output($Return);
    exit;


   } 


public function view_enquiry_status(){
    $session = $this->session->userdata('superadmindet');

    $Return = array('result'=>'', 'error'=>'');

    $requestid = $this->input->post('enquiryid');

if(empty($requestid)){
  $Return['error'] = "Invalid request";
}

if($Return['error']!=''){
$this->output($Return);
}  

 
   $data['enquiry'] = $this->Admin_model->get_single_data('enquiry_messages', array('id'=> $requestid));
   $data['history'] = $this->Admin_model->get_all_data('enquiry_status_update_history', array('enquiry_id'=> $requestid),'id desc');


 
 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

  
    if( $getval ){
      $this->load->view('admin/view_enquiry_status',$data) ;
    }  
    else{
       redirect('admin/accessdeniedm');
    } 



   } 



  //measurements
  public function measurements()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 

     $data['measurements'] = $this->Admin_model->get_all_data('measurements',''); 
   

      $this->load->view('admin/list_measurements', $data);
  }
   
  

 public function newmeasurement()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/add_measurement');
    }else{
      redirect('admin/accessdenied');
    }   
  }


  public function addmeasurement()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('measurement_name')==='') {
          $Return['error'] = "Add measurement name ";
    }  else if($this->input->post('ar_measurement_name')==='') {
          $Return['error'] = "Add measurement name - arabic";
    }   

 

    if($Return['error']!=''){
          $this->output($Return);
      }

   
    $data = array(   
    'name' => $this->input->post('measurement_name'),
    'ar_name' => $this->input->post('ar_measurement_name'),
      );
    $result = $this->Admin_model->insert_data('measurements', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Measurement added successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editmeasurement()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
    $measurement = $this->Admin_model->get_single_data('measurements',array('id'=>$id));
    $data['measurement'] = array('id'=>$measurement->id,'measurement_name'=>$measurement->name,'ar_measurement_name'=>$measurement->ar_name);
  
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
      $this->load->view('admin/edit_measurement', $data);
    }else{
      redirect('admin/accessdenied');
    } 
  
    
  }

  public function settings(){
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    $data['settings'] = $this->Admin_model->get_single_data('site_settings','');
    $this->load->view('admin/settings',$data);
  }

    public function update_settings()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('shipping_charge')==='') {
          $Return['error'] = $this->Admin_model->translate("Add shipping charge");
    }else if($this->input->post('vat_val')==='') {
          $Return['error'] = $this->Admin_model->translate("Add VAT");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('settingid') ;
      
   
    $data = array(   
   
    'shipping_charge' => $this->input->post('shipping_charge'),

    'vat_val' => $this->input->post('vat_val'),
     
    );

    
    $result = $this->Admin_model->update_data('site_settings',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('settings updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }



  public function update_measurement()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('measure_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Measure name required");
    }else if($this->input->post('ar_measure_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Measure name - arabic required");
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('measurementid') ;
      
   
    $data = array(   
   
    'name' => $this->input->post('measurement_name'),

    'ar_name' => $this->input->post('ar_measurement_name'),
     
    );

    
    $result = $this->Admin_model->update_data('measurements',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Measurement updated successfully.');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }
    
    //website CMS

     public function clients()
      {
       
       $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
          $data['data'] = $this->Admin_model->get_all_data('client_logos'); 
        $this->load->view('admin/clients', $data);
        
      }

      
      public function new_client()
      {
       
       $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
         
        $this->load->view('admin/add_client');
        
      }
    
    
        public function add_client()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
       $Return = array('result'=>'', 'error'=>'');
           
         if(empty($_FILES['image']['name'])){
          $Return['error'] = "Image Required ";
        }
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
    
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/clients/";
          $set_img = base_url()."uploads/images//";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
        
    
 
       
        $data = array(   
         
        'image' => $image,
        'status' => 'Y'
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->db->insert('client_logos',$data);
       $inserid =  $this->db->insert_id();
    
     
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Logo added successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }
        public function edit_client()
        {
        $session = $this->session->userdata('superadmindet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('client_logos',array('id'=>$id)) ;
    
           $this->load->view('admin/edit_client', $data);
            
        }

      public function update_client()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
        $id = $this->input->post('id');
    
       $Return = array('result'=>'', 'error'=>'');
           
        /* Server side PHP input validation */    
         
        
         if(empty($_FILES['image']['name'])){
          $Return['error'] = "Image Required ";
        }
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
      $image = $this->input->post('old_image');
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/clients/";
      
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
       
       
        $data = array(   
         
        'image' => $image,
        'status' => 'Y'
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->Admin_model->update_data('client_logos',array('id'=>$id),$data);
       $inserid =  $this->db->insert_id();
    
       
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Logo updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }


    public function payment_icons()
      {
       
       $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
          $data['data'] = $this->Admin_model->get_all_data('payment_icons'); 
        $this->load->view('admin/weaccept', $data);
        
      }

      
      
    
        public function add_icon()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
       $Return = array('result'=>'', 'error'=>'');
           
         if(empty($_FILES['image']['name'])){
          $Return['error'] = "Image Required ";
        }
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
    
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/icons/";
          $set_img = base_url()."uploads/images//";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
        
    
 
       
        $data = array(   
         
        'image' => $image,
        'status' => 'Y'
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->db->insert('payment_icons',$data);
       $inserid =  $this->db->insert_id();
    
     
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Icon added successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }
        public function edit_icon()
        {
        $session = $this->session->userdata('superadmindet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('payment_icons',array('id'=>$id)) ;
    
           $this->load->view('admin/edit_icon', $data);
            
        }

      public function update_icon()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
        $id = $this->input->post('id');
    
       $Return = array('result'=>'', 'error'=>'');
           
        /* Server side PHP input validation */    
         
        
         if(empty($_FILES['image']['name'])){
          $Return['error'] = "Image Required ";
        }
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          
      
      $image = $this->input->post('old_image');
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/icons/";
      
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image  = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
       
       
        $data = array(   
         
        'image' => $image,
        'status' => 'Y'
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->Admin_model->update_data('payment_icons',array('id'=>$id),$data);
       $inserid =  $this->db->insert_id();
    
       
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'Icon updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }

      

  public function new_news() {
    
     $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
    
    $data['data'] = $this->Admin_model->get_all_data('news_and_events');
    $this->load->view('admin/add_news', $data);
  }

  public function add_news()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
        $id = $this->input->post('id');
    
       $Return = array('result'=>'', 'error'=>'');
           
        /* Server side PHP input validation */    
         
        
      if($this->input->post('heading')==='') {
            $Return['error'] = "News heading Required";
      }else if($this->input->post('content')==='') {
            $Return['error'] = "Content Required ";
      }
        
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          

       if(is_uploaded_file($_FILES['news_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['news_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["news_image"]["tmp_name"];
          $profile = "uploads/images/news/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["news_image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }

      
       
        $data = array(   
         
          'title' => $this->input->post('heading'),
          'title_ar' => $this->input->post('heading_ar'),
          'content' => $this->input->post('content'),
          'content_ar' => $this->input->post('content_ar'),
          'image' => $image1,
          'date' => $this->input->post('date'),
          'created_on' => date('Y-m-d h:i:s'),
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->Admin_model->insert_data('news_and_events',$data);
       $inserid =  $this->db->insert_id();
    
       
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'News added successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }

  public function editnews() {
    
     $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
     
    
    $id = $this->uri->segment(3) ;
    $data['data'] = $this->Admin_model->get_single_data('news_and_events',array('id'=>$id));
    $this->load->view('admin/edit_news', $data);
  }

  public function update_news()
      {   
         $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
    
        $id = $this->input->post('id');
    
       $Return = array('result'=>'', 'error'=>'');
           
        /* Server side PHP input validation */    
         
        
      if($this->input->post('heading')==='') {
            $Return['error'] = "News heading Required";
      }else if($this->input->post('content')==='') {
            $Return['error'] = "Content Required ";
      }
        
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
          

$image1 = $this->input->post('oldimage');
  
       if(is_uploaded_file($_FILES['news_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['news_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["news_image"]["tmp_name"];
          $profile = "uploads/images/news/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["news_image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
      
       
        $data = array(   
         
          'title' => $this->input->post('heading'),
          'title_ar' => $this->input->post('heading_ar'),
          'content' => $this->input->post('content'),
          'content_ar' => $this->input->post('content_ar'),
          'image' => $image1,
          'date' => $this->input->post('date'),
          'created_on' => date('Y-m-d h:i:s'),

          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->Admin_model->update_data('news_and_events',array('id'=>$id),$data);
       $inserid =  $this->db->insert_id();
    
       
    
        if ($result == TRUE) {
          
          //get setting info 
           
           $Return['result'] = 'News updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
      }



  public function news() {
    
     $session = $this->session->userdata('superadmindet');
        if(empty($session)){ 
          redirect('admin');
        }
     
    
    $data['news'] = $this->Admin_model->get_all_data('news_and_events');
    $this->load->view('admin/news', $data);
  }


 public function coupons()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    
    $data['coupondet'] = $this->Admin_model->get_all_data('coupons',array('status !='=>'D')) ;
   
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
     $this->load->view('admin/list_coupons', $data);
    }else{
      redirect('admin/accessdenied');
    }

   
  }
 
   


 public function newcoupon()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }


$bytes = random_bytes(5);
$code =strtoupper( bin2hex($bytes));

$exists = $this->Admin_model->get_type_name_by_id('coupons','coupon_code',$code,'coupon_code') ;

 

while(!empty($exists)) {

$bytes = random_bytes(10);
$code =strtoupper( bin2hex($bytes));

$exists = $this->Admin_model->get_type_name_by_id('coupons','coupon_code',$code,'coupon_code') ;

}



    $data['coupon_code'] =  $code ;
   
     $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
    $this->load->view('admin/add_coupon',$data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }


  public function addcoupon()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');

   
       
    /* Server side PHP input validation */    
    if($this->input->post('coupon_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Coupon name required");
    }else if($this->input->post('applicable_for')==='') {
          $Return['error'] = $this->Admin_model->translate("Select applicable for");
    }else if($this->input->post('discount_type')==='') {
          $Return['error'] = $this->Admin_model->translate("Select discount type");
    }else if($this->input->post('discount_value')==='') {
          $Return['error'] = $this->Admin_model->translate("Add discount value");
    }else if($this->input->post('starts_from')==='') {
          $Return['error'] = $this->Admin_model->translate("Select Start date");
    }else if($this->input->post('ends_on')==='') {
          $Return['error'] = $this->Admin_model->translate("Select Expiry Date");
    }else if($this->input->post('applicable_for')==='') {
          $Return['error'] = $this->Admin_model->translate("Select applicable for");
    }else if( empty($_FILES['coupon_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Coupon Image Required");
    } 
    


        
    if($Return['error']!=''){
          $this->output($Return);
      }
 
 
  

  $fname = "";
      
       if(is_uploaded_file($_FILES['coupon_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['coupon_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["coupon_image"]["tmp_name"];
        $profile = "uploads/images/coupons/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["coupon_image"]["name"]);
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


  if($this->input->post('shipping_free')){
    $shipping = 'Y' ;
  }else{
     $shipping = 'N' ;
  }


if($this->input->post('unlimited_usage')){
    $unlimited = 'Y' ;
  }else{
     $unlimited = 'N' ;
  }

    
    $data = array(   
    
      'coupon_code' => $this->input->post('coupon_code'),
      'coupon_name' => $this->input->post('coupon_name'),
      'discount_type' => $this->input->post('discount_type'),    
      'discount_value' => $this->input->post('discount_value'),
      'applicable_for' => $this->input->post('applicable_for'),
      'starts_from' => $this->input->post('starts_from'),    
      'ends_on' => $this->input->post('ends_on'),
      'shipping_free' => $shipping,    
      'unlimited_usage' => $unlimited,

      'coupon_image' => $fname  ,
    'created_by'=>$session['user_id'],
    'created_on'=>date('Y-m-d')
      );
    $result = $this->Admin_model->insert_data('coupons', $data);


    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Coupon added successfully');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

   public function editcoupon()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
 

$data['coupon'] =  $this->Admin_model->get_single_data('coupons',array('id'=>$id));
$data['data_standards'] =  $this->Admin_model->get_all_data('standard_master');

 $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
   $this->load->view('admin/edit_coupon', $data);
    }else{
      redirect('admin/accessdenied');
    }
  
    
  }



  public function update_coupon()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

    $fname =  $this->input->post('iconname') ;
 

       
    /* Server side PHP input validation */    
    if($this->input->post('coupon_name')==='') {
          $Return['error'] = $this->Admin_model->translate("Coupon name required");
    }else if($this->input->post('applicable_for')==='') {
          $Return['error'] = $this->Admin_model->translate("Select applicable for");
    }else if($this->input->post('discount_type')==='') {
          $Return['error'] = $this->Admin_model->translate("Select discount type");
    }else if($this->input->post('discount_value')==='') {
          $Return['error'] = $this->Admin_model->translate("Add discount value");
    }else if($this->input->post('starts_from')==='') {
          $Return['error'] = $this->Admin_model->translate("Select Start date");
    }else if($this->input->post('ends_on')==='') {
          $Return['error'] = $this->Admin_model->translate("Select Expiry Date");
    }else if($this->input->post('applicable_for')==='') {
          $Return['error'] = $this->Admin_model->translate("Select applicable for");
    }else if(empty($fname) && empty($_FILES['coupon_image']['name'])){
      $Return['error'] = $this->Admin_model->translate("Coupon Image Required");
    } 

        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
 
  $id =$this->input->post('couponid') ;
     

    
 if(!empty($_FILES['coupon_image']['name'])){
  if(is_uploaded_file($_FILES['coupon_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
        $filename = $_FILES['coupon_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["coupon_image"]["tmp_name"];
          $profile = "uploads/images/coupons/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["coupon_image"]["name"]);
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
      
    
 

    if($this->input->post('shipping_free')){
    $shipping = 'Y' ;
  }else{
     $shipping = 'N' ;
  }


if($this->input->post('unlimited_usage')){
    $unlimited = 'Y' ;
  }else{
     $unlimited = 'N' ;
  }

    
    $data = array(   
    
      'coupon_code' => $this->input->post('coupon_code'),
      'coupon_name' => $this->input->post('coupon_name'),
      'discount_type' => $this->input->post('discount_type'),    
      'discount_value' => $this->input->post('discount_value'),
      'applicable_for' => $this->input->post('applicable_for'),
      'starts_from' => $this->input->post('starts_from'),    
      'ends_on' => $this->input->post('ends_on'),
      'shipping_free' => $shipping,    
      'unlimited_usage' => $unlimited,

      'coupon_image' => $fname  ,
    
      );

    
    $result = $this->Admin_model->update_data('coupons',array('id'=>$id), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = $this->Admin_model->translate('Coupon updated successfully');
      
    } else {
      $Return['error'] =  $this->Admin_model->translate('Bug. Something went wrong, please try again');
    }
    $this->output($Return);
    exit;
  }

  // CMS starting

  public function privacy()
  {
  $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
          
   $data['data'] = $this->Admin_model->get_single_data('privacy_policy',array('id'=>'1')) ;
   
   

     $this->load->view('admin/edit_privacy', $data);
         
    }
  


    public function update_privacy()
  {   
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
     if($this->input->post('privacy_policy')==='') {
          $Return['error'] = "Content Required ";
    }else if($this->input->post('privacy_policy_ar')==='') {
          $Return['error'] = "Arabic Content Required ";
    } 
        
    if($Return['error']!=''){
          $this->output($Return);
      }

 
 
    $data = array(   
    'privacy_policy' => $this->input->post('privacy_policy'),
      'privacy_policy_ar' => $this->input->post('privacy_policy_ar'),
  
   
      );
    //print_r($data);
    $result = $this->Admin_model->update_data('privacy_policy',array('id'=>1), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }


    public function terms()
  {
  $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
          
   $data['data'] = $this->Admin_model->get_single_data('terms_conditions',array('id'=>'1')) ;
   
   

     $this->load->view('admin/edit_terms', $data);
         
    }

    
    public function update_terms()
  {   
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
     if($this->input->post('privacy_policy')==='') {
          $Return['error'] = "Content Required ";
    }else if($this->input->post('privacy_policy_ar')==='') {
          $Return['error'] = "Arabic Content Required ";
    } 
        
    if($Return['error']!=''){
          $this->output($Return);
      }

 
 
    $data = array(   
    'terms' => $this->input->post('terms'),
      'terms_ar' => $this->input->post('terms_ar'),
  
   
      );
    //print_r($data);
    $result = $this->Admin_model->update_data('terms_conditions',array('id'=>1), $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
  

  public function about()
  {
  $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
          
   $data['data'] = $this->Admin_model->get_single_data('about_us',array('id'=>'1')) ;
   $data['corporate'] = $this->Admin_model->get_all_data('about_offers') ;

   

     $this->load->view('admin/edit_about', $data);
         
    }
  

   
    public function update_about()
    {   
      $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
     $Return = array('result'=>'', 'error'=>'');
         
      /* Server side PHP input validation */    
      if($this->input->post('sec2_title')==='') {
            $Return['error'] = "Section 2 title Required ";
      }else if($this->input->post('sec2_title_ar')==='') {
            $Return['error'] = "Section 2 title arabic Required ";
      }else if($this->input->post('sec2_content')==='') {
            $Return['error'] = "Section 2 content Required ";
      }else if($this->input->post('sec2_content_ar')==='') {
            $Return['error'] = "Section 2 content arabic Required ";
      }else if($this->input->post('sec3_title1')==='') {
            $Return['error'] = "Section 3 title 1 Required ";
      }else if($this->input->post('sec3_title1_ar')==='') {
            $Return['error'] = "Section 3 title 1 arabic Required ";
      }else if($this->input->post('sec3_title2')==='') {
        $Return['error'] = "Section 3 title 2 Required ";
  }else if($this->input->post('sec3_title2_ar')==='') {
        $Return['error'] = "Section 3 title 2 arabic Required ";
  }else if($this->input->post('sec3_content1')==='') {
            $Return['error'] = "Section 3 content Required ";
      }else if($this->input->post('sec3_content1_ar')==='') {
            $Return['error'] = "Section 2 content arabic Required ";
      }else if($this->input->post('sec3_content2')==='') {
        $Return['error'] = "Section 3 content 2 Required ";
  }else if($this->input->post('sec3_content2_ar')==='') {
        $Return['error'] = "Section 3 content 2 arabic Required ";
  }  else if($this->input->post('sec4_title')==='') {
    $Return['error'] = "Section 4 title Required ";
}else if($this->input->post('sec4_title_ar')==='') {
    $Return['error'] = "Section 4 title arabic Required ";
}else if($this->input->post('sec4_content')==='') {
        $Return['error'] = "Section 4 content Required ";
  }else if($this->input->post('sec4_content_ar')==='') {
        $Return['error'] = "Section 4 content arabic Required ";
  }else if($this->input->post('sec4_title')==='') {
    $Return['error'] = "Section 5 title Required ";
}else if($this->input->post('sec5_title_ar')==='') {
    $Return['error'] = "Section 5 title arabic Required ";
}else if($this->input->post('sec5_content')==='') {
        $Return['error'] = "Section 5 content Required ";
  }else if($this->input->post('sec5_content_ar')==='') {
        $Return['error'] = "Section 5 content arabic Required ";
  }
 
       
          
      if($Return['error']!=''){
            $this->output($Return);
        }
  
  
         $image1 =  $this->input->post('sec2_old_image');
         $image2 =  $this->input->post('sec3_old_image');
         $image3 =  $this->input->post('sec4_old_image');
         $image4 =  $this->input->post('sec5_old_image');
        
        
         if(is_uploaded_file($_FILES['sec2_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['sec2_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec2_image"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/about/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["sec2_image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = round(microtime(true)).$name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
 
  if(is_uploaded_file($_FILES['sec3_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['sec3_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec3_image"]["tmp_name"];
          $profile = "uploads/images/about/";
          
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["sec3_image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = round(microtime(true)).$name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image2 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
  

    
    if(is_uploaded_file($_FILES['sec4_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
      $filename = $_FILES['sec4_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["sec4_image"]["tmp_name"];
        $profile = "uploads/images/about/";
        
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["sec4_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = round(microtime(true)).$name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $image3 = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }
     

     if(is_uploaded_file($_FILES['sec5_image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['sec5_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec5_image"]["tmp_name"];
          $profile = "uploads/images/about/";
          
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["sec5_image"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = round(microtime(true)).$name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image4 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
  
  
  
      
        
      
      $homedata = array(   
     
     
      'sec2_title' => $this->input->post('sec2_title'),
      'sec2_title_ar' => $this->input->post('sec2_title_ar'),
      'sec2_content' => $this->input->post('sec2_content'),
      'sec2_content_ar' => $this->input->post('sec2_content_ar'),

       
      'sec3_title1' => $this->input->post('sec3_title1'),
      'sec3_title1_ar' => $this->input->post('sec3_title1_ar'),
      'sec3_title2' => $this->input->post('sec3_title2'),
      'sec3_title2_ar' => $this->input->post('sec3_title2_ar'),
      
      'sec3_content1' => $this->input->post('sec3_content1'),
      'sec3_content1_ar' => $this->input->post('sec3_content1_ar'),
      'sec3_content2' => $this->input->post('sec3_content2'),
      'sec3_content2_ar' => $this->input->post('sec3_content2_ar'),
     
       
      'sec4_content' => $this->input->post('sec4_content'),
      'sec4_content_ar' => $this->input->post('sec4_content_ar'),

      
      'sec5_content' => $this->input->post('sec5_content'),
      'sec5_content_ar' => $this->input->post('sec5_content_ar'),


       'sec2_image' => $image1,
       'sec3_image' => $image2,
       'sec4_image' => $image3,
       'sec5_image' => $image4,
     
       
      

        );
      //print_r($data);
      $result = $this->Admin_model->update_data('about_us',array('id'=>1), $homedata);
      if ($result == TRUE) {
        
         $Return['result'] = 'About page updated successfully.';
        
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
    }


    public function footer()
  {
  $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
          
   $data['data'] = $this->Admin_model->get_single_data('footer_page',array('id'=>'1')) ;

   $data['social'] = $this->Admin_model->get_single_data('social_media_links',array('id'=>'1')) ;
   $data['icons'] = $this->Admin_model->get_all_data('payment_icons'); 

  
   $this->load->view('admin/edit_footer', $data);
         
    }

    public function update_footer()
    {   
      $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
     $Return = array('result'=>'', 'error'=>'');

      $image1 =  $this->input->post('old_image');
         
      /* Server side PHP input validation */    
      if(empty($_FILES['image']['name']) && empty($image1)) {
          $Return['error'] = "Image Required ";
      }else if($this->input->post('footer_text')==='') {
            $Return['error'] = "Footer text Required";
      }else if($this->input->post('footer_text_ar')==='') {
            $Return['error'] = "Footer text arabic Required ";
      }else if($this->input->post('links_title')==='') {
            $Return['error'] = "Links title Required ";
      }else if($this->input->post('links_title_ar')==='') {
            $Return['error'] = "Links title arabic Required ";
      }else if($this->input->post('contactus_title')==='') {
            $Return['error'] = "Contact us title Required ";
      }else if($this->input->post('contactus_title_ar')==='') {
            $Return['error'] = "Contact us title arabic Required ";
      }else if($this->input->post('service_title')==='') {
            $Return['error'] = "Services title Required ";
      }else if($this->input->post('service_title_ar')==='') {
            $Return['error'] = "Services title arabic Required ";
      }
      else if($this->input->post('address')==='') {
            $Return['error'] = "Address Required ";
      }else if($this->input->post('address_ar')==='') {
            $Return['error'] = "Address arabic Required ";
      } else if($this->input->post('email')==='') {
            $Return['error'] = "Email Required ";
      }else if($this->input->post('phone')==='') {
            $Return['error'] = "Phone Required ";
      } else if($this->input->post('follow_us')==='') {
            $Return['error'] = "Follow us button text Required ";
      }else if($this->input->post('follow_us_ar')==='') {
            $Return['error'] = "Follow us button text arabic Required ";
      } 
 
 
       
          
      if($Return['error']!=''){
            $this->output($Return);
        }
  
  
       
      
         if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
       $newfilename = 'footer_'.round(microtime(true)).'.'.$ext;
  
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
 
  
      
        
      
      $data = array(   
      'footer_text' => $this->input->post('footer_text'),
      'footer_text_ar' => $this->input->post('footer_text_ar'),
      'links_title' => $this->input->post('links_title'),
      'links_title_ar' => $this->input->post('links_title_ar'),
      'contactus_title' => $this->input->post('contactus_title'),
      'contactus_title_ar' => $this->input->post('contactus_title_ar'),
      'services_title' => $this->input->post('services_title'),
      'services_title_ar' => $this->input->post('services_title_ar'),
      'address' => $this->input->post('address'),
      'address_ar' => $this->input->post('address_ar'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'follow_us' => $this->input->post('follow_us'),
      'follow_us_ar' => $this->input->post('follow_us_ar'),         
      'logo' => $image1,
      
      

        );
      //print_r($data);
      $result = $this->Admin_model->update_data('footer_page',array('id'=>1), $data);

$social = array(
      'facebook' => $this->input->post('facebook'),
      'twitter' => $this->input->post('twitter'),
      'linkedin' => $this->input->post('linkedin'),
      'youtube' => $this->input->post('youtube'),
      'whatsapp' => $this->input->post('whatsapp'),
);
 $result1 = $this->Admin_model->update_data('social_media_links',array('id'=>1), $social);

      if ($result == TRUE) {
        
         $Return['result'] = 'Footer section updated successfully.';
        
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
    }


    
public function contact()
{
$session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $data['data'] = $this->Admin_model->get_single_data('contact_us_page',array('id'=>'1')) ;
 //$data['addresses'] = $this->Admin_model->get_all_data('addresses') ;

 
 $this->load->view('admin/edit_contact', $data);
       
  }

  public function update_contact()
  {   
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');

    
       
    /* Server side PHP input validation */    
    if($this->input->post('box1_title')==='') {
          $Return['error'] = "Box 1 title Required";
    }else if($this->input->post('box1_title_ar')==='') {
          $Return['error'] = "Box 1 title arabic Required ";
    }else if($this->input->post('box2_title')==='') {
      $Return['error'] = "Box 2 title Required";
}else if($this->input->post('box2_title_ar')==='') {
      $Return['error'] = "Box 2 title arabic Required ";
} else if($this->input->post('box3_title')==='') {
  $Return['error'] = "Box 3 title Required";
}else if($this->input->post('box3_title_ar')==='') {
  $Return['error'] = "Box 3 title arabic Required ";
}


     
        
    if($Return['error']!=''){
          $this->output($Return);
      }


      $image1 =  $this->input->post('box1_old_image');
      $image2 =  $this->input->post('box2_old_image');
      $image3 =  $this->input->post('box3_old_image'); 
   
        
        
      if(is_uploaded_file($_FILES['box1_icon']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['box1_icon']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["box1_icon"]["tmp_name"];
          $profile = "uploads/images/about/";
        //  $set_img = base_url()."uploads/images/about/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["box1_icon"]["name"]);
        //  $newfilename =  round(microtime(true)).'.'.$ext;
  
          $newfilename = round(microtime(true)).'_'.$name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
 
  if(is_uploaded_file($_FILES['box2_icon']['tmp_name'])) {
        //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
        $filename = $_FILES['box2_icon']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["box2_icon"]["tmp_name"];
          $profile = "uploads/images/about/";
          
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["box2_icon"]["name"]);
         // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
  
         $newfilename = round(microtime(true)).'_'.$name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image2 = $newfilename;
           
   
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
  

    
    if(is_uploaded_file($_FILES['box3_icon']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
      $filename = $_FILES['box3_icon']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["box3_icon"]["tmp_name"];
        $profile = "uploads/images/about/";
        
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["box3_icon"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

       $newfilename = round(microtime(true)).'_'.$name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $image3 = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }
     
 
    
      
    
    $data = array( 

     
 
    'box1_title' => $this->input->post('box1_title'),
    'box1_title_ar' => $this->input->post('box1_title_ar'),
    'box1_value1' => $this->input->post('box1_value1'),
    'box1_value1' => $this->input->post('box1_value1'),
    'box2_title' => $this->input->post('box2_title'),
    'box2_title_ar' => $this->input->post('box2_title_ar'),
    'box2_title' => $this->input->post('box2_title'),
    'box2_value1' => $this->input->post('box2_value1'),
    'box2_value2' => $this->input->post('box2_value2'),
    'box3_title_ar' => $this->input->post('box3_title_ar'),
    'box3_value' => $this->input->post('box3_value'),
    'box1_icon' => $image1,
    'box2_icon' => $image2,
    'box3_icon' => $image3,

        

      );
    //print_r($data);
    $result = $this->Admin_model->update_data('contact_us_page',array('id'=>1), $data);


    if ($result == TRUE) {
      
       $Return['result'] = 'Contact us page updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  
  public function edit_value()
  {
  $session = $this->session->userdata('superadmindet');
      if(empty($session)){ 
        redirect('admin');
      }
   $id = $this->uri->segment(3) ;
   $data['data'] = $this->Admin_model->get_single_data('about_offers',array('id'=>$id)) ;

     $this->load->view('admin/edit_value', $data);
      
  }


  public function update_value()
{   
   $session = $this->session->userdata('superadmindet');
  if(empty($session)){ 
    redirect('admin');
  }

  $id = $this->input->post('id');

 $Return = array('result'=>'', 'error'=>'');
     
  /* Server side PHP input validation */    
   
   $image = $this->input->post('old_image');
  
  if(empty($_FILES['image']['tmp_name']) && empty($image) ){
    $Return['error'] = "Image Required ";
  }else if($this->input->post('title')==='') {
      $Return['error'] = "Title Required ";
}else if($this->input->post('title_ar')==='') {
      $Return['error'] = "Title arabic Required ";
}
      
  if($Return['error']!=''){
        $this->output($Return);
         exit ;
    }
    


  if(is_uploaded_file($_FILES['image']['tmp_name'])) {
  //checking image type
  $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp','json');
  $filename = $_FILES['image']['name'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if(in_array($ext,$allowed)){
    $tmp_name = $_FILES["image"]["tmp_name"];
    $profile = "uploads/images/about/";
    $set_img = base_url()."uploads/images/";
    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate
    $name = basename($_FILES["image"]["name"]);
   // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

    $newfilename = $name ;
    move_uploaded_file($tmp_name, $profile.$newfilename);
    $image  = $newfilename;
     

}else {
    $Return['error'] = "Invalid file format";
  }
if($Return['error']!=''){
  $this->output($Return);
}
}
 
 
  $data = array(   
   
  'logo' => $image,
   'title' => $this->input->post('title'),
   'title_ar' => $this->input->post('title_ar'),
   'content' => $this->input->post('content'),
   'content_ar' => $this->input->post('content_ar'),
    );
//  $result = $this->Admin_model->insert_data('supp_org', $data);
  $result = $this->Admin_model->update_data('about_offers',array('id'=>$id),$data);

 

  if ($result == TRUE) {
    
    //get setting info 
     
     $Return['result'] = 'Benefits updated successfully.';
    
  } else {
    $Return['error'] =  'Bug. Something went wrong, please try again';
  }
  $this->output($Return);
  exit;
}

  // CMS end


  public function customers()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){
      redirect('admin');
    }
    $data['custdet'] = $this->Admin_model->get_customers_list() ;
    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    if( $getval){
       $this->load->view('admin/listcustomer', $data);
    }else{
      redirect('admin/accessdenied');
    }

    
  }


  public function addresses()
  {  
   $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    } 


$data['addresses'] = $this->Admin_model->get_all_data('shop_addresses'); 
 

$getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');

    if( $getval){
    $this->load->view('admin/list_addresses', $data);
    }else{
      redirect('admin/accessdenied');
    }
      
  }
   
  

 public function new_address()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
    $data['addresses'] = $this->Admin_model->get_all_data('shop_addresses',''); 


    if( $getval){
    $this->load->view('admin/add_address',$data);
    }else{
      redirect('admin/accessdenied');
    }
    

   
  }


  public function add_address()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('address')==='') {
          $Return['error'] = "Add Address ";
    }  
        
    
  if($Return['error']!=''){
          $this->output($Return);
      }

         
    $data = array(   
     
    'address'=>$this->input->post('address'),
    'created_on'=>date('Y-m-d'),
    'created_by'=>$session['user_id']
     
      );

      $exists = $this->Admin_model->get_single_data('shop_addresses',array('address'=> $this->input->post('address') )); 
    if(!empty($exists)){
       $Return['error'] = "Address already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->insert_data('shop_addresses', $data);
    }
   
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Address added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

   public function edit_address()
  {
    $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }
        
 $id = $this->uri->segment(3) ;
  $data['address'] = $this->Admin_model->get_single_data('shop_addresses',array('id'=>$id));

 
   $getval = $this->checkaccess($session['userrole'] ,$this->router->fetch_method(),'admin');
   
    if( $getval){
    $this->load->view('admin/edit_address', $data);
  
    }else{
      redirect('admin/accessdenied');
    }


    
  }



  public function update_address()
  {   
     $session = $this->session->userdata('superadmindet');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');

     $id =$this->input->post('addressid') ;
       
    /* Server side PHP input validation */    
    if($this->input->post('address')==='') {
          $Return['error'] = "Add address ";
    } 
         
    if($Return['error']!=''){
          $this->output($Return);
      }
  
 
    
       
    $data = array(   
      'address' => $this->input->post('address') 
       
      );

       $exists = $this->Admin_model->get_single_data('addresses',array('address'=> $this->input->post('address'), 'id !='=>$id )); 
    if(!empty($exists)){
       $Return['error'] = "Address already exists!!";       
    
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }      
    }else{
       $result = $this->Admin_model->update_data('addresses',array('id'=>$id), $data);
    }
   

    
   
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Address updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
   

 
}