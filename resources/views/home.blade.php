
@extends('layout.app')
@section('content')

   <h3 align="center"> Application</h3><br />

   @if(isset(Auth::user()->email))

   @else
    <script>window.location = "/main";</script>
   @endif

   <br />

  @endsection
