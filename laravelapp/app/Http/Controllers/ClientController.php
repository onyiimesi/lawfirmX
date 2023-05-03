<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Mail\WelcomeMail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = ClientResource::collection(Client::all());

        return [
            'status' => 'true',
            'message' => 'Client List',
            'data' => $clients
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $request->validated($request->all());

        if($request->profile_image){
            $file = $request->profile_image;
            $folderName = 'http://127.0.0.1:8000/clients';
            $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
            $replace = substr($file, 0, strpos($file, ',')+1); 
            $image = str_replace($replace, '', $file); 

            $image = str_replace(' ', '+', $image);
            $file_name = time().'.'.$extension;
            file_put_contents(public_path().'/clients/'.$file_name, base64_decode($image));
            
            $paths = $folderName.'/'.$file_name;
        }else{
            $paths = "";
        }

        $clients = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'date_profiled' => $request->date_profiled,
            'primary_legal_counsel' => $request->primary_legal_counsel,
            'date_of_birth' => $request->date_of_birth,
            'profile_image' => $paths,
            'case_details' => $request->case_details,

        ]);

        Mail::to($request->email)->send(new WelcomeMail($clients));

        return [
            'status' => 'true',
            'message' => 'Client Registered Successfully',
            'data' => $clients
        ];

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        $clients = new ClientResource($client);

        return [
            'status' => 'true',
            'message' => 'Client Details',
            'data' => $clients
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
