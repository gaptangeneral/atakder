@extends('admin.layout')
@section('title', 'Hesap Numarasını Düzenle')

@section('content')
<h1 class="text-3xl font-bold mb-6">Hesap Numarasını Düzenle</h1>
@if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.account-numbers.update', $accountNumber->id) }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="bank_name" class="block font-semibold mb-1">Banka Adı *</label>
        <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $accountNumber->bank_name) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('bank_name') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="account_holder" class="block font-semibold mb-1">Hesap Sahibi *</label>
        <input type="text" name="account_holder" id="account_holder" value="{{ old('account_holder', $accountNumber->account_holder) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('account_holder') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="iban" class="block font-semibold mb-1">IBAN *</label>
        <input type="text" name="iban" id="iban" value="{{ old('iban', $accountNumber->iban) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('iban') border-red-500 @enderror">
    </div>
    <div class="mb-4">
        <label for="order" class="block font-semibold mb-1">Sıra *</label>
        <input type="number" name="order" id="order" value="{{ old('order', $accountNumber->order) }}" required min="0"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('order') border-red-500 @enderror">
    </div>
    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.account-numbers.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">İptal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Güncelle</button>
    </div>
</form>
@endsection