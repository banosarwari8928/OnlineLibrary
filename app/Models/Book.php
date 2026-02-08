<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable=[
        "title",
        "isbn",
        "disciption",
        "published_at",
        "total_copies",
        "availabel_copies",
        "genra",
        "price",
        "cover_image",
        "status",
        "author_id"

    ];
    public function author(){
        return $this->belongsTo(Author::class,"author_id");
    }
    public function borrowing(){
        return $this->hasMany(Borrowing::class);
    }
    public function isAvailable(){
        return $this->availabel_copies>0;
    }
    public function borrow(){
        if($this->availabel_copies> 0){
            $this->decrement("availabel_copies");
        }
    }
    public function returnedBook(){
        if($this->available_copies < $this->total_copies){
            $this->increment("availabel_copies");
        }
    }
}
