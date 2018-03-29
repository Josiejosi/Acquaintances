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

	public static function GetStats( $table_data ) {

        $data_dates  				= [] ;
        $min 						= 0 ;
        $max 						= 0 ;
        $avg 						= 0 ;

        foreach ( $table_data as $data ) {

        	$processing_date = $data->created_at->toDateString()  ;

            if ( isset( $processing_date ) ) {

                if ( array_key_exists( $processing_date, $data_dates ) ) {

                    $data_dates[$processing_date ][ "data_count" ] = $data_dates[ $processing_date ][ "data_count" ] + 1;
                } else {

                    $data_dates[ $processing_date ] = [ "data_count" => 1, ];
                }
            }
        }

        $count_sum 					= 0;
        $daily_data 				= [];

        krsort( $data_dates, SORT_DESC );


        if ( count( $data_dates ) > 0 ) {

            $i 						= 0;

            foreach ( $data_dates as $dates => $data_count ) {

                if ( isset( $data_count[ "data_count" ] ) ) {

                    $daily_data[$i] = $data_count[ "data_count" ] ;
                    $count_sum 	+= $data_count[ "data_count" ] ;

                    $i++;
                }
            }

            $min 					= min( $daily_data ) ;
            $max 					= max( $daily_data ) ;
            $avg 					= round( $count_sum / $i, 2 ) ;
        }

        return [

        	"data_dates" 			=> $data_dates,
        	"min" 					=> $min,
        	"max" 					=> $max,
        	"avg" 					=> $avg,

        ] ;

	}

}