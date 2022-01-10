<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use App\Models\User;				
use App\Models\UploadMedia;				
use App\Models\Site_setting;					
use App\Models\Resource;
use App\Models\Questionnairereply;
use App\Models\Technologyhistory;
use App\Models\Saved_styles;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use PDF;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;



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
    }

    public function aboutHearingEar(Request $request){
        $data = "";        
        return view('about_hearing_ear',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'about_hearing','data'=>$data]);
    }



    public function yourHearing()
    {
        return view('your_hearing');
    }

    public function mediaupload(Request $request)
    {
        $siteData = Site_setting::first();
        if($siteData['agendas_exp']){
            $end_date= date('Y-m-d',strtotime('+'.$siteData['mp3_exp'].' day'));
        } else{
            $end_date= date('Y-m-d',strtotime('+9 year'));
        }
       $media = new UploadMedia;       
       $nameid =  $request->user_id;
       if ($request->file('media_name')) {
           $imagePath = $request->file('media_name');
           $imageName = $nameid.'_'.$imagePath->getClientOriginalName();

           $path = $request->file('media_name')->storeAs('media/mp3', $imageName, 'public');
       }

       $media->media_name = $imageName;
       $media->media_path = $path;
       $media->user_id = $request->user_id;
       $media->user_name = $request->user_name;
       $media->end_date = $end_date;
       $media->save();
       return redirect()->back()->with('success', 'Media uploaded successfully');
   }

   public function mediadelete($id)
   {
        $media = UploadMedia::find($id);
        $path= storage_path('app/public/'.$media->media_path);
        if (file_exists($path)) {
            unlink($path);
        } 
        UploadMedia::where('id' , $id)->delete();
        return redirect()->back()->with('success','Media deleted successfully');
   }

    public function yourHearingCat(Request $request)
    { 
        $hearing_sound = DB::table('hearing_sound')->orderBy('id', 'ASC')->get();
        $hearing_gender = DB::table('hearing_gender')->orderBy('id', 'ASC')->get();      
        return view('your_hearing',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'your_hearing','hearing_sound'=>$hearing_sound,'hearing_gender'=>$hearing_gender]);
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
        $models = DB::table('models as m')
        ->select('m.*')    
        ->leftJoin('preferred_models as pm', 'm.id', '=', 'pm.models_id')     
        ->where([['m.product_listing_id',$request->id]])
        ->where([['pm.id','>=',1]])
        ->orderBy('m.id', 'ASC')
        ->groupBy('m.id')
        ->get();   

        if(isset($models[0]->id) && $models[0]->id >0){
            $preferred_models = DB::table('preferred_models')->where('models_id', $models[0]->id)->get(); 
        } else{
            $preferred_models = DB::table('preferred_models')->get(); 
        }

        if(isset($preferred_models[0]->id) && $preferred_models[0]->id >0){
            $style_colors = DB::table('style_colors')->where('preferred_models_id', $preferred_models[0]->id)->get(); 

            $styles_product = DB::table('styles_product')->where('preferred_models_id', $preferred_models[0]->id)->get(); 

        } else{
            $style_colors = DB::table('style_colors')->get(); 
            $styles_product = DB::table('styles_product')->get(); 
        } 
        $folders = DB::table('saved_styles')->select("client_folder","id")->where('user_id', Auth::user()->id)->groupBy("client_folder")->get(); 

        return view('styles',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'styles','models'=>$models,'preferred_models'=>$preferred_models,'style_colors'=>$style_colors,'styles_product'=>$styles_product,'folders'=>$folders],['ageCatUrl'=>$request->ageCat,'product_id'=>$request->id]);
        
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
        $data = DB::table('technologyhistories as i')
        ->select('i.*')
        ->leftJoin('age_group as a', 'a.id', '=', 'i.age_group_id')       
        ->where([['a.slug','LIKE',$request->ageCat]])
        ->orderBy('i.id', 'desc')
        ->first();
        return view('technologyhistory',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'technology_history','data'=>$data]);
    }
    

    public function todayTechnology(Request $request)
    {
        $data = DB::table('todaytehcnologies as s')
        ->select('s.*')
        ->leftJoin('age_group as a', 'a.id', '=', 's.age_group_id')   
        ->where([['a.slug','LIKE',$request->ageCat]])
        ->orderBy('s.id', 'ASC')
        ->get();
                
        return view('today_technology',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'today_technology','data'=>$data]);
        //return view('situations');
    }

    public function todayTechnologyOld(Request $request)
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
       $excelData = Saved_styles::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
       return view('myaccounts_reports',['curruntpage'=>'myaccounts_reports','siteData'=>$siteData,'excelData'=> $excelData]);
   }

   public function save_xls(Request $request)
   {
      $siteData = Site_setting::first();
      if ($siteData['agendas_exp']) {
          $end_date = date('Y-m-d', strtotime('+' . $siteData['reports_exp'] . ' day'));
      } else {
          $end_date = date('Y-m-d', strtotime('+9 year'));
      }

      $data = Saved_styles::create([
          'user_id' => Auth::user()->id,
          'models_id' => $request->model,
          'preferred_models_id' => $request->preferred_model,
          'style_colors_id' => $request->hair_color,
          'product_listing_id' => $request->product_id,
          'client_folder' => $request->folder,
          'end_date' => $end_date,
      ]);

      $id = $data->id;
      $name = $id . '_oticon.xlsx';
      $excelpath = 'storage/' . $name;

      $pdffilename = "oticonstyle_" . $id . '.pdf';
      $pdfpath = 'storage/' . $pdffilename;


      $datapdf = DB::table('saved_styles as s')
          ->select('u.email', 'm.title as model', 'pm.name', 'sc.color_title', 'pl.title', 's.client_folder', 's.end_date','s.created_at')
          ->leftJoin('users as u', 'u.id', '=', 's.user_id')
          ->leftJoin('models as m', 'm.id', '=', 's.models_id')
          ->leftJoin('preferred_models as pm', 'pm.id', '=', 's.preferred_models_id')
          ->leftJoin('style_colors as sc', 'sc.id', '=', 's.style_colors_id')
          ->leftJoin('product_listing as pl', 'pl.id', '=', 's.product_listing_id')
          ->where('s.id', $id)
          ->first();

      $pdf = PDF::loadView('pdf.stylespdf', ['datapdf' => $datapdf])->save($pdfpath);

      Excel::store(new UsersExport($id), $name, 'public');
      Saved_styles::where('id', '=', $id)->update([
          'excel_path' => $excelpath, 'file_name' => $name, 'pdf_path' => $pdfpath, 'pdf_name' => $pdffilename
      ]);
      return redirect("myaccounts_reports")->with('success', 'File has been saved');
    }
   
    public function exceldelete($id)
    {
       $pdffilename = "oticonstyle_" . $id . '.pdf';
       $pdfpath = 'storage/' . $pdffilename;
       $name = $id . '_oticon.xlsx';
       $excelpath = 'storage/' . $name; 
        if (file_exists($excelpath)) {
            unlink($excelpath);
        }
        if (file_exists($pdfpath)) {
            unlink($pdfpath);
        }
       Saved_styles::where('id', $id)->delete();
       return redirect()->back()->with('success', 'File has been deleted');
    }
    public function sendpdf($id)
   {
       $notifyData = 'other_notifications';
       $value = DB::table('email_notifications')->select('*')->where('email_template', $notifyData)->get();
 

        $datapdf = DB::table('saved_styles as s')
        ->select('u.email', 'm.title as model', 'pm.name', 'sc.color_title', 'pl.title', 's.client_folder', 's.end_date','s.created_at')
        ->leftJoin('users as u', 'u.id', '=', 's.user_id')
        ->leftJoin('models as m', 'm.id', '=', 's.models_id')
        ->leftJoin('preferred_models as pm', 'pm.id', '=', 's.preferred_models_id')
        ->leftJoin('style_colors as sc', 'sc.id', '=', 's.style_colors_id')
        ->leftJoin('product_listing as pl', 'pl.id', '=', 's.product_listing_id')
        ->where('s.id', $id)
        ->first();


       $data['email'] = $datapdf->email;
       $data['model'] = $datapdf->model;
       $data['name'] = $datapdf->name;
       $data['color_title'] = $datapdf->color_title;
       $data['title'] = $datapdf->title;
       $data['client_folder'] = $datapdf->client_folder;
       $data['end_date'] = $datapdf->end_date;
       $data['created_at'] = $datapdf->created_at;

       $pdf = PDF::loadView('pdf.sendpdf', $data);

       Mail::send('notification.emailnotification', ['value' => $value, $data], function ($message) use ($data, $pdf, $id) {
           $message->to(Auth::user()->email, $data["email"])
               ->subject('My Accoount Report')
               ->attachData($pdf->output(), "oticonstyle_" . $id . ".pdf");
       });

       return redirect()->back()->with('success', 'Email has been sent');
   }
    public function myaccount_agendas(Request $request){
        $siteData = Site_setting::first();
        $agendas = Agenda::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('myaccount_agendas',['curruntpage'=>'myaccount_agendas','agendas'=>$agendas,'siteData'=>$siteData]);
    } 

     

    public function save_agendas(Request $request){
        $data = $request->input();
        $rules = [
			'title' => 'required|string|min:3',
			'client_name' => 'required|string|min:3',
			'description' => 'required',
			'description' => 'required',
			'selections' => 'required'
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
                    $siteData = Site_setting::first();
                    if($siteData['agendas_exp']){
                        $end_date= date('Y-m-d',strtotime('+'.$siteData['agendas_exp'].' day'));
                    } else{
                        $end_date= date('Y-m-d',strtotime('+9 year'));
                    }
                    $agenda = new Agenda;
                    $agenda->user_id = Auth::user()->id ;
                    $agenda->title = $data['title'];
                    $agenda->client_name = $data['client_name'];
                    $agenda->description = $data['description'];
                    $agenda->end_date = $end_date;
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
                $pdf = PDF::loadView('pdf.agendapdf', $data)->save(''.$path.'/'.$filename.'.pdf');              

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
        $agenda = Agenda::where('id',$request->id)->first();        
        // $pathFile =  dirname(__DIR__,3).'/storage/app/'.$agenda->pdf;
        $pathFile =  $path = storage_path('app/'.$agenda->pdf);
        if (file_exists($pathFile)) {
            unlink($pathFile);
        } 
        Agenda::where('id',$request->id)->delete();
        return redirect('myaccount_agendas')->with('status',"Deleted successfully");
    }
    public function myaccount_media(){
        $siteData = Site_setting::first();
        $mediaData = UploadMedia::where('user_id',Auth::user()->id)->paginate(10);
        return view('myaccount_media',['curruntpage'=>'myaccount_media','siteData'=>$siteData,'mediaData'=>$mediaData]);
       
    }
    public function myaccount(){
        $data = DB::table('users as u')
        ->select('u.*', 'c.name as country_name', 's.name as state_name')          
        ->leftJoin('countries as c', 'c.id', '=', 'u.country_id')  
        ->leftJoin('states as s', 's.id', '=', 'u.location')          
        ->where([['u.id',Auth::user()->id]])
        ->first();   
        return view('myaccount',['curruntpage'=>'myaccount','data'=>$data]);
    }

    public function myaccountEdit(){
        $data = Auth::user();        
        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id',$data->country_id)->get();
        return view('myaccountEdit',['curruntpage'=>'myaccount','data'=>$data,'countries'=>$countries,'states'=>$states]);
    }

    public function myaccountUpdate(Request $request){

        $data = $request->input();
        $rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'occupation' => 'required',
			'country_id' => 'required',
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
        $value->country_id = $request->input('country_id');
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
        $product_categories = DB::table('product_category as c')
        ->select('c.*')
        ->leftJoin('age_group as a', 'a.id', '=', 'c.age_group_id')           
        ->where([['a.slug','LIKE',$request->ageCat]])
        ->orderBy('c.id', 'ASC')
        ->get();   
        return view('product_categories',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'product_categories','product_categories'=>$product_categories]);
    }
    public function product_listing(Request $request){
        $product_Lists = DB::table('product_listing')->where('product_category_id',$request->id)->orderBy('id', 'DESC')->get();
        return view('product_listing',['ageCatUrl'=>$request->ageCat,'curruntpage'=>'product_categories','product_Lists'=>$product_Lists]);
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


}
