<?php

namespace App\Http\Controllers;

use App\Models\Cabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CabsController extends Controller
{
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
            $rows = Cabs::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Cabs())->getTable());

        $items = Cabs::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
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
            ->paginate($rows);
        $title = 'View Category';
        $active = 'cab';
        return view('admin.cab.index', compact('items', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Category';
        $active = 'cab';
        return view('admin.cab.create', compact('title', 'active'));
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
            'name' => 'required',
            'title' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'km_charges' => 'required',
            'allowance' => 'required',
            'status' => 'required',
            'type' => 'required',
            'capacity' => 'required',
            'orders' => 'required',
        ]);
        $insrt = new Cabs();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . 'photo.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->photo = $filename;
        }

        $insrt->name = $request->name;
        $insrt->title = $request->title;
        $insrt->ac_cab = $request->ac_cab;
        $insrt->type = $request->type;
        $insrt->capacity = $request->capacity;
        $insrt->km_charges = $request->km_charges;
        $insrt->allowance = $request->allowance;
        $insrt->status = $request->status;
        $insrt->orders = $request->orders;
        $insrt->save();

        return redirect()->route('cab.index')->with('success', 'Cab category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabs  $cabs
     * @return \Illuminate\Http\Response
     */
    public function show(Cabs $cabs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabs  $cabs
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $item = cabs::findOrFail($id);
        $title = 'Edit Cab Category';
        $active = 'cab';
        return view('admin.cab.edit', compact('item', 'title', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabs  $cabs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'km_charges' => 'required',
            'allowance' => 'required',
            'status' => 'required',
            'type' => 'required',
            'capacity' => 'required',
        ]);
        $insrt = Cabs::findOrFail($id);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . 'photo.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->photo = $filename;
        }

        $insrt->name = $request->name;
        $insrt->title = $request->title;
        $insrt->ac_cab = $request->ac_cab;
        $insrt->type = $request->type;
        $insrt->capacity = $request->capacity;
        $insrt->km_charges = $request->km_charges;
        $insrt->allowance = $request->allowance;
        $insrt->status = $request->status;
        $insrt->orders = $request->orders;
        $insrt->save();

        return redirect()->route('cab.index')->with('success', 'Cab category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabs  $cabs
     * @return \Illuminate\Http\Response
     */

    public function compressAndStore($image, $filename)
    {
        // Get the image extension
        $extension = $image->getClientOriginalExtension();

        // Get the image real path
        $imagePath = $image->getRealPath();

        // Set compression path
        $storagePath = storage_path('app/public/images/' . $filename);

        // Compress image using GD Library
        if ($extension == 'jpeg' || $extension == 'jpg') {
            // Create image from jpeg
            $img = imagecreatefromjpeg($imagePath);
            // Compress and save the image (quality 75%)
            imagejpeg($img, $storagePath, 70);
        } elseif ($extension == 'png') {
            // Create image from png

            $img = @imagecreatefrompng($imagePath);
            // Compress and save png (compression level from 0-9)
            imagepng($img, $storagePath, 8);
        } elseif ($extension == 'gif') {
            // Create image from gif
            $img = imagecreatefromgif($imagePath);
            // Save gif (no compression)
            imagegif($img, $storagePath);
        }

        // Free up memory
        imagedestroy($img);
    }


    public function destroy(string $id)
    {
        $user = Cabs::findOrFail($id);
        $user->delete();
        return redirect()->route('cab.index')->with('success', 'cab Deleted Successfully');
    }
}
