<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');




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
     redirect('home/login');
    }

    $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'wishlist','status'=>'Y')) ;

    $data['wishlist'] = $this->Admin_model->get_all_data('wishlist',array('user_id'=>$homesession['user_id']));
    $this->load->view('home/wishlist',$data);
  }
  public function about()
  {   
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
   
    $home = $this->Admin_model->get_single_data('about_us',array('id'=>'1')) ;

   $session = $this->session->userdata('lang') ;
  

    if($session =='eng'){
    $data = array(
      
    
      'sec2_title' => $home->sec2_title,
      'sec2_content' => $home->sec2_content,
      'sec3_title1' => $home->sec3_title1,
      'sec3_title2' => $home->sec3_title2,
      'sec3_content1' => $home->sec3_content1,
      'sec3_content2' => $home->sec3_content2,

  
      'sec4_content' => $home->sec4_content,
      'sec5_content' => $home->sec5_content
       
      ) ;

    }else{
$data = array(
  
  'sec2_title' => $home->sec2_title_ar,
  'sec2_content' => $home->sec2_content_ar,
  'sec3_title1' => $home->sec3_title1_ar,
  'sec3_title2' => $home->sec3_title2_ar,
  'sec3_content1' => $home->sec3_content1_ar,
  'sec3_content2' => $home->sec3_content2_ar,

 
      'sec4_content' => $home->sec4_content_ar,
      'sec5_content' => $home->sec5_content_ar

    );

    }

    $data['sec2_image'] =   $home->sec2_image ;
    $data['sec3_image'] = $home->sec3_image; 
    $data['sec4_image'] = $home->sec4_image; 
    $data['sec5_image'] = $home->sec5_image; 
       
  
    
    $data['values'] = $this->Admin_model->get_all_data('about_offers') ;
    $data['links'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
    $data['footer'] = $this->Admin_model->get_single_data('footer_page',array('id'=>'1')) ;
    $data['social'] = $this->Admin_model->get_single_data('social_media_links',array('id'=>'1')) ;
    $data['banner'] = $this->Admin_model->get_all_data('banners',array('type'=>'about','status'=>'Y')) ;

    $data['news'] = $this->Admin_model->get_all_data('news_and_events',array('date >=' => date('Y-m-d')) ) ;
     
    $data['clients'] = $this->Admin_model->get_all_data('client_logos') ;


    
    $this->load->view('home/home',$data);
  }

  public function terms(){
    $data['terms'] = $this->Admin_model->get_single_data('terms_conditions',array('id'=>'1')) ;
    $this->load->view('home/terms',$data);
  }

   public function privacy(){
     $data['privacy'] = $this->Admin_model->get_single_data('privacy_policy',array('id'=>'1')) ;
     $this->load->view('home/privacy',$data);
  }
  
   public function profile()
  {   
     
     $this->session->set_userdata('lastpage', $this->router->fetch_method());
   $homesession = $this->session->userdata('customerdet');
    if(empty($homesession)){ 
     redirect('home/login');
    }


    // $homesession = $this->session->userdata('customerdet');
    // if(empty($homesession)){ 
    //  echo false ;
    //  exit ;
    // }

    $data['profile'] = $this->Admin_model->get_single_data('customer_master',array('id'=>$homesession['user_id'])) ;

    $data['addresses'] = $this->Admin_model->get_single_data('customer_address',array('customer_id'=>$homesession['user_id'])) ;

    $data['orders'] = $this->Admin_model->get_all_data('order_master',array('customer_id'=>$homesession['user_id']),'id desc');

    $data['active_orders'] = $this->Admin_model->get_all_data('order_master',array('customer_id'=>$homesession['user_id'],'order_status !='=> 4 ),'id desc');
    
    $data['wishlist_i'] = $this->Admin_model->get_all_data('wishlist',array('user_id'=>$homesession['user_id'],'type'=>'industry')) ;
    $data['wishlist_s'] = $this->Admin_model->get_all_data('wishlist',array('user_id'=>$homesession['user_id'],'type'=>'school')) ;


       $this->load->view('home/profile',$data);
  }
  public function industry()
  {   
    $this->session->set_userdata('lastpage', $this->router->fetch_method());
      $data['categories'] = $this->Admin_model->get_all_data('categories',''); 
      $data['products'] = $this->Admin_model->get_all_data('industry_products','');
      $data['sizes'] = $this->Admin_model->get_all_data('size_master',array('type'=>'I'));
      $data['colors'] = $this->Admin_model->get_all_data('color_master',array('type'=>'I'));
      $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'industry','status'=>'Y')) ;


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
      $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'uniforms','status'=>'Y')) ;

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
      
      $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'school','status'=>'Y')) ;


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

     
      $colors = explode( ',', $data['uniformdata']->colors_available) ;

      if(in_array($images['color_id'], $colors) ||  $images['color_id'] == 0 ){
         $pimage .= "," .$images['product_images'];
      }
 
    }

   

    $pimages  = explode(',',$pimage) ; 
    $data['product_images'] = $pimages ;
      $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$id,'status'=>'Y'));  
   //  $data['inventory'] = $this->get_stock_det($id); 
     $this->load->view('home/school-product-details', $data);
  }




  public function uniform_det()
  {   
     $id = $this->uri->segment(3) ;
     $data['uniformdata'] = $this->Admin_model->get_single_data('school_products',array('id'=>$id));
         
      $data['schools'] = $this->Admin_model->get_all_data('uniform_school_relation',array('uniform_id'=>$id,'status'=>1 ));


     $pimages  = array();
     $pimage = '' ;
     $product_images = $this->Admin_model->get_all_data('school_product_images',array('product_id'=>$id)); 
    
 foreach($product_images as $images){

      $colors = explode( ',', $data['uniformdata']->colors_available) ;

      if(in_array($images['color_id'], $colors) ||  $images['color_id'] == 0 ){
         $pimage .= "," .$images['product_images'];
      }
 
    }


    $pimages  = explode(',',$pimage) ; 
    $data['product_images'] = $pimages ;
      $data['product_price'] = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$id,'status'=>'Y'));  
   //  $data['inventory'] = $this->get_stock_det($id); 
     $this->load->view('home/uniform-details', $data);
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

    $session = $this->session->userdata('lang') ;

    $contact  = $this->Admin_model->get_single_data('contact_us_page',array('id'=>'1')) ;

    if($session == 'eng'){
     $data = array(
      'box1_title' => $contact->box1_title,
      'box1_value1' => $contact->box1_value1,
      'box1_value2' => $contact->box1_value2,
      'box2_title' => $contact->box2_title,
      'box2_value1' => $contact->box2_value1,
      'box2_value2' => $contact->box2_value2,
      'box3_title' => $contact->box3_title,
      'box3_value' => $contact->box3_value,
      'map_url' => $contact->map_url,
      'box1_icon' => $contact->box1_icon,
      'box2_icon' => $contact->box2_icon,
      'box3_icon' => $contact->box3_icon 
      ) ;
    }else{
      $data = array(
        'box1_title' => $contact->box1_title_ar,
        'box1_value1' => $contact->box1_value1,
        'box1_value2' => $contact->box1_value2,
        'box2_title' => $contact->box2_title_ar,
        'box2_value1' => $contact->box2_value1,
        'box2_value2' => $contact->box2_value2,
        'box3_title' => $contact->box3_title_ar,
        'box3_value' => $contact->box3_value,
        'map_url' => $contact->map_url,
        'box1_icon' => $contact->box1_icon,
        'box2_icon' => $contact->box2_icon,
        'box3_icon' => $contact->box3_icon 
      ) ;
    }

    $data['links'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
    $data['footer'] = $this->Admin_model->get_single_data('footer_page',array('id'=>'1')) ;
    $data['social'] = $this->Admin_model->get_single_data('social_media_links',array('id'=>'1')) ;
     

    $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'contact','status'=>'Y')) ;
    $this->load->view('home/contact',$data);
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

        $imgs = explode(',',$images['product_images']);

        $pimg = array() ;
        foreach($imgs as $im){
if($im){
  //$pimg[] = $im.'_color_'.$images['color_id'] ;
  $pimg[] = $im ;
}
           
        
        }

  $imgs = implode(',', $pimg) ;

     
       // array_push($pimages,$pimg);

       $pimage .= "," . $imgs;

        // $imagelist[] = array('colorid'=>$images['color_id'],'images'=>$images['product_images']) ;
      }
 
    }

  

    $pimages  = explode(',',$pimage) ; 
    
    array_unshift($pimages,$data['product']->product_image);

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



  public function get_images_with_color()
  {   
     $id = $this->input->post('product') ;
     $colorid = $this->input->post('color') ;

     

     $data['product'] = $this->Admin_model->get_single_data('industry_products',array('id'=>$id));

    
         
     $pimages  = array();
     $pimage = '' ;
     $product_images = $this->Admin_model->get_single_data('industry_product_images',array('product_id'=>$id,'color_id'=>$colorid)); 
  

      $colors = explode( ',', $data['product']->colors_available) ;
      $pimage = '' ;
     if(!empty($product_images)){
      if(in_array($product_images->color_id, $colors)){

        $imgs = explode(',',$product_images->product_images);

        $pimg = array() ;
        foreach($imgs as $im){
if($im){
  $pimg[] = $im  ;
}
           
        
        }

        $imgs = implode(',', $pimg) ;

       $pimage .= "," . $imgs;

      }
 
     }
      
    

    $pimages  = explode(',',$pimage) ; 
   // array_unshift($pimages,$data['product']->product_image);
    $data['product_id'] = $id ;

 
    $data['product_images'] = $pimages ;
    $this->load->view('home/product_images', $data);
  }


function get_school_logo(){
  $school = $this->input->post('school');
 $logo = $this->Admin_model->get_type_name_by_id('school_master','id',$school,'school_logo');

 echo $logo ;
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

  $Return = array('result'=>'', 'error'=>'');
   

  $prodType = $this->session->userdata('prouctType');
if(!empty( $prodType)){
  if($type != $prodType){
    $Return['error'] = 'You have a '.$prodType.' item in your cart. You are not allowed to purchase School and Industry products together. Complete the '.$prodType.' product purchase to proceed to buy the '. $type .' product.' ;
    $this->output($Return);
    exit;
  }
}else{
  $this->session->set_userdata('prouctType', $type);
}


   $purchaseType =  $this->input->post('purchase');

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

 
$this->cart->product_name_rules = '[:print:]';
   
   if( $type == 'industry'){
  // Set array for send data.
    $data = array(
      'id' => (int) $data_array['product_id'],
      'name' =>  htmlspecialchars($this->Admin_model->get_type_name_by_id('industry_products','id',$data_array['product_id'],'product_name') ),
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
        'school' =>$data_array['school_selected'],
        'size' =>$data_array['size_selected'],
        'gender'=>$data_array['gender_selected'],          
        'type' => 'school'
        );   
    }

    
    
  if($purchaseType == 'shipping'){
   $data['location'] = $data_array['autocomplete_search'];
   $data['lat'] = $data_array['lat'];
   $data['long'] = $data_array['long'];
   $data['address'] = $data_array['address'];
   $data['purchaseType'] = 'shipping';
    }else{
      $data['location'] = '';
   $data['lat'] = 0;
   $data['long'] = 0;
   $data['address'] = '' ;
   $data['purchaseType'] = 'collect';
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
      $data['exists'] = false ;


      $exists = $this->Admin_model->get_single_data('wishlist',array('user_id'=> $homesession['user_id'],
'type' => $from,
'product_id'=> $productid)) ;

       

      if(empty($exists)){
$wishlist = array('user_id'=> $homesession['user_id'],
'type' => $from,
'product_id'=> $productid,
'created_on'=> date('Y-m-d H:i')
);
$this->Admin_model->insert_data('wishlist',$wishlist) ;
      }else{

        $data['exists'] = true ;
      }




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

    if(count($this->cart->contents()) == 0){
        $this->session->set_userdata('prouctType', '');
        $this->session->set_userdata('coupon_code', '');
    }

    $data['banner'] = $this->Admin_model->get_single_data('banners',array('type'=>'cart','status'=>'Y')) ;

    $this->load->view('home/cart',$data);
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

      if(count($this->cart->contents()) == 0){
        $this->session->set_userdata('prouctType', '');
        $this->session->set_userdata('coupon_code', '');
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

    $data['addresses'] = $this->Admin_model->get_single_data('customer_address',array('customer_id'=>$homesession['user_id'],'default_address'=>'Y')) ;
    $data['pickupaddresses'] = $this->Admin_model->get_all_data('shop_addresses',array('status'=> 'Y')) ;

    $data['countries'] = $this->Admin_model->get_all_data('countries');
  
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
          //'zip_code'=>$this->input->post('zip_code'),
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


          $couponcode  = $this->session->userdata('coupon_code');

                                        




$paymentType = $this->input->post('paymentType') ;

$this->load->library("phpmailer_library");
$mail = $this->phpmailer_library->load();


if($paymentType == 'check'){

$cart = $this->cart->contents() ;

$subtotal = 0 ;

$discount = 0 ;
$coupon = array() ;


$productData = array() ;

          foreach($cart as $cartdata){



 if($cartdata['type'] == 'industry'){
  $product = $this->Admin_model->get_single_data('industry_products',array('id'=>$cartdata['id'])) ;

$url = 'product_details' ;
}else{
  $product = $this->Admin_model->get_single_data('school_products',array('id'=>$cartdata['id'])) ;
$url = 'uniform_det' ;

}

  

 $productData[] = array('name'=> $product->product_name,'code'=>$product->product_code,'image'=>'uploads/images/'.$cartdata['type'].'/'.$product->product_image,'imgname'=>$product->product_image,'url'=> base_url().'home/'.$url.'/'.$product->id ) ;

           

//$order_details[] = json_encode($cartdata) ;



$order_details['cartdata'][] = json_encode($cartdata) ;
$order_details['purchaseType'][] = $cartdata['purchaseType'];


$subtotal = $subtotal + $cartdata['subtotal'] ;

              
          }




                        $vat = 0 ;
                        $discount =  0 ;
                        $cname = '' ;
                        $shipping = 0 ;


 $vat_percentage = $this->Admin_model->get_type_name_by_id('site_settings','id','1','vat_val') ;

    if(!empty($vat_percentage) && $vat_percentage != 0 ){
          $vat = $subtotal * $vat_percentage /100 ;
    }

  $shipping =   $this->Admin_model->get_type_name_by_id('site_settings','id','1','shipping_charge') ;




 if(!empty($couponcode)){
                                            
             $coupon = $this->Admin_model->get_single_data('coupons',array('coupon_code'=>$couponcode)) ;
             $cname = $coupon->coupon_name ;
             $dtype = $coupon->discount_type ;
             $dval  =  $coupon->discount_value ;
          
            if($dtype == 'percent'){

              $discount =  $subtotal * $dval/100 ;

            }elseif($dtype=='amount'){
                $discount = $dval ;
            }
          }



$totalAmt =  ($subtotal + $vat + $shipping) - $discount ;
                  $order_data = array(
                    'customer_id' => $custId   ,
                    //'order_details' => json_encode($cartdata),
                    'address_details' => json_encode($data),
                    'sub_total' => $subtotal,
                    'total_amount' => $totalAmt,
                    'type' => $this->session->userdata('prouctType'),
                    'include_logo' => $include_logo,
                    'identity_card' => $fname ,
                    'paymentType' => $paymentType ,
                    'payment_status' => 'N',
                    'vat_amount' => $vat,
                    'shipping_charge' => $shipping ,
                    'discount' => $discount,
                    'coupon_id' => (!empty($coupon) ?  $coupon->id : '' ) ,
                    'created_on' => date('Y-m-d H:i:s'), 
                    'delivery_date' => date("Y-m-d", strtotime("+ 10 day")),                   
                    'order_status' => 1,
                    'notes' => $this->input->post('ltn__message')
                 ) ;
 

            $result = $this->Admin_model->insert_data('order_master', $order_data);
 

foreach ($order_details as  $ovalue) {


  $odet = array('order_id' => $result ,
  'order_details' => $ovalue['cartdata'],
  'purchaseType' => $ovalue['purchaseType'],
  'o_status' =>1 
   ) ;

$odetails = $this->Admin_model->insert_data('order_details', $odet);
}


  


 

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
  $mail->addAddress($this->input->post('ltn__email'));  

$prefix = strtoupper( substr($this->session->userdata('prouctType'), 0, 2));

$orderid = str_pad($result, 5, "0", STR_PAD_LEFT) ;


  /* Email subject */
  $mail->Subject = 'KareemTex - Order Placed Successfully - #' . 'KT'. $prefix. $orderid  ;
 
  /* Set email format to HTML */
  //$mail->isHTML(true);
  $mail->isHTML();


  $message = '<b>Hello '.  $this->input->post('ltn__name') .' '.  $this->input->post('ltn__lastname').',</b><br> ' .'
    Thank you for your order. We’ll send a confirmation when your order ships.<br>If you would like to view the status of your order, please visit Your Orders on '  ;

    $message .= "<a href='".base_url().'home/profile'."'>KareemTex</a>" ;



  $message .='<h3><u>Order Summary</u></h3><br>' ; 
  $message .='<b>Order ID </b>'.'KT'. $prefix. $orderid .'<br>' ;
  $message .='<b>Placed on </b>'.date('l, F d Y h:i:s') .'<br>' ;

 
 

foreach ($productData as $pvalue) {
   
  $message .= '<br><table>' ;

 

$imgPath = $pvalue['image'];
$cid = md5($imgPath);
$mail->AddEmbeddedImage($imgPath,'imagehere'.$cid, $pvalue['imgname']);

 

 $message .='<tr><td><a target="_blank" href="'.$pvalue['url'].'">

 
<img  style="height:100px !important;width:100px !important;"  src="cid:imagehere'.$cid.'" alt="'.$pvalue['name'].'"/>

 </td>';
 $message .= '<th>'.$pvalue['name'].'<br>'.$pvalue['code'].'</th></tr>' ;


         $message .= '</table><br>';

}

$message .= 'Item Subtotal : SAR '. $subtotal  .'<br>'  ;
$message .='VAT : SAR '.  $vat .'<br>';
$message .='Shipping & Handling : SAR '.  $shipping .'<br>';
$message .='Coupon Applied : SAR '. $discount .'<br>';
$message .='<b>Order Total : SAR ' . $totalAmt .'</b><br><br>';



 
  /* Email body content */
  $mailContent = $message   ;
    
  //$mail->AddEmbeddedImage("uploads/services/madeen.png", "my-attach", "Instructions.png");
  $mail->Body =  $mailContent ;

 
  /* Send email */
   $mail->send() ;

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

$subtotal = 0 ;

$discount = 0 ;
$coupon = array() ;


$productData = array() ;

          foreach($cart as $cartdata){



 if($cartdata['type'] == 'industry'){
  $product = $this->Admin_model->get_single_data('industry_products',array('id'=>$cartdata['id'])) ;

$url = 'product_details' ;
}else{
  $product = $this->Admin_model->get_single_data('school_products',array('id'=>$cartdata['id'])) ;
$url = 'uniform_det' ;

}

  

 $productData[] = array('name'=> $product->product_name,'code'=>$product->product_code,'image'=>base_url().'uploads/images/'.$cartdata['type'].$product->product_image,'url'=> base_url().'home/'.$url.'/'.$product->id ) ;

           

$order_details['cartdata'][] = json_encode($cartdata) ;
$order_details['purchaseType'][] = $cartdata['purchaseType'];


$subtotal = $subtotal + $cartdata['subtotal'] ;

              
          }




                        $vat = 0 ;
                        $discount =  0 ;
                        $cname = '' ;
                        $shipping = 0 ;


 $vat_percentage = $this->Admin_model->get_type_name_by_id('site_settings','id','1','vat_val') ;

    if(!empty($vat_percentage) && $vat_percentage != 0 ){
          $vat = $subtotal * $vat_percentage /100 ;
    }

  $shipping =   $this->Admin_model->get_type_name_by_id('site_settings','id','1','shipping_charge') ;




 if(!empty($couponcode)){
                                            
             $coupon = $this->Admin_model->get_single_data('coupons',array('coupon_code'=>$couponcode)) ;
             $cname = $coupon->coupon_name ;
             $dtype = $coupon->discount_type ;
             $dval  =  $coupon->discount_value ;
          
            if($dtype == 'percent'){

              $discount =  $subtotal * $dval/100 ;

            }elseif($dtype=='amount'){
                $discount = $dval ;
            }
          }



$totalAmt =  ($subtotal + $vat + $shipping) - $discount ;
                  $order_data = array(
                    'customer_id' => $custId   ,
                    //'order_details' => json_encode($cartdata),
                    'address_details' => json_encode($data),
                    'sub_total' => $subtotal,
                    'total_amount' => $totalAmt,
                    'type' => $this->session->userdata('prouctType'),
                    'include_logo' => $include_logo,
                    'identity_card' => $fname ,
                    'paymentType' => $paymentType ,
                    'payment_status' => 'N',
                    'vat_amount' => $vat,
                    'shipping_charge' => $shipping ,
                    'discount' => $discount,
                    'coupon_id' => (!empty($coupon) ?  $coupon->id : '' ) ,
                    'created_on' => date('Y-m-d H:i:s'), 
                    'delivery_date' => date("Y-m-d", strtotime("+ 10 day")),                   
                    'order_status' => 1,
                    'notes' => $this->input->post('ltn__message')
                 ) ;
 

            $result = $this->Admin_model->insert_data('order_master', $order_data);
 

foreach ($order_details as  $ovalue) {


$odet = array('order_id' => $result ,
'order_details' => $ovalue['cartdata'],
'purchaseType' => $ovalue['purchaseType'],
'o_status' =>1 
 ) ;

$odetails = $this->Admin_model->insert_data('order_details', $odet);
}


$checkoutId = $this->payment($totalAmt) ;
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
      'created_on' => date('Y-m-d'),
      'status'=>'Y',
      'phone_no' => $this->input->post('phone'),
        );
$exists = $this->db->get_where('customer_master',array('status'=>'Y','phone_no'=>$this->input->post('phone')))->row();


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
    $this->db->where('status','Y');
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
        $this->db->where('status','Y');
        $queryres = $this->db->get('customer_master')->row();

        $this->db->where('id',$queryres->id);
        $this->db->where('status','Y');
        $result = $this->db->update('customer_master',$data);
       

        $success = $this->sendSMS($this->input->post('phone'), $otp);
 
        if( $success == 'success'){

           if ($result == TRUE) {
              $Return['result'] = $queryres->phone_no;
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
    $this->db->where('status','Y');
    $query = $this->db->get('customer_master');
    if ($query->num_rows() == 0){
      $Return['error'] = "Invalid otp";
    }
    if($Return['error']!=''){
      $this->output($Return);
      exit ;
    }else{
      $this->db->where('phone_no',$phone);
      $this->db->where('status','Y');
      $this->db->update('customer_master',array('verified'=>1));

      $userdata = $this->Admin_model->get_single_data('customer_master',array('phone_no'=>$phone,'status'=>'Y','otp'=>$resotp,'verified'=>1));
     
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

public function delete_entry()
  {  
   $session = $this->session->userdata('customerdet');
    if(empty($session)){ 
      redirect('home');
    } 
    
    $id = $this->input->post('id');
    $table = $this->input->post('table');
    $this->Admin_model->delete_data($table,array('id'=>$id));
    
    return true ;
    
  }

  public function check_coupon(){

    $session = $this->session->userdata('customerdet');
    if(empty($session)){ 
      redirect('home');
    } 

   $userid = $session['user_id'] ;
   $couponcode = $this->input->post('coupon_code');

 

  $coupon = $this->Admin_model->get_single_data('coupons',array('coupon_code'=>$couponcode,'ends_on >=' => date('Y-m-d'), 'status'=>'Y')) ;
 

 
if(!empty($coupon )){

 $unlimited = $coupon->unlimited_usage  ;
 $shipping = $coupon->shipping_free  ;
 $prodType = $this->session->userdata('prouctType');

 $applicable = $coupon->applicable_for  ;

 if( $applicable !='both'){
if( $prodType != $applicable){
  $Return['error'] = "Invalid Coupon";
  if($Return['error']!=''){
        $this->output($Return);
        exit ;
    }

}
}

 

 $coupon_usage = $this->Admin_model->get_single_data('coupon_usage',array('coupon_code'=>$couponcode,'user_id >=' => $userid  )) ;

 if(!empty($coupon_usage)){
  if($unlimited =='N'){
    $Return['error'] = "Coupon already used !";
    if($Return['error']!=''){
          $this->output($Return);
          exit ;
      }
  }
 }

 $this->session->set_userdata('coupon_code', $couponcode);
   
}else{

  
  $Return['error'] = "Invalid Coupon";
  if($Return['error']!=''){
        $this->output($Return);
        exit ;
    }

}
    
  }

  public function invoice() {

    $id = $this->uri->segment(3) ;

$data['order'] = $this->Admin_model->get_single_data('order_master',array('id'=> $id ) );
    
$data['address'] = $this->Admin_model->get_single_data('contact_us_page',array('id'=>1))->box3_value ;     $this->load->view('home/invoice',$data);
  }

public function logout() {
  $session = $this->session->userdata('customerdet'); 
  $sess_array = array('customerdet' => '');
  $this->session->sess_destroy();
  $Return['result'] = 'Successfully Logout.';
  redirect(base_url().'home', 'refresh');
}

public function delete_account() {
  $session = $this->session->userdata('customerdet'); 
  $this->Admin_model->update_data('customer_master',array('id'=>$session['user_id']),array('status'=>'D'));
  $sess_array = array('customerdet' => '');
  $this->session->sess_destroy();

  $Return['result'] = 'Successfully Deleted the account.';
  echo true ;
//  redirect(base_url().'home', 'refresh');
}
   
 
}