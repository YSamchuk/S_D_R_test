<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class ImagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $images = Image::all();

        return view('form.index', [
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('form.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'file'    => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'user_id' => 'required|integer',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = public_path('/uploads/images');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);

            $image = new Image;
            $image->filename = $name;
            $image->user_id = $request->get('user_id');
            $image->save();
        } else {
            back()->with('error', 'Error need file!');
        }

        return back()->with('success', sprintf('Success, file: %s is uploaded', $file->getClientOriginalName()));
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
    public function edit($id)
    {
        //
        return view('form.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
