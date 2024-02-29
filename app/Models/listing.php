<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filters) {
        if(!empty($filters["tag"])) {
            $query->where("tags", "like", "%" . request("tag") . "%");
        }
    }
}
