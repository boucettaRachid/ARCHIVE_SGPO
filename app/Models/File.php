<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'TdeFICHER',
        'Title',
        'Description',
        'Code',
        'file',
        'user',
        'Folder',
        'created_at',
        'updated_at'
    ];

    public static function insertData($data)
    {
        return self::create($data);
    }


}
