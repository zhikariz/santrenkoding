@extends('layouts.master')
@section('css')
    <style>
        .Judul{
            font-family: roboto;
            padding-top: 6%;
            opacity: 0.6;
            margin-top: 1%;
            width: 100%;
            padding-top: 3%;
            padding-bottom: 3%;
            background: grey;
        }
        .hEvent{
            background-image: url('https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg');
            height: 400px;
            width: 100%;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('header')
    <!-- StartHeader -->

        <div class="hEvent text-center row">
          <div class="Judul col align-self-end">
              <h1 class="subJudul">{{$event->nama}}</h1>
          </div>
        </div>

    <!-- EndHeader -->
    <br>
@endsection
@section('content')
  <div class="container">
    <!-- StartNavTabs -->
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="daftar-tab" data-toggle="tab" href="#daftar" role="tab" aria-controls="daftar" aria-selected="false">Pendaftaran</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
      <br>
      <h2>Jadwal Pelaksanaan</h2>
      <p>{{date('d M Y H:i', strtotime($event->mulai))}} <b>s/d</b> {{date('d M Y H:i', strtotime($event->selesai))}}</p><br>

      <h2>Keterangan</h2>
      <p>{{$event->keterangan}}</p><br>

      <h2>Deskripsi</h2>
      <img width="100%" src="{{URL::asset('uploads/'.$event->foto)}}" alt=""><br><br>

      {{$event->deskripsi}}
      <br><br>
    </div>
    <div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="daftar-tab">
      <br>
      <h2>PESERTA</h2>
      <p><b>Kuota : </b> {{$event->kuota}} <br>
      <b>Pendaftar : </b> {{$jml=count($peserta)}} <br>
      <b>Sisa Kuota : </b> {{$event->kuota-$jml}}</p>
      <h2>KEIKUTSERTAAN</h2>
      <form class="" action="/users/{{$event->id}}/daftar" method="post">
        {{ csrf_field() }}
        @if (count($ket)>0)

          <p> {{$user->name}} Telah Terdaftar </p>
        @else
          <button type="submit" class="btn btn-lg btn-primary col-lg-3" name="button" onclick="confirm('Yakin ingin mendaftar event ini ?')">Daftar Event</button>
        @endif

      </form>

      <br><br>
    </div>
    </div>
    <!-- EndNavTabs -->
  </div>

@endsection
@section('js')

@endsection
