
@extends('layout.app')
@section('content')

      <div class="container p-3 my-3 border">
        <h3 align="center"> Update - Student ID: {{$s_id}}</h3><br />

        @if(isset(Auth::user()->email))

        @if(session()->has('success'))
       <div class="alert alert-success">
           {{session()->get('success')}}
       </div>
        @endif

       <form  action="{{URL('update')}}" method="post" enctype="multipart/form-data">
           {{csrf_field()}}

           @foreach ($editing as $edit)
             <div class="form-group">
               <label for="fname">First Name</label>
               <input type="text" class="form-control" id="fname" placeholder="Enter First Name" value="{{old('fname', $edit->fname)}}" name="fname">
               {!! $errors->first('fname', '<div class="alert alert-danger"> :message </div>') !!}
             </div>
             <div class="form-group">
               <label for="lname">Last Name:</label>
               <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" value="{{old('lname', $edit->lname)}}" name="lname">
               {!! $errors->first('lname', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

             <div class="form-group">
               <label for="dob">Date Of Birth</label>
               <input type="date" class="form-control" id="dob" placeholder="Date Of Birth"  value="{{old('dob', $edit->dob)}}" name="dob">
               {!! $errors->first('dob', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

             <div class="form-group">
               <label for="ed">Enrolment Date</label>
               <input type="date" class="form-control" id="ed" placeholder="Enrolment Date"  value="{{old('ed', $edit->enrolDate)}}" name="ed">
               {!! $errors->first('ed', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

              <div class="form-group">
                <label for="year">Current School Year:</label>
                <select class="form-control" id="year" name="year" value="{{old('year', $edit->year)}}">
                  <option value="{{old('year', $edit->year)}}">{{old('year', $edit->year)}}</option>
                  <? for ($year= now()->year; $year >=  1970; $year--): ?>
                    <option value="<?=$year;?>"><?=$year;?></option>
                  <? endfor; ?>
                  </select>
                  {!! $errors->first('year', '<div class="alert alert-danger"> :message </div>') !!}
              </div>


              <div class="form-group">
                <label for="hp">Home Phone</label>
                <input type="text" class="form-control" id="hp" placeholder="Home Phone" value="{{old('hp', $edit->hPhone)}}" name="hp">
                {!! $errors->first('hp', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="mob">Mobile</label>
                <input type="text" class="form-control" id="hp" placeholder="Mobile" value="{{old('mob', $edit->mobile)}}" name="mob">
                {!! $errors->first('mob', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="mob">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" value="{{old('email', $edit->email)}}" name="email">
                {!! $errors->first('email', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_fname1">1st Contact Name</label>
                <input type="text" class="form-control" id="c_fname1" placeholder="Enter 1st Contact Name" value="{{old('c_fname1', $edit->f_conName)}}" name="c_fname1">
                {!! $errors->first('c_fname1', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_hp1">1st Contact Phone</label>
                <input type="text" class="form-control" id="c_hp1" placeholder="Enter 1st Contact Phone" value="{{old('c_hp1', $edit->f_conPhone)}}" name="c_hp1">
                {!! $errors->first('c_hp1', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_fname2">2nd Contact Name</label>
                <input type="text" class="form-control" id="c_fname2" placeholder="Enter 2nd Contact Name" value="{{old('c_fname2', $edit->s_conName)}}" name="c_fname2">
                {!! $errors->first('c_fname2', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_hp2">2nd Contact Phone</label>
                <input type="text" class="form-control" id="c_hp2" placeholder="Enter 2nd Contact Phone" value="{{old('c_hp2', $edit->s_conPhone)}}" name="c_hp2">
                {!! $errors->first('c_hp2', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <hr>


                <div class="row">
                  <div class="col-md-12">
                    @if ($edit->photo != null)
                    <img src="{{ asset('studentPic/'.$edit->photo) }}" height="200" width="200" style="float: left" class="rounded float-left" alt="{{$edit->photo}}">
                    @else
                    <img src="{{ asset('studentPic/blank.jpg') }}" height="200" width="200" style="float: left" class="rounded float-left" alt="Blank">
                    @endif
                  </div>
                </div>

                <br>

              <div class="form-group">

                <label for="file">Upload Student Photo <small>(Optional)</small> </label>
                <input type="file" class="form-control" id="file" placeholder="Please Upload a pic" value="{{old('file', $edit->photo)}}" name="file">
                {!! $errors->first('file', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <a  href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delModal{{$edit->id}}">Delete</a>

              <div class="modal fade" id="delModal{{$edit->id}}" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="delModalLabel">Delete Student ID: {{$edit->id}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this record?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <a href="{{url('delete/'.$edit->id)}}"  class="btn btn-primary" > Yes</a>

                    </div>
                  </div>
                </div>
                </div>

                <input type="hidden" name="studID" value="{{$edit->id}}">
                <input type="hidden" name="photo" value="{{$edit->photo}}">

              @endforeach

             <button type="submit" class="btn btn-primary">Update</button>

       </form>



        @else
         <script>window.location = "/";</script>
        @endif

        <br />
      </div>


  @endsection
