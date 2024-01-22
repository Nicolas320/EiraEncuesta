<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\PDF as ModelsPDF;
use App\Models\Subdirectorio\FinEncuesta;

use Barryvdh\DomPDF\PDF as DomPDFPDF;

use \TCPDF;

use Illuminate\Database\Eloquent\Model;


class PDFController extends Controller
{
    public function pdf()
    {
        $index = FinEncuesta::all();
        $pdf = PDF::loadView('index.pdf', compact('index'));
        return $pdf->stream();
    }

}
