<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');     
                /*$this->config->set_item('banner','News Section');
                $this->load->model('news_model');
                $this->load->helper('url_helper');*/
        }
    
        public function index($tags = 'mariners')
        { 
           // $tags = 'mariners';
            $pics = $this->pics_model->get_pics($tags);
            foreach($pics as $pic){
                $size = 'm';
                $photo_url = '
                http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

                echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />";

            }

        }
       // public function view($tag)
       public function view($tag = NULL)
        {    $data['pics_item'] = $this->pics_model->get_pics($tags); 
                if (empty($data['pics_item']))
                {
                        show_404();
                }

                $data['title'] = $data['pics_item']['title'];
                $this->load->view('pics/view', $data);
           /* //slug without dashes from internet
            $dashless_slug = str_replace("-", " ", $slug);
            //uppercase slug words
            $dashless_slug = ucwords($dashless_slug);
            //use dashless slug for the title
            $this->config->set_item('title','News Flash - ' . $dashless_slug);
            
                $data['news_item'] = $this->news_model->get_news($slug);
                
                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];
                $this->load->view('news/view', $data);
            */
        }
        /*public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('news/create', $data);
            }
            else
            {
                //$this->news_model->set_news();
                //$this->load->view('news/success', $data);
                $slug = $this->news_model->set_news();
                if($slug !== false){//slug sent
                    feedback('Data entered successfully!','info');
                    redirect('news/view/' . $slug);
                }else{ //error
                    feedback('Data NOT entered successfully!','error');
                    redirect('news/create');
                }
             
            }
        }*/
}