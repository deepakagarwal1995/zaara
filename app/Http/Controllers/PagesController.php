<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\local_cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PagesController extends Controller
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
            $rows = Pages::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Pages())->getTable());

        $items = Pages::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
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
        $title = 'View Pages';
        $active = 'Pages';
        return view('admin.Pages.index', compact('items', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Pages';
        $active = 'Pages';
        $items = local_cities::where('status', 1)->groupBy('name')->orderBy('name','ASC')->get();
        $pages = Pages::where('status', 1)->orderBy('title','ASC')->get();
        return view('admin.Pages.create', compact('title', 'active','items','pages'));
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
            'slug' => 'required',
            'status' => 'required',
            'category' => 'required',
            'descr' => 'required',
            'sdescr' => 'required',
        ]);
        $insrt = new Pages();

        $selectedOptions = $request->input('external_links');
         $commaSeparatedOptions = implode(',', $selectedOptions);

        $insrt->title = $request->title;
        $insrt->slug = $request->slug;
        $insrt->category = $request->category;
        $insrt->descr = $request->descr;
        $insrt->status = $request->status;
        $insrt->sdescr = $request->sdescr;
        $insrt->is_home = $request->is_home;
        $insrt->cid = $request->cid;
        $insrt->external_title = $request->external_title;
        $insrt->external_links = $commaSeparatedOptions;
        $insrt->save();

        return redirect()->route('pages.index')->with('success', 'Page Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $Pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $Pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $Pages
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $item = Pages::findOrFail($id);
        $title = 'Edit Page';
        $items = local_cities::where('status', 1)->groupBy('name')->orderBy('name','ASC')->get();
        $pages = Pages::where('status', 1)->orderBy('title','ASC')->get();
        $active = 'Pages';
        return view('admin.Pages.edit', compact('item', 'title', 'active','items','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $Pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'status' => 'required',
            'descr' => 'required',
            'sdescr' => 'required',
        ]);

        $selectedOptions = $request->input('external_links');
        $commaSeparatedOptions = implode(',', $selectedOptions);

        $insrt = Pages::findOrFail($id);
        $insrt->title = $request->title;
        $insrt->slug = $request->slug;
        $insrt->category = $request->category;
        $insrt->descr = $request->descr;
        $insrt->status = $request->status;
        $insrt->sdescr = $request->sdescr;
        $insrt->is_home = $request->is_home;
        $insrt->cid = $request->cid;
        $insrt->external_title = $request->external_title;
        $insrt->external_links = $commaSeparatedOptions;
        $insrt->save();

        return redirect()->route('pages.index')->with('success', 'Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $Pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $user = Pages::findOrFail($id);
        $user->delete();
        return redirect()->route('pages.index')->with('success', 'Page Deleted Successfully');
    }
}
