<?php

class Sett
{
	public $id_;
	public $user_id;
	public $date_;
	public $name1;
	public $description;
	

    public function __construct($dane)
    {
		$this-> id_ = $dane['id_'];
		$this-> user_id = $dane['user_id'];
		$this-> date_ = $dane['date_'];
		$this-> name1 = $dane['name1'];
		$this-> description = $dane['description'];
    }

    public static function pobierz_id_()
    {
		$wyniki= array();
		$conn=new PDO('sqlite:baza.db');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql='SELECT * FROM SETT';
		$st=$conn->prepare($sql);
		$st->execute();
		while($row=$st->fetch(PDO::FETCH_ASSOC))
		{
			$obiekt = new Sett($row);
			array_push($wyniki, $obiekt);
		}
		$conn=null;
		return $wyniki;
    }

}

?>
