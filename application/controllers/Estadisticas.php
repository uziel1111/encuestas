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

    public function get_rezago(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $rezago = $this->input->post("rezago");
            $emin = $this->input->post("edadmin");
            $emax = $this->input->post("edadmax");
            $id_municipio = $this->input->post("idmunicipio");
            switch ($rezago) {
                case '1':
                    $rezago = "Concluyó la primaria, pero no la secundaria";
                    break;
                case '2':
                    $rezago = "No sabe leer ni escribir";
                    break;
                case '3':
                    $rezago = "Lee y escribe, pero no ha concluido la primaria";
                    break;
                case '4':
                $rezago = "";
                    break;
            }
            $datos_rezago = $this->Estadisticas_model->get_rezago($rezago, $emin, $emax, $id_municipio);
            
            $rezagos = array();
            foreach ($datos_rezago as $rezago) {
                $rezago_aux = array();
                array_push($rezago_aux, $rezago['rezago']);
                array_push($rezago_aux, (float)$rezago['total']);
                array_push($rezago_aux, "#b87333");
                array_push($rezagos, $rezago_aux);
            }

            $response = array("rezago" => $rezagos);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }
    }




} // class