<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estadisticas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        $this->load->model('Municipio_model');
        $this->load->model('Estadisticas_model');
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
            $data = array();
            switch ($id_tipo_estadistica) {
                case 1:
                    $formulario = 'estadisticas/rezago';
                    $data['municipios'] = $this->Municipio_model->get_municipios();
                    break;
                case 2:
                    $formulario = 'estadisticas/participacion';
                    break;
                case 3:
                    $formulario = 'estadisticas/nivel';
                    break;
            };
            
            $this->sesion = Utilerias::get_cct_sesion($this);
            // echo"<pre>";print_r($data); die();
            $string = $this->load->view($formulario, $data, TRUE);
            $response = array("vista" => $string);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }
    }

    public function get_rezago_datos(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $rezago = $this->input->post("rezago");
            $emin = $this->input->post("rezago");
            $emax = $this->input->post("rezago");
            $id_municipio = $this->input->post("rezago");
            $datos_rezago = $this->Estadisticas_model->get_rezago($rezago, $emin, $emax, $id_municipio);
            $response = array("vista" => $string);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }
    }




} // class