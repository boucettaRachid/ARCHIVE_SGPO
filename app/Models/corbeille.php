<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class corbeille extends Model
{
    use HasFactory;

    protected $table = 'corbeille';

    protected $fillable = [
        'TdeFICHER',
        'Title',
        'Description',
        'Code',
        'file',
        'user',
        'Folder',
        'userdelete',
        'created_at',
        'updated_at'
    ];

    public static function insertData($data)
    {
        return self::create($data);
    }
}


