<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    protected $fillable = [
        'NdeDOCUMENT',
        'TdeDOCUMENT',
        'Title',
        'Code',
        'user'
    ];

    public static function insertData($data)
    {
        return self::create($data);
    }

}
