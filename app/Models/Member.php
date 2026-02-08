<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
    protected $fillable=[
        "name",
        "email",
        "whatsApp_number",
        "membership_date",
        "adress",
        "staus",
    ];
    protected $casts = [
        "membership_date"=>"date",
    ];
        public function borrowing(){
        return $this->belongsTo(Borrowing::class);
    }
    public function activeBorrowing(){
        return $this->borrowing()->where("status","borrowed");
    }
}
