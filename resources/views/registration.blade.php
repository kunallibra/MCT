
@extends('layout.app')
@section('content')

      <div class="container p-3 my-3 border">
        <h3 align="center"> Registration</h3><br />

        @if(isset(Auth::user()->email))

        @if(session()->has('success'))
       <div class="alert alert-success">
           {{session()->get('success')}}
       </div>
        @endif

       <form  action="{{URL('insert')}}" method="post" enctype="multipart/form-data">
           {{csrf_field()}}
             <div class="form-group">
               <label for="fname">First Name</label>
               <input type="text" class="form-control" id="fname" placeholder="Enter First Name" value="{{old('fname')}}" name="fname">
               {!! $errors->first('fname', '<div class="alert alert-danger"> :message </div>') !!}
             </div>
             <div class="form-group">
               <label for="lname">Last Name:</label>
               <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" value="{{old('lname')}}" name="lname">
               {!! $errors->first('lname', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

             <div class="form-group">
               <label for="dob">Date Of Birth</label>
               <input type="date" class="form-control" id="dob" placeholder="Date Of Birth"  value="{{old('dob')}}" name="dob">
               {!! $errors->first('dob', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

             <div class="form-group">
               <label for="ed">Enrolment Date</label>
               <input type="date" class="form-control" id="ed" placeholder="Enrolment Date"  value="{{old('ed')}}" name="ed">
               {!! $errors->first('ed', '<div class="alert alert-danger"> :message </div>') !!}
             </div>

              <div class="form-group">
                <label for="year">Current School Year:</label>
                <select class="form-control" id="year" name="year" value="{{old('year')}}">
                  <? for ($year= now()->year; $year >=  1970; $year--): ?>
                    <option value="<?=$year;?>"><?=$year;?></option>
                  <? endfor; ?>
                  </select>
                  {!! $errors->first('year', '<div class="alert alert-danger"> :message </div>') !!}
              </div>


              <div class="form-group">
                <label for="hp">Home Phone</label>
                <input type="text" class="form-control" id="hp" placeholder="Home Phone" value="{{old('hp')}}" name="hp">
                {!! $errors->first('hp', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="mob">Mobile</label>
                <input type="text" class="form-control" id="hp" placeholder="Mobile" value="{{old('mob')}}" name="mob">
                {!! $errors->first('mob', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="mob">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}" name="email">
                {!! $errors->first('email', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_fname1">1st Contact Name</label>
                <input type="text" class="form-control" id="c_fname1" placeholder="Enter 1st Contact Name" value="{{old('c_fname1')}}" name="c_fname1">
                {!! $errors->first('c_fname1', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_hp1">1st Contact Phone</label>
                <input type="text" class="form-control" id="c_hp1" placeholder="Enter 1st Contact Phone" value="{{old('c_hp1')}}" name="c_hp1">
                {!! $errors->first('c_hp1', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_fname2">2nd Contact Name</label>
                <input type="text" class="form-control" id="c_fname2" placeholder="Enter 2nd Contact Name" value="{{old('c_fname2')}}" name="c_fname2">
                {!! $errors->first('c_fname2', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <div class="form-group">
                <label for="c_hp2">2nd Contact Phone</label>
                <input type="text" class="form-control" id="c_hp2" placeholder="Enter 2nd Contact Phone" value="{{old('c_hp2')}}" name="c_hp2">
                {!! $errors->first('c_hp2', '<div class="alert alert-danger"> :message </div>') !!}
              </div>

              <hr>

              <div class="form-group">
                <label for="file">Upload Student Photo <small>(Optional)</small> </label>
                <input type="file" class="form-control" id="file" placeholder="Please Upload a pic" value="{{old('file')}}" name="file">
                {!! $errors->first('file', '<div class="alert alert-danger"> :message </div>') !!}
              </div>
 
             <button type="submit" class="btn btn-primary">Regsiter</button>

       </form>



        @else
         <script>window.location = "/";</script>
        @endif

        <br />
      </div>


  @endsection
