<?php
	// Buat class koneksi
	class database 
	{
		// Property
		public $hostname 	= "localhost"; 
		public $username 	= "hendraws";
		public $password 	= "hendraws";
		public $database 	= "freelance_martabak";
		// public $hostname 	= "localhost"; 
		// public $username 	= "u741451673_martabak";
		// public $password 	= "Indonesia12!";
		// public $database 	= "u741451673_martabak";

		protected $koneksi;
		
		// Method
		public function __construct()
		{
			if (!isset($this->koneksi)) {
				$this->koneksi = new mysqli($this->hostname, $this->username, $this->password, $this->database);
				if (!$this->koneksi) {
					echo 'Tidak terhubung';
					exit;
				}
			}
			return $this->koneksi;
		}
	}
?>