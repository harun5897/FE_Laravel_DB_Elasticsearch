<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class crawlingController extends Controller
{   
    public function crawling_view () {
        $data = Http::get('http://localhost:9200/covid/_search?size=10000')->json();
        
        return view ('crawling', ['data' => $data['hits']['hits']]);
    }
    public function get (Request $req) {

        $data = Http::get('http://api.coronatracker.com/v5/analytics/trend/country?startDate=2020-03-01&endDate=2020-12-31&countryCode=' . $req->code)->json();

        foreach ($data as $item) :
            $response = Http::post('http://localhost:9200/covid/_doc', [
                'country_code' => $item['country_code'],
                'country' => $item['country'],
                'total_confirmed' => $item['total_confirmed'],
                'total_deaths' => $item['total_deaths'],
                'total_recovered' => $item['total_deaths'],
                'last_updated' => $item['last_updated'],
            ])->json();
        endforeach;
        return redirect ('/crawling');
    }

}
