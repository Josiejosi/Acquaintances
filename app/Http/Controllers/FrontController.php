<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video ;
use App\Builder\Helper ;

use Socialite;

class FrontController extends Controller
{
    public function index() {
    	return view( 'welcome', Helper::PageGenerator('Home', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }

    public function redirectToProvider() {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback() {

        $user = Socialite::driver('github')->user();

        dump( $user->getId() ) ;
		dump( $user->getNickname() ) ;
		dump( $user->getName() ) ;
		dump( $user->getEmail() ) ;
    }

}
