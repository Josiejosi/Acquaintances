<?php

namespace App\Builder ;

use App\Models\Category ;

class Helper {

	public static function PageGenerator( $title = "Unknown", $bulder=[] ) {
		$data 						= [] ;

		$name 						= "Unknown" ;
		$subscribers 				= 0 ;

		if ( auth()->check() ) {
			$name 					=  auth()->user()->name . " " . auth()->user()->surname ;
		}

		$data 						= [
			'name'					=> $name,
			'bulder'				=> $bulder,
			'subscribers'			=> $subscribers,
			'title'					=> $title,
			'categories' 			=> Category::orderBy('name', 'Asc')->get(),
		] ;

		return $data ;
	}

}