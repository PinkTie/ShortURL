<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function index()
    {
        
    }
    /**
     * Load some recent linq stats
     * @param int $limit Limit the number of records to show
     */
    public function view($limit = 100)
    {
        $this->load->library('table');
        $linqs = array();
        $linqs[] = array('ID', 'Date', 'IP Address', 'Browser', 'OS', 'Mobile', 'Referrer', 'Linq');
        $this->db->select('id, pmstamp, ip, browser, platform, mobile, ref, linq');
        $this->db->where('robot', '');
        $this->db->where('linq !=', 'robots.txt');
        $this->db->where('linq !=', 'favicon.ico');
        $this->db->limit($limit);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tracking');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $linqs[] = $row;
            }
        }
        echo $this->table->generate($linqs);
    }
}
/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */