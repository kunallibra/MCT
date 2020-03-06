<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Registration;
use DB;

class ProjectController extends Controller
{

         public function index() {
           return view('login');
         }


         public function checklogin(Request $request) {
           $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
           ]);

           $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
           );

           if(Auth::attempt($user_data)) {
            return redirect('/home');
           }
           else  {
            return back()->with('error', 'Wrong Login Details');
           }

          }

          public function successlogin()   {
             return view('home');
            }

          public function logout()   {
           Auth::logout();
           return redirect('/');
          }


          public function Registration() {
              return view('registration');
          }


          public function register(Request $request) {
            $rules = [
                'fname'             => 'required',
                'lname'         => 'required',
                'dob'         => 'required',
                'ed'         => 'required',
                'year'         => 'required',
                'hp'         => 'required',
                'mob'         => 'required',
                'email'            => 'required|email|unique:registrations',
                'c_fname1'         => 'required',
                'c_hp1'         => 'required',
                'c_fname2'         => 'required',
                'c_hp2'         => 'required',
                'file'       => '|image|mimes:jpg,jpeg,png|max:2048',
            ];

              $customMessages = [
                  'fname.required' => 'Please enter First Name',
                  'lname.required' => 'Please enter Last Name',
                  'dob.required' => 'Please select Valid Date of Birth',
                  'ed.required' => 'Please select Enrolment Date',

                  'year.required' => 'Please select valid Year',
                  'hp.required' => 'Please enter valid Home Phone',
                  'mob.required' => 'Please enter valid Mobile',
                  'email.required' => 'Please enter valid Email Address',

                  'c_fname1.required' => 'Please select valid First Name of Contact',
                  'c_hp1.required' => 'Please select valid First Contact Number',
                  'c_fname2.required' => 'Please select valid Second Name of Contact',
                  'c_hp2.required' => 'Please select valid Second Contact Number',
                  'file.mimes' => 'Please Upload valid Pic - make sure its in PNG/ JPG/ JPEG format',
                  'file.max' => 'Please Upload valid Pic - make sure its not more than 2MB size',
              ];


            $validator = Validator::make($request->input(), $rules, $customMessages);


            if ($validator->fails()) {

                  $messages = $validator->messages();
                  return back()->withErrors($validator)->withInput();

              } else {

                $newReg = new Registration;
                $newReg->fname = strtolower($request->input('fname'));
                $newReg->lname = strtolower($request->input('lname'));
                $newReg->dob = $request->input('dob') ;
                $newReg->enrolDate = $request->input('ed') ;
                $newReg->year = $request->input('year') ;
                $newReg->hPhone = $request->input('hp') ;
                $newReg->mobile = $request->input('mob') ;
                $newReg->email = $request->input('email') ;
                $newReg->f_conName = strtolower($request->input('c_fname1')) ;
                $newReg->f_conPhone = $request->input('c_hp1') ;
                $newReg->s_conName = strtolower($request->input('c_fname2'));
                $newReg->s_conPhone  = $request->input('c_hp2') ;


                if ($request->hasFile('file')) {
                    $image = $request->file('file');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/studentPic');
                    $image->move($destinationPath, $name);
                    $newReg->photo = $name ;
                }

                  $newReg->save();

                  return back()->with('success', 'Student Information was successfully saved.');

              }

          }


          public function viewSummary() {

            $list = DB::table('registrations')
                    ->orderBy('year', 'DESC')
                    ->orderBy('fname', 'ASC')
                    ->get();


              return view('summary')->with('lists' , $list);
          }


          public function edit($id) {
            $edit = DB::table('registrations')
                    ->where('id', $id)
                    ->get();

              return view('update')->with('editing' , $edit)->with('s_id',$id);
          }

          public function update(Request $request) {

            $rules = [
                'fname'             => 'required',
                'lname'         => 'required',
                'dob'         => 'required',
                'ed'         => 'required',
                'year'         => 'required',
                'hp'         => 'required',
                'mob'         => 'required',
                'email'            => 'required|email',
                'c_fname1'         => 'required',
                'c_hp1'         => 'required',
                'c_fname2'         => 'required',
                'c_hp2'         => 'required',
                'file'       => '|image|mimes:jpg,jpeg,png|max:2048',
            ];

              $customMessages = [
                  'fname.required' => 'Please enter First Name',
                  'lname.required' => 'Please enter Last Name',
                  'dob.required' => 'Please select Valid Date of Birth',
                  'ed.required' => 'Please select Enrolment Date',

                  'year.required' => 'Please select valid Year',
                  'hp.required' => 'Please enter valid Home Phone',
                  'mob.required' => 'Please enter valid Mobile',
                  'email.required' => 'Please enter valid Email Address',

                  'c_fname1.required' => 'Please select valid First Name of Contact',
                  'c_hp1.required' => 'Please select valid First Contact Number',
                  'c_fname2.required' => 'Please select valid Second Name of Contact',
                  'c_hp2.required' => 'Please select valid Second Contact Number',
                  'file.mimes' => 'Please Upload valid Pic - make sure its in PNG/ JPG/ JPEG format',
                  'file.max' => 'Please Upload valid Pic - make sure its not more than 2MB size',
              ];

                $validator = Validator::make($request->input(), $rules, $customMessages);


              if ($validator->fails()) {

                    $messages = $validator->messages();
                    return back()->withErrors($validator)->withInput();

                } else {

                  $update = Registration::where('id',  $request->input('studID'))->firstOrFail();
                  $update->fname = strtolower($request->input('fname'));
                  $update->lname = strtolower($request->input('lname'));
                  $update->dob = $request->input('dob') ;
                  $update->enrolDate = $request->input('ed') ;
                  $update->year = $request->input('year') ;
                  $update->hPhone = $request->input('hp') ;
                  $update->mobile = $request->input('mob') ;
                  $update->email = $request->input('email') ;
                  $update->f_conName = strtolower($request->input('c_fname1')) ;
                  $update->f_conPhone = $request->input('c_hp1') ;
                  $update->s_conName = strtolower($request->input('c_fname2'));
                  $update->s_conPhone  = $request->input('c_hp2') ;


                  if ($request->hasFile('file')) {
                      $image = $request->file('file');
                      $name = time().'.'.$image->getClientOriginalExtension();
                      $destinationPath = public_path('/studentPic');
                      $image->move($destinationPath, $name);
                      $update->photo = $name ;
                  }

                    $update->save();

                    return back()->with('success', 'Student Information was successfully saved.');

                }

          }


          public function delete($id) {
            $delete = Registration::where('id',  $id)->delete();


            $list = DB::table('registrations')
                    ->orderBy('year', 'DESC')
                    ->orderBy('fname', 'ASC')
                    ->get();


              return view('summary')->with('lists' , $list);
          }


          public function report() {

            $report = DB::select('Select year, count(`year`) as "total" FROM `registrations` GROUP by year order by year desc');

                return view('report')->with('reports' , $report);

          }


}
