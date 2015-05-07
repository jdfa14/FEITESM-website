<?php
class Resources_Manager
{
	protected $db;
	public function __construct(Database $db = null){
		$this->db = $db;
	}

	public function getOrgID($orgName)
	{
		$what = "id_org";
		$from = "organizacion";
		$where = "nombre = '{$orgName}'";
		return $this->db->select($what,$from,$where)->fetch_assoc()["id_org"];
	}

	public function getTabsInfo($orgName)
	{
		$id_org = $this->getOrgID($orgName);
		$what = "*";
		$from = "informacion";
		$where = "id_org = '{$id_org}'";
		return $this->db->select($what,$from,$where);
	}

	public function addTab($orgName)
	{
		$id_org = $this->getOrgID($orgName);
		$into = "informacion";
		$fields = "id_org";
		$values = "'{$id_org}'";
		return $this->db->insert($into,$fields,$values);
	}

	public function removeTab($id_tab)
	{
		$from = "informacion";
		$where = "id_inf = '{$id_tab}'";
		return $this->db->delete($from,$where);
	}

	public function getNextTabID(){
		$what = "AUTO_INCREMENT";
		$from = "INFORMATION_SCHEMA.TABLES";
		$where = "TABLE_SCHEMA = 'feitesm-website-db'
			AND   TABLE_NAME   = 'informacion'";
		return $this->db->select($what,$from,$where)->fetch_assoc()["AUTO_INCREMENT"];
	}

	public function getNextID($table){
		$what = "AUTO_INCREMENT";
		$from = "INFORMATION_SCHEMA.TABLES";
		$where = "TABLE_SCHEMA = 'feitesm-website-db'
			AND   TABLE_NAME   = '{$table}'";
		return $this->db->select($what,$from,$where)->fetch_assoc()["AUTO_INCREMENT"];
	}

	public function getStaffInfo($orgName)
	{
		$id_org = $this->getOrgID($orgName);
		$what = "*";
		$from = "integrantes";
		$where = "id_org = '{$id_org}'";
		return $this->db->select($what,$from,$where);
	}

	public function agregaIntegrante($orgName,$nombres,$apellido_p,$apellido_m,$cargo,$img_url){
		$id_org = $this->getOrgID($orgName);
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

	public function actualizaIntegrante($orgName,$nombres,$apellido_p,$apellido_m,$cargo,$img_url,$id_int){
		$id_org = $this->getOrgID($orgName);
		$from = "integrantes";
		$values = "id_org = {$id_org}, nombres = '{$nombres}', apellido_p = '{$apellido_p}', apellido_m = '{$apellido_m}', cargo = '{$cargo}', img_url = '{$img_url}'";
		$where = "id_int = '{$id_int}'";
		return $this->db->update($from,$values,$where);
	}
}

?>