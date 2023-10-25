<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Guest::query();
        $date = $request->filter_tanggal;

        switch($date){
            case 'hari_ini':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'kemaren':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'minggu_ini':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'minggu_kemaren':
                $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
                break;
            case 'bulan_ini':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'bulan_kemaren':
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month);
                break;
        }

        $guest = $query->get()->groupBy('company');

        $guestCompany = Guest::select('company')->distinct()->count();
        $guestFull_name = Guest::select('full_name')->distinct()->count();

        return response()->view('report.data', compact('guest', 'guestCompany', 'guestFull_name'));

        // $guest = Guest::all()->groupBy('company');

        // return response()->view('report.data', compact('guest', 'guestCompany', 'guestFull_name'));

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
    public function show(Report $report){
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
