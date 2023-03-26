<?php

namespace App\Http\Controllers;

use App\Models\APartyDaysheet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPdfController extends Controller
{
    public function viewDaysheet(int $id)
    {
        $daysheet = APartyDaysheet::findorFail($id);

        $data = [ "daysheet" => $daysheet ];

        $pdf = Pdf::loadView('pdf.daysheet', $data);
        return $pdf->stream($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');
    }

    public function generateDaysheet(int $id)
    {
        $daysheet = APartyDaysheet::findorFail($id);

        $data = [ "daysheet" => $daysheet ];

        $pdf = Pdf::loadView('pdf.daysheet', $data);
        return $pdf->download($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');

    }

    // public function viewBDaysheet(int $id)
    // {
    //     $daysheet = Daysheet::findorFail($id);

    //     $data = [ "daysheet" => $daysheet ];

    //     $pdf = Pdf::loadView('pdf.daysheet', $data);
    //     return $pdf->stream($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');
    // }

    // public function generateBDaysheet(int $id)
    // {
    //     $daysheet = Daysheet::findorFail($id);

    //     $data = [ "daysheet" => $daysheet ];

    //     $pdf = Pdf::loadView('pdf.daysheet', $data);
    //     return $pdf->download($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');

    // }







}
