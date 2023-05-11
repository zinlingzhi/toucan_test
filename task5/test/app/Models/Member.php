<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function index()
    {
        $members = Member::all();

        return view('index.index', compact('members'));
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
