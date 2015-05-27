<?php namespace App\Http\Controllers;

use Request;
use DB;
use App\User;
use App\Blog;
use redirect;
use Input;
use Hash;
use Session;

class BlogController extends Controller {


	public function getIndex() {
		$blogs = Blog::orderBy('id', 'DESC')->get();
	    $blogOutput = "";
	    $headerInfo = array();
	    if(Session::get('user')){
		$headerInfo['link1'] = '/logout';
		$headerInfo['title1'] = 'Log Out';
		$headerInfo['link2'] = '/newPost';
		$headerInfo['title2'] = 'New Post';
	    } else {
		$headerInfo['link1'] = '/signup';
		$headerInfo['title1'] = 'Sign Up';
		$headerInfo['link2'] = '/login';
		$headerInfo['title2'] = 'Log In';
	    }
	    
		return view('index')->with('blogs', $blogs)->with('headerInfo', $headerInfo);//->with('blogOutput', $blogOutput);
	    
	}
	
        public function getSignup($error = '') {
		return view('signup')->with('error', $error);
	}
        public function getLogin($error = '') {
		return view('login')->with('error', $error);
	}
        public function getNewPost($error = '') {
		$canCreatePost = true;
		return view('newPost')->with('error', $error);
	}
	public function getLogout() {
		Session::forget('user');
		return redirect('/');
	}
	
        
        public function postSignup(){
            $firstName = Request::input('firstName');
            $lastName = Request::input('lastName');
            $username = Request::input('username');
            $email = Request::input('email');
            $password = Request::input('password');
            $verifyPassword = Request::input('verifyPassword');
	    $error = array();
            if(!$firstName || !$lastName || !$username || !$email || !$password || !$verifyPassword){
                $error['all'] = "Must fill all fields";
            }
	    
	    if($firstName && !preg_match("/^[a-zA-Z -]*$/", $firstName)){
		$error['firstName']= 'Invalid input';
	    }
	    if($lastName && !preg_match("/^[a-zA-Z -]*$/", $lastName)){
		$error['lastName']= 'Invalid input';
	    }
	    if($email && !filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error['email']= 'Invalid email address';
	    }
	    if($username && strlen($username) < 6){
		$error['username']= 'Username must be at least 6 characters long';
	    }
	    if($password && (strlen($password) < 6 || !preg_match("/[0-9]+/", $password) || !preg_match("/[A-Z]+/", $password))){
		$error['password']= 'Password must be at least 6 characters long and contain one capital letter and number';
	    }
	    else if($password && $verifyPassword && $password !== $verifyPassword){
		$error['verifyPassword'] = 'Passwords must match';
	    }
	    
            if(!$error){
            $user = new User;
	    $user->firstName= $firstName;
	    $user->lastName= $lastName;
	    $user->email= $email;
	    $user->username= $username;
	    $user->password= Hash::make($password);
	    
            $user->push();
	    Session::put('user', $user);
            return redirect('/');
            }
	    else{
		return view ('signup')->with('error', $error);
	    }
        }
	
        public function postLogin(){
            $username = Request::input('username');
            $password = Request::input('password');
            
            if(!$username || !$password){
                $error = "Must fill all fields";
                return view('login')->with('error', $error);
            } else{
		$userArray = DB::table('users')->where('username', $username)->get();
		if(!$userArray){
		return view('login')->with('error', 'User does not exist');
		}
		else{
			$user = $userArray[0];
			$dbpassword = $user->password;
			if(!Hash::check($password, $dbpassword)){
				return view('login')->with('error', "Username and password do not match");
			}else{
				Session::put('user', $user);
				return redirect('/');
			}
		}
	    }
        }
	
        public function postNewPost(){
	    $image = Request::input('image');
            $title = Request::input('title');
            $body = Request::input('body');
            
	    if(!Session::get('user')){
		return redirect('/login');
	    }else{
            if(!$image || !$title || !$body){
                $error = "Must fill all fields";
                return view('newPost')->with('error', $error);
            }else{
		$imgExts = array("gif", "jpg", "jpeg", "png", "tiff", "tif");
		$urlExt = pathinfo($image, PATHINFO_EXTENSION);
		if (!in_array($urlExt, $imgExts)){
			return view('newPost')->with('error', "Invalid image link");
		}else{
		$blog = new Blog;
		$blog->image = $image;
		$blog->title=$title;
		$blog->body=$body;
		$blog->user=Session::get('user')->username;
		
		$blog->push();
		return redirect('/');
	    }
	    }
	    }
        }
}