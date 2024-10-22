<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postcode;
use App\Imports\PostcodeImport;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

ini_set('memory_limit', '1024M');  // Increase memory limit to 512 MB
ini_set('max_execution_time', 300);

class PostcodeController extends Controller
{
    public function health()
    {
        return "Ok";
    }

    public function csvfileupload(Request $request)
    {
        $zipPath = self::downloadFile('https://www.post.japanpost.jp/zipcode/dl/utf/zip/utf_ken_all.zip', 'zips');
        $fileName = self::unzipFile($zipPath);
        self::insertData($fileName);
    }

    public function insertData($fileName)
    {
        $file = 'utf_ken_all.csv';
        $test = 'test.csv';
        // $file = $request->file('csvfile');
        // $name = $file->hashName();

        // $path = $request->file('csvfile')->getRealPath();
        // error_log($file);

        try {
            Excel::import(new PostcodeImport, Storage::disk("csv")->path($file));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function makeDirectory($path)
    {
        if (!File::isDirectory($path)) {

            File::makeDirectory($path);
        }
    }

    public function downloadFile($url, $storageName, $subfolder = '')
    {
        $addSubFolder = '';

        if ($subfolder) {
            $path = Storage::disk($storageName)->path($subfolder);
            $this->makeDirectory($path);
            $addSubFolder = $subfolder . '/';
        }

        $dateTime = now();

        $filename = $addSubFolder . $dateTime->format('YmdHis') . '_' . basename($url);

        Storage::disk($storageName)->put($filename, file_get_contents($url));


        return Storage::disk($storageName)->path($filename);
    }

    public function unzipFile($zipPath)
    {
        $zip = new ZipArchive();
        $zipFile = $zip->open($zipPath);
        if ($zipFile === TRUE) {
            $zip->extractTo(Storage::disk("csv")->path(""));
            $stat = $zip->statIndex(0);
            $fileName = $stat['name'];
            $zip->close();
        }
        return Storage::disk("csv")->path($fileName);
    }
    public function list()
    {
        return Postcode::all();
    }
}
