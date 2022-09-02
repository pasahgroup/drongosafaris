<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
        /**

     * Write code on Method
     * @return response()

     */

    public function index()

    {
      return view('auth.login');
    }  
  
  public function userList()
    {
        $datas = User::get();
        return view('auth.user',compact('datas'));
    }  
      


  public function show($id)
    {
        $datas = User::where('id',$id)->first();
       //dd($datas);
        return view('auth.editUser',compact('datas'));
    }  


      public function update(Request $request,$id)
    {
           if(request('attachment')){
                $attach = request('attachment');
                foreach($attach as $attached){

                     // Get filename with extension
                     $fileNameWithExt = $attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path = $attached->storeAs('public/user/', $imageToStore);

       
            $user = User::where('id',$id)
               ->update([
           'name' => $request->name,
            'email' => $request->email,          
              'role' => $request->role,
                'status' =>$request->status,
                  'photo' =>$imageToStore,

              ]);

       
       }
            return redirect('/user-list')->withSuccess('User! Updated successful');
      }
    else
    {
        $user = User::where('id',$id)
               ->update([
           'name' => $request->name,
            'email' => $request->email,          
              'role' => $request->role,
                'status' =>$request->status,

              ]);
               return redirect('/user-list')->withSuccess('User! Updated successful');
      }
    }  
    /**
     * Write code on Method
     * @return response()

     */

    public function registration()
    {
        return view('auth.register');

    }

      

    /**
     * Write code on Method
     * @return response()

     */

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
             'status' =>'',
              'role' => '',
               'photo' => '',

        ]);  

             $status=User::where('email',$request->email)
        ->first();
    // dd($status);

if($status==null)
{
     return redirect("login")->withInfo('You have entered Invalid Credentials');
}

    
 if($status->status==1)  
 {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {        
         
        $user=User::where('email',$request->email)
        ->first();
            //$role=$user->role;
              $role = Auth::User()->role;
             // dd('dd1x');
            return redirect()->route('dashboard.index',compact('role'))->withSuccess('You have Successfully loggedin');
        }

        return redirect("logout")->withInfo('You have entered Invalid Credentials');
    }   
   else
   {
        return redirect("login")->withInfo('Your Account was Deactivated.!');
   }
}

      

    /**

     * Write code on Method

     * @return response()

     */

    public function postRegistration(Request $request)
    {
     if(request('attachment')){
                $attach = request('attachment');
                foreach($attach as $attached){

                     // Get filename with extension
                     $fileNameWithExt = $attached->getClientOriginalName();
                     // Just Filename
                     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                     // Get just Extension
                     $extension = $attached->getClientOriginalExtension();
                     //Filename to store
                     $imageToStore = $filename.'_'.time().'.'.$extension;
                     //upload the image
                     $path = $attached->storeAs('public/user/', $imageToStore);

       
          if(request('password') != request('confirm_password'))
          {
            return redirect()->back()->with('info','Password does not match');
          }
          else
          {
          $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
              'role' => $request->role,
                'status' =>'1',
                  'photo' =>$imageToStore,
        ]);
       }

       }

         return redirect()->back()->withSuccess('User! Registered successful');
      }
    else
    {
       return redirect()->back()->with('info','Upload your Photo');
    }

}

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {
        if(Auth::check()){
        return view('dashboard');

    } 

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    

    /**

     * Write code on Method
     * @return response()

     */

    public function create(array $data)

    {

      return User::create([

        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])

      ]);

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();
        Auth::logout();
         return Redirect('login');
        // return redirect("login")->withInfo('You have entered Invalid Credentials');

    }

      public function flush() {

        Session::flush();
        Auth::logout();
      return redirect("login")->withInfo('Roles was not assigned to the route| The user has no preveledge to access this route');
         }

      public function destroy($id)
    {
      $delete = User::where('id',$id)->first();
        if($delete->delete()){
         return redirect()->back()->with('success','User'." ".$delete->name." removed successfully");
        }    
        else{
            return redirect()->back()->with('error','User'." ".$delete->name." not exists");
        }
    }
}
