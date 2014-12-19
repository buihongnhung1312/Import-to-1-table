<?php

	include 'Dataprovider.php';
	// namespace
	class Data {
		// Define variables
		private $file;
		// Methods
		public function __construct()
		{
			
		}
		public function __destruct()
  		{
  		    
  		}
		public function import($filename)
		{
			$time = microtime(true);
			$sql = '
  			LOAD DATA LOCAL INFILE "assets/'.$filename.'.csv"
  			REPLACE INTO TABLE  `product`
  			FIELDS TERMINATED BY "," 
  			LINES TERMINATED BY "\\r\\n"
  			ignore 1 lines
  			(id, 
			manufacturer_id, 
			tax_category_id, 
			shipping_category_id, 
			name, 
			slug, 
			short_description, 
			description, 
			@available_on, 
			@created_at, 
			@updated_at, 
			@deleted_at, 
			variant_selection_method)
			set
			available_on = str_to_date(@available_on, "%m/%d/%Y %H:%i"),
			created_at = str_to_date(@created_at, "%m/%d/%Y %H:%i"),
			updated_at = str_to_date(@updated_at, "%m/%d/%Y %H:%i"),
			deleted_at = str_to_date(@deleted_at, "%m/%d/%Y %H:%i")
  			;';
  			// echo $sql;
  			Dataprovider::ExecuteQuery($sql);
  			$timeEnd = microtime(true);
  			return $timeEnd - $time;	

  	// 					manufacturer_id, 
			// tax_category_id, 
			// shipping_category_id, 
			// name, 
			// slug, 
			// short_description, 
		}

		public function export($filename)
		{
			// $this -> file = fopen('C:/xampp/htdocs/PractisePHP01/assets/'.$filename.'.csv','w');
			// $sql = "select * from sanpham";
			// $result = Dataprovider::ExecuteQuery($sql);
			// $arrayresult[] = array('masanpham', 'tensanpham');
			// while($arrayfile = mysql_fetch_assoc($result))
			// {
			// 	$arrayresult[] = array_values($arrayfile);
			// }
			// foreach ($arrayresult as $key) {
			// 	fputcsv($this -> file, $key);
			// }
			// fclose($this -> file);
		}
	}
