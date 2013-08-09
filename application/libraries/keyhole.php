<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keyhole {
    
    protected $CI;
    protected $methods;
    protected $logged_in;
    protected $is_admin;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->config('keyhole');
        if($this->CI->session->userdata('user_id'))
            $this->logged_in = TRUE;
        if($this->CI->session->userdata('is_admin'))
            $this->is_admin = TRUE;
    }
    
    public function deny($methods)
    {
        if(in_array($this->CI->router->fetch_method(), $methods) && $this->logged_in != TRUE)
        {
            $this->CI->session->set_flashdata('error', $this->CI->config->item('message'));
            redirect($this->CI->config->item('redirect_url'));
        }
    }
    
    public function admin($methods)
    {
        if(in_array($this->CI->router->fetch_method(), $methods) && $this->is_admin != TRUE)
        {
            $this->CI->session->set_flashdata('error', $this->CI->config->item('message'));
            redirect($this->CI->config->item('redirect_url'));
        }
    }
    
    public function login($user_id, $is_admin = FALSE)
    {
        if($is_admin)
            $this->CI->session->set_userdata('is_admin', TRUE);
        $this->CI->session->set_userdata('user_id', $user_id);
    }
    
    public function logout()
    {
        $this->CI->session->set_userdata('is_admin', FALSE);
        $this->CI->session->set_userdata('user_id', FALSE);
    }
}

/* End of file keyhole.php */ 
/* Location: ./application/libararies/keyhole.php */
