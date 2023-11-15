<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $data = TravelPackage::with(['galleries'])->where('slug', $slug)->first();

        
        return view('pages.detail',
        ['data' => $data]
        );
    }
}
