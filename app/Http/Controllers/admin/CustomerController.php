<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        // $id=2;
        // $res = User::where('id', $id);
        $res = User::whereNotIn('id', [1])->get();
        return view('admin/v_customer', [
            'page_title'    => 'Customer',
            'page_header'   => 'Customer',
            'res'           => $res,
            'user'          => Invoice::orderBy('id', 'asc')->get()
        ]);
    }

    public function create(Request $request) {
        $title = "Customer";
        $page_title="Tambah Customer";
        return view('admin/v_form_customer', [
            'page_title'    => $page_title,
            'page_header'   => $title,
        ]);
    }

    public function detil(Request $request, $id) {
        $keyword = $request->keyword;
        $res = User::findOrFail($id);
        $invoice = Invoice::where('user_id', $id)->get();
        // ini kalo pake pencarian
        // $invoice = Invoice::Where('invoice_number', 'LIKE', '%'.$keyword.'%')
        // ->get();
        // dd($invoice);


        return view('admin/v_customer_order', [
            'page_title'    => 'Detil Customer',
            'page_header'   => 'Detil Customer',
            'res'           => $res,
            'invoice'       => $invoice,
            'keyword'       => $keyword
        ]);
    }

    public function insert(Request $request) {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "perusahaan_name" => $request->perusahaan_name,
            "alamat" => $request->alamat,
            "password" => bcrypt($request->password),
            "email_verified_at" =>now(),
        ];

        User::create($data);
        return redirect("admin/customer")->with('success','Data berhasil disimpan');
    }

    public function edit($id) {
        $res = User::findOrFail($id);
        $title = "Customer";
        $page_title="Edit Customer";
        return view ('admin.v_form_edit_customer', [
            'page_title'    => $page_title,
            'page_header'   => $title,
            'res'           => $res,
        ]);
    }

    public function update(Request $request, $id) {
        $id = $request->id;
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "perusahaan_name" => $request->perusahaan_name,
            "alamat" => $request->alamat,
            // "password" => bcrypt($request->password),
            "email_verified_at" =>now(),
            
        ];

        User::where("id", $id)->update($data);
        return redirect("admin/customer")->with('success','Data berhasil diupdate');
        
    }

    public function delete($id) {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect("admin/customer")->with('success','Data berhasil dihapus');
    }

}
