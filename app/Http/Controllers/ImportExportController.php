<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\News;
use App\Request\ImportValidateRequest;
use App\Service\ImportService;
use App\Status\Status;

class ImportExportController extends Controller
{
    private $services;

    public function __construct(ImportService $service)
    {
        $this->services = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importExportView()
    {
        return view('importexport');
    }

    /**
     * @param ImportValidateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function import(ImportValidateRequest $request)
    {
        return view('export', ['csvFileName' => $this->services->import($request), 'status' => Status::CREATED]);
    }


}
