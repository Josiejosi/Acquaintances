<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video ;
use App\Builder\Helper ;

class FrontController extends Controller
{
    public function index() {
    	return view( 'welcome', Helper::PageGenerator('Home', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }
}
