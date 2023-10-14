<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class KnowledgeCenterController extends Controller
{
    public function index()
    {
        $knowledgeCenters = Folder::simplePaginate(10);
        return view('knowledge-center.index')->with(['knowledgeCenters' => $knowledgeCenters]);
    }


    public function show($id)
    {
        $knowledgeCenter = Folder::with(['files'])->where('id', $id)->first();

        return view('knowledge-center.show')->with(['knowledgeCenter' => $knowledgeCenter]);
    }

    public function download($file)
    {
        //PDF file is stored under project/public/download/info.pdf
        $downloadFile = public_path() . "/storage/file/$file";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($downloadFile, $file, $headers);
    }
}
