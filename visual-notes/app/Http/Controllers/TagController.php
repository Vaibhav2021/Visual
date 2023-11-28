<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use DataTables;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        addVendors(['select','datatable']);
        if ($request->ajax()) {
            $data = \App\Models\Tag::select('*');
            $sr = 1;
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($row) use (&$sr) {
                    return $sr++;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('tags.create.form').'/'.$row->id . '" class="edit lh-sm me-1" data-bs-toggle="modal" data-bs-target="#visual_notes_modal" data-bs-whatever="Create Tag">
                    <span class="material-symbols-outlined">
                    edit
                    </span>
                    </a>';

                    $btn .= '<a href="' . route('tag.delete').'/'.$row->id . '" class="edit lh-sm text-danger ms-1">
                    <span class="material-symbols-outlined">
                    delete
                    </span></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'id'])
                ->make(true);
        }
    
        return view('Tags.index');
    }
    

    // public function index(UsersDataTable $dataTable)
    // {
    //     return $dataTable->render('Tags.index');
    // }

    public function createForm($tag_id = null)
    {
        $tags = null;
        if (!empty($tag_id)) {
            $tags = \App\Models\Tag::where('id', $tag_id)->first();
        }
        $htmlForm = view('Tags.form', ['tag' => $tags])->render();
        return response()->json(['success' => 200, 'html' => $htmlForm]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'tagname' => 'required',

        ]);

        $tag = !empty($request->tag_id) ? 'Updated' : 'Created';
        $tagdata = \App\Models\Tag::updateOrCreate(['id' => $request->tag_id], $validated);
        if ($tagdata) {
            return response()->json(['status' => 200, 'message' => "Tag $tag successfully", 'redirect' => route('tag')]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delete = \App\Models\Tag::where('id', $id)->delete();

        $delete ? $array = ['status' => 'success', 'message' => 'Tag Deletd successfully'] : $array = ['status' => 'error', 'message' => 'Tag Not Deletd'];
        return back()->with($array['status'], $array['message']);
    }
}