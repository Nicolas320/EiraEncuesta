<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use PDF;
use App\Models\PDF as ModelsPDF;

class PDFController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function pdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users.pdf', compact('users'));
        return $pdf->stream();
    }
}