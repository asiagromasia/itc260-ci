<?php
//application/controllers/Pics.php
//controler stores methods
class Pics extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');    
                $this->config->set_item('banner','News Section');
                $this->load->helper('url_helper');
              
        }
    
        public function index(){
            
            //this renders title on the page  
            $tags = 'Mariners';
            $data['title'] = $tags;
            //this changes the title tag in head in code source
            $this->config->set_item('title','Mariners');
           
            $data['pics'] = $this->pics_model->get_pics($tags);             
            $pics = $this->pics_model->get_pics($tags);
            
            //this points to file to render   
            $this->load->view('pics/index',$data);
        }
      
    
        public function view($tags){
           
           $data['pics'] = $tags;
           $data['pics'] = $this->pics_model->get_pics($tags); 
            
           //this changes the title tag in head in code source
                $dashless_tags = str_replace("-", " ", $tags);
                $dashless_tags = ucwords($dashless_tags);
                $this->config->set_item('title','pictures - ' . $dashless_tags);
              
            //this renders title on the page    
                $data['title'] = $tags;
        
            //this points to file to render    
                $this->load->view('pics/view', $data);
               if (empty($data['pics']))
                {
                        show_404();
                }
       }
            
}