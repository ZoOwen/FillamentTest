<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\transaction;
use App\Models\detail_transaction;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $product = Product::all();
        return view('Home.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }


    public function storeTransaction(Request $request)
{

    // Validasi request jika diperlukan

    // Mendapatkan ID kasir yang terotentikasi
    $cashierId = auth()->id();
    $notaId =  $this->generateNotaId();
    // Membuat transaksi baru dan menyimpannya
    $transaction = new Transaction([
        'cashier_id' => $cashierId,
        'nota_id' =>   $notaId,
        'total_price' => $request->input('totalAmountInput'),
        'total_paid' => 200000,
        'return' =>"0",
    ]);

    $transaction->save();

    // Mendapatkan ID transaksi yang baru saja disimpan
    $transactionId = $transaction->id;

    // Mendapatkan data produk dari request
    $products = json_decode($request->input('products'), true);

    // Menyimpan detail transaksi
    foreach ($products as $product) {
        $transaction->detailTransactions()->create([
            'product_id' => $product['product_id'],
            'qty' => $product['qty'],
            'total_price' => $product['total_price'] * $product['qty'],
        ]);
    }

    // Memberikan respons atau melakukan pengalihan yang diperlukan
    return redirect()->route('home')->with('success', 'Transaksi berhasil');

}
function generateNotaId() {
    $date = Carbon::now();
    $formattedDate = $date->format('dmY');

    $randomString = Str::random(4);

    return "NOTA{$formattedDate}{$randomString}";
}
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
