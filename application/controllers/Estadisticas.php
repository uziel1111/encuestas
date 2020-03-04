<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estadisticas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        // $this->load->model('Estadisticas_model');
        $this->cct = array();
    } // __construct()

    public function get_estadisticas()
    {
        if(Utilerias::verifica_sesion_redirige($this)){
            $data = array();
            $this->sesion = Utilerias::get_cct_sesion($this);
            $string = $this->load->view('estadisticas/index', $data, TRUE);
            $vista2 = $this->load->view('estadisticas/pie', $data, TRUE);
            $response = array("vista1" => $string, "vista2" => $vista2);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }
    }

    public function get_tipo_estadisticas(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $id_tipo_estadistica = $this->input->post("tipo_estadisticas");
            switch ($id_tipo_estadistica) {
                case 1:
                    $formulario = 'estadisticas/rezago';
                    break;
                case 2:
                    $formulario = 'estadisticas/participacion';
                    break;
                case 3:
                    $formulario = 'estadisticas/nivel';
                    break;
            };
            $data = array();
            $this->sesion = Utilerias::get_cct_sesion($this);
            $string = $this->load->view($formulario, $data, TRUE);
            $response = array("vista" => $string);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }
    }




} // class