@php
    $isEdit = isset($accountNumber);
@endphp

@extends('admin.layout')

@section('title', $isEdit ? 'Hesap Düzenle' : 'Yeni Hesap Ekle')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
    <form action="{{ $isEdit ? route('admin.account-numbers.update', $accountNumber) : route('admin.account-numbers.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div>
            <label for="bank_name" class="block text-sm font-medium text-gray-700 mb-2">Banka Adı</label>
            <input type="text" id="bank_name" name="bank_name" value="{{ old('bank_name', $isEdit ? $accountNumber->bank_name : '') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('bank_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="account_holder" class="block text-sm font-medium text-gray-700 mb-2">Hesap Sahibi</label>
            <input type="text" id="account_holder" name="account_holder" value="{{ old('account_holder', $isEdit ? $accountNumber->account_holder : '') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('account_holder')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="iban" class="block text-sm font-medium text-gray-700 mb-2">IBAN</label>
            <input type="text" id="iban" name="iban" value="{{ old('iban', $isEdit ? $accountNumber->iban : '') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md font-mono focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('iban')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $isEdit ? $accountNumber->is_active : true) ? 'checked' : '' }} class="form-checkbox text-blue-600" />
                <span class="ml-2 text-gray-700">Aktif</span>
            </label>
        </div>

        <div class="text-right">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold">
                {{ $isEdit ? 'Güncelle' : 'Kaydet' }}
            </button>
        </div>
    </form>
</div>
@endsection
