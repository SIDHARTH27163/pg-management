<x-admin-layout>
    <section class="lg:max-w-7xl md:max-w-7xl mx-auto p-6 ">
        <x-reports-layout>
        <h2 class="text-xl font-bold">Income & Expenditure</h2>

        <!-- Overview Cards -->
        <div class="grid grid-cols-3 gap-4 mt-4  w-full">
            <div class="p-4 bg-green-100 border border-green-400 rounded">
                <h3 class="text-lg font-semibold text-green-800">Total Income</h3>
                <p class="lg:text-2xl font-bold">₹{{ number_format($total_income, 2) }}</p>
            </div>
            <div class="p-4 bg-red-100 border border-red-400 rounded">
                <h3 class="text-lg font-semibold text-red-800">Total Expense</h3>
                <p class="lg:text-2xl font-bold">₹{{ number_format($total_expense, 2) }}</p>
            </div>
            <div class="p-4 bg-blue-100 border border-blue-400 rounded">
                <h3 class="text-lg font-semibold text-blue-800">Balance</h3>
                <p class="lg:text-2xl font-bold">₹{{ number_format($balance, 2) }}</p>
            </div>
        </div>

        <!-- Transaction Form -->
        <div class="lg:max-w-3/4 mx-auto p-4 bg-gray-100 border rounded mt-6">
            @if (session('success'))
                <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ isset($transaction) ? route('admin.transactions.update', $transaction->id) : route('admin.transactions.store') }}" method="POST">
                @csrf
                @if (isset($transaction))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-2 gap-3">
                    <!-- Title Input -->
                    <div>
                        <x-input-label for="title" :value="__('Transaction Title')" />
                        <x-text-input id="title" name="title" value="{{ old('title', $transaction->title ?? '') }}" class="block w-full mt-1" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Type Selection -->
                    <div>
                        <x-input-label for="type" :value="__('Transaction Type')" />
                        <select id="type" name="type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="income" {{ isset($transaction) && $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                            <option value="expense" {{ isset($transaction) && $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <!-- Amount Input -->
                    <div>
                        <x-input-label for="amount" :value="__('Amount (₹)')" />
                        <x-text-input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount', $transaction->amount ?? '') }}" class="block w-full mt-1" />
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>

                    <!-- Date Input -->
                    <div>
                        <x-input-label for="date" :value="__('Transaction Date')" />
                        <x-text-input id="date" name="date" type="date" value="{{ old('date', $transaction->date ?? '') }}" class="block w-full mt-1" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button>
                        {{ isset($transaction) ? __('Update Transaction') : __('Add Transaction') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Transaction Table -->
        <table class="mt-4 w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Type</th>
                    <th class="border p-2">Amount</th>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td class="border p-2">{{ $transaction->title }}</td>
                    <td class="border p-2">
                        <span class="{{ $transaction->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($transaction->type) }}
                        </span>
                    </td>
                    <td class="border p-2">₹{{ number_format($transaction->amount, 2) }}</td>
                    <td class="border p-2">{{ $transaction->date }}</td>
                    <td class="border p-2">
                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Delete this transaction?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </x-reports-layout>
    </section>
</x-admin-layout>
