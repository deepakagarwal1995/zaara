<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BlogsController extends Controller
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
            $rows = Blogs::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Blogs())->getTable());

        $items = Blogs::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
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
        $title = 'View Blogs';
        $active = 'blogs';
        return view('admin.blogs.index', compact('items', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Blogs';
        $active = 'blogs';
        return view('admin.blogs.create', compact('title', 'active'));
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
            'title' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required',
            'img_alt' => 'required',
            'status' => 'required',
            'sdescr' => 'required',
            'descr' => 'required',
        ]);
        $insrt = new Blogs();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . 'img.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->img = $filename;
        }

        $insrt->title = $request->title;
        $insrt->slug = $request->slug;
        $insrt->img_alt = $request->img_alt;
        $insrt->sdescr = $request->sdescr;
        $insrt->descr = $request->descr;
        $insrt->status = $request->status;
        $insrt->save();

        return redirect()->route('blogs.index')->with('success', 'Blog Added Successfully');
    }
    public function compressAndStore($image, $filename)
    {
        // Get the image extension
        $extension = $image->getClientOriginalExtension();

        // Get the image real path
        $imagePath = $image->getRealPath();

        // Set compression path
        $storagePath = storage_path('app/public/blog/' . $filename);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $item = Blogs::findOrFail($id);
        $title = 'Edit Blog';
        $active = 'blogs';
        return view('admin.blogs.edit', compact('item', 'title', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'slug' => 'required',
            'img_alt' => 'required',
            'status' => 'required',
            'sdescr' => 'required',
            'descr' => 'required',
        ]);
        $insrt = Blogs::findOrFail($id);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . 'img.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->img = $filename;
        }

        $insrt->title = $request->title;
        $insrt->slug = $request->slug;
        $insrt->img_alt = $request->img_alt;
        $insrt->sdescr = $request->sdescr;
        $insrt->descr = $request->descr;
        $insrt->status = $request->status;
        $insrt->save();

        return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $user = Blogs::findOrFail($id);
        $user->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog Deleted Successfully');
    }
}
