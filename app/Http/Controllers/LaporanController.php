<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function eventpdf(){
      $pdf = PDF::loadView('admin.event.laporan');
      return $pdf->download('event.pdf');
    }

    public function eventexcel(){
      $event = \App\Event::all();
      Excel::create('Export Data', function($excel) use($event)
                                    {
                                    $excel->sheet('event', function($sheet) use($event)
                                                            {
                                                            $sheet->fromArray($event, null, 'A1', false, false);
                                                            });
                                    })->export('xls');
    }
}
