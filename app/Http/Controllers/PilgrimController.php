<?php

namespace App\Http\Controllers;

use App\Models\Pilgrim;
use Illuminate\Http\Request;
use Shuchkin\SimpleXLSX;

class PilgrimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( $xlsx = SimpleXLSX::parse( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'storage/pilgrims.xlsx') ) {

       $head = [
                'conformity_num',
                'main_group',
                'subgroup',
                'guide',
                'pid',
                'unit',
                'name',
                'passport',
                'gender',
                'hotel_id',
                'room'
            ];

            $all_data = [];
            $data = [];
            $xsl_rows = $xlsx->rows();

            unset($xsl_rows[0]);

            foreach ($xsl_rows as $row){
                for ($i = 0;$i < count($head);$i++){
                   $data += [$head[$i] => $row[$i]];
                }
                array_push($all_data,$data);
            }
        } else {
            echo SimpleXLSX::parseError();
        }
        return view('pilgrims\index',compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function show(Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pilgrim $pilgrim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pilgrim $pilgrim)
    {
        //
    }
}
