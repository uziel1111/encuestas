<?php
class Estadisticas_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rezago($rezago, $emin, $emax, $municipio){
      $where_rezago = "1 = 1";
      if($rezago != ""){
        $where_rezago = " rezago LIKE '%{$rezago}%' ";
      }
      $where_municipio = "";
      if($municipio != -1){
        $where_municipio = " AND id_municipio = {$municipio}";
      }

      $str_query = "SELECT COUNT(encuestas.id_aplica) as total, encuestas.rezago FROM (
      SELECT x.*, m.id_municipio
      FROM(
      SELECT
      en.id_aplica,
      MAX(CASE WHEN p.id_pregunta = 21 THEN r.respuesta ELSE '' END) AS 'edad',
      MAX(CASE WHEN p.id_pregunta = 24 THEN r.respuesta ELSE '' END) AS 'municipio',
      MAX(CASE WHEN p.id_pregunta = 27 THEN r.respuesta ELSE '' END) AS 'rezago'
      FROM encuesta_x_cct en
      INNER JOIN respuesta r ON en.id_aplica= r.id_aplica
      INNER JOIN pregunta p ON r.id_pregunta = p.id_pregunta
      GROUP BY r.id_aplica
      ORDER BY en.id_aplica) AS x
      INNER JOIN municipio m ON x.MUNICIPIO=m.id_municipio) AS encuestas
      WHERE {$where_rezago} AND edad BETWEEN ? AND ? {$where_municipio} 
      GROUP BY encuestas.rezago
      ";
      // echo $str_query; die();
      return $this->db->query($str_query, array($emin, $emax))->result_array();
    }

}// Prioridad_model
