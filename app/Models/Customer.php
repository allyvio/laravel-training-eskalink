<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'id_card_number', 'address', 'date_of_birth', 'hobby'];
}
