<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use App\Models\User;					
use App\Models\Site_setting;					
use App\Models\Resource;
use App\Models\Questionnairereply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ageGroup()
    {
        // $age_data = DB::select('select * from age_group ORDER BY ID ASC LIMIT 3');
        $age_data = DB::table('age_group')->orderBy('id', 'ASC')->take(3)->get();
        return view('age_group',['ageCatData'=>$age_data]);
    }

    public function aboutHearing(Request $request){
        $data = "";        
        return view('about_hearing',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing','data'=>$data]);

        return view('about_hearing');
    }

    public function aboutHearingBrain(Request $request){
        $data = "";        
        return view('about_hearing_brain',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing_brain','data'=>$data]);
    }

    public function aboutHearingEar(Request $request){
        $data = "";        
        return view('about_hearing_ear',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing_ear','data'=>$data]);
    }



    public function yourHearing()
    {
        return view('your_hearing');
    }

    public function yourHearingCat(Request $request)
    { 
        $data = "";        
        return view('your_hearing',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'your_hearing','data'=>$data]);
    }

    

    public function introduction(){
        return view('introduction');
    }

    public function introductionCat(Request $request){
        $data = DB::table('introductions as i')
        ->select('i.*')
        ->leftJoin('age_group as a', 'a.id', '=', 'i.age_group_id')       
        ->where([['a.slug','LIKE',$request->ageCat]])
        ->orderBy('i.id', 'desc')
        ->first();
        return view('introduction',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'introduction','data'=>$data]);
    }

    public function situations(Request $request)
    {
        //$sections = DB::table('situations_sectioned')->get();
        $sections = DB::table('situations_sectioned as s')
        ->select('s.*')
        ->leftJoin('age_group as a', 'a.id', '=', 's.age_group_id')       
        ->leftJoin('sub_sections as ss', 's.id', '=', 'ss.situations_sectioned_id')     
        ->where([['a.slug','LIKE',$request->ageCat]])
        ->where([['ss.id','>=',1]])
        ->orderBy('s.id', 'ASC')
        ->groupBy('s.id')
        ->get();       
        if(isset($sections[0]->id) && $sections[0]->id >0){
            $sub_sections = DB::table('sub_sections')->where('situations_sectioned_id', $sections[0]->id)->get(); 
        } else{
            $sub_sections = DB::table('sub_sections')->get(); 
        }
        
        return view('situations',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'situations','sections'=>$sections,'sub_sections'=>$sub_sections]);
        //return view('situations');
    }

    public function yourSolution()
    {
        return view('your_solution');
    }
    public function yourSolutionCat(Request $request)
    { 
        $data = "";        
        return view('your_solution',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'your_solution','data'=>$data]);
    }

    
    public function styles(Request $request)
    {
        $data = "";        
        return view('styles',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'styles','data'=>$data]);
        
    }

    public function resources(Request $request)
    {
        $resources = Resource::find($request->id);
        $questionnaires = DB::table('questionnaires')->where('resources_id', $request->id)->get();
        return view('resources',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'reports','resources'=>$resources,'questionnaires'=>$questionnaires,'resource_id'=>$request->id]);
    }
    public function reports(Request $request)
    {  
        $resources =  Resource::select('resources.*')
        ->leftJoin('age_group', 'age_group.id', '=', 'resources.age_group_id')
        ->where([['age_group.slug','LIKE',$request->ageCat]]);
        if(isset($request->search)){
            $searchData = $request->search; 
            $resources = $resources->where('resources.description' , 'LIKE', '%' . $searchData . '%' )
            ->orWhere('resources.title' , 'LIKE', '%' . $searchData . '%' );        
        }

        if(isset($request->order)){
            $order = $request->order;
            $resources = $resources->orderBy('resources.id' , $order );        
        } else{
            $resources = $resources->orderBy('resources.id', 'DESC');
        }
        $resources = $resources->paginate(5); 

        $artilces = '';
        if ($request->ajax()) {
            foreach ($resources as $resource) {
                $artilces.='<div class="all-reports"> 
                <div class="all-reports-inner ';
                if(isset($resource->url) && $resource->url !="") {$artilces.='highlighted';}                
                $artilces.=' ">
                <a href="'.route('resources', [$request->ageCat, $resource->id]) .'" class="text-decoration-none">
                    <h3>'.Str::limit($resource->title, 100, ' ...').'</h3>
                </a>
                <p>'.Str::limit($resource->description, 250, ' ...').' </p>';
                if(isset($resource->pdf_upload) && $resource->pdf_upload !="") {
                    $artilces.='<p><a href="'.url($resource->pdf_upload).'" class="download-pdf" target="_blank" ><img src="'.url('images/pdf-icon.png').'" /><span>download pdf</span></a></p>';
                
                }
                
                if(isset($resource->url) && $resource->url !=""){
                    $artilces.='<p><a href="'.route('resources', [$request->ageCat, $resource->id]) .'"  class="read_more" ><span>Read More</span></a></p>';
                }
                $artilces.='</div>
            </div>';
            }
            return $artilces;
        }

        return view('reports',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'reports','resources'=>$resources]);
    }
    
    
    
    public function technologyHistory(Request $request)
    {
        $data = "";        
        return view('technologyhistory',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'technologyhistory','data'=>$data]);
    }
    
    public function todayTechnology(Request $request)
    {
        $data = "";        
        return view('today_technology',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'today_technology','data'=>$data]);
    }
    public function binaural_benifits(Request $request){
        $data = "";        
        return view('binaural_benifits',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'binaural_benifits','data'=>$data]);
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function myaccounts_reports(){
        $siteData = Site_setting::first();
        return view('myaccounts_reports',['curruntpage'=>'myaccounts_reports','siteData'=>$siteData]);
    }

    public function myaccount_agendas(Request $request){
        $siteData = Site_setting::first();
        $agendas = Agenda::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('myaccount_agendas',['curruntpage'=>'myaccount_agendas','agendas'=>$agendas,'siteData'=>$siteData]);
    } 

     

    public function save_agendas(Request $request){
        $data = $request->input();
        $rules = [
			'title' => 'required|string|min:3'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('myaccount_agendas_create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                if(isset($data['agenda_id']) && $data['agenda_id'] >0){                      
                    Agenda::where('id', $data['agenda_id'])
                    ->update(['title' => $data['title'],'client_name' => $data['client_name'],'description' => $data['description'],'sectionss' => implode(",", $data['selections'])]);
                    $lastInsertedId= $data['agenda_id'];
                } else{
                    $agenda = new Agenda;
                    $agenda->user_id = Auth::user()->id ;
                    $agenda->title = $data['title'];
                    $agenda->client_name = $data['client_name'];
                    $agenda->description = $data['description'];
                    $agenda->sectionss = implode(",", $data['selections']);
                    $agenda->save();
                    $lastInsertedId= $agenda->id;
                }


                $data = [
                    'title' => 'Oticon',
                    'date' => date('m/d/Y'),
                    'name' => $data['title'],
                    'client_name' => $data['client_name'],
                    'description' => $data['description'],
                    'secton' => implode(",", $data['selections'])
                ];

                $filename = "oticonagenda_".$lastInsertedId;
                $path = storage_path('app/uploads/pdf/agendas');

                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0755, true, true);

                } 
                $pdf = PDF::loadView('pdf.agendapdf', $data)->save(''.$path.'/'.$filename.'.pdf');              ;

                $pdf->download(''.$filename.'.pdf');

                Agenda::where('id', $lastInsertedId)->update(['pdf' => 'uploads/pdf/agendas/'.$filename.'.pdf']);


				return redirect('myaccount_agendas')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('myaccount_agendas_create')->with('failed',"operation failed");
			}
		}
    }
    
    public function delete_agendas(Request $request){
        Agenda::where('id',$request->id)->delete();
        return redirect('myaccount_agendas')->with('status',"Deleted successfully");
    }
    public function myaccount_media(){
        $siteData = Site_setting::first();
        return view('myaccount_media',['curruntpage'=>'myaccount_media','siteData'=>$siteData]);
        
    }
    public function myaccount(){
        $data = Auth::user();
        return view('myaccount',['curruntpage'=>'myaccount','data'=>$data]);
    }

    public function myaccountEdit(){
        $data = Auth::user();
        return view('myaccountEdit',['curruntpage'=>'myaccount','data'=>$data]);
    }

    public function myaccountUpdate(Request $request){

        $data = $request->input();
        $rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'occupation' => 'required',
			'location' => 'required'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}
        else{

        $value = Auth::user();
        $value->first_name = $request->input('first_name');
        $value->last_name = $request->input('last_name');
        $value->email = $request->input('email');
        $value->occupation = $request->input('occupation');
        $value->location = $request->input('location');

        // dd($value);

        $value->update();
        
        return redirect('myaccount')->with('success','Account updated successfully.');
        }
    }

    public function mypassword(){
        $data = Auth::user();
        return view('mypassword',['curruntpage'=>'myaccount','data'=>$data]);
    }

    public function mypasswordUpdate(Request $request){
        $data = Auth::user();

        $rules = [
			'password' => 'required|min:8',
			'confirm_password' => 'required|same:password|min:8',
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}

        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if($password == $confirm_password){
        $data->password = Hash::make($request->password);
        $data->update();

    }

        return redirect('myaccount')->with('success','Password successfully changed.');
    }

    public function product_categories(Request $request){
        $data = "";
        return view('product_categories',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'product_categories','data'=>$data]);
    }
    public function product_listing(Request $request){
        $data = "";
        return view('product_listing',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'product_listing','data'=>$data]);

    }
    public function myaccount_agendas_create(){
        $data = "";
        return view('myaccount_agenda_create',['curruntpage'=>'myaccount_agendas','data'=>$data]);
    }
    public function myaccount_agendas_edit(Request $request){
        $data = Agenda::where('id','=',$request->id)->first();
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";
        return view('myaccount_agenda_create',['curruntpage'=>'myaccount_agendas','data'=>$data]);

    }
     
    public function save_questionnaires(Request $request){
        $data = $request->input();
        $rules = [
			'questionnaireoption' => 'required'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('resources/'.$data['ageCatUrl'].'/'.$data['resource_id'])
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                foreach($data['questionnaireoption'] as $question=>$answer){
                    $que = new Questionnairereply;
                    $que->users_id = Auth::user()->id ;
                    $que->questionnaires_id = $question;
                    $que->questionnaireoptions_id = $answer;
                    $que->save();
                }                

				return redirect('resources/'.$data['ageCatUrl'].'/'.$data['resource_id'])->with('status',"Submited successfully");
			}
			catch(Exception $e){
				return redirect('resources/'.$data['ageCatUrl'].'/'.$data['resource_id'])->with('failed',"operation failed");
			}
		}
    }

    public function about_us(){
        $site_data = DB::table('aboutpages')->first();
        return view('about_us',['site_data'=>$site_data]);
    }

    public function policy(){
        $site_data = DB::table('policypages')->first();
        return view('policy',['site_data'=>$site_data]);
    }

    public function contact(){
        $site_data = DB::table('contactpages')->first();
        return view('contact',['site_data'=>$site_data]);
    }

    public function term(){
        $site_data = DB::table('termpages')->first();
        return view('term',['site_data'=>$site_data]);
    }
}
