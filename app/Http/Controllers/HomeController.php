<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlphaVantage\Api;
use App\Company;
use App\Marketindex;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function marketindexbulk()
    {
        $idx = Api::stock()->daily('AALI.JK', $params = ['outputsize=compact']);
        //dd($idx);
        // foreach($idx["Time Series (Daily)"] as $key=>$value) {
        //   $datastock[] =[
        //     'tanggal' => $key,
        //     'open' => $value["1. open"],
        //     'high' => $value["2. high"],
        //     'low' => $value["3. low"],
        //     'close' => $value["4. close"],
        //     'volume' => $value["5. volume"],
        //   ];
        // }
        $tanggal = "2018-04-16";
          $datastock[] =[
            'tanggal' => $tanggal,
            'open' => $idx["Time Series (Daily)"][$tanggal]["1. open"],
            'high' => $idx["Time Series (Daily)"][$tanggal]["2. high"],
            'low' => $idx["Time Series (Daily)"][$tanggal]["3. low"],
            'close' => $idx["Time Series (Daily)"][$tanggal]["4. close"],
            'volume' => $idx["Time Series (Daily)"][$tanggal]["5. volume"],
          ];
        dd(json_encode($datastock));
        return view('home');
    }

    public function marketindex()
    {
        $symbol = "AALI.JK";
        $tanggal = "2018-04-16";
        //dd($symbol->symbol);
        //$datastock[] =['symbol' => $kode->symbol];
        //dd($kode->symbol.$kode->marketindex->symbol);
        $idx = Api::stock()->daily($symbol, $params = ['outputsize=compact']);
                $datastock=[
                      'tanggal' => $tanggal,
                      'open' => $idx["Time Series (Daily)"][$tanggal]["1. open"],
                      'high' => $idx["Time Series (Daily)"][$tanggal]["2. high"],
                      'low' => $idx["Time Series (Daily)"][$tanggal]["3. low"],
                      'close' => $idx["Time Series (Daily)"][$tanggal]["4. close"],
                      'volume' => $idx["Time Series (Daily)"][$tanggal]["5. volume"],
                    ];
          dd($datastock);
          return view('home');
    }
}
