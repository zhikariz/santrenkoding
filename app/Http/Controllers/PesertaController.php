<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index()
    {
      $event = \App\Event::get();

      return view('admin.peserta.index',compact('event'));
    }

    public function view($id)
    {

      $peserta = \DB::table('pesertas')
      ->join('events', 'pesertas.event_id', '=', 'events.id')
      ->join('users', 'pesertas.user_id', '=','users.id')
      ->where('event_id','=',$id)
      ->select('users.name','users.email', 'events.nama','pesertas.id')
      ->get();
      return view('admin.peserta.peserta',compact('peserta'));
    }

    public function destroy($id){
      $peserta = \App\Peserta::find($id);
      $peserta->delete();

      return redirect()->back();
    }
}
