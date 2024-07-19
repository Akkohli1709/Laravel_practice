<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\UniqueConstraintViolationException;

class UserHandleException
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "<h2>We are in middleware</h2>";
        try{
            //  dd($request->all());
            return $next($request); 
        }catch(UniqueConstraintViolationException $e){
            dd(get_class($e));
            return redirect()->back()->withErrors('User Already exist');
        }catch(\Exception $exception){
            dd(get_class($exception));
            return redirect()->back()->withErrors('Error Occurred');
        }   
        // return $next($request);
        
    }
}
