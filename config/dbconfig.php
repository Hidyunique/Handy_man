<?php
	
	/**
	 * dbase connection class
	 */
	class dbConnect 
	{
		protected $host = "localhost";
		protected $user = "root";
		protected $pword= "";
		protected $dbase= "handyman";
		public    $connectionString;

		public function __construct()
		{
			 $this->connectionString = mysqli_connect($this->host, $this->user, $this->pword, $this->dbase);
			 if($this->connectionString){

			 	return "connection suceeded";die;
			 }
			 else{
				return "Connection failed";#. mysqli_error($this->connectionString);
			}

		}
	}


?>