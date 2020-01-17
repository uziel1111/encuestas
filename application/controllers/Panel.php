<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        $this->load->model('Cct_model');
        $this->cct = array();
        $this->sesion = Utilerias::get_cct_sesion($this)[0];
    } // __construct()

    public function index()
    {
        if(Utilerias::verifica_sesion_redirige($this)){
        $data = array();
        $data['turnos'] = $this->Cct_model->get_turnos();
        $this->cct = Utilerias::get_cct_sesion($this)[0];
        // echo "<pre>";
                // print_r($this->cct); die();
                $data['cct'] = $this->cct;
                $estatus = $this->Cct_model->get_estatus_registros($this->cct['id_cct']);
                if(count($estatus) > 0){
                    $data['sinregistros'] = $estatus[0]['registro'];
                }else{
                    $data['sinregistros'] = "sin";
                }
                // echo "<pre>";
                // print_r($data); die();
        Utilerias::pagina_basica($this,"principal/index", $data);
            }


    }




} // class