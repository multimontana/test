<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    /**
     *
     */
    public function importExportView()
    {

        return view('importexport');
    }

    public function import(Request $request)
    {
        $request->validate(['file' => 'required|max:10000|mimes:json,xml,csv']);
        $pieces = explode(".", $request->file('file')->getClientOriginalName());
        $file_content = json_decode(file_get_contents($request->file('file')->getRealPath()));
        foreach ($file_content as $row) {
            $cat = Category::updateOrCreate(['name' => $row->category], [
                'name' => $row->category
            ]);
            if ($row->category === "blog") {
                Blog::create([
                    'title' => $row->title,
                    'description' => $row->body,
                    'parent_id' => $cat->id
                ]);
            } else {
                Blog::create([
                    'title' => $row->title,
                    'description' => $row->body,
                    'parent_id' => $cat->id
                ]);
            }
        }

        $csvFileName = 'json_data/'.$request->file('file')->getClientOriginalName();

       $fp = fopen($csvFileName, 'w');

        foreach ($file_content as $row) {
            fputcsv($fp, (array)$row);
        }

        fclose($fp);

        return view('export', compact('csvFileName'));
    }


}
