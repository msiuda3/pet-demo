<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function show($status, $page): View
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://petstore.swagger.io/v2/pet/findByStatus', [
            'status' => $status
        ]);

    if ($response->successful()) {
        $data = $response->json();
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $pagedData = array_slice($data, $offset, $perPage);
        return view('data', ['data' => $pagedData, 'page' => $page, 'status' => $status]);
    } else {

        return view('data');
    }

    }

    public function showForm()
    {
        return view('form');
    }

    public function editPet($id)
    {

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://petstore.swagger.io/v2/pet/'.$id);

        if ($response->successful()) {
            $item = $response->json();
            return view('form', ['item' => $item]);
        } else {
            return view('data');
        }
        
    }

    public function submitForm(Request $request)
    {
        $id = $request->input('id');
        $response;
        $url = 'https://petstore.swagger.io/v2/pet';
        if($id){
            $data = $request->only(['name', 'status', 'id']);
            $response = Http::withOptions([
                'verify' => false,
            ])->put($url, $data);

        }
        else{
            $data = $request->only(['name', 'status']);
            $response = Http::withOptions([
                'verify' => false,
            ])->post($url, $data);
        }
        if ($response->successful()) {
            return redirect()->route('data', ['page' => 1, "status" => "available"])->with('success', 'Request successful!');
        } else {
            return redirect()->route('form.show')->with('error', 'Failed to submit request.');
        }
    }

    public function deletePet($id)
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->delete('https://petstore.swagger.io/v2/pet/'.$id);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Pet deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete pet');
        }
    }

}
