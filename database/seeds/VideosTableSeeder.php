<?php

use Illuminate\Database\Seeder;

use App\Models\User ;
use App\Models\Video ;

use App\Models\Category ;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_users 										= User::count() ;

        $categories 										= [ "PHP", "CSharp", "CSS", "JavaScript", "Java", "HTML" ] ;

        $videos 											= [ 

        	"PHP" 											=> [

	        	"https://www.youtube.com/embed/ZdP0KM49IVk" => "Learn PHP in 15 minutes",
				"https://www.youtube.com/embed/7TF00hJI78Y" => "Learn PHP in 30 minutes",
				"https://www.youtube.com/embed/-oUXcTz1eEA" => "What is PHP",
				"https://www.youtube.com/embed/PemsuAfc7Jw" => "How PHP works",
				"https://www.youtube.com/embed/KL7_wZSTY6Y" => "Intro To PHP",

			],


        	"CSharp" 										=> [

				"https://www.youtube.com/embed/pSiIHe2uZ2w" => "How to program in C# - BASICS - Beginner Tutorial",
				"https://www.youtube.com/embed/tcmmCcMs8yU" => "Create Login Window in C# step by step",
				"https://www.youtube.com/embed/YWA-xbsJrVg" => "How to Make a Website in 10 mins - Simple & Easy",
				"https://www.youtube.com/embed/udoMi4mGYYw" => "How to program in C# - VARIABLES - Beginner Tutorial",

        	],

        	"CSS" 											=> [

				"https://www.youtube.com/embed/0afZj1G0BIE" => "Learn CSS in 12 Minutes",
				"https://www.youtube.com/embed/wrdR5Su_Stg" => "The absolute basics of HTML, CSS and JavaScript",
				"https://www.youtube.com/embed/HgwCeNVPlo0" => "How to Create Website Layouts Using CSS Grid | Learn HTML and CSS | HTML Tutorial",
				"https://www.youtube.com/embed/2AO4EWWw0gM" => "CSS Grid or Bootstrap 4 in 2018?",
				"https://www.youtube.com/embed/hs3piaN4b5I" => "Flexbox vs. CSS Grid — Which is Better?",

        	],

        	"JavaScript" 									=> [

				"https://www.youtube.com/embed/Ukg_U3CnJWI" => "Learn JavaScript in 12 Minutes",
				"https://www.youtube.com/embed/zPHerhks2Vg" => "JavaScript in Half an Hour (Without jQuery!)",
				"https://www.youtube.com/embed/6MaOPdQPvow" => "10 Things To Master For JavaScript Beginners",
				"https://www.youtube.com/embed/2MYBP-ZD1tk" => "10 Things a Serious JavaScript Developer Should Know?",
				"https://www.youtube.com/embed/OIioG0cx0Wo" => "Top 10 Things to Master for Advanced JavaScript",

        	],

        	"Java" 											=> [

				"https://www.youtube.com/embed/nH9AhuxUWMM" => "Should you learn Java in 2018",
				"https://www.youtube.com/embed/gmjnAQZb1nQ" => "Will Kotlin replace Java? | Is Java Dead?",
				"https://www.youtube.com/embed/LEi1ecigDFE" => "10 reasons to try Kotlin for Android development",

        	],

        	"HTML" 											=> [

				"https://www.youtube.com/embed/Pq08fNMOn7s" => "Your First HTML File",
				"https://www.youtube.com/embed/bWPMSSsVdPk" => "HTML is 12 Minutes",
				"https://www.youtube.com/embed/bWPMSSsVdPk" => "HTML Tutorial for Beginners - Learn HTML in 30 Minutes",
				"https://www.youtube.com/embed/hrZqiCUx6kg" => "Coding HTML for absolute beginners",
				"https://www.youtube.com/embed/dD2EISBDjWM" => "Introduction to HTML",

        	],	
        ] ;

        $categories_object 								= [] ;

        $category_id 									= "" ;

        $video_object 									= [] ;

        for ( $i = 0 ; $i < count( $categories ) ; $i++ ) { 

	        if ( Category::where( 'name', $categories[ $i ] )->count() > 0 ) {

	        	$categories_object[ $categories[ $i ] ]	= ( Category::where( 'name', $categories[ $i ] )->first() )->id ;

	        	$category_id 							= ( Category::where( 'name', $categories[ $i ] )->first() )->id ;

	        } else {

	        	$new_category 		  					= Category::create([
	        		'name' 								=> $categories[ $i ], 
	        		'description' 						=> $categories[ $i ] . " as a stream category.", 
	        	]) ;

	        	$categories_object[ $categories[ $i ] ] = $new_category->id ;

	        	$category_id 							= $new_category->id  ;

	        }

	        foreach( $videos[ $categories[ $i ] ] as $key => $value ) {

	        	if ( Video::where( 'name', $value )->count() == 0 ) {

	        		$user_id 								= rand( 1, $count_users ) ;

	        		if ( $user_id == 4 ) {
	        			$user_id += 1 ;
	        		}

		        	Video::create([

			        	'name' 								=> $value, 
			        	'description' 						=> $value, 
			        	'category_id' 						=> $category_id, 
			        	'video_url' 						=> $key, 
			        	'user_id' 							=> $user_id, 
			        	'is_file_video' 					=> 0, 
			        	'video_length' 						=> "10:25",

		        	]) ;

	        	}

	        }
        }

        \Log::info( $video_object ) ;
        \Log::info( "Populate Script Complete..." ) ;

    }
}
