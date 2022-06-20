<?php
	class Item 
	{
		private $id;
		private $name;
		private $price;
		private $image;
		
		public function __construct( $id , $name , $price , $image)
		{
			$this ->set_id($id);
			$this ->set_name($name);
			$this ->set_price($price);
			$this ->set_image($image);
		}
		
		public function set_id($id) { $this->id = $id; }
		public function get_id() { return $this->id; }
		
		public function set_name($name) { $this->name = $name; }
		public function get_name() { return $this->name; }
		
		public function set_price($price) { $this->price = $price; }
		public function get_price() { return $this->price; }
		
		public function set_image($image) { $this->image = $image; }
		public function get_image() { return $this->image; }
	}
	
	
	
	class ProductItem
	{
		private $item;
		private $quantity;
		public function __construct($myItem, $myQuantity)
		{
			$this->item = $myItem;
			//echo $this->item->get_image()."<br>";
			$this->set_quantity($myQuantity);
		}

		
		public function set_item_id($id) { $this->item->set_id($id); }
		public function set_item_name($name) { $this->item->set_name($name); }
		public function set_item_Price($price) { $this->item->set_price($price); }
		public function set_item_image($image) { $this->item->set_image($image); }
		public function get_item() { return $this->item; }
		
		public function set_quantity($myQuantity) { $this->quantity= $myQuantity; }
		public function get_quantity( ) { return $this->quantity; }
	}
	
	
	
	
	class ProductList																				
	{
		private $products = array();
		
		public function __construct( )
		{
			
		}
		public function addItem($pitem)
		{
			
			$updated = False;
			
			foreach ($this->products as &$pr)
				if( $pr->get_item()->get_id()  == $pitem->get_item()->get_id() )
				{
					$pr ->set_quantity($pr ->get_quantity() + $pitem ->get_quantity() );
					$updated = True;
					break;
				}
			
			if( !$updated )
				array_push( $this->products, $pitem);
		}
		
		public function get_products()
		{
			return $this->products;
		}
		
		public function remove_item($item_id)
		{
			$i = 0;
			while(true)
			{
				if( isset($this->products[$i]) )
				if ( $this->products[$i]->get_item()->get_id() == $item_id)
				{
					unset($this->products[$i]);
					break;
				}
				$i++;
			}
			
			
		}
		public function increase_quantity($item_id)
		{
			
			
			foreach ($this->products as &$pr)
			if ( $pr->get_item()->get_id() == $item_id)
			{
				$qq = $pr ->get_quantity();
				$n = $qq + 1;
				$pr ->set_quantity($n);
				break;
			}
			
		}
		
		public function decrease_quantity($item_id)
		{
			
			
			foreach ($this->products as &$pr)
			if ( $pr->get_item()->get_id() == $item_id)
			{
				$qq = $pr ->get_quantity();
				$n = $qq;
				if( $qq > 1 )
				$n = $qq - 1;
				// echo "Old quantity  ".$qq."<br>";
				// echo "New quantity  ".$n."<br>";
				$pr ->set_quantity($n);
				break;
			}
			
		}
	}
    ?>