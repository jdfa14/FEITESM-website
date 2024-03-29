<?php
class Resources_Manager
{
	protected $db;
	public function __construct(Database $db = null){
		$this->db = $db;
	}

	public function getOrgID($orgSign)
	{
		$what = "id_org";
		$from = "organizacion";
		$where = "siglas = '{$orgSign}'";
		$return = $this->db->select($what,$from,$where);
		if ($return) { 
			$return = $return->fetch_assoc();
			return $return["id_org"];
		}
		return null;
	}

	public function getTabsInfo($orgSign)
	{
		$id_org = $this->getOrgID($orgSign);
		$what = "*";
		$from = "informacion";
		$where = "id_org = '{$id_org}'";
		return $this->db->select($what,$from,$where);
	}

	public function addTab($orgSign,$tabla_titulo,$titulo,$contenido,$img_url,$contacto,$redes)
	{
		$id_org = $this->getOrgID($orgSign);
		$into = "informacion";
		$fields = "id_org,tabla_titulo,titulo,contenido,img_url,contacto,redes";
		$values = "'{$id_org}','{$tabla_titulo}','{$titulo}','{$contenido}','{$img_url}','{$contacto}','{$redes}'";
		return $this->db->insert($into,$fields,$values);
	}

	public function removeTab($id_inf)
	{
		$from = "informacion";
		$where = "id_inf = '{$id_inf}'";
		return $this->db->delete($from,$where);
	}

	public function actualizaInformacion($tabla_titulo,$titulo,$contenido,$img_url,$contacto,$redes,$id_inf)
	{
		$from = "informacion";
		$values = "tabla_titulo = '{$tabla_titulo}', titulo = '{$titulo}', contenido = '{$contenido}' , img_url = '{$img_url}', contacto = {$contacto} , redes = {$redes}";
		$where = "id_inf = '{$id_inf}'";
		return $this->db->update($from,$values,$where);
	}
	public function getNextTabID(){
		$what = "AUTO_INCREMENT";
		$from = "INFORMATION_SCHEMA.TABLES";
		$where = "TABLE_SCHEMA = 'feitesm_website_db'
			AND   TABLE_NAME   = 'informacion'";
		$return = $this->db->select($what,$from,$where)->fetch_assoc();
		return $return["AUTO_INCREMENT"];
	}

	public function getNextID($table){
		$what = "AUTO_INCREMENT";
		$from = "INFORMATION_SCHEMA.TABLES";
		$where = "TABLE_SCHEMA = 'feitesm_website_db'
			AND   TABLE_NAME   = '{$table}'";
		$return = $this->db->select($what,$from,$where)->fetch_assoc();
		return $return["AUTO_INCREMENT"];
	}

	public function getStaffInfo($orgSign)
	{
		$id_org = $this->getOrgID($orgSign);
		$what = "*";
		$from = "integrantes";
		$where = "id_org = '{$id_org}'";
		return $this->db->select($what,$from,$where);
	}

	public function agregaIntegrante($orgSign,$nombres,$apellido_p,$apellido_m,$cargo,$img_url){
		$id_org = $this->getOrgID($orgSign);
		$into = "integrantes";
		$fields = "id_org,nombres,apellido_p,apellido_m,cargo,img_url";
		$values = "{$id_org},'{$nombres}','{$apellido_p}', '{$apellido_m}','{$cargo}','{$img_url}'";
		return $this->db->insert($into,$fields,$values);
	}

	public function eliminaIntegrante($id_int){
		$from = "integrantes";
		$where = "id_int = '{$id_int}'";
		return $this->db->delete($from,$where);
	}

	public function actualizaIntegrante($nombres,$apellido_p,$apellido_m,$cargo,$img_url,$id_int){
		$from = "integrantes";
		$values = "nombres = '{$nombres}', apellido_p = '{$apellido_p}', apellido_m = '{$apellido_m}', cargo = '{$cargo}', img_url = '{$img_url}'";
		$where = "id_int = '{$id_int}'";
		return $this->db->update($from,$values,$where);
	}

	public function getDBError(){
		return $this->db->getError();
	}


	//ORGANIZACIONES
	public function getOrgInfo($orgSign){
		$id_org = $this->getOrgID($orgSign);
		$what = "*";
		$from = "organizacion";
		$where = "id_org = '{$id_org}'";
		return $this->db->select($what,$from,$where)->fetch_assoc();
	}

	public function getOrgChilds($orgSign){
		$id_org = $this->getOrgID($orgSign);
		$what = "*";
		$from = "organizacion";
		$where = "id_org_padre = '{$id_org}'";
		return $this->db->select($what,$from,$where);
	}



}

?>