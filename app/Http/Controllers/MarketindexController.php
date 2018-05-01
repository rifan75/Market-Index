<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Marketindex;
use App\User;
use DataTables;
use Auth;

class MarketindexController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }

      public function index()
      {
          return view('dashboard.admin.marketindex');
      }

      public function getmarketindex()
      {
          $marketindex = Marketindex::all();
          $no = 0;
          $data = array();
          foreach ($marketindex as $cabang) {
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $cabang->id;
            $row[] = $cabang->index_symbol;
            $row[] = $cabang->index_name;
            $row[] = $cabang->address.' '.$cabang->district.' '.$cabang->province.
            '<br>'.$cabang->state.'-'.$cabang->poscode;
            $row[] = $cabang->weburl;
            $row[] = $cabang->user->name;
            $row[] = $cabang->note;
            $row[] = "<a href='#' onclick='editForm(".$cabang->id.")'><i class='fa fa-pencil-square-o' title='edit'></i></a>
                        &nbsp;
                      <a href='#' onclick='deleteForm(".$cabang->id.")' type='submit'><i class='fa fa-trash' title='hapus'></i></a>";
            $row[] = $cabang->symbol;
            $data[] = $row;
          }

          return DataTables::of($data)->escapeColumns([])->make(true);
      }

      public function marketindexstore(Request $request)
      {
          $pesan = [
                    'required' => 'Kolom ini, harus diisi.',
                    'unique' => 'marketindex ini, sudah ada.'
                  ];
          $this->validate($request, [
            'index_name' => [
                'required',
            ],
          ],$pesan);
          marketindex::create($request->all()+ ['user_id' => Auth::user()->id]);
          flash()->success('Success', 'Index Bursa Baru Sudah Di Input');
          return redirect('/admin/marketindex');
      }

      public function marketindexedit($id)
      {
          $marketindex=Marketindex::find($id);
          echo json_encode($marketindex);
      }

      public function marketindexupdate(Request $request, $id)
      {
          $pesan = [
                    'required' => 'Kolom ini, harus diisi.',
                    'unique' => 'marketindex ini, sudah ada.'
                  ];
          $this->validate($request, [
            'index_name' => [
                'required',
            ],
          ],$pesan);
          Marketindex::find($id)->update($request->all()+ ['user_id' => Auth::user()->id]);
          flash()->success('Success', 'Market Index Sudah Di Update');
          return redirect('/admin/marketindex');
      }

      public function marketindexdelete($id)
      {
          marketindex::destroy($id);
          return redirect('/admin/marketindex');
      }

}
