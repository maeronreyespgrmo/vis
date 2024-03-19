<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $boardOfDirectors = DB::table(function($query) {
            $query->select([
                'tb1.id',
                'tb1.name',
                'tb1.election_id',
                DB::raw('(SELECT COUNT(candidate_id) FROM tbl_votes WHERE candidate_id = tb1.id) AS count_id')
            ])->from(DB::raw('(SELECT id, name, election_id FROM tbl_candidates WHERE election_id = 1) tb1'));
        })->get();

        $electionCommittees = DB::table(function($query) {
            $query->select([
                'tb1.id',
                'tb1.name',
                'tb1.election_id',
                DB::raw('(SELECT COUNT(candidate_id) FROM tbl_votes WHERE candidate_id = tb1.id) AS count_id')
            ])->from(DB::raw('(SELECT id, name, election_id FROM tbl_candidates WHERE election_id = 2) tb1'));
        })->get();


        $auditCommittees = DB::table(function($query) {
            $query->select([
                'tb1.id',
                'tb1.name',
                'tb1.election_id',
                DB::raw('(SELECT COUNT(candidate_id) FROM tbl_votes WHERE candidate_id = tb1.id) AS count_id')
            ])->from(DB::raw('(SELECT id, name, election_id FROM tbl_candidates WHERE election_id = 3) tb1'));
        })->get();
        return view('welcome', compact(
         'boardOfDirectors', 'electionCommittees', 'auditCommittees'
        ));
    }

    public function view()
    {
        $page = [
            'parent' => 'vote',
            'child'  => '',
            'title'  => 'Vote Management',
            'crumb'  => 'Vote'
        ];
        $boardOfDirectors   = Candidate::where('election_id', 1)->get();
        $electionCommittees = Candidate::where('election_id', 2)->get();
        $auditCommittees    = Candidate::where('election_id', 3)->get();

        $distinctBallotIds = Vote::groupBy('ballot_id')->pluck('ballot_id');

        return view('votes.index', compact(
            'page','boardOfDirectors', 'electionCommittees', 'auditCommittees','distinctBallotIds'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $boardOfDirectors   = Candidate::where('election_id', 1)->get();
        $electionCommittees = Candidate::where('election_id', 2)->get();
        $auditCommittees    = Candidate::where('election_id', 3)->get();

        return view('votes.create', compact(
            'boardOfDirectors', 'electionCommittees', 'auditCommittees'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $array_set =array_merge($request->board_directors,$request->election_committee,$request->audit_committee);
        foreach($array_set as $item){
            $vote = new Vote();
            $vote->candidate_id = $item;
            $vote->ballot_id = $request->ballot_id;
            $vote->save();
        }
        return back()->with('success', 'Successfuly added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
        $candidate = Candidate::find($id);
        $candidate->deleted_at = Carbon::now('Asia/Manila');
        $candidate->save();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
