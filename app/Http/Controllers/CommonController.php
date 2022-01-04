<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Age_group;
use App\Models\User;
use App\Models\Folder;
use App\Models\Site_setting;	
use App\Models\Saved_styles;	
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use App\Models\UploadMedia;

use Mail;
class CommonController extends Controller
{
    //

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

    public function getViewDetail(Request $request)
    {
        $data = array();
        $html = "";
        $sections = DB::table('todaytehcnologies')->where('id', $request->section)->first();
        
        $data['sections'] = $sections;
        $data['image'] = url($sections->image);
        $data['sound'] = url($sections->sound);
        $data['background_sound'] = url($sections->background_sound);
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

    public function change_product_color(Request $request){ 
        $styles_product = DB::table('styles_product')->where('id',$request->id)->first(); 
        $data['image'] = url($styles_product->image);
        return json_encode($data);
    }

    public function change_hair_color(Request $request){ 
        $styles_color = DB::table('style_colors')->where('id',$request->id)->first(); 
        $data['image'] = url($styles_color->image);
        $data['image2'] = url($styles_color->image_2);
        $data['image3'] = url($styles_color->image_3);
        $data['image4'] = url($styles_color->image_4);
        $data['image5'] = url($styles_color->image_5);
        $data['image6'] = url($styles_color->image_6);
        $data['image7'] = url($styles_color->image_7);
        $data['image8'] = url($styles_color->image_8);
        $data['image9'] = url($styles_color->image_9);
        $data['image10'] = url($styles_color->image_10);
        return json_encode($data);
    }

    public function getModelDetail(Request $request)
    {
        $data = array();
        $html = "";
        $sections = DB::table('models')->where('id', $request->model)->first();
        $sub_sections = DB::table('preferred_models')->where('models_id', $request->model)->get();
        $html .= '<option value="0">Please Select</option>';
        foreach($sub_sections as $sub_section ){
            $html .= '<option value="'.$sub_section->id.'">'.$sub_section->title.'</option>';
        }
        $data['model'] = $sections;
        $data['sub_model'] = $sub_sections;
        $data['html'] = $html;
        $data['image'] = $sections->image;
        return json_encode($data);
    }

    public function getEnthencityDetail(Request $request)
    {
        $data = array();
        $html = '';
        $sub_sections = DB::table('preferred_models')->where('id', $request->enthencityModel)->first();

        $colors = DB::table('style_colors')->where('preferred_models_id', $request->enthencityModel)->get();
        
        foreach($colors as $color ){
            $html .= '<div class="form-check custom-radio" onclick="change_hair_color('.$color->id.')">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault'.$color->id.'" >
                <span class="form-check-label" style="background-color:'.$color->color_code.' "></span>
                '.$color->color_title.' 
            </div>';
        }


        $data['name'] = $sub_sections->name;
        $data['icon_image'] = url($sub_sections->icon_image);        
        $data['brand'] = $sub_sections->brand;        
        $data['title'] = $sub_sections->title;        
        $data['description'] = $sub_sections->description;    
        $data['html'] = $html;    
        return json_encode($data);
    }

    public function expirynotificationagenda()
    {
       $data = 'expiry_warnings';
       $value = DB::table('email_notifications')->select('*')->where('email_template' , $data)->get();
        $agendas = DB::table('agendas')->where('end_date', date('Y-m-d'))->get();
       foreach($agendas as $agenda){
            $user = DB::table('users')->select('disabled_notification','email')->where('status', 'Enabled')->where('id', $agenda->user_id)->first();
            if(isset($user->disabled_notification) && $user->disabled_notification == 0){
                 $email = $user->email; 
                 $msg = "Your Agenda Title: '".$agenda->title."' is going to expire on ".$agenda->end_date.".";
                 
                Mail::send('notification.emailnotification',['email' => $email, 'value' => $value, 'msg' => $msg],
                    function ($message) use ($email) {
                        $message->to($email)->subject('Expiry Notification Oticon Agenda');
                    }
                );
            } 
            
       }
       
   }

   public function expirynotificationreport()
    {
       $data = 'expiry_warnings';
       $value = DB::table('email_notifications')->select('*')->where('email_template' , $data)->get();
        $rows = DB::table('saved_styles')->where('end_date', date('Y-m-d'))->get();
       foreach($rows as $row){
          $user = DB::table('users')->select('disabled_notification','email')->where('status', 'Enabled')->where('id', $row->user_id)->first();
            if(isset($user->disabled_notification) && $user->disabled_notification == 0){
                 $email = $user->email; 
                 $msg = "Your Report File name: '".$row->file_name."' is going to expire on ".$row->end_date.".";
                 
                Mail::send('notification.emailnotification',['email' => $email, 'value' => $value, 'msg' => $msg],
                    function ($message) use ($email) {
                        $message->to($email)->subject('Expiry Notification Oticon Report');
                    }
                );
            } 
            
       }
       
   }

   public function expirynotificationmedia()
    {
       $data = 'expiry_warnings';
       $value = DB::table('email_notifications')->select('*')->where('email_template' , $data)->get();
        $rows = DB::table('upload_media')->where('end_date', date('Y-m-d'))->get();
       foreach($rows as $row){
            $user = DB::table('users')->select('disabled_notification','email')->where('status', 'Enabled')->where('id', $row->user_id)->first();
            if(isset($user->disabled_notification) && $user->disabled_notification == 0){
                 $email = $user->email; 
                 $msg = "Your Media Name: '".$row->media_name."' is going to expire on ".$row->end_date.".";
                 
                Mail::send('notification.emailnotification',['email' => $email, 'value' => $value, 'msg' => $msg],
                    function ($message) use ($email) {
                        $message->to($email)->subject('Expiry Notification Oticon Media');
                    }
                );
            } 
            
       }
       
   }
    public function changeUserNotification(Request $request)  {
        $users_id = Auth::user()->id ;
        DB::table('users')->where('id', $users_id)->update(['disabled_notification' => $request->disabled]);
        return $request->disabled;
    }

    public function delete_expired_notification()
    {
        $agendas = Agenda::select('pdf', 'id')->where('end_date', '<', date('Y-m-d'))->get();
        foreach ($agendas as $agenda) {
            $agendapathFile =   storage_path('app/' . $agenda->pdf);
            if (file_exists($agendapathFile)) {
                unlink($agendapathFile);
            }
            DB::table('agendas')->where('id', $agenda->id)->delete();
        }

        $medias = UploadMedia::select('media_path', 'id')->where('end_date', '<', date('Y-m-d'))->get();
        foreach ($medias as $media) {
            $mediapathFile =   'storage/' . $media->media_path;
            if (file_exists($mediapathFile)) {
                unlink($mediapathFile);
            }
            UploadMedia::where('id', $media->id)->delete();
        } 

        $styles = Saved_styles::select('excel_path', 'id', 'pdf_path')->where('end_date', '<', date('Y-m-d'))->get(); 
        foreach ($styles as $style) {
            $stylespathexcel = $style->excel_path; 
            $stylespathpdf = $style->pdf_path; 
            if (file_exists($stylespathexcel)) {
                unlink($stylespathexcel);
            }
            if (file_exists($stylespathpdf)) {
                unlink($stylespathpdf);
            }
            DB::table('saved_styles')->where('id', $style->id)->delete();
        }
        return 1;
    }

    public function addFolder(Request $request)  {
        $fol = new Folder;
        $fol->user_id = Auth::user()->id;
        $fol->folder_name = $request->folder;
        $fol->save(); 
        $html='<option value="'.$fol->id.'">'.$request->folder.'</option>';

        $data['html'] = $html;    
        $data['id'] = $fol->id;    
        $data['folder_name'] = $request->folder;    
        return json_encode($data); 
    }
   
}
