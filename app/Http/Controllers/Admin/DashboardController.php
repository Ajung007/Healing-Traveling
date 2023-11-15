<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $travel_packegs = TravelPackage::count();
        $transaksi = Transaction::count();
        $pending = Transaction::where('transaction_status','=','PENDING')->count();
        $sukses = Transaction::where('transaction_status','=','SUCCESS')->count();
        
        return view('pages.admin.dashboard',
        [
            'travel' => $travel_packegs, 
            'transaksi'=> $transaksi,
            'pending' =>$pending,
            'sukses' => $sukses
        ]);
    }
}
