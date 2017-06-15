<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminAuthenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) { 
	    $user = $this->auth->user();
	    Log::info(var_export($user, true));
	    if(isset($user)) {
	        $faculty = DB::table('faculty')->select('*')->join('users', 'faculty.email', '=', 'users.email')->where('users.id', $user->id)->first();
	        Log::info(var_export($faculty, true));
	        if($faculty->is_admin) {
	            return $next($request);
	        } else {
	            return redirect ('/');
	        }
	    } else {
	        return redirect ('/login');
	    }
	}
}