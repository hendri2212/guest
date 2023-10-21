<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guest = Guest::all()->groupBy('company');

        // $data = \DB::table('guests')->select([
        //     \DB::raw('count(*) as jumlah'),
        //     \DB::raw('varchar(company) as company')
        // ])
        // ->groupBy('company')
        // ->orderBy('company')
        // ->get()
        // ->toArray();
        // dd($data);

        // $report = Guest::all();
        $guestCompany = Guest::select('company')->distinct()->count();
        $guestFull_name = Guest::select('full_name')->distinct()->count();

        return view('report.data', compact('guest', 'guestCompany', 'guestFull_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

}
