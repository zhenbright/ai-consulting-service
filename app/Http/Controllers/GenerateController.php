<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Botble\Portfolio\Models\Service;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class GenerateController extends Controller
{
    //

    public function index($view='') {
        $services  = Service::all();
        return view('service.generate', ['view' => $view, 'services' => $services]);
    }

    public function generate(Request $request) {

        // Validate that the request has files and a service parameter
        $request->validate([
            'files.*' => 'required|file',
            'service' => 'required|string'
        ]);
  
        $serverUrl = env('SERVICE_BACKEND_URL', 'localhost:5000/generate');

        $service = $request->input('service');
        $promptText = $request->input('promptText');
        $pageAnalysis = $request->input('pageAnalysis');
        $pageResult = $request->input('pageResult');+
        $pageUseCase = $request->input('pageUseCase');
        $client = new Client();

        // Prepare files for upload
        $multipart = [
            [
                'name'     => 'service',
                'contents' => $service
            ],
            [
                'name'     => 'promptText',
                'contents' => $promptText
            ],
            [
                'name'     => 'pageAnalysis',
                'contents' => $pageAnalysis
            ],
            [
                'name'     => 'pageResult',
                'contents' => $pageResult
            ],
            [
                'name'     => 'pageUseCase',
                'contents' => $pageUseCase
            ]
        ];

        foreach ($request->file('files') as $file) {
            $multipart[] = [
                'name'     => 'files',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName()
            ];
        }

        // Send the files and additional fields to FastAPI server
        $response = $client->post($serverUrl, [
            'multipart' => $multipart
        ]);

        // Return the response from FastAPI server
        return response()->json(json_decode($response->getBody(), true));
    }
}
