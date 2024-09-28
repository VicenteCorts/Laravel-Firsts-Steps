<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestYear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $year = $request->route('year'); //Aquí puede ser route, input, Auth:: y muchos más en funcion del resultado que busquemos
        
        if(is_null($year) || $year != 2019){
            return redirect('/peliculas');
        }
        return $next($request);
    }
}
