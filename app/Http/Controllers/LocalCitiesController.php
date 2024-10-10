<?php

namespace App\Http\Controllers;

use App\Models\local_cities;
use App\Models\Cabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LocalCitiesController extends Controller
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

        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = local_cities::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Cabs())->getTable());

        $items = local_cities::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->groupBy('name')
            ->paginate($rows);
        $title = 'View local Cities';
        $active = 'local_city';
        return view('admin.local_city.index', compact('items', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Cabs::select('*')->where('status', 1)->get();
        $title = 'Add Local City';
        $active = 'local_city';
        return view('admin.local_city.create', compact('title', 'active', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:local_cities',
            'status' => 'required',
        ]);
        foreach ($request->cab_id as $key => $row) {

            if ($request->eight_hr[$key] != '' && $request->twelve_hr[$key] != '') {
                $insrt = new local_cities();
                $insrt->name = $request->name;
                $insrt->cab_id = $row;
                $insrt->status = $request->status;
                $insrt->eight_hr = $request->eight_hr[$key];
                $insrt->twelve_hr = $request->twelve_hr[$key];
                $insrt->extra_hr = $request->extra_hr[$key];
                $insrt->save();
            }
        }

        return redirect()->route('local_city.index')->with('success', 'City Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\local_cities  $local_cities
     * @return \Illuminate\Http\Response
     */
    public function show(local_cities $local_cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\local_cities  $local_cities
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $item = local_cities::findOrFail($id);
        $items = Cabs::select('*')->where('status', 1)->get();
        $title = 'Add Local City';
        $active = 'local_city';
        return view('admin.local_city.edit', compact('title', 'active', 'items', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\local_cities  $local_cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        foreach ($request->cab_id as $key => $row) {

            if ($request->data_id[$key] != '') {
                $update = local_cities::find($request->data_id[$key]);
                $update->name = $request->name;
                $update->cab_id = $row;
                $update->status = $request->status;
                $update->eight_hr = $request->eight_hr[$key];
                $update->twelve_hr = $request->twelve_hr[$key];
                $update->extra_hr = $request->extra_hr[$key];
                $update->save();
            } else {
                $insrt = new local_cities();
                $insrt->name = $request->name;
                $insrt->cab_id = $row;
                $insrt->status = $request->status;
                $insrt->eight_hr = $request->eight_hr[$key];
                $insrt->twelve_hr = $request->twelve_hr[$key];
                $insrt->extra_hr = $request->extra_hr[$key];
                $insrt->save();
            }
        }

        return redirect()->route('local_city.index')->with('success', 'City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\local_cities  $local_cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(local_cities $local_cities)
    {
        //
    }
}
