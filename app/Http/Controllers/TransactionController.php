<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        $item = TravelPackage::all();

        return view('pages.admin.transaction.create', ['items' => $item]);
    }

    public function store(transactionRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/transaction','public');

        transaction::create($data);
        return redirect()->route('travel-transaction.index');
    }

    public function edit($id)
    {
        $item = transaction::findOrFail($id);
        $data = TravelPackage::all();
        
        return view('pages.admin.transaction.edit', ['data' => $data, 'item' => $item]);
    }

    public function update(transactionRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('asset/transaction','public');

        $item = transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('travel-transaction.index');
    }

    public function delete($id)
    {
        $data = transaction::findOrFail($id);
        $data->delete();

        return redirect()->route('travel-transaction.index');
    }
}
