<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;

class HorseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $horses = Horse::all();

        $horses = Horse::orderBy('name')->get();

        return view('horse.index', ['horses' => $horses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),

            [
                'horse_name' => ['required', 'min:3', 'max:64'],
                'horse_runs' => ['required', 'min:3', 'max:64'],
                'horse_wins' => ['required', 'min:1', 'max:333'],
                'horse_about' => ['required', 'min:0', 'max:333'],
            ],

            // [
            // 'author_surname.required' => 'idek pavarde',
            // 'author_surname.min' => 'per trumpa pavarde'
            // ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $horse = new Horse;
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();

        return redirect()->route('horse.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {

        $validator = Validator::make(
            $request->all(),

            [
                'horse_name' => ['required', 'min:3', 'max:64'],
                'horse_runs' => ['required', 'min:3', 'max:64'],
                'horse_wins' => ['required', 'min:1', 'max:333'],
                'horse_about' => ['required', 'min:1', 'max:333'],
            ],

            // [
            // 'author_surname.required' => 'idek pavarde',
            // 'author_surname.min' => 'per trumpa pavarde'
            // ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }


        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();

        
        return redirect()->route('horse.index')->with('success_message', 'Sekmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if($horse->horseBetters->count()){
            return redirect()->route('horse.index')->with('info_message', 'Trinti negalima, nes turi statymų.');
        }
        $horse->delete();


        return redirect()->route('horse.index')->with('success_message', 'Sekmingai ištrintas.');
        
    }
}
