<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
        return view('dashboard.index');
    }

    public function uploadstockdata()
    {

            return view('dashboard.upload');
    }


    public function uploadstockdatastore()
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
            return view('dashboard.upload');
    }


}
