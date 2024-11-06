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

    public function createFolder($validatedData)
    {
        Folder::insertData($validatedData);
        return redirect()->back()->with('success', 'Folder created successfully!');
    }

    public function uploadFolder(Request $request)
    {
        $request->validate([
            'folder.*' => 'required|file|max:10000',
            'drive' => 'required|file|mimes:xls,xlsx|max:10000',
        ]);


        //$formdata = request()->all();
        //dd($formdata);
        //exit;

        $datafile = [];
        $datafolder = [];

        if ($request->hasFile('drive')) {
            $xlsFile = $request->file('drive');
            $xlsFileName = $xlsFile->getClientOriginalName();
            $xlsFilePath = $xlsFile->storeAs('xls_files', $xlsFileName);
            $data = Excel::toCollection(null, storage_path('app/' . $xlsFilePath));

            $datafolder = [
                "NdeDOCUMENT" => $data[1][1][0],
                "TdeDOCUMENT" => $data[1][1][1],
                "Title" => $data[1][1][2],
                "Code" => $data[1][1][3],
                "Codefile" => $data[1][1][7],
                "user" => Auth::user()->id,
            ];

            //print_r($datafolder);
            //exit;

        }

        $existingCodeFolder = Folder::where('Code', $datafolder['Code'])->first();

        if (!$existingCodeFolder) {
            Folder::insertData($datafolder);

            if ($request->hasFile('folder')) {
                foreach ($request->file('folder') as $folderFile) {
                    if ($folderFile->isValid() && $folderFile->getMimeType()) {
                        $mimeType = $folderFile->getMimeType();
                        if (str_starts_with($mimeType, 'image') || $mimeType === 'application/pdf') {
                            $directory = "public/archive/" . $data[1][1][3];
                            $filename = $folderFile->getClientOriginalName();
                            $folderFile->storeAs($directory, $filename);
                            $path = $data[1][1][3] . "/" . $filename;
                            $datafile[] = [
                                'Code' => pathinfo($folderFile->getClientOriginalName(), PATHINFO_FILENAME),
                                'file' => $path,
                                'user' => Auth::user()->id
                            ];
                        }
                    }
                }
            }

            $filesupload = [];
            foreach ($data[1] as $DriveCodeFolder) {
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
                            "Folder" => Folder::latest()->value('id'),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ];
                        $filesupload[] = $filedataupload;
                    }
                }
            }

            DB::table('files')->insertOrIgnore($filesupload);
        } else {
            return redirect()->back()->with('error', 'Folder already exists!');
        }

        return redirect()->back()->with('success', 'XLS file processed successfully.');
    }

}
