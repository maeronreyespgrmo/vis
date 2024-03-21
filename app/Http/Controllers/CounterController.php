<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;

class CounterController extends Controller
{
    //
    public function index()
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

        return view('counter.index', compact(
        'page','boardOfDirectors', 'electionCommittees', 'auditCommittees'
        ));

        return view('counter.index', compact(
            'boardOfDirectors', 'electionCommittees', 'auditCommittees','total_votes'
           ));
    }

    public function store(Request $request)
    {
        // dd($request->board_directors);
        if ($request->board_directors) {
         
                foreach($request->board_directors as $board_directors){
                      
                    
                        $vote = new Vote();
                        $vote->candidate_id = $board_directors;
                        $vote->ballot_id = $request->ballot_id;
                        $vote->save();
                   
                }
            
                    }
        if ($request->election_committee) {
       
                foreach($request->election_committee as $election_committee){
                    $vote = new Vote();
                    $vote->candidate_id = $election_committee;
                    $vote->ballot_id = $request->ballot_id;
                    $vote->save();
                    
                }
        }

        if ($request->audit_committee) {
            
                foreach($request->audit_committee as $audit_committee){
                    
                    $vote = new Vote();
                    $vote->candidate_id = $audit_committee;
                    $vote->ballot_id = $request->ballot_id;
                    $vote->save();
                    
                }   
         }
         return back()->with('success', 'Successfully added');      
    }
    
}
