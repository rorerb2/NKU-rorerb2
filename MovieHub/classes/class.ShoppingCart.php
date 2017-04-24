<?php class ShoppingCart implements iterator{
	protected $items = array();
	
	public function rewind() {
        reset($this->items);
    }

    public function current() {
        $var = current($this ->items);
		return $var;
    }

    public function key() {
        $var = key($this->items);
		return $var;
    }

    public function next() {
        $var = next($this->items);
		return $var;
    }

    public function valid() {
        $key = key($this->items);
		$var = ($key !== NULL && $key !== FALSE);
		return $var;
	}

	
	function addtoCart($movie_title, $genre){
		$this->items[$movie_title] = $genre;
		
		
		
	}
}
?>