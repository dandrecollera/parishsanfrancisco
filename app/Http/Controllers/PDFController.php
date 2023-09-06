<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(){
        $data = [];

        $data['event'] = "Test";
        $data['name'] = "My Name";

        $pdf = PDF::loadView('pdf.certificate', $data);

        return $pdf->stream('mypdf.pdf');
    }
}
