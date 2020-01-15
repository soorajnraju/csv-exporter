<?php
/**
* Author: Sooraj N Raju
*/
class CSV_Exporter{
	
	protected $file_name = null;
	protected $data = null;
	protected $file_url = null;
	
	function __construct($file_name, $data){
		$this->file_name = $file_name;
		$this->data = $data;
		
		$this->generate();
	}
	
	function generate(){
		$filename = $this->file_name.".csv";
		$fp = fopen('php://output', 'w');
		
		foreach($this->data as $dk=>$dv){
			if($dk==0){
				header('Content-type: application/csv');
				header('Content-Disposition: attachment; filename='.$filename);
				fputcsv($fp, $dv);
				continue;
			}
			fputcsv($fp, $dv);
		}
		
		die();
	}
}

/*
Eg:

$data[] = ['Name', 'Age'];
$data[] = ['Sooraj', 26];
$data[] = ['Raju', 58];
$data[] = ['Susamma', 58];
$csv = new CSV_Exporter('sample', $data);
*/