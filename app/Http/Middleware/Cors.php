<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd('hi');
        // return $next($request)
        // ->header('Access-Control-Allow-Origin: *')
        // ->header('Access-Control-Allow-Methods: *')
        // ->header('Access-Control-Allow-Headers: *');
        $response = $next($request);

        $headers = json_encode($response->headers->all());
        // Log the CORS headers
        Log::info('CORS Headers: ' . $headers);

        // // Ensure the response is an instance of Illuminate\Http\Response
        // if (!($response instanceof Response)) {
        //     $response = new Response($response);
        // }

        // $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Requested-With');
        // $response->header('Access-Control-Allow-Credentials', 'true');
        return $response;
    }
}
