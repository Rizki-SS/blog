<?php

namespace App\Http\Controllers;

use App\Laman;
use Illuminate\Http\Request;

class LamanController extends Controller
{

    function __construct()
    {
        // $this->middleware('permission:laman-list|laman-create|laman-edit|laman-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:laman-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:laman-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:laman-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laman::all();
        return view('laman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:Laman,title',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $text = $request->image->extension();
            $imageName = date('d-M-Y') . "_" . $input['title'] . "." . $text;
            $request->image->move(public_path('/storage/files/shares/laman/'), $imageName);
            $input['image'] = $imageName;
        } else {
            $input['image'] = 'default.jpg';
        };

        $input['url'] = str_replace(' ', '-', $input['title']);

        // return $input;

        $Laman = Laman::create($input);

        return redirect()->route('lamans.index')->with('success', 'Laman created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laman  $laman
     * @return \Illuminate\Http\Response
     */
    public function show(Laman $laman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laman  $laman
     * @return \Illuminate\Http\Response
     */
    public function edit(Laman $laman)
    {
        $data = Laman::find($laman->id);
        return view('laman.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laman  $laman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laman $laman)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $text = $request->image->extension();
            $imageName = date('d-M-Y') . "_" . $input['title'] . "." . $text;
            $request->image->move(public_path('/storage/files/shares/laman/'), $imageName);
            $input['image'] = $imageName;
        }

        $input['url'] = str_replace(' ', '-', $input['title']);

        $laman = Laman::find($laman->id);
        $laman->update($input);

        return redirect()->route('lamans.index')->with('success', 'laman created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laman  $laman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laman $laman)
    {
        $data = Laman::find($laman);
        $data->delete();
        return redirect()->route('lamans.index')->with('success', 'Post Deleted');
    }
}
