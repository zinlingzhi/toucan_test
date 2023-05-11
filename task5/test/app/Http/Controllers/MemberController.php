<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function create()
    {
        $schools = School::all();
        
        return view('members.create', compact('schools'));
    }
    
    public function store(Request $request)
    {
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->school_id = $request->school;
        $member->save();
        
        return redirect()->route('members.index');
    }
    
    public function index(Request $request)
    {

        $schoolId = $request->input('school_id');
        echo $schoolId;
        if ($schoolId) {
            $members = Member::where('school_id', $schoolId)->get();
        } else {
            $members = Member::all();
        }
        
        $schools = School::all();
        
        // return view('members.index', compact('members', 'schools'));
        return view('index', ['schools' => $schools, 'members' => $members]);
    }
}
