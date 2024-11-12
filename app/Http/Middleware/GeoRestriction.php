<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GeoRestriction
{
    public function handle($request, Closure $next)
    {
        $allowedCountry = 'JP'; // Only allow access from Japan

        // Log the incoming IP for clarity
        $ip = $request->ip();
        \Log::info("Client IP: {$ip}");

        // Step 1: Check if the user's country code is already stored in the session
        if (!$request->session()->has('user_country_code')) {

            // Step 2: VPN and Proxy Detection
            $vpnResponse = Http::get("https://proxycheck.io/v2/{$ip}?key=316k7g-7087g6-715p8h-532658&vpn=1");
            \Log::info('VPN Detection Response', $vpnResponse->json());

            if ($vpnResponse->successful()) {
                $vpnData = $vpnResponse->json("{$ip}");
                
                // Check if the IP is flagged as a proxy/VPN
                if (isset($vpnData['proxy']) && $vpnData['proxy'] === "yes") {
                    \Log::info("Blocked: Proxy or VPN detected for IP: {$ip}");

                    // Log out the user if authenticated
                    if (Auth::check()) {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                    }

                    return response()->view('errors.vpn_block', [], 403);
                }
            } else {
                \Log::info("ProxyCheck API request failed for IP: {$ip}");
            }

            // Step 3: Geo-location Lookup
            $geoResponse = Http::get("http://ip-api.com/json/{$ip}");
            \Log::info('Geo-Location Response', $geoResponse->json());

            if ($geoResponse->successful() && $geoResponse->json('status') === 'success') {
                $countryCode = $geoResponse->json('countryCode');
                \Log::info("Country Code Detected: {$countryCode}");
                
                // Store country code in session
                $request->session()->put('user_country_code', $countryCode);
            } else {
                return response()->view('errors.geo_restricted', [], 403);
            }
        }

        // Step 4: Retrieve and Enforce Geo-restriction based on Country Code
        $countryCode = $request->session()->get('user_country_code');
        if ($countryCode !== $allowedCountry) {
            \Log::info("Access Restricted: Country Code {$countryCode} does not match allowed country {$allowedCountry}");
            
            // Log out the user if authenticated
            if (Auth::check()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return response()->view('errors.geo_restricted', [], 403);
        }

        return $next($request);
    }
}

    
