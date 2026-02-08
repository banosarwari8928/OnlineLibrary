<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;
    // protected $fillable=[]
    public function book(){
        return $this ->belongsTo(Book::class);
           }
     public function member(){
        return $this->belongsTO(Member::class);
    }
    public function isOverDue(){
        return $this->due_date < Carbon::today() && $this->status ==="borrowed";
    }
}
