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

class UploadController extends Controller
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

     public function upload()
     {
          $marketindex = Marketindex::all();
          return view('dashboard.admin.uploadstockdata',compact('marketindex'));
     }

     public function uploademiten()
     {
          $marketindex = Marketindex::all();
          return view('dashboard.admin.uploadlapkeu',compact('marketindex'));
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
          $headers = fgetcsv($handle, ',');
          //dd($headers);
          $complete = array();
          while ($row = fgetcsv($handle, ',')) {
              $complete[] = array_combine($headers, $row);
          }
          fclose($handle);
          $json = json_encode($complete);
          //dd($json);

          if ($request->statement=="geninf"){
              $stat = [
                'company_id' => $request->company_id,
                'period' => $request->period.'-'.$request->tahun,
                'geninf' => $json,
                'user_id' => Auth::user()->id
              ];
              Geninf::create($stat);
          }elseif($request->statement=="finpos"){
            $stat = [
              'company_id' => $request->company_id,
              'period' => $request->period.'-'.$request->tahun,
              'finpos' => $json,
              'user_id' => Auth::user()->id
            ];
            //dd($stat);
            Finpos::create($stat);
          }elseif($request->statement=="statproloss"){
            $stat = [
              'company_id' => $request->company_id,
              'period' => $request->period.'-'.$request->tahun,
              'statproloss' => $json,
              'user_id' => Auth::user()->id
            ];
            Statproloss::create($stat);
          }elseif($request->statement=="equitypos"){
            $stat = [
              'company_id' => $request->company_id,
              'period' => $request->period.'-'.$request->tahun,
              'equitypos' => $json,
              'user_id' => Auth::user()->id
            ];
            Equitypos::create($stat);
          }elseif($request->statement=="cashflow"){
            $stat = [
              'company_id' => $request->company_id,
              'period' => $request->period.'-'.$request->tahun,
              'cashflow' => $json,
              'user_id' => Auth::user()->id
            ];
            Cashflow::create($stat);
          }

	      flash()->success('Success', 'Csv sudah di input');
        return redirect('admin/upload');
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
