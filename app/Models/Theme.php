<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'description',
        'folder',
        'status',
    ];

    /**
     * Ambil folder dari tema yang sedang aktif
     */
    public static function getActiveFolder()
    {
        return self::where('status', 'active')->first()?->folder ?? 'default';
    }
}
