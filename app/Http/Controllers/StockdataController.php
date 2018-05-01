<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlphaVantage\Api;
use App\Company;
use App\Marketindex;
use App\Cashflow;
use App\Equitypos;
use App\Finpos;
use App\Geninf;
use Auth;

class StockdataController extends Controller
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
          $lapkeu = Geninf::all()->first();
          $geninf = $lapkeu->geninf;
          //dd($geninf);
          $json = json_decode($geninf, true);
          return view('dashboard.stockdata',compact('json'));
     }
     public function statfinpos()
     {
          $lapkeu = Finpos::all()->first();
          $finpos = $lapkeu->finpos;
          //dd($finpos);
          $json = json_decode($finpos, true);
          $count = $json[1]['Goodwill']*2;
          dd($count);
          return view('dashboard.stockdatafinpos',compact('json'));
     }

     public function lapkeu()
     {
          $lapkeu = Geninf::all();
          // //dd($lapkeu);
          // $geninf = $lapkeu->geninf;
          // $json = json_decode($geninf, true);
          //dd($json);
          // dd($json[0]['Sektor']);
          return view('dashboard.stockdata',compact('lapkeu'));
     }

     public function getDaftarStock($id)
     {
     	    $city = Company::where('id_marketindex', $id)->get();
         	return $city;
     }

    public function uploadstatstore(Request $request)
    {
          if (($handle = fopen($request->file('filecsv'), 'r')) === false) {
            die('Error opening file');
          }
          $headers = fgetcsv($handle, 2048, ',');
          $complete = array();
          while ($row = fgetcsv($handle, 2048, ',')) {
              $complete[] = array_combine($headers, $row);
          }
          fclose($handle);
          $json = json_encode($complete);

          $stat = [
            'company_id' => $request->company_id,
            'period' => $request->period.'-'.$request->tahun,
            'geninf' => $json,
            'user_id' => Auth::user()->id
          ];
        //  dd($stat);
          Geninf::create($stat);
	      flash()->success('Success', 'Barang sudah di Tambah');
        return redirect('upload');
    }

    public function stockdata()
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
          return $datastock;
    }
}
