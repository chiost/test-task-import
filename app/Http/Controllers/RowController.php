<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRowsRequest;
use App\Http\Requests\UpdateRowRequest;
use App\Models\Row;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importForm()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ImportRowsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function import(ImportRowsRequest $request)
    {
        //
    }
}
