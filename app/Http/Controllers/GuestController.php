<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
// Carbon::setLocale('id');

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $guests = Guest::all();
        $guests = Guest::with('perusahaan')->get();
        return view('guest.data', ['guests' => $guests]);
        // assume $photo works 
        // try {
        //     return Storage::get('uploads/'.$guests->image);
            // return $guests['image'];
        // }
        // catch (Exception $e) {
        //     $photo->delete(); // doesn't come here
        // }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'full_name' => 'required',
        //     'phone' => 'required',
        //     'company' => 'required',
        //     'company_id' => 'required'
        // ]);
        
        Guest::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'company' => 'Pengunjung hari jadi Kotabaru 74 tahun 2024',
            'company_id' => 12
        ]);

        // Guest::create($request->all());

        // Set a success message
        $modalTitle = 'Success!';
        $modalBody = 'Terimakasih sudah berkunjung. semoga sehat selalu!';

        return view('guest.create')->with([
            'modalTitle' => $modalTitle ?? null,
            'modalBody' => $modalBody ?? null,
            'date' => Carbon::now()->endOfDay()->isoFormat('D MMMM Y - hh:mm:ss')
        ]);
    }

    function create(){
        return view('guest.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $img = $request->image;
        $folderPath = "public/uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        // dd('Image uploaded successfully: '.$fileName);


        $guests = Guest::find($guest->id);

        if ($guests->insentive == '0') {
            $guests->update([
                $guests->insentive = '1',
                $guests->image = $fileName
            ]);
        } else {
            $guests->update([
                $guests->insentive = '0'
            ]);
        }

        return redirect('guest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }

    // public function countTanggal(Request $request){
    //     $data = \DB::table('guests')->select([
    //         \DB::raw('count(full_name) as jumlah'),
    //         // \DB::raw('full_name as data'),
    //         \DB::raw('DATE(created_at) as tanggal')
    //     ])
    //     ->groupBy('tanggal')
    //     // ->groupBy('tanggal', 'full_name')
    //     ->get();
    //     dd($data);
    // }
}
