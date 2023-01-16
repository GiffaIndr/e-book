<?php

namespace App\Http\Controllers;

use App\Models\commer;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CommerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $others = commer::orderBy('views', 'desc')->get();
      $commers = commer::all();
        return view('users.index', compact('commers', 'others'));
    }

    public function login(){
        return view('users.login');
    }

    public function register(){
        return view('users.register');
    }
    public function admin(Request $request){
        $commers =  commer::all();
        return view('admin.dash', compact('commers'));
    }
    public function screen($id){
        $commers = commer::where('id' ,$id)->get();
        return view('users.screen', compact('commers'));
    }

    public function pdf($id){
        db::table('commers')->where('id', $id)->increment('views');
        $commers = commer::where('id', $id)->get();
        return view('pdf.pdf', compact('commers'));
    }

    public function data(){
        return view('admin.data');
    }
    public function users(Request $request){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function category(){
        return view('admin.category');
    }
    public function errorlogin(){
        return view('users.errorlogin');
    }

    public function registeraccount(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',   
             'no' => 'required',
             'address' => 'required',
            'password' => 'required|max:8',
            'email' => 'required|email:dns'
        ]);
        User::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'no'=> $request->no,
            'password'=> bcrypt($request->password),
            'email'=> $request->email,
        ]);
        return redirect()->route('login')->with('successLogin', 'berhasil menambah akun!! silahkan login.');
    }

    public function Auth(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ],[
            'email.exist' => 'email ini belum tersedia',
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
        ]);

        $user =$request->only('email', 'password');
        if(Auth::attempt($user)) {
            return redirect('/');
        }else{
            return redirect()->back()->with('faillogin', 'anda gagal login, silahkan cek kembali');
        }

    }

    public function logout(){
        Auth::logout();
            return redirect()->route('login');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'buku' => 'required',
            'penulis' => 'required',
            'genre' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'isi' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg'

        ]);
        $image = $request->file('image');
    $imgName = time(). rand().'.'.$image->extension();

    if(!file_exists(public_path('/assets/img/'.$image->getClientOriginalName()))){
       $destinationPath = public_path('/assets/img/');

       $image->move($destinationPath, $imgName);
       $uploaded = $imgName;
    } else {
       $uploaded = $image->getClientOriginalName();
    }
        commer::create([
            'user_id' => Auth::user()->id,
            'penulis' => $request->penulis,
            'buku' => $request->buku,
            'genre' => $request->genre,
            'sinopsis' => $request->sinopsis,
            'penerbit' => $request->penerbit,
            'isi' => $request->isi,
            'done_time' =>  \Carbon\Carbon::now(),
            'image' => $uploaded
        ]);
        return redirect()->back()->with('suksesTambah', 'sukses tambah buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commer  $commer
     * @return \Illuminate\Http\Response
     */
    // public function show($slug)
    // {
    //     $commers = commer::where('slug_judul', $slug)->first();
    //     return view('tampil')->with('tampilkan', $commers);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commer  $commer
     * @return \Illuminate\Http\Response
     */
    public function edit(commer $commer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commer  $commer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commer $commer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commer  $commer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        commer::find($id)->delete();
        return redirect()->route('landing')->with('hapus', 'Buku Berhasil di Hapus');
    }
}
