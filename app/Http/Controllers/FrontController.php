<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User ;
use App\Models\Video ;
use App\Builder\Helper ;

use Auth ;

use Socialite;

class FrontController extends Controller
{
    public function index() {
    	return view( 'welcome', Helper::PageGenerator( 'Home', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }

    public function verification() {
    	return view( 'auth.verification', Helper::PageGenerator( 'Verification' )  ) ;
    }

    public function blocked() {
    	return view( 'home.blocked', Helper::PageGenerator( 'Blocked Account' ) ) ;
    }

    public function redirectToProvider() {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback() {

        $user = Socialite::driver('github')->user();

		if ( User::where( 'email', $user->getEmail() )->count() > 0 ) {
			if ( Auth::loginUsingId( ( User::where( 'email', $user->getEmail() )->first() )->id ) ) {
				return redirect('/home') ;
			}
		} else {
	        $user                   = User::create([

	            'name'              => $user->getName(),
	            'surname'           => "",
	            'email'             => $user->getEmail(),
	            'username'          => $user->getNickname(),
	            'password'          => bcrypt( $user->getNickname() ),
	            'is_active'         => 1,
	            'is_admin'          => 0,

	        ]) ;

			if ( Auth::loginUsingId( $user->id ) ) {
				return redirect('/home') ;
			}

		}


    }

}
