<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class appController extends Controller
{
    
    public function tambah_data(Request $req) {

        $tanggal = date('d-m-Y');
        $konfrimasi = (int)$req->konfirmasi;
        $meninggal = (int)$req->meninggal;
        $sembuh = (int)$req->sembuh;
        $response = Http::post('http://localhost:9200/covid/_doc', [
            'country_code' => 'id',
            'country' => 'indonesia',
            'total_confirmed' => $konfrimasi,
            'total_deaths' => $meninggal,
            'total_recovered' => $sembuh,
            'last_updated' => $tanggal,
        ])->json();

        session()->put('tambah','data');
        return redirect ('/home');

    }

    public function home () {
        $data = Http::get('http://localhost:9200/covid/_search?size=10000')->json();
        $a = $data['hits']['hits'];

        $data_1 = Http::get('http://localhost:9200/covid/_search?size=10000')->json();
        $i = $data_1['hits']['hits'];
        $x = end($i);

        return view ('home', ['data' => $a], ['data1' => $x]);
    }

    public function hapus ($id) {
        
        Http::delete('http://localhost:9200/covid/_doc/' . $id);
        session()->put('hapus','data');
        return redirect ('/home');
    }
}
