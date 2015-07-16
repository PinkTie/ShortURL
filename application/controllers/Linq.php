<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Linq extends CI_Controller
{
    /**
     * Show a form to linq a URL
     */
    public function index()
    {
	$this->load->helper('form');
	$this->load->view('form');
    }
    /**
     * Take in a URL from the form and shorten it
     */
    public function create()
    {
	$linq_url = "";
	$url = prep_url($this->input->post('url'));
	$linq_length = $this->config->item('linq_length');
	// Check to see if this URL has a linq
	$existing = $this->linq_from_url($url);
	// Generate a new linq if needed
	if ($existing == "")
	{
	    $this->load->helper('string');
	    $linq = random_string('alnum', $linq_length);
	    while ($this->does_linq_exist($linq))
	    {
		$linq = random_string('alnum', $linq_length);
	    }
	    $this->save_new_linq($url, $linq);
	    $linq_url = $linq;
	}
	else
	{
	    $linq_url = $existing;
	}
	// display the short url
	echo base_url() . $linq_url;
    }
    /**
     * Method to see if a generated linq already exists in the table
     * @param type $linq String to check to see if it exists
     * @return Bool True or False
     */
    function does_linq_exist($linq)
    {
	$this->db->select('id');
	$query = $this->db->get_where('linqs', array('linq' => $linq), 1, 0);
	if ($query->num_rows() > 0)
	{
	    return true;
	}
	else
	{
	    return false;
	}
    }
    /**
     * Save a new linq to the table
     * @param type $url URL to shorten
     * @param type $linq  The new linq for this URL
     */
    function save_new_linq($url, $linq)
    {
	$data = array(
	    'linq' => $linq,
	    'url' => $url,
            //'oid' => '',  ADD CODE FOR OWNER
	    'pmstamp' => date("Y-m-d H:i:s")
	);
	$this->db->insert('linqs', $data);
    }
    /**
     * Return an existing linq, if any
     * @param type $url String, the URL to check
     * @return type $linq String, the linq, if any
     */
    function linq_from_url($url)
    {
	$linq = "";
	$this->db->select('linq');
	$query = $this->db->get_where('linqs', array('url' => $url), 1, 0);
	if ($query->num_rows() > 0)
	{
	    foreach ($query->result() as $row)
	    {
		$linq = $row->linq;
	    }
	}
	return $linq;
    }
}
/* End of file Linq.php */
/* Location: ./application/controllers/Linq.php */