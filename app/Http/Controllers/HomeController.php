<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User ;
use App\Models\Video ;
use App\Models\Category ;
use App\Builder\Helper ;

class HomeController extends Controller
{

    public function __construct()  { 

        $this->middleware('auth') ; 

    }

    public function index() {
        return view( 'home.index', Helper::PageGenerator('Home', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }

    public function history() {
        return view( 'home.index', Helper::PageGenerator('History', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }

    public function trending() {
        return view( 'home.index', Helper::PageGenerator('Trending', Video::orderBy( 'id', 'Desc' )->get() )  ) ;
    }

    public function video_by_category( $category ) {

        $category_id = ( Category::whereName($category)->first() )->id ;

        return view( 
            'home.video_by_category', 
            Helper::PageGenerator( 'Video by category', Video::where( 'category_id', $category_id )->orderBy( 'id', 'Desc' )->get() )  
        ) ;
    }

    public function upload() {
        return view( 'home.upload', Helper::PageGenerator('Upload new video')  ) ;
    }

    public function profile() {
        return view( 'home.profile', Helper::PageGenerator('profile')  ) ;
    }

    public function watch($id) {
        return view( 'home.watch', Helper::PageGenerator( 'Watch Video', Video::find( $id ) )  ) ;
    }

    public function category() {
        return view( 'home.category', Helper::PageGenerator( 'Page title') ) ;
    }

    public function delete_category($id) {

        $category           = Category::find($id) ;

        if ( count($category) > 0 ) {


            if ( Video::where( 'category_id', $id )->count() > 0 ) {
                foreach( Video::where( 'category_id', $id )->get() as $video ) {
                    $video->delete() ;
                }
            }

            $category->delete() ;
            flash( 'Category removed, with associated channel topics.' ) ;

        } else {
            flash( 'Failed to remove category.' ) ;
        }

        return redirect()->back() ;
    }

    public function delete_user($id) {
        $user           = User::find($id) ;
        $user->delete() ;
        flash( 'User removed' ) ;
        return redirect()->back() ;
    }

    public function block_user($id) {
        $user           = User::find($id) ;

        $user->update(['is_active'=>0]) ;

        flash( 'account in-active' ) ;
        return redirect()->back() ;
    }

    public function post_category( Request $request ) {

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create([

            'name'          => $request->name ,
            'description'   => $request->description ,

        ]) ;

        flash('New category added') ;

        return redirect()->back() ;
    }

    public function post_profile( Request $request ) {

        User::find(auth()->user()->id)->update([

            'name'          => $request->name ,
            'surname'       => $request->surname ,

        ]) ;

        flash('Profile successfully updated') ;

        return redirect()->back() ;
    }

    public function user() {
        return view( 'home.users', Helper::PageGenerator('Admin Users', User::where('is_admin',1)->get()) ) ;
    }

    public function block() {
        return view( 'home.block', Helper::PageGenerator('Block users', User::where('is_admin',0)->get()) ) ;
    }

    public function post_user( Request $request ) {

        $this->validate($request,[
            'name'              => 'required|string|max:255',
            'surname'           => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'username'          => 'required|max:255|unique:users',
            'password'          => 'required|string|min:6|confirmed',
        ]);

        $user                   = User::create([

            'name'              => $request->name,
            'surname'           => $request->surname,
            'email'             => $request->email,
            'username'          => $request->email,
            'password'          => bcrypt( $request->password ),
            'is_active'         => 1,
            'is_admin'          => 1,

        ]) ;

        flash('New admin added') ;

        return redirect()->back() ;

    }

    public function video_upload( Request $request ) {

        if ( $request->is_file_video == 1 ) {
            $video              = Video::create([
                'name'          => $request->title, 
                'description'   => $request->description, 
                'category_id'   => $request->category, 
                'is_file_video' => $request->is_file_video, 
                'video_url'     => $request->video_file, 
                'video_length'  => $request->video_length, 
                'user_id'       => auth()->user()->id,
            ]) ;
        } else {
            if( $request->hasFile('video_file') ) {

                
                $file               = $request->file('video_file');
                $file->move( 'videos', $file->getClientOriginalName() ) ;

                $video              = Video::create([
                    'name'          => $request->title, 
                    'description'   => $request->description, 
                    'category_id'   => $request->category, 
                    'is_file_video' => $request->is_file_video, 
                    'video_url'     => 'videos/' . $file->getClientOriginalName(), 
                    'video_length'  => $request->video_length, 
                    'user_id'       => auth()->user()->id,
                ]) ;

            }            
        }

        flash('New video channel added.') ;

        return redirect()->back() ;
    }
}
