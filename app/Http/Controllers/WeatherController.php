<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
 $apiKey = '6b5aec848bbde3c9b6fc1bc78aef6558

'; 
        $city = 'Cesis,LV';
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=Cesis,LV&appid=6b5aec848bbde3c9b6fc1bc78aef6558&units=metric";

        try {
            $response = Http::get($apiUrl);
            if ($response->successful()) {
                $data = $response->json();
                $temperature = $data['main']['temp'];
                $weather = "Tempretūra  Cēsīs: {$temperature}°C";
            } else {
                $weather = 'Unable to fetch weather data';
            }
        } catch (\Exception $e) {
            $weather = 'Unable to fetch weather data';
        }

        return view('index', compact('weather'));
    }
}
