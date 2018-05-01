<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\Marketindex;
use App\User;
use DataTables;
use Auth;

class CompanyController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }

      public function index()
      {
          $marketindex=Marketindex::all();
          return view('dashboard.admin.company',compact('marketindex'));
      }

      public function getcompany()
      {
          $company = Company::all();
          $no = 0;
          $data = array();
          foreach ($company as $cabang) {
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $cabang->id;
            $row[] = $cabang->symbol.$cabang->marketindex->symbol;
            $row[] = $cabang->name;
            $row[] = $cabang->address.' '.$cabang->district.' '.$cabang->province.
            '<br>'.$cabang->state.'-'.$cabang->poscode;
            $row[] = "<a href='$cabang->weburl' target='_blank'>".$cabang->weburl."</a>";
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

      public function companystore(Request $request)
      {
          $pesan = [
                    'required' => 'Kolom ini, harus diisi.',
                    'unique' => 'Perusahaan ini, sudah ada.'
                  ];
          $this->validate($request, [
            'name' => [
                'required',
            ],
          ],$pesan);
          Company::create($request->all()+ ['user_id' => Auth::user()->id]);
          flash()->success('Success', 'Data Perusahaan Baru Sudah Di Input');
          return redirect('/admin/company');
      }

      public function companyedit($id)
      {
          $company=Company::find($id);
          echo json_encode($company);
      }

      public function companyupdate(Request $request, $id)
      {
          $pesan = [
                    'required' => 'Kolom ini, harus diisi.',
                    'unique' => 'company ini, sudah ada.'
                  ];
          $this->validate($request, [
            'name' => [
                'required',
            ],
          ],$pesan);
          Company::find($id)->update($request->all()+ ['user_id' => Auth::user()->id]);
          flash()->success('Success', 'Perusahaan Sudah Di Update');
          return redirect('/admin/company');
      }

      public function companydelete($id)
      {
          Company::destroy($id);
          return redirect('company');
      }

}
