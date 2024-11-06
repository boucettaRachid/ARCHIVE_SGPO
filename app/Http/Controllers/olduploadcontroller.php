<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UploadController extends Controller
{

    public function createfolder($validatedData)
    {
        Folder::insertData($validatedData);
        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function uploadFolder(Request $request)
    {
        $request->validate([
            'folder.*' => 'required|file|max:10000',
        ]);
    
        // Handle XLS file upload
        $datafile = [];
        if ($request->hasFile('drive')) {
            $xlsFile = $request->file('drive');
            $xlsFileName = $xlsFile->getClientOriginalName();
            $xlsFilePath = $xlsFile->storeAs('xls_files', $xlsFileName);
            $data = Excel::toCollection(null, storage_path('app/' . $xlsFilePath));
    
            // Process XLS file and populate $datafolder
            $datafolder = [
                "NdeDOCUMENT" => $data[0][1][0],
                "TdeDOCUMENT" => $data[0][1][1],
                "Title" => $data[0][1][2],
                "Code" => $data[0][1][3],
                "Codefile" => $data[0][1][7],
                "user" => Auth::user()->id,
            ];
        }
    
        // Handle folder file uploads
        if ($request->hasFile('folder')) {
            foreach ($request->file('folder') as $folderFile) {
                if ($folderFile->isValid() && $folderFile->getMimeType() && str_starts_with($folderFile->getMimeType(), 'image')) {
                    
                    //$imageData = file_get_contents($folderFile->getPathname());
                    //$base64Image = base64_encode($imageData);

                    // Create the directory if it doesn't exist
                    $directory = "public/archive/".$data[0][1][3];
                    //Storage::makeDirectory($directory);

                    $filename = $folderFile->getClientOriginalName();
                    $folderFile->storeAs($directory, $filename);

                    $path = $data[0][1][3]."/".$filename;

                    $datafile[] = [
                        'Code' => pathinfo($folderFile->getClientOriginalName(), PATHINFO_FILENAME),
                        'file' => $path,
                        "user" => Auth::user()->id
                    ];
                }
            }
        }
    
        // Check if a record with the specified conditions exists
        $existingCodefolder = Folder::where('Code', $datafolder['Code'])->first();
        
        if (!$existingCodefolder) {
            // Create new folder in the database
            Folder::insertData($datafolder);

            // Process matching files
            $countfils = 0;
            foreach ($data[0] as $DriveCodeFolder) {
                $codefile = $DriveCodeFolder[7];
                foreach ($datafile as $file) {
                    if ($codefile === $file["Code"]) {

                        $filedataupload = [
                            "TdeFICHER" => $DriveCodeFolder[4],
                            "Title" => $DriveCodeFolder[5],
                            "Description" => $DriveCodeFolder[6],
                            "Code" => $file["Code"],
                            "file" => $file["file"],
                            "user" => $file["user"],
                            "Folder" =>  Folder::latest()->value('id'),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ];

                        $filesupload[] = $filedataupload; // Append to array
                        $countfils++;
                    }
                }
            }
   
            DB::table('files')->insertOrIgnore($filesupload);
            //print_r($filesupload);
            //exit;

        }else{
            return redirect()->back()->with('erorr', 'Folder is Exist!');
        }
    
        //echo $countfils;
        return redirect()->back()->with('success', 'XLS file processed successfully.');
    }

}
