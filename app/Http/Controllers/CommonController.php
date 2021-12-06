<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Age_group;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //

    public static function ageGroupList()
    {
        $age_data = Age_group::all();
        return response()->json(compact('age_data'),200);
        //return view('layouts.left_sidebar',compact('age_data'));
    }

    public function pagination(Request $request)
    {
       $search =  $request->input('q');
       if($search!=""){
           $data = User::where(function ($query) use ($search){
               $query->where('first_name', 'like', '%'.$search.'%')
                   ->orWhere('last_name', 'like', '%'.$search.'%');
           })
           ->paginate(2);
           $data->appends(['q' => $search]);
           return view('pagination',compact('data'));
       }
       else{
       $data = User::paginate(2);
       return view('pagination',compact('data'));
       }
    }

    public function getSectionDetail(Request $request)
    {
        $data = array();
        $html = "";
        $sections = DB::table('situations_sectioned')->where('id', $request->section)->first();
        $sub_sections = DB::table('sub_sections')->where('situations_sectioned_id', $request->section)->get();

        foreach($sub_sections as $sub_section ){
            $html .= '<option value="'.$sub_section->id.'">'.$sub_section->title.'</option>';
        }
        $data['sections'] = $sections;
        $data['sub_sections'] = $sub_sections;
        $data['html'] = $html;
        $data['image'] = $sections->Images;
        return json_encode($data);
    }

    public function getSubsectionDetail(Request $request)
    {
        $data = array();
        $sub_sections = DB::table('sub_sections')->where('id', $request->subsection)->first();
        $data['withImpairment'] = url($sub_sections->impairment_sound);
        $data['withoutImpairment'] = url($sub_sections->soud);        
        return json_encode($data);
    }


}
