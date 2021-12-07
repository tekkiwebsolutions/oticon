<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use PDF;
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
        return view('about_hearing_brain',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing','data'=>$data]);

        //return view('about_hearing_brain');
    }

    public function aboutHearingEar(Request $request){
        $data = "";        
        return view('about_hearing_ear',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing','data'=>$data]);

        //return view('about_hearing_ear');
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
        $data = "";        
        return view('resources',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'resources','data'=>$data]);
    }
    public function reports(Request $request)
    {
        $data = "";        
        return view('reports',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'reports','data'=>$data]);
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
        $data = "";
        return view('myaccounts_reports',['curruntpage'=>'myaccounts_reports','data'=>$data]);
    }
    public function myaccount_agendas(Request $request){
        /*$agendas = DB::table('agendas')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();*/

        $agendas = Agenda::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(1);
        return view('myaccount_agendas',['curruntpage'=>'myaccount_agendas','agendas'=>$agendas]);
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
                    'title' => 'Welcome to Oticon',
                    'date' => date('m/d/Y')
                ];

                $filename = "oticonagenda_".$lastInsertedId;
                $path = storage_path('pdf/agendas');

                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0755, true, true);

                } 
                $pdf = PDF::loadView('pdf.agendapdf', $data)->save(''.$path.'/'.$filename.'.pdf');              ;

                $pdf->download(''.$filename.'.pdf');

                Agenda::where('id', $lastInsertedId)->update(['pdf' => 'pdf/agendas/'.$filename.'.pdf']);


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
        $data = "";
        return view('myaccount_media',['curruntpage'=>'myaccount_media','data'=>$data]);
        
    }
    public function myaccount(){
        $data = "";
        return view('myaccount',['curruntpage'=>'myaccount','data'=>$data]);
    }
    public function product_categories(){
        return view('product_categories');
    }
    public function product_listing(){
        return view('product_listing');
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
     
}
