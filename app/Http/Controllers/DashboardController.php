<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role === 'Administrator') {
            $weather = null;
            $weatherError = null;

            try {
                $apiKey = config('services.openweather.key');
                $city = config('services.openweather.city');

                if (empty($apiKey)) {
                    throw new \RuntimeException(
                        'Weather API key is not configured.'
                    );
                }

                $response = Http::timeout(8)->get(
                    'https://api.openweathermap.org/data/2.5/weather',
                    [
                        'q' => $city,
                        'appid' => $apiKey,
                        'units' => 'metric',
                    ]
                );

                $response->throw();

                $data = $response->json();

                $weather = [
                    'city' => $data['name'] ?? $city,
                    'temperature' => $data['main']['temp'] ?? null,
                    'condition' => $data['weather'][0]['description'] ?? 'Unavailable',
                    'humidity' => $data['main']['humidity'] ?? null,
                    'wind_speed' => $data['wind']['speed'] ?? null,
                ];

            } catch (Throwable $e) {
                Log::warning(
                    'Weather API request failed: ' . $e->getMessage()
                );

                $weatherError = 'Weather information is currently unavailable. Please try again later.';
            }

            return view('dashboard.administrator', compact(
                'weather',
                'weatherError'
            ));
        }

        switch ($role) {
            case 'Manager':
                return view('dashboard.manager');

            case 'Resort Staff':
                return view('dashboard.resort-staff');

            case 'Customer/Guest':
                return view('dashboard.customer');

            default:
                abort(403, 'Invalid user role.');
        }
    }
}