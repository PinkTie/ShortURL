<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Go extends PM_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
    
    public function index() {
        if (!$this->uri->segment(1)) {
            echo 'FAILED: ';
            //redirect (base_url());
        } else {
            $surl = $this->uri->segment(1);
            echo 'SUCCESS: '.$surl;
            $this->load->model('Pm_urls');
            $query = $this->Pm_urls->fetch_url($surl);
            echo 'Query: '.$query;
            print_r($query);
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $row) {
                    $url = $row->url;
                }
                
                redirect (prep_url($url));
            } else {
                $page_data = array(
                    'success_fail' => null,
                    'encoded_url' => false
                );
                
                $this->load->view('common/header');
                $this->load->view('nav/top_nav');
                $this->load->view('create/create', $page_data);
                $this->load->view('common/footer');
            }
        }
    }
}

