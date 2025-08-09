<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountNumber extends Model
{
    protected $fillable = [
        'bank_name',
        'account_holder',
        'iban',
        'order',
    ];
}
