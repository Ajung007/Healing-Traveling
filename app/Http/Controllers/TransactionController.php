<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function index()
    {
        $item = Transaction::with(['details','travel_packages','users'])->get();

        // dd($item);

        return view('pages.admin.transaction.index', ['items' => $item]);
    }

    public function show($id)
    {
        $item = transaction::with(['details','travel_packages','users'])->findOrFail($id);
        $data = Transaction::all();
        
        return view('pages.admin.transaction.detail', ['data' => $data, 'item' => $item]);
    }

    public function edit($id)
    {
        $item = transaction::findOrFail($id);
        $data = Transaction::all();
        
        return view('pages.admin.transaction.edit', ['data' => $data, 'item' => $item]);
    }

    public function update(TransactionRequest $request,$id)
    {
        $data = $request->all();
       
        $item = transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('trans.index');
    }

    public function delete($id)
    {
        $data = transaction::findOrFail($id);
        $data->delete();

        return redirect()->route('trans.index');
    }
}
