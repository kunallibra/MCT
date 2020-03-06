
@extends('layout.app')
@section('content')

   <h3 align="center"> Report</h3><br />

   @if(isset(Auth::user()->email))

   <table id="Table1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Year
      </th>
      <th class="th-sm">Total Number of Students Enrolled
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reports as $report)
    <tr>
      <td>{{$report->year}}</td>
      <td>{{$report->total}}</td>
    </tr>


    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th class="th-sm">Year
      </th>
      <th class="th-sm">Total Number of Students Enrolled
      </th>
    </tr>
  </tfoot>
</table>


   @else
    <script>window.location = "/main";</script>
   @endif

   <br />


   <script>
     $(document).ready(function() {
      $('#Table1').DataTable();
    });
   </script>

  @endsection
