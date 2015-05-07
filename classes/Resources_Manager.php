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
}

?>