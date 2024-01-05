<?php
use PDF;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $data = ['title' => 'Mi PDF'];
        $pdf = PDF::loadView('pdf.template', $data);

        return $pdf->download('archivo.pdf');
    }
}
