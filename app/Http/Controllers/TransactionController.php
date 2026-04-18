<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
   public function index() {
    $transactions = Transaction::with('item')->get();
    return view('transactions.index', compact('transactions'));
}

public function create() {
    $items = Item::all();
    return view('transactions.create', compact('items'));
}

public function store(Request $request) {
    $request->validate([
        'item_id'=>'required',
        'type'=>'required',
        'quantity'=>'required|integer',
        'date'=>'required|date'
    ]);
    $transaction = Transaction::create($request->all());

    // update stock otomatis
    $item = $transaction->item;
    if($transaction->type=='masuk' || $transaction->type=='kembali') {
        $item->stock += $transaction->quantity;
    } elseif($transaction->type=='keluar') {
        $item->stock -= $transaction->quantity;
    }
    $item->save();

    return redirect()->route('transactions.index')->with('success','Transaksi berhasil ditambahkan');
}
}
