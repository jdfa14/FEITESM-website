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
		}
	}

	public function isLoggedIn()
	{
		return isset($_SESSION['access_token']);
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
			$this->setToken($this->client->getAccessToken());
			$this->storeUser($this->getPayLoad());

			return true;
		}
		return false;
	}

	protected function setToken($token)
	{
		$_SESSION['access_token'] = $token;
		$this->client->setAccessToken($token); 

	}

	public function logout()
	{
		unset($_SESSION['access_token']);
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
}
