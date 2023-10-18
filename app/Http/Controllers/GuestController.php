<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Storage;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('guest.data', ['guests' => $guests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'company' => 'required',
        ]);

        Guest::create($request->all());

        // Set a success message
        $successMessage = 'Post created or updated successfully!';

        // If we are using a modal, set the modal title and body
        // if ($request->has('modal')) {
            $modalTitle = 'Success!';
            $modalBody = $successMessage;
        // }

        // Return a success response
        // return redirect()->route('guest.create')->with([
        return view('guest.create')->with([
            'success' => $successMessage,
            'modalTitle' => $modalTitle ?? null,
            'modalBody' => $modalBody ?? null,
        ]);

        // return redirect()->route('home')->with('success', 'Post created successfully!');
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
        $folderPath = "uploads/";
        
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
}
