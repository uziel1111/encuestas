<?php
class Encuesta_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_encuesta($id_encuesta){
      $str_query = "SELECT * FROM pregunta WHERE id_encuesta = ?";
      return $this->db->query($str_query, array($id_encuesta))->result_array();
    }// get_encuesta()

    function set_encuesta($idcct, $cct, $respuestas, $idencuesta){
    	// INSERT INTO encuesta_x_cct (id_cct, id_encuesta) VALUES(1, 1);
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

}// Prioridad_model
