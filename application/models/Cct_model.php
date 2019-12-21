<?php
class Cct_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function getdatoscct($cct, $id_turno){
      $str_query = "SELECT ct.id_cct, ct.cct, ct.nombre_ct, ct.turno FROM seguridad s
      INNER JOIN cct ct on ct.id_cct =  s.id_cct
      WHERE ct.cct = ? AND s.id_turno = ?";
      return $this->db->query($str_query, array($cct, $id_turno))->result_array();
    }// getdatoscct()

    function get_turnos(){
      $str_query = "SELECT * FROM turno 
      WHERE estatus = 1";
      return $this->db->query($str_query)->result_array();
    }// get_turnos()

}// Prioridad_model
