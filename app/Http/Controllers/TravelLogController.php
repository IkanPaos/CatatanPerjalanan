<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelLog;

class TravelLogController extends Controller
{
    public function home()
    {
        $travel_logs = TravelLog::all();
        return view('travel.index', ['travel_logs' => $travel_logs]);
    }

    public function create()
    {
        $travel_logs = TravelLog::all();
        return view('travel.create', ['travel_logs' => $travel_logs]);
    }

    public function store(Request $request)
    {
        $travel_logs = TravelLog::create($request->all());
        return redirect('travel');
    }
     
    public function show($id)
    {
        $travel_log = TravelLog::find($id);

        return view('travel.show', compact('travel_log'));
    }

    public function edit($id)
    {
        $travel_log = TravelLog::find($id);
        return view('travel.edit', compact('travel_log'));
    }

    public function update(Request $request, $id)
    {
        $travel_log = TravelLog::where('id', $id)->first()->update([
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'temperature' => $request->temperature
        ]);

        return redirect()->route('travel.index');
    }

    public function delete($id)
    {
        $travel_logs = TravelLog::find($id)->delete();
        return redirect('travel');
    }
}