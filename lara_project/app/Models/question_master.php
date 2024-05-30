<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_master extends Model
{
    use HasFactory;

    protected $table="question_masters";

    protected $primaryKey="id";
    protected $fillbale=['exam_id','questions','ans','options','status'];
}
