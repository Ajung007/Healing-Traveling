<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $data = Transaction::with(['details','travel_packages','users'])->findOrFail($id);

        return view('pages.checkout',[
            'data' => $data
        ]);
    }

    public function proses(Request $request, $id)
    {
        $travel = TravelPackage::findOrFail($id);

        $transaksi = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel->price,
            'transaction_status' => 'IN CART',
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaksi->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYear(5)
        ]);

        return redirect()->route('checkout', $transaksi->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
        
        $transaction = Transaction::with(['details','travel_packages'])->findOrFail($item->transactions_id);
        if($item->is_visa)
        {
            $transaction->transaction_total -= 190; //ditambahkan += 190 sama dengan menambahkan 190
            $transaction->additional_visa -= 190;
        }
        $transaction->transaction_total -= $transaction->travel_packages->price; //
        $transaction->save();


        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }   

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required' 
        ]);

        $data = $request->all();
        $data['trasanction_id'] = $id;
        TransactionDetail::create($data);


        // digunakan untuk menyimpan data pada DB Transaction
        $transaction = Transaction::with(['travel_packages'])->find($id);
        if($request->is_visa)
        {
            $transaction->transaction_total += 190; //ditambahkan += 190 sama dengan menambahkan 190
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_packages->price; //

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = "PENDING";
        $transaction->save();

        return view('pages.success');
    }

}
