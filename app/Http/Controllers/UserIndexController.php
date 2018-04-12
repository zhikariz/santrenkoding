<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function index()
    {
      $event = \App\Event::get();
      return view('welcome',compact('event'));
    }

    public function event()
    {
      $event = \App\Event::get();
      return view('event',compact('event'));
    }

    public function myevent()
    {
        $myevent = \DB::table('pesertas')
                  ->join('events', 'pesertas.event_id', '=', 'events.id')
                  ->join('users', 'pesertas.user_id', '=','users.id')
                  ->where('user_id', '=', \Auth::user()->id)
                  ->select('events.*','pesertas.id as id_peserta')
                  ->get();
      return view('myevent',compact('myevent'));
    }

    public function detailevent($id)
    {
      $data['user'] = \Auth::user();
      $data['event'] = \App\Event::find($id);
      $data['peserta'] = \App\Peserta::where('event_id',$id)->get();
      $data['ket'] = \App\Peserta::where('user_id',$data['user']->id)->get();
      return view('detailevent', $data);
    }

    public function daftar($id)
    {
      // input
      $peserta = new \App\Peserta;
      $peserta->user_id = \Auth::user()->id;
      $peserta->event_id = $id;
      $peserta->save();

      return redirect()->back();
    }

    public function destroy($id)
    {
      $pesertas = \App\Peserta::find($id);
      $pesertas->delete();
      return redirect()->back();
    }
}
