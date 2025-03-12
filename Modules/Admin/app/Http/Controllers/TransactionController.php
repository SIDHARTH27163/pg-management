<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Transaction;

class TransactionController extends Controller {
    public function index() {
        $transactions = Transaction::orderBy('date', 'desc')->get();
        $total_income = Transaction::income()->sum('amount');
        $total_expense = Transaction::expense()->sum('amount');
        $balance = $total_income - $total_expense;

        return view('admin::transactions.index', compact('transactions', 'total_income', 'total_expense', 'balance'));
    }

    public function create() {
        return view('admin::transactions.index');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction added successfully!');
    }

    public function destroy($id) {
        Transaction::findOrFail($id)->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
