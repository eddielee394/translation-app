<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

class FileQuoteController extends Controller{

	public function __construct(){
      $this->middleware('auth');
  	}

    public function fileDownload($file) {
        $storage_path = storage_path('app/quote-attachements');
        return Response::download($storage_path.'/'.$file);
        
    }
}
