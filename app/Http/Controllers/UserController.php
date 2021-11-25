<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:20',
            'email'=>'required|unique:users',
            'password'=>'required|min:8|max:16'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = Str::slug($request->name);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:20',
            'email'=>'required|unique:users,email,'.$user->id,
            'password'=>'sometimes|nullable|min:8|max:16'
        ]);

        $user->name = $request->name;
        $user->username= Str::slug($request->name);
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.user.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // if(File::exists($post->image)){
            //     File::delete($post->image);
            // }
            $user->delete();
            return redirect()->route('admin.user.index')->with('success','User deleted successfully');
    }

    public function profile()
    {
        return view('admin.user.profile');
    }
    public function profileupdate(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:20',
            'email'=>'required',
            'password'=>'sometimes|nullable|min:8|max:16',
            'image'=>'image|mimes:jpg,jpeg,png'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        if(!empty($request->username)){
            $user->username = $request->username;
        }
        if(!empty($request->description)){
            $user->description = $request->description;
        }
        if(!empty($request->address)){
            $user->address = $request->address;
        }
        if(isset($request->image)){
            if(File::exists($user->image)){
                File::delete($user->image);
            }
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $image->move('storage/user/',$image_name);
            $user->image = 'storage/user/'.$image_name;
        }
        $user->save();

        return redirect()->back()->with('success','Profile updated successfully');
    }
}
