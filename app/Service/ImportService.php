<?php


namespace App\Service;


use App\Category;
use App\Factory\ImportFactory;
use Illuminate\Http\Request;

class ImportService
{
    /**
     * @param Request $request
     * @return string
     */
    public function import(Request $request)
    {
        $pieces = explode(".", $request->file('file')->getClientOriginalName());
        $file_content = json_decode(file_get_contents($request->file('file')->getRealPath()));

        foreach ($file_content as $row) {
            $cat = Category::updateOrCreate(['name' => $row->category], [
                'name' => $row->category
            ]);
            $model = ImportFactory::factoryMethod($pieces[0]);
                $model->create([
                    'title' => $row->title,
                    'description' => $row->body,
                    'category_id' => $cat->id
                ]);

        }

        $csvFileName = 'json_data/' . $request->file('file')->getClientOriginalName();

        $fp = fopen($csvFileName, 'w');

        foreach ($file_content as $row) {
            fputcsv($fp, (array)$row);
        }

        fclose($fp);

        return $csvFileName;
    }
}
