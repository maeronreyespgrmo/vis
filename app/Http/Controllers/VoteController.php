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
        })
        ->orderBy('count_id', 'desc')
        ->get();

        $electionCommittees = DB::table(function($query) {
            $query->select([
                'tb1.id',
                'tb1.name',
                'tb1.election_id',
                DB::raw('(SELECT COUNT(candidate_id) FROM tbl_votes WHERE candidate_id = tb1.id) AS count_id')
            ])->from(DB::raw('(SELECT id, name, election_id FROM tbl_candidates WHERE election_id = 2) tb1'));
        })
        ->orderBy('count_id', 'desc')
        ->get();


        $auditCommittees = DB::table(function($query) {
            $query->select([
                'tb1.id',
                'tb1.name',
                'tb1.election_id',
                DB::raw('(SELECT COUNT(candidate_id) FROM tbl_votes WHERE candidate_id = tb1.id) AS count_id')
            ])->from(DB::raw('(SELECT id, name, election_id FROM tbl_candidates WHERE election_id = 3) tb1'));
        })
        ->orderBy('count_id', 'desc')
        ->get();
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
        $page = [
            'parent' => 'vote',
            'child'  => '',
            'title'  => 'Vote Management',
            'crumb'  => 'Vote'
        ];
        $boardOfDirectors   = Candidate::where('election_id', 1)->get();
        $electionCommittees = Candidate::where('election_id', 2)->get();
        $auditCommittees    = Candidate::where('election_id', 3)->get();

        return view('votes.create', compact(
            'page','boardOfDirectors', 'electionCommittees', 'auditCommittees'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->board_directors) {
            if(count($request->board_directors) <= 3) {
                foreach($request->board_directors as $board_directors){
                    $vote = new Vote();
                    $vote->candidate_id = $board_directors;
                    $vote->ballot_id = $request->ballot_id;
                    $vote->save();
                }
            }
        }

        if ($request->election_committee) {
            if(count($request->election_committee) <= 3) {
                foreach($request->election_committee as $election_committee){
                    $vote = new Vote();
                    $vote->candidate_id = $election_committee;
                    $vote->ballot_id = $request->ballot_id;
                    $vote->save();
                }
            }
        }

        if ($request->audit_committee) {
            if(count($request->audit_committee) <= 3) {
                foreach($request->audit_committee as $audit_committee){
                    $vote = new Vote();
                    $vote->candidate_id = $audit_committee;
                    $vote->ballot_id = $request->ballot_id;
                    $vote->save();
                }
            }
        }
        
        return back()->with('success', 'Successfully added');
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
    public function edit($id)
    {
        //
        $page = [
            'parent' => 'vote',
            'child'  => '',
            'title'  => 'Vote Management',
            'crumb'  => 'Vote'
        ];

        $vote = Vote::where('ballot_id', $id)->get();

        $boardOfDirectors   = Candidate::where('election_id', 1)->get();
        $electionCommittees = Candidate::where('election_id', 2)->get();
        $auditCommittees    = Candidate::where('election_id', 3)->get();

        return view('votes.edit', compact(
            'page','boardOfDirectors', 'electionCommittees', 'auditCommittees','vote'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        DB::table('tbl_votes')->where('ballot_id', '=', $id)->delete();
        if ($request->board_directors) {
            if(count($request->board_directors) <= 3) {
                foreach($request->board_directors as $board_directors){
                    $vote = new Vote();
                    $vote->candidate_id = $board_directors;
                    $vote->ballot_id = $id;
                    $vote->save();
                }
            }
        }

        if ($request->election_committee) {
            if(count($request->election_committee) <= 3) {
                foreach($request->election_committee as $election_committee){
                    $vote = new Vote();
                    $vote->candidate_id = $election_committee;
                    $vote->ballot_id = $id;
                    $vote->save();
                }
            }
        }

        if ($request->audit_committee) {
            if(count($request->audit_committee) <= 3) {
                foreach($request->audit_committee as $audit_committee){
                    $vote = new Vote();
                    $vote->candidate_id = $audit_committee;
                    $vote->ballot_id = $id;
                    $vote->save();
                }
            }
        }
        
        return back()->with('success', 'Successfully added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        DB::table('tbl_votes')->where('ballot_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
