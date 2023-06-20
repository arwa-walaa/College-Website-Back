<?php

namespace App\Http\Controllers;

use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeHours extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = DB::select('select * from _office_hour_');
        return response()->json($data);
     }

    /**
     * Show the form for creating a new resource.
     */
    // public function store()
    // {
    //     $test='saratest';
    //     return $test;
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(c $c)
    {
        //
    }
    public function returnAllLocations(){
        $results = DB::table('_office_hour_')
                ->select('Location')
                ->distinct()
                ->get();
                return $results;
    
    }
    public function returnAllDepartments(){
        $results = DB::table('department')
                ->select('departmentCode')
                ->where('departmentCode', '!=','general')
                ->get();
                return $results;
    
    }

}
