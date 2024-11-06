<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //for count folders, files and users
        $folders = Folder::count();
        $files = File::count();
        $users = User::count();

        //for get size stockege
        $database = 'db_archive';

        $querygetstock = "SELECT ROUND(SUM(DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024, 2) AS `Size (MB)`
                  FROM information_schema.TABLES
                  WHERE TABLE_SCHEMA = ?";
        $result = DB::select($querygetstock, [$database]);

        //for get last folder in systeme
        $lastfolder = Folder::latest()->first();

        //for get statistique folders and files
        $querygetstac = "SELECT 
        DATE_FORMAT(created_at, '%M') AS month,
        SUM(CASE WHEN table_type = 'file' THEN 1 ELSE 0 END) AS files,
        SUM(CASE WHEN table_type = 'folder' THEN 1 ELSE 0 END) AS folders
        FROM 
        (
            SELECT 
                'file' AS table_type, 
                created_at 
            FROM 
                files
            UNION ALL
            SELECT 
                'folder' AS table_type, 
                created_at 
            FROM 
                folders
        ) AS combined_tables
        GROUP BY 
        MONTH(created_at);
        ";
        $dataByMonth = DB::select($querygetstac);

        //$dataByMonth = $this->statistiquedata();
    
        return view('home', [
            'dataByMonth' => $dataByMonth,
            'folders' => $folders,
            'files' => $files,
            'users' => $users,
            'lastfolder' => $lastfolder,
            'stockage' => $result[0]->{'Size (MB)'} // Accessing the first row and retrieving the 'Size (MB)' value
        ]);
    }



    public function statistiquedata()
    {
        $filesCountByMonth = File::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS files")
            ->groupBy(DB::raw("month"))
            ->get();
    
        $foldersCountByMonth = Folder::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS folders")
            ->groupBy(DB::raw("month"))
            ->get();
    
        // Merge the two collections by month
        $dataByMonth = $filesCountByMonth->merge($foldersCountByMonth)
            ->groupBy('month')
            ->map(function ($items) {
                return [
                    'statistiquedatafiles' => $items->sum('files'),
                    'statistiquedatafolders' => $items->sum('folders')
                ];
            });
    
        // Format the month names
        $dataByMonth = $dataByMonth->mapWithKeys(function ($items, $key) {
            return [date('F', strtotime("01-$key-2000")) => $items];
        });
    
        return  $dataByMonth;
    }
    
    
}
