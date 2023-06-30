<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event): View
    {
        $transactions = Transaction::with('transactionDetails.ticket')->where('event_id', $event->id)->paginate(10);

        return view('admin.events.transactions.index', compact('event', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event $event, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, string $id): RedirectResponse
    {
        return redirect()->route('admin.events.transactions.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Transaction $transaction): RedirectResponse
    {
        // Delete transaction
        $transaction->delete();

        // Return to index
        return redirect()->route('admin.events.transactions.index', $event->id)->with('success', 'Transaction deleted');
    }

    /**
     * Approve the specified resource from storage.
     */
    public function approve(Event $event, string $id): RedirectResponse
    {
        // Update transaction
        Transaction::find($id)->update(['status' => 'success']);

        // TODO: Generate PDF

        // TODO: Send Email with PDF

        // Return to index
        return redirect()->route('admin.events.transactions.index', $event->id)->with('success', 'Transaction approved');
    }
}
