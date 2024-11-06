<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class filesController extends Controller
{

    public function index()
    {
        $folders = Folder::all();
        return view('addfile', [
            'folders' => $folders,
        ]);
    }
    
    public function uploadfile(Request $request)
    {
        $datafile = [];
        if ($request->hasFile('filescan')) {
            foreach ($request->file('filescan') as $folderFile) {
                if ($folderFile->isValid() && $folderFile->getMimeType() && str_starts_with($folderFile->getMimeType(), 'image')) {

                    $codefolder = Folder::find($request->input('folder'))->Code;
                    $directory = "public/archive/".$codefolder;
                    $filename = $folderFile->getClientOriginalName();
                    $folderFile->storeAs($directory, $filename);
                    $path = $codefolder."/".$filename;

                    $datafile[] = [
                        'file' => $path,
                    ];
                }
            }
        }

        $datafiles = [
            'TdeFICHER' => $request->input('typefile'),
            'Title' => $request->input('titlefile'),
            'Description'=> $request->input('descriptionfile'),
            'Code'=> $request->input('codename'),
            'file'=> $datafile[0]['file'],
            'user'=> Auth::user()->id,
            'Folder'=> $request->input('folder'),
        ];

        File::insertData($datafiles);
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
