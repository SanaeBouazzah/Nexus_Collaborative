<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get the visitor's IP address
        $ipAddress = $request->ip();

        // Check if the IP address is already in the database
        $visitor = Visitor::where('ip_address', $ipAddress)
            ->whereDate('visited_at', today()) // Optional: track visits per day
            ->first();

        // If not, create a new visitor record
        if (!$visitor) {
            Visitor::create([
                'ip_address' => $ipAddress,
            ]);
        }

        return $next($request);
    }
}
