<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/clients');
        $data = $response->json();
        return view('clientes', compact('data'));
    }
    public function create(){
        return view('cliente');
    }
    public function store(Request $request){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url.'/clients',[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('clientes.index');
    }
    public function delete($idCliente){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url .'/clients/'.$idCliente);
        return redirect()->route('clientes.index');
        $data = $response->json();
        return view('clientes', compact('data'));
    }
    public function view ($idCliente){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url .'/clients/'.$idCliente);
        $cliente = $response->json();
         return view('clientes', compact('cliente'));
          $data = $response->json();
        return view('clientes', compact('data'));
    }
    public function update(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::put($url . '/clients/' . $request->id, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('clientes.index');
    }
}
