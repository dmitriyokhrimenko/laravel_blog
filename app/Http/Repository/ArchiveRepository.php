<?php

namespace App\Http\Repository;
/**
 * Movie Repository class
 */

use App\Post;
use Illuminate\Support\Facades\DB;

class ArchiveRepository
{
    /**
     * Get a list of all movies
     *
     * @return array  Array containing list of all movies
     */
    public static function getData()
    {
        $archive = Post::selectRaw('year(created_at) year, monthname(created_at) month, month(created_at) monthnum, count(*) posts')
        ->orderBy('monthnum')
        ->groupBy('month', 'year', 'monthnum')
        ->where('status', 'published')
        ->get();
        return $archive;
    }
}
