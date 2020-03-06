
@extends('layout.app')
@section('content')

   <h3 align="center"> View Summary</h3><br />

   @if(isset(Auth::user()->email))

   @if(session()->has('success'))
  <div class="alert alert-success">
      {{session()->get('success')}}
  </div>
   @endif

   <table id="Table1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">First Name
      </th>
      <th class="th-sm">Last Name
      </th>
      <th class="th-sm">School Year
      </th>
      <th class="th-sm">Email
      </th>
      <th class="th-sm">Edit
      </th>
      <th class="th-sm">Delete
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lists as $list)
    <tr>
      <td>{{ucwords(strtolower($list->fname))}}</td>
      <td>{{ucwords(strtolower($list->lname))}}</td>
      <td>{{$list->year}}</td>
      <td>{{$list->email}}</td>
      <td><a  href="{{url('/edit/'.$list->id)}}" class="btn btn-outline-success">Edit</a> </td>
      <td><a  href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delModal{{$list->id}}">Delete</a> </td>
    </tr>

    <div class="modal fade" id="delModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delModalLabel">Delete Student ID: {{$list->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this record?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a href="{{url('/delete/'.$list->id)}}"  class="btn btn-primary" > Yes</a>

          </div>
        </div>
      </div>
      </div>


    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
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
