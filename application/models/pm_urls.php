<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class pm_urls extends CI_Model {
    
    var $url;
    var $surl;
    
    var $debugger;
    

    function __construct() {
        parent::__construct();
        $this->init();
        
        /****************/
        /** debug FLAG **/
        /****************/
        $this->debugger = true;
    }
    
    function save_url($data) {

        do {
        $url_code = random_string('alnum', 8);
        $this->db->where('url_code = ', $url_code);
        $this->db->from('urls');
        $num = $this->db->count_all_results();
        } while ($num >= 1);
        
    }
}