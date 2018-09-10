<?php

class Varr
{
	public $id;
	public $setting_id;
	public $set_id;
	public $value;

    public function __construct($dane)
    {
		$this-> id = $dane['id'];
		$this-> setting_id = $dane['setting_id'];
		$this-> set_id = $dane['set_id'];
		$this-> value = $dane['value'];
    }

    public static function pobierz_var()
    {
		$wyniki= array();
		$conn=new PDO('sqlite:baza.db');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql='SELECT * FROM SETTING_VALUE';
		$st=$conn->prepare($sql);
		$st->execute();
		while($row=$st->fetch(PDO::FETCH_ASSOC))
		{
			$obiekt = new Varr($row);
			array_push($wyniki, $obiekt);
		}
		$conn=null;
		return $wyniki;
    }

}

?>
