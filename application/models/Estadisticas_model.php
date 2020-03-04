<?php
class Estadisticas_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rezago(){
      $str_query = "SELECT * FROM (
SELECT x.*, m.municipio AS nom_municipio, m.id_municipio
FROM(
SELECT
sr.fec_ultimoreg, en.id_aplica, ct.cct, ct.turno, ct.nombre_ct, 
MAX(CASE WHEN p.id_pregunta = 18 THEN r.respuesta ELSE '' END) AS 'nombre',
MAX(CASE WHEN p.id_pregunta = 19 THEN r.respuesta ELSE '' END) AS 'apell1',
MAX(CASE WHEN p.id_pregunta = 20 THEN r.respuesta ELSE '' END) AS 'apell2',
MAX(CASE WHEN p.id_pregunta = 21 THEN r.respuesta ELSE '' END) AS 'edad',
MAX(CASE WHEN p.id_pregunta = 22 THEN r.respuesta ELSE '' END) AS 'domicilio',
MAX(CASE WHEN p.id_pregunta = 23 THEN r.respuesta ELSE '' END) AS 'colonia',
MAX(CASE WHEN p.id_pregunta = 24 THEN r.respuesta ELSE '' END) AS 'municipio',
MAX(CASE WHEN p.id_pregunta = 25 THEN r.respuesta ELSE '' END) AS 'localidad',
MAX(CASE WHEN p.id_pregunta = 26 THEN r.respuesta ELSE '' END) AS 'telefono',
MAX(CASE WHEN p.id_pregunta = 27 THEN r.respuesta ELSE '' END) AS 'rezago'
FROM encuesta_x_cct en
INNER JOIN cct ct ON en.id_cct=ct.id_cct
INNER JOIN respuesta r ON en.id_aplica= r.id_aplica
INNER JOIN pregunta p ON r.id_pregunta = p.id_pregunta
LEFT JOIN sin_registro sr ON en.id_cct = sr.id_cct
GROUP BY r.id_aplica
ORDER BY en.id_aplica, ct.cct, ct.id_turno) AS X
INNER JOIN municipio m ON x.MUNICIPIO=m.id_municipio) AS encuestas
WHERE rezago = ' Concluyó la primaria, pero no la secundaria' AND edad BETWEEN 23 AND 38
      ";
    }

}// Prioridad_model
