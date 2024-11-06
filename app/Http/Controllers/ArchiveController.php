<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Models\corbeille;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        //$files = File::all();
        $user = Auth::user();

        if ($user && $user->Role == 'admin') {$role = true;}else{$role = false;}
        
        return view('Archives', [
            'folders' => $folders,
            //'files' => $files,
            'role' => $role
        ]);
    }

    
    public function search_header(Request $request)
    {
        $folders = Folder::all();
        $term = $request->input('Searchterm');
        $user = Auth::user();

        if ($user && $user->Role == 'admin') {$role = true;}else{$role = false;}

        $file = File::where(function ($query) use ($term) {
            $query->where('TdeFICHER', 'like', "%$term%")
                  ->orWhere('Title', 'like', "%$term%")
                  ->orWhere('Description', 'like', "%$term%")
                  ->orWhere('Code', 'like', "%$term%");
        })->get();

        return view('Archives', [
            'term' => $term,
            'folders' => $folders,
            'files' => $file,
            'role' => $role
        ]);
    }

    public function getfiles($codefolder)
    {
        $folders = Folder::all();
        $files = File::where('Folder', $codefolder)->get();
        $user = Auth::user();

        if ($user && $user->Role == 'admin') {$role = true;}else{$role = false;}

        return view('Archives', [
            'folders' => $folders,
            'files' => $files,
            'role' => $role
        ]);
    }

    public function getfile($codefile)
    {
        $file = File::find($codefile);
        return response()->json($file);
    }

    public function updatefile(Request $request)
    {
        $file = File::find($request->input('idfile'));
        $file->TdeFICHER = $request->input('typefile');
        $file->Title = $request->input('Namefile');
        $file->Description = $request->input('descriptionfile');
        $file->Code = $request->input('codefile');
        $file->Folder = $request->input('folderCode');
        $file->updated_at = Carbon::now();
        $file->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    //in this function we not removr a file but we add hem in another table
    public function deletefile(Request $request)
    {

        $file = File::find($request->input('idfile'));
    
        $datafile = [
            'TdeFICHER' => $file->TdeFICHER,
            'Title' => $file->Title,
            'Description'=> $file->Description,
            'Code'=> $file->Code,
            'file'=> $file->file,
            'user'=> $file->user,
            'Folder'=> $file->Folder,
            'userdelete' => Auth::user()->id,
        ];
        corbeille::insertData($datafile);
        $file->delete();
        return redirect()->back()->with('success', 'Message sent successfully!');
        
    }
}
