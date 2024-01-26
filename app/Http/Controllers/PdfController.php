<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use App\Models\Subdirectorio\FinEncuesta;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Knp\Snappy\Pdf as SnappyPdf;

class PDFController extends Controller
{
    public function pdf()
    {
    //    return view('index.pdf');

    $usuariospdf=pdf::all();

    $pdf =pdf::loadview('index.pdf', \compact('usuariospdf'));

    return $pdf->stream();

    }

}
