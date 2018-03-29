<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User ;
use App\Models\Video ;
use App\Models\Category ;

use App\Builder\Helper ;

use PDF ;

class ReportsController extends Controller {

    public function __construct()  { $this->middleware('auth') ; }

    public function users_in_system() {

    	return view( 'reports.users_in_system', 
    		Helper::PageGenerator( 
	    		'Users in the system', 
	    		Helper::GetStats( User::get() ) 
    		)  
    	) ;
    }
    
    public function videos_per_user() {
    	return view( 'reports.videos_per_user', 
    		Helper::PageGenerator(
    			'Videos per user',
    			[
    				'users' => User::get(),
    				'video' => new Video,
    			]  
    		)  
    	) ;
    }
    
    public function videos_in_system() {
    	return view( 'reports.videos_in_system', 
    		Helper::PageGenerator(
    			'Videos in system',
    			Helper::GetStats( Video::get() )
    		)  
    	) ;
    }

    public function registration_period() {
    	return view( 'reports.registration_period', 
    		Helper::PageGenerator(
    			'Registration period', 
    			[ 
    				"users" => User::get(), 
    			] 
    		)  
    	) ;
    }

    public function pdf_users_in_system() {

		$pdf 						= PDF::loadView( 
			'reports.pdf.users_in_system', 
			Helper::PageGenerator( 
	    		'Users in the system', 
	    		Helper::GetStats( User::get() ) 
    		)   
		) ;

		return $pdf->stream( 'users_in_system.pdf' ) ;

    }
    
    public function pdf_videos_per_user() {
    	$pdf 						= PDF::loadView( 
    		'reports.pdf.videos_per_user', 
    		Helper::PageGenerator(
    			'Videos per user',
    			[
    				'users' => User::get(),
    				'video' => new Video,
    			]  
    		)  
    	) ;

    	return $pdf->stream( 'videos_per_user.pdf' ) ;
    }
    
    public function pdf_videos_in_system() {

    	$pdf 						= PDF::loadView( 
    		'reports.pdf.videos_in_system', 
    		Helper::PageGenerator(
    			'Videos in system',
    			Helper::GetStats( Video::get() )
    		)  
    	) ;

    	return $pdf->stream( 'videos_in_system.pdf' ) ;
    }

    public function pdf_registration_period() {
    	$pdf 						= PDF::loadView( 'reports.pdf.registration_period', 
    		Helper::PageGenerator(
    			'Registration period', 
    			[ 
    				"users" => User::get(), 
    			] 
    		)  
    	) ;

    	return $pdf->stream( 'registration_period.pdf' ) ;
    }
}
