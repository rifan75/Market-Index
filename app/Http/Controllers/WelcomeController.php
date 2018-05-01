<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlphaVantage\Api;
use App\Company;
use App\Marketindex;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function getmarketindex()
    {
        $idx = Api::stock()->daily("^JKSE", $params = ['outputsize=compact']);
        $nya = Api::stock()->daily("^NYA", $params = ['outputsize=compact']);
        $sti = Api::stock()->daily("^STI", $params = ['outputsize=compact']);
        $hsi = Api::stock()->daily("^HSI", $params = ['outputsize=compact']);
        $asx = Api::stock()->daily("^AORD", $params = ['outputsize=compact']);

        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $dataidx[] = ['tanggal' => $key];
        }
        foreach ($nya["Time Series (Daily)"] as $key => $tanggal) {
            $datanya[] = ['tanggal' => $key];
        }
        foreach ($sti["Time Series (Daily)"] as $key => $tanggal) {
            $datasti[] = ['tanggal' => $key];
        }
        foreach ($hsi["Time Series (Daily)"] as $key => $tanggal) {
            $datahsi[] = ['tanggal' => $key];
        }
        foreach ($asx["Time Series (Daily)"] as $key => $tanggal) {
            $dataasx[] = ['tanggal' => $key];
        }

        $tanggalidx0 = $dataidx[0]['tanggal'];
        $tanggalidx1 = $dataidx[1]['tanggal'];
        $tanggalnya0 = $datanya[0]['tanggal'];
        $tanggalnya1 = $datanya[1]['tanggal'];
        $tanggalsti0 = $datasti[0]['tanggal'];
        $tanggalsti1 = $datasti[1]['tanggal'];
        $tanggalhsi0 = $datahsi[0]['tanggal'];
        $tanggalhsi1 = $datahsi[1]['tanggal'];
        $tanggalasx0 = $dataasx[0]['tanggal'];
        $tanggalasx1 = $dataasx[1]['tanggal'];

        $datastock=[
              'tanggalidx0' => $tanggalidx0,
              'closeidx0' => $idx["Time Series (Daily)"][$tanggalidx0]["4. close"],
              'volumeidx0' => $idx["Time Series (Daily)"][$tanggalidx0]["5. volume"],
              'tanggalidx1' => $tanggalidx1,
              'closeidx1' => $idx["Time Series (Daily)"][$tanggalidx1]["4. close"],
              'volumeidx1' => $idx["Time Series (Daily)"][$tanggalidx1]["5. volume"],
              'tanggalnya0' => $tanggalnya0,
              'closenya0' => $nya["Time Series (Daily)"][$tanggalnya0]["4. close"],
              'volumenya0' => $nya["Time Series (Daily)"][$tanggalnya0]["5. volume"],
              'tanggalnya1' => $tanggalnya1,
              'closenya1' => $nya["Time Series (Daily)"][$tanggalnya1]["4. close"],
              'volumenya1' => $nya["Time Series (Daily)"][$tanggalnya1]["5. volume"],
              'tanggalsti0' => $tanggalsti0,
              'closesti0' => $sti["Time Series (Daily)"][$tanggalsti0]["4. close"],
              'volumesti0' => $sti["Time Series (Daily)"][$tanggalsti0]["5. volume"],
              'tanggalsti1' => $tanggalsti1,
              'closesti1' => $sti["Time Series (Daily)"][$tanggalsti1]["4. close"],
              'volumesti1' => $sti["Time Series (Daily)"][$tanggalsti1]["5. volume"],
              'tanggalhsi0' => $tanggalhsi0,
              'closehsi0' => $hsi["Time Series (Daily)"][$tanggalhsi0]["4. close"],
              'volumehsi0' => $hsi["Time Series (Daily)"][$tanggalhsi0]["5. volume"],
              'tanggalhsi1' => $tanggalhsi1,
              'closehsi1' => $hsi["Time Series (Daily)"][$tanggalhsi1]["4. close"],
              'volumehsi1' => $hsi["Time Series (Daily)"][$tanggalhsi1]["5. volume"],
              'tanggalasx0' => $tanggalasx0,
              'closeasx0' => $asx["Time Series (Daily)"][$tanggalasx0]["4. close"],
              'volumeasx0' => $asx["Time Series (Daily)"][$tanggalasx0]["5. volume"],
              'tanggalasx1' => $tanggalasx1,
              'closeasx1' => $asx["Time Series (Daily)"][$tanggalasx1]["4. close"],
              'volumeasx1' => $asx["Time Series (Daily)"][$tanggalasx1]["5. volume"],
            ];
          return $datastock;
    }

    public function getmarketindexstockidx()
    {

        $idx = Api::stock()->daily("^JKSE", $params = ['outputsize=compact']);
        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $data[] = [
                  'tanggal' => $key,
                  'open' => $idx["Time Series (Daily)"][$key]["1. open"],
                  'high' => $idx["Time Series (Daily)"][$key]["2. high"],
                  'low' => $idx["Time Series (Daily)"][$key]["3. low"],
                  'close' => $idx["Time Series (Daily)"][$key]["4. close"],
                  'volume' => $idx["Time Series (Daily)"][$key]["5. volume"],
                ];
        }

          return $data;
    }


    public function getmarketindexstocknyse()
    {

        $idx = Api::stock()->daily("^NYA", $params = ['outputsize=compact']);
        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $data[] = [
                  'tanggal' => $key,
                  'open' => $idx["Time Series (Daily)"][$key]["1. open"],
                  'high' => $idx["Time Series (Daily)"][$key]["2. high"],
                  'low' => $idx["Time Series (Daily)"][$key]["3. low"],
                  'close' => $idx["Time Series (Daily)"][$key]["4. close"],
                  'volume' => $idx["Time Series (Daily)"][$key]["5. volume"],
                ];
        }

          return $data;
    }


    public function getmarketindexstocksti()
    {

        $idx = Api::stock()->daily("^STI", $params = ['outputsize=compact']);
        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $data[] = [
                  'tanggal' => $key,
                  'open' => $idx["Time Series (Daily)"][$key]["1. open"],
                  'high' => $idx["Time Series (Daily)"][$key]["2. high"],
                  'low' => $idx["Time Series (Daily)"][$key]["3. low"],
                  'close' => $idx["Time Series (Daily)"][$key]["4. close"],
                  'volume' => $idx["Time Series (Daily)"][$key]["5. volume"],
                ];
        }

          return $data;
    }


    public function getmarketindexstockhsi()
    {

        $idx = Api::stock()->daily("^HSI", $params = ['outputsize=compact']);
        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $data[] = [
                  'tanggal' => $key,
                  'open' => $idx["Time Series (Daily)"][$key]["1. open"],
                  'high' => $idx["Time Series (Daily)"][$key]["2. high"],
                  'low' => $idx["Time Series (Daily)"][$key]["3. low"],
                  'close' => $idx["Time Series (Daily)"][$key]["4. close"],
                  'volume' => $idx["Time Series (Daily)"][$key]["5. volume"],
                ];
        }

          return $data;
    }


    public function getmarketindexstockasx()
    {

        $idx = Api::stock()->daily("^AORD", $params = ['outputsize=compact']);
        foreach ($idx["Time Series (Daily)"] as $key => $tanggal) {
            $data[] = [
                  'tanggal' => $key,
                  'open' => $idx["Time Series (Daily)"][$key]["1. open"],
                  'high' => $idx["Time Series (Daily)"][$key]["2. high"],
                  'low' => $idx["Time Series (Daily)"][$key]["3. low"],
                  'close' => $idx["Time Series (Daily)"][$key]["4. close"],
                  'volume' => $idx["Time Series (Daily)"][$key]["5. volume"],
                ];
        }

          return $data;
    }

}
