<?php
class Encuesta_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_encuesta($id_encuesta){
      $str_query = "SELECT * FROM pregunta WHERE id_encuesta = ? order by orden";
      return $this->db->query($str_query, array($id_encuesta))->result_array();
    }// get_encuesta()

    function acceso_sistema($id_cct){
    	$status = 1;
    	$fcreacion = date("Y-m-d H:i:s");

    	$str_query = "SELECT * FROM sin_registro WHERE id_cct = ?";
    	$registro = $this->db->query($str_query, array($id_cct))->result_array();

    	if(count($registro) > 0){
    		$str_query2 = "UPDATE sin_registro SET registro = ?, fec_ultimoreg = ? WHERE id_cct = ?";
    		return $this->db->query($str_query2, array($status, $fcreacion, $id_cct));
    	}else{	
    		$str_query2 = "INSERT INTO sin_registro(id_cct, registro, fec_ultimoreg) VALUES(?, ?, ?)";
    		return $this->db->query($str_query2, array($id_cct, $status, $fcreacion));
    	}
    }

    function set_encuesta($idcct, $cct, $respuestas, $idencuesta){
    	$this->db->trans_start();
    	$str_query = "INSERT INTO encuesta_x_cct (id_cct, id_encuesta) VALUES(?, ?);";
		$this->db->query($str_query, array($idcct, $idencuesta));
		$ultimoId = $this->db->insert_id();
		foreach ($respuestas as $respuesta) {
			$str_query = "INSERT INTO respuesta (respuesta, id_pregunta, id_aplica) VALUES('{$respuesta['respuesta']}', {$respuesta['id_pregunta']}, {$ultimoId});";
			$this->db->query($str_query);
		}
		
		$this->db->trans_complete();

	    if ($this->db->trans_status() === FALSE)
	    {
	        return false;
	    }else{
	        return true;
	    }
    }

    function get_encuestasxcct($idcct){
    	 $str_query = "SELECT  e.id_aplica AS id_encuesta, GROUP_CONCAT(CONCAT(r.id_pregunta, '_', r.respuesta) SEPARATOR '&') AS resp FROM encuesta_x_cct e
		INNER JOIN respuesta r ON r.id_aplica = e.id_aplica
		WHERE e.id_cct = ?
		GROUP BY e.id_aplica";
      return $this->db->query($str_query, array($idcct))->result_array();
    }

    function delete_encuestaxcct($id_encuesta){
    
		$this->db->trans_start();
    	$str_query = "DELETE FROM respuesta WHERE id_aplica = ?";
		$this->db->query($str_query, array($id_encuesta));

		$str_query = "DELETE FROM encuesta_x_cct WHERE id_aplica = ?";
		$this->db->query($str_query, array($id_encuesta));
		
		$this->db->trans_complete();

	    if ($this->db->trans_status() === FALSE)
	    {
	        return false;
	    }else{
	        return true;
	    }

    }

    function get_encuestaxcct($id_encuesta){
    	$str_query = "SELECT * FROM respuesta WHERE id_aplica = ?";
    	return $this->db->query($str_query, array($id_encuesta))->result_array();
    }

    function set_encuesta_edit($respuestas, $id_editando){
    	$this->db->trans_start();
			foreach ($respuestas as $respuesta) {
				$str_query = "UPDATE respuesta SET respuesta = '{$respuesta['respuesta']}' WHERE id_pregunta = {$respuesta['id_pregunta']} AND id_aplica ={$id_editando}";
				$this->db->query($str_query);
			}
		$this->db->trans_complete();

	    if ($this->db->trans_status() === FALSE)
	    {
	        return false;
	    }else{
	        return true;
	    }
    	
    }

    function sin_registros_update($id_cct, $status){
    	$fcreacion = date("Y-m-d H:i:s");

    	$str_query = "SELECT * FROM sin_registro WHERE id_cct = ?";
    	$registro = $this->db->query($str_query, array($id_cct))->result_array();

    	if(count($registro) > 0){
    		$str_query2 = "UPDATE sin_registro SET registro = ?, fec_ultimoreg = ? WHERE id_cct = ?";
    		return $this->db->query($str_query2, array($status, $fcreacion, $id_cct));
    	}else{	
    		$str_query2 = "INSERT INTO sin_registro(id_cct, registro, fec_ultimoreg) VALUES(?, ?, ?)";
    		return $this->db->query($str_query2, array($id_cct, $status, $fcreacion));
    	}
    }

}// Prioridad_model
