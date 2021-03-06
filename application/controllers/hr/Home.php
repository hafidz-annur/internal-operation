<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('hr/Employee_model','empl');
        $this->load->model('hr/Mentor_model','mt');
        $this->load->model('hr/Editor_model','editor');
        $this->load->model('hr/Volunteer_model','volunt');
        $this->load->model('hr/Influencer_model','infl');
        $this->load->model('Menus_model','menu');
        
        $empl_id = $this->session->userdata('empl_id');
        $position = $this->session->userdata('position');
        if(empty($empl_id)) {
            redirect('/');
        } else {
            if($position!='hr') {
                redirect('/'.$position);
            }

            $data['empl_id'] = $empl_id;
            $data['menus'] = $this->menu->showId($empl_id, 1);
            $this->load->view('templates/h-io', $data);
            // echo json_encode($data);
        }
    }

    public function index(){
        $data['empl_active'] = count($this->empl->showActive());
        $data['empl_notactive'] = count($this->empl->showNotActive());
        $data['mt_potential'] = count($this->mt->showPotentialAll());
        $data['mt_active'] = count($this->mt->showActive());
        $data['mt_notactive'] = count($this->mt->showNotActive());
        $data['editor_managing'] = count($this->editor->showManaging());
        $data['editor_senior'] = count($this->editor->showSenior());
        $data['editor_associate'] = count($this->editor->showAssociate());
        $data['volunt_active'] = count($this->volunt->showActive());
        $data['volunt_notactive'] = count($this->volunt->showNotActive());
        $data['infl_active'] = count($this->infl->showActive());
        $data['infl_notactive'] = count($this->infl->showNotActive());
        // echo json_encode($data);
        $this->load->view('templates/s-io');
        $this->load->view('hr/index', $data);
        $this->load->view('templates/f-io');
    }
    
}