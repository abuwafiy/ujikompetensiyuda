<?php
class Page{

	
	public function __construct(){

	}

	public function display_views($views){
		
		require_once('app/views/'.$views.'.php');
	}

	function include_all_php($folder){
	    foreach (glob("{$folder}/*.php") as $filename)
	    {
	        include $filename;
	    }
	}


}