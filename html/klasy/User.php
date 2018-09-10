<?php

class User
{
	public $id;
    public $username;
    public $password;
	public $admin_flag;

    public function __construct($dane)
    {
		$this-> id = $dane['id'];
		$this-> username = $dane['username'];
		$this-> password = $dane['password'];
		$this-> admin_flag = $dane['admin_flag'];
    }

    public static function pobierz_user()
    {
		$wyniki= array();
		$conn=new PDO("sqlite:baza.db");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql='SELECT * FROM USER';
		$st=$conn->prepare($sql);
		$st->execute();
		while($row=$st->fetch(PDO::FETCH_ASSOC))
		{
			$obiekt = new User($row);
			array_push($wyniki, $obiekt);
		}
		$conn=null;
		return $wyniki;
    }
	
	
}

?>
