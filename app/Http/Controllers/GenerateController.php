<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Botble\Portfolio\Models\Service;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\History;
use App\Models\ServiceRequirement;

class GenerateController extends Controller
{
    //

    public function index($view='') {
        $services  = Service::all();
        $user = auth('customer')->user();
        $histories = [];
        if (!is_null($user))
            $histories = History::where('user_id', $user->id)->latest()->take(5)->get();
        return view('service.generate', ['view' => $view, 'services' => $services, 'histories' => $histories]);
    }

    public function generate(Request $request) {

        // Validate that the request has files and a service parameter
        $request->validate([
            'files.*' => 'required|file',
            'service' => 'required|string'
        ]);
        $user_id = auth('customer')->user()->id;
        $serverUrl = env('SERVICE_BACKEND_URL', 'localhost:5000');

        $serviceTitle = $request->input('service');
        $promptText = $request->input('promptText');
        $pageAnalysis = $request->input('pageAnalysis');
        $pageResult = $request->input('pageResult');
        $pageUseCase = $request->input('pageUseCase');
        $service_id = $request->input('service_id');

        $serviceRequirement = ServiceRequirement::where('service_id', $service_id)->first();
        
        $client = new Client();

        // Prepare files for upload
        $multipart = [
            [
                'name'     => 'service',
                'contents' => $serviceTitle
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
            ],
            [
                'name'     => 'requirement',
                'contents' => $serviceRequirement->requirement
            ]
        ];

        foreach ($request->file('files') as $file) {
            $multipart[] = [
                'name'     => 'files',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName()
            ];
        }

        try {
            // Send the files and additional fields to FastAPI server
            $response = $client->post($serverUrl.'/generate', [
                'multipart' => $multipart
            ]);
            // Return the response from FastAPI server
            $response = json_decode( $response->getBody());
            
            $history = History::create([
                'user_id' => $user_id,
                'service_id' => $service_id,
                'pdf_url' => $serverUrl.$response->pdf_url,
                'doc_url' => $serverUrl.$response->file_url,
            ]);
            
            return response()->json([
                'file_url' => $serverUrl.$response->file_url,
                'pdf_url' => $serverUrl.$response->pdf_url,
                'success' => $response->success
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
