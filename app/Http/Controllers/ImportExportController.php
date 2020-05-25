<?php

namespace App\Http\Controllers;

use App\JsonData;

class ImportExportController extends Controller
{
    /**
     *
     */
    public function importExportView()
    {   $files = JsonData::all();
        return view('importexport',compact('files'));
    }

    public function import()
    {

        $file_content = file_get_contents(request()->file('file')->getRealPath());
       $a = JsonData::create([
                'json_file' => $file_content
            ]);

        $json_data = json_decode($a->json_file);
        $csvFileName = 'json_data/json_to_csv.csv';

        $fp = fopen($csvFileName, 'w');

        foreach($json_data as $row){
            fputcsv($fp, (array)$row);
        }

        fclose($fp);

        return view('export',compact('csvFileName'));
    }


}
