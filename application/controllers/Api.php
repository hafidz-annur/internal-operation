<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('countries');
        $this->load->library('majors');
        $this->load->model('bizdev/School_model','sch');
        $this->load->model('client/Lead_model','lead');
        $this->load->model('client/Parents_model','prt');
        $this->load->model('hr/Mentor_model','mt');
    }

    public function countries() {
        echo json_encode($this->countries->show());
    }

    public function major() {
        echo json_encode($this->majors->show());
    }

    public function school() {
        echo json_encode($this->sch->showAll());
    }

    public function lead() {
        echo json_encode($this->lead->showAll());
    }

    public function schoolSave() {
        $sch = $this->input->post('sch_name');
        $query = $this->sch->getId();   
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 4, "0", STR_PAD_LEFT); 
        $newid = "SCH-".$idmax;

        if($sch!="") {
            $data = [
                'sch_id' => $newid,
                'sch_name' => $sch
            ];
            $process = $this->sch->save($data);
            if($process) {
                echo "001";
            } else {
                echo "03"; // error
            }
        } else {
            echo "no data";
        }
    }

    public function leadSave() {
        $query = $this->lead->getId();   
		if($query->num_rows() <> 0){        
            $data = $query->row();      
            $id = intval($data->kode) + 1;    
		} else { 
		    $id = 1;    
		}
        $idmax = str_pad($id, 3, "0", STR_PAD_LEFT); 
        $newid = "LS".$idmax;

        echo $newid;

        $data = [
            'lead_id' => $newid,
            'lead_name' => $this->input->post('lead_name'),
        ];

        $process = $this->lead->save($data);
        if($process) {
			echo "001";
		} else {
			echo "03"; // error
		}
    }

    public function parent($id="") 
    {
        if($id=="") {
            $pr = $this->prt->showAll();
        } else {
            $pr = $this->prt->showId($id);
        }

        echo json_encode($pr);
    }

    public function mentor() 
    {
        $query =  $this->mt->showMentorActive();
        $data = [];
        $no = 0;
        foreach ($query as $i) {
            $data[$no] = [
                'mt_id' => $i['mt_id'],
                'mt_name' => $i['mt_firstn']." ".$i['mt_lastn'],
            ];
            $no++;
        }

        echo json_encode($data);
    }
}