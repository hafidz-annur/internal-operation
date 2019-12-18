<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index(){
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/index');
        $this->load->view('templates/f-io');
    }

    public function sample_form()
    {
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-client');
        $this->load->view('client/form');
        $this->load->view('templates/f-io');
    }
    
}