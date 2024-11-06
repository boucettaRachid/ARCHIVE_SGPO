<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\corbeille;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ControllerCorbeille extends Controller
{
    
    public function index()
    {
        $corbeille = corbeille::select('corbeille.id', 'corbeille.Title', 'corbeille.created_at', 'corbeille.folder', 'corbeille.userdelete', 'users.id as user_id', 'users.name as username',DB::raw('COUNT(corbeille.id) as usercount'))
        ->join('users', 'users.id', '=', 'corbeille.userdelete')
        ->groupBy('users.id', 'users.name', 'corbeille.id', 'corbeille.Title', 'corbeille.created_at', 'corbeille.folder', 'corbeille.userdelete')
        ->get();
        
        return view('corbeille', [
            'corbeille' => $corbeille,
        ]);
    }

    public function Recovry($id)
    {
        // Find the file with the given ID
        $filedata = corbeille::find($id);
    
        // Check if the file was found
        if ($filedata) {
            // Initialize an array to store the file data
            $datafile = [
                'TdeFICHER' => $filedata->TdeFICHER,
                'Title' => $filedata->Title,
                'Description' => $filedata->Description,
                'Code' => $filedata->Code,
                'file' => $filedata->file,
                'user' => $filedata->user,
                'Folder' => $filedata->Folder,
            ];
    
            // Insert the file data into the database
            File::insertData($datafile);
            $filedata->Delete();
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'File recovered successfully!');
        } else {
            // File not found, redirect back with error message
            return redirect()->back()->with('error', 'File not found!');
        }
    }

    public function Deletefile($id)
    {
        $file = corbeille::find($id);
        $file->Delete();
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}



