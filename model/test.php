<?php
class Foo {
	public $att1;
	public function get($attribut) {

		//var_dump(get_object_vars($this));
		if (in_array($attribut, get_object_vars($this)))
		{	
			$att1 = "gg";
			echo "Oui";
			$ret = $this->$attribut;
			return $ret;
		} else {
			echo "zbeub";
		}
	}

}

$f = new Foo();
$f->get($att1);

?>