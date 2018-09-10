<?php

class Setting
{
	public $id;
	public $name2;
	public $is_active;

    public function __construct($dane)
    {
		$this-> id = $dane['id'];
		$this-> name2 = $dane['name2'];
		$this-> is_active = $dane['is_active'];
    }

    public static function pobierz_id()
    {
		$wyniki= array();
		$conn=new PDO('sqlite:baza.db');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql='SELECT * FROM SETTING';
		$st=$conn->prepare($sql);
		$st->execute();
		while($row=$st->fetch(PDO::FETCH_ASSOC))
		{
			$obiekt = new Setting($row);
			array_push($wyniki, $obiekt);
		}
		$conn=null;
		return $wyniki;
    }

}

?>
