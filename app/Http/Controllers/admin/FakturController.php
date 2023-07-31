<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FakturController extends Controller
{
    public function index(Request $request) {
        $res = Invoice::get();
        return view('admin/v_faktur', [
            'page_title'    => 'Faktur',
            'page_header'   => 'Faktur',
            'res'           =>$res,
            'user'          => User::orderBy('id', 'asc')->get(),
        ]);
    }

    public function create() {
        $res = User::whereNotIn('id', [1])->get();
        $title = "Faktur";
        $page_title="Tambah Faktur";
        return view('admin.v_form_faktur', [
            'page_title'    => $page_title,
            'page_header'   => $title,
            'user'         => $res,
        ]);
    }

    public function insert(Request $request) {
        $this->validate($request,[
            'jumlah' => 'required|numeric',
         ]);
        
        $data = [

            "code" => $request->code,
            "invoice_number" => $request->invoice_number,
            "transaction_name" => $request->transaction_name,
            "satuan" => $request->satuan,
            "jumlah" => $request->jumlah,
            "harga" => $request->harga,
            "total_harga" => $request->jumlah * $request->harga,
            "user_id" => $request->user_id,
            
        ];

        Invoice::create($data);
        return redirect("admin/faktur")->with('success','Data berhasil disimpan');
    }

    public function edit($id) {
        $res = Invoice::findOrFail($id);
        $user = User::whereNotIn('id', [1])->get();
        $title = "Faktur";
        $page_title="Edit Faktur";
        return view ('admin.v_form_edit_faktur', [
            'page_title'    => $page_title,
            'page_header'   => $title,
            'res'           => $res,
            'user'          => $user,
        ]);
    }

    public function update(Request $request, $id) {
        $id = $request->id;
        $data = [
            "code" => $request->code,
            "invoice_number" => $request->invoice_number,
            "transaction_name" => $request->transaction_name,
            "satuan" => $request->satuan,
            "jumlah" => $request->jumlah,
            "harga" => $request->harga,
            "total_harga" => $request->jumlah * $request->harga,
            "user_id" => $request->user_id,
            
        ];

        Invoice::where("id", $id)->update($data);
        return redirect("admin/faktur")->with('success','Data berhasil diupdate');
        
    }

    public function delete($id) {
        $data = Invoice::findOrFail($id);
        $data->delete();
        return redirect("admin/faktur")->with('success','Data berhasil dihapus');
    }

    

    
}
