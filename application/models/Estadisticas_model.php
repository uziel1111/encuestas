<?php
class Estadisticas_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rezago($rezago, $emin, $emax, $municipio){
      $where_edad = "";
      if($municipio != -1){
        $where_edad = " AND id_municipio = {$municipio}";
      }

      $str_query = "SELECT COUNT(encuestas.id_aplica) FROM (
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
      ORDER BY en.id_aplica) AS X
      INNER JOIN municipio m ON x.MUNICIPIO=m.id_municipio) AS encuestas
      WHERE rezago = ? AND edad BETWEEN ? AND ? {$where_edad}
      ";
      return $this->db->query($str_query, array($rezago, $emin, $emax))->result_array();
    }

}// Prioridad_model
