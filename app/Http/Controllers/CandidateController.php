<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = [
            'parent' => 'candidates',
            'child'  => '',
            'title'  => 'Candidate Management',
            'crumb'  => 'Candidates'
        ];

        $candidates = Candidate::select('tbl_candidates.id', 'tbl_candidates.name', 'tbl_elections.title')
        ->join('tbl_elections', 'tbl_candidates.election_id', '=', 'tbl_elections.id')
        ->get();

        // $candidates   = Candidate::all();

        return view('candidates.index', compact(
            'page', 'candidates'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $page = [
            'parent' => 'candidates',
            'child'  => '',
            'title'  => 'Candidate Management',
            'crumb'  => 'Candidates'
        ];


        // $candidates   = Candidate::all();

        return view('candidates.create', compact(
            'page'
                ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'election_name' => 'required',
        ]);

        $user = new Candidate();
        $user->name = $request->name;
        $user->election_id = $request->election_name;
        $user->created_at = Carbon::now();
        $user->save();

        return redirect("/candidates/create")->with('success', 'successfuly added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $page = [
            'parent' => 'candidates',
            'child'  => '',
            'title'  => 'Candidate Management',
            'crumb'  => 'Candidates'
        ];

        $candidates = Candidate::select('tbl_candidates.id', 'tbl_candidates.name', 'tbl_candidates.election_id', 'tbl_elections.title')
        ->join('tbl_elections', 'tbl_candidates.election_id', '=', 'tbl_elections.id')
        ->where('tbl_candidates.id', $id)
        ->get();

        // $candidates   = Candidate::where('id', $id)->get();

        return view("candidates.edit",compact('page','candidates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'election_name' => 'required',
        ]);

        Candidate::where('id', $id)->update([
            'name' => $request->name,
            'election_id' => $request->election_name,
            ]);

        return redirect("/candidates/$id/edit")->with('success', 'successfuly added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $candidate = Candidate::find($id);
        $candidate->deleted_at = Carbon::now('Asia/Manila');
        $candidate->save();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
