<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Pm_urls extends CI_Model {
    
    var $url;
    var $surl;
    
    var $debugger;
    

    function __construct() {
        parent::__construct();
    }
    
    function save_url($data) {

        do {
            $surl = random_string('alnum', 8);
            
            $this->db->where('surl = ', $surl);
            $this->db->from('links');
            $num = $this->db->count_all_results();
        } while ($num >= 1);
        $query = "INSERT INTO `links` (`surl`, `url`) VALUES(?,?) ";
        $result = $this->db->query($query, array($surl, $data['url']));
        if ($result) {
            return $surl;
        } else {
            return false;
        }
    }
    
    function fetch_url($surl) {
        $query = "SELECT * FROM `links` WHERE `surl` = ? ";
        $result = $this->db->query($query, array($surl));
        if ($result) {
            foreach($result->result() as $row){
                return $row->url;
            }
            //return $url;
        } else {
            return false;
        }
    }
    
}