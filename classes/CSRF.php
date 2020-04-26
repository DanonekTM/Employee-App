<?php
class CSRF
{
	public function GenerateToken()
	{
		$token = hash('sha256', $this->RandomGen(500));
		$_SESSION['token'] = $token;
		return $token;
	}
	
	public function Check($token)
	{
		if (isset($_SESSION['token']) && $token === $_SESSION['token'])
		{
			return true;
		}
		return false;
	}
	
	private function RandomGen($len)
	{
		if (function_exists('mcrypt_create_iv')) 
		{
			return bin2hex(mcrypt_create_iv($len, MCRYPT_DEV_URANDOM));
		} 
		else 
		{
			return bin2hex(openssl_random_pseudo_bytes($len));
		}
	}
	
}