<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(10);
        return view('transaction', ['transactions' => $transactions]);
    }




    public function updateStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'status' => 'required|string|in:Success,Pending,OtherStatus', // Adjust according to your status options
        ]);

        // Find the transaction
        $transaction = Transaction::findOrFail($request->transaction_id);

        // Update the status
        $transaction->status = $request->status;
        $transaction->save();

        // Return a response
        return response()->json(['status' => 'success']);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Paginate the search results
        $transactions = Transaction::where('user_id', $search)->paginate(10);

        return view('transaction', compact('transactions'));
    }
}
