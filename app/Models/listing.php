<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ["title","company","location","website","email",
    "description","tags"];

    public function scopeFilter($query, $filters) {
        if(!empty($filters["tag"])) {
            $query->where("tags", "like", "%" . $filters["tag"] . "%");
        }
        if(!empty($filters["search"])) {
            $query->where("title", "like", "%" . $filters["search"] . "%")
            ->orWhere("tags", "like", "%" . $filters["search"] . "%")
            ->orWhere("company", "like", "%" . $filters["search"] . "%")
            ->orWhere("description", "like", "%" . $filters["search"] . "%");
        }
    }
}
