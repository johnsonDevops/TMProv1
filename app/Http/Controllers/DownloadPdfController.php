<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APartyDaysheet;
use App\Models\BPartyDaysheet;
use App\Models\CPartyDaysheet;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPdfController extends Controller
{
    public function viewDaysheet(int $id)
    {
        $daysheet = APartyDaysheet::findorFail($id);

        $data = [ "daysheet" => $daysheet ];

        // $pdf = Pdf::loadView('pdf.daysheet', $data);
        return view('pdf.daysheet', $data);
        
        // return $pdf->stream($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');
    }

    // public function generateDaysheet(int $id)
    // {
    //     $daysheet = APartyDaysheet::findorFail($id);

    //     $data = [ "daysheet" => $daysheet ];

    //     $pdf = Pdf::loadView('pdf.daysheet', $data);
    //     return $pdf->download($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');

    // }

    public function viewBDaysheet(int $id)
    {
        $daysheet = BPartyDaysheet::findorFail($id);

        $data = [ "daysheet" => $daysheet ];

        $pdf = Pdf::loadView('pdf.daysheet', $data);
        return $pdf->stream($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');
    }
    public function viewCDaysheet(int $id)
    {
        $daysheet = CPartyDaysheet::findorFail($id);

        $data = [ "daysheet" => $daysheet ];

        $pdf = Pdf::loadView('pdf.daysheet', $data);
        return $pdf->stream($daysheet->day_type . '-' . date("m.d.y") .  '-' . time() . '.pdf');
    }

}
