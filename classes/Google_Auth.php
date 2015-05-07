<?php

class Google_Auth
{
	protected $client;
	protected $db;

	public function __construct(Database $db = null, Google_Client $googleClient = null)
	{
		$this->client = $googleClient;
		$this->db = $db;
		if($this->client)
		{
			$this->client->setClientId('835887866066-fu7u5crj9gtpk5d7doe785qqlpnob0ob.apps.googleusercontent.com');
			$this->client->setClientSecret('ghQd-jZS6UdTQE1qnWKufgUF');
			$this->client->setRedirectUri('http://localhost/feitesm-website/index.php');
			$this->client->setScopes('email');
			//if already logged in
			if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {
				$this->client->setAccessToken($_SESSION['access_token']);
			}
		}
	}

	public function isLoggedIn()
	{
		return true;
		//return isset($_SESSION['access_token']);
	}

	public function getAuthUrl()
	{
		return $this->client->createAuthUrl();
	}

	public function checkRedirectCode()
	{
		if(isset($_GET['code']))
		{
			$this->client->authenticate($_GET['code']);

			$this->setToken($this->client->getAccessToken()); // we set the token
			$this->login($this->getPayLoad()); // we try to login on system
			return true;
		}
		return false;
	}

	protected function setToken($token)
	{
		$this->client->setAccessToken($token); 
	}

	

	protected function getPayLoad()
	{
		$payLoad = $this->client->verifyIdToken()->getAttributes()['payload'];
		return $payLoad;
	}

	protected function storeUser($payLoad)
	{
		$sql = "
			INSERT INTO google_users (google_id, email)
			VALUES ({$payLoad['sub']}, '{$payLoad['email']}')
			ON DUPLICATE KEY UPDATE id = id
		";
		$this->db->query($sql);
	}

	protected function login($payLoad)
	{
		$sql = "
			SELECT *
			FROM google_users
			WHERE google_id = '{$payLoad['sub']}' AND email = '{$payLoad['email']}'
		";
		if($this->db->checkIfNotEmpty($sql)){
			//Usuario registrado
			$userData = $this->db->getFirstRow($sql);
			//añadimos actividad del usuario
			$this->addActivity($userData['id'],$this->client->getAccessToken());
			$_SESSION['access_token'] = $this->client->getAccessToken();
			$_SESSION['id'] = $userData['id'];
			return true;
		}
		else{
			//Usuario no registrado o malas credenciales
			// No hacemos nada y sera como si no iniciamos sesion
			return false;
		}
	}

	public function logout()
	{
		$sql = "
				DELETE FROM sessions
				WHERE id = '{$_SESSION['id']}'
			";
		$this->db->query($sql);
		unset($_SESSION['access_token']);
		unset($_SESSION['id']);
	}

	protected function addActivity($id, $access_token){
		$sql = "
				INSERT INTO sessions (id,access_token)
				VALUES ('{$id}','{$access_token}')
				ON DUPLICATE KEY UPDATE id = id
			";
		$this->db->query($sql);
	}
}
