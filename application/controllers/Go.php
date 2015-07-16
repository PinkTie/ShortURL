<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Go extends CI_Controller
{
    /**
     * Method to redirect from an linq to a full URL
     */
    public function index()
    {
	$this->log_redirect();
	$linq = $this->uri->segment(1);
	//$this->db->select('url');
	$query = $this->db->get_where('linqs', array('linq' => $linq), 1, 0);
	if ($query->num_rows() > 0)
	{
	    foreach ($query->result() as $row)
	    {
		$this->load->helper('url');
		redirect(prep_url($row->url), 'refresh', 301);
	    }
	}
	else
	{
	    echo "Sorry, linq '$linq' not found";
	}
    }
    /**
     * Method to log a redirect
     */
    function log_redirect()
    {
	$data = array(
	    'pmstamp' => date("Y-m-d H:i:s"),
	    'ip' => $this->input->ip_address(),
	    'agent' => $this->input->user_agent(),
	    'linq' => $this->uri->uri_string()
	);
	$this->db->insert('tracking', $data);
    }
}
/* End of file go.php */
/* Location: ./application/controllers/Go.php */