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
        $sesion = Utilerias::get_cct_sesion($this)[0];
    } // __construct()

    public function index()
    {
            if(Utilerias::verifica_sesion_redirige($this)){
        $data = array();
        $data['turnos'] = $this->Cct_model->get_turnos();
        $this->cct = Utilerias::get_cct_sesion($this)[0];
                $data['cct'] = $this->cct;
        Utilerias::pagina_basica($this,"principal/index", $data);
            }


    }




} // class