<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edufair extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('bizdev/Edufair_model', 'eduf');
        $this->load->model('hr/Employee_model', 'empl');
    }

    public function index(){
        $this->form_validation->set_rules('eduf_organizer','organizer name','required');
        if($this->form_validation->run()==false) {
            $data['eduf'] = $this->eduf->showAll();
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-bizdev');
            $this->load->view('bizdev/edufair/index', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->save();
        }
    }

    public function save() {
        $data = [
            'eduf_organizer' => $this->input->post('eduf_organizer'),
            'eduf_place' => $this->input->post('eduf_place'),
            'eduf_picname' => $this->input->post('eduf_picname'),
            'eduf_picmail' => $this->input->post('eduf_picmail'),
            'eduf_picphone' => $this->input->post('eduf_picphone'),
            'eduf_firstdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_lastdisdate' => $this->input->post('eduf_firstdisdate')
        ];

        $this->eduf->save($data);
        $this->session->set_flashdata('success','Edufair has been created');
        redirect('/bizdev/edufair/');
    }

    public function view($id){
        $data['eduf'] = $this->eduf->showId($id);
        $this->load->view('templates/h-io');
        $this->load->view('templates/s-bizdev');
        $this->load->view('bizdev/edufair/view-edufair', $data);
        $this->load->view('templates/f-io');
    }

    public function edit($id){
        $this->form_validation->set_rules('eduf_organizer','organizer name','required');
        if($this->form_validation->run()==false) {
            $data['eduf'] = $this->eduf->showId($id);
            $data['empl'] = $this->empl->showActive();
            $this->load->view('templates/h-io');
            $this->load->view('templates/s-bizdev');
            $this->load->view('bizdev/edufair/edit-edufair', $data);
            $this->load->view('templates/f-io');
        } else {
            $this->update();
        }
    }

    public function update() {
        $id = $this->input->post('eduf_id');
        $picallin = implode(", ", $this->input->post('eduf_picallin[]'));
        $data = [
            'eduf_organizer' => $this->input->post('eduf_organizer'),
            'eduf_place' => $this->input->post('eduf_place'),
            'eduf_picname' => $this->input->post('eduf_picname'),
            'eduf_picmail' => $this->input->post('eduf_picmail'),
            'eduf_picphone' => $this->input->post('eduf_picphone'),
            'eduf_firstdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_lastdisdate' => $this->input->post('eduf_firstdisdate'),
            'eduf_eventstartdate' => $this->input->post('eduf_eventstartdate'),
            'eduf_eventenddate' => $this->input->post('eduf_eventenddate'),
            'eduf_status' => $this->input->post('eduf_status'),
            'eduf_picallin' => $picallin,
            'eduf_notes' => $this->input->post('eduf_notes')
        ];

        $this->eduf->update($data, $id);
        $this->session->set_flashdata('success','Edufair has been changed');
        redirect('/bizdev/edufair/view/'.$id);
    }
    
}