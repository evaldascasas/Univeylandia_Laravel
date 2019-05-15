<?php

namespace App\Http\Middleware;

use Closure;
use File;

class Installed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $file = storage_path('installed');

        $file_exists = File::exists($file);

        if (!$file_exists) {
            return redirect('/install');
        }

        return $next($request);
    }
}
