<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\User;
use App\Mail\Offers;
use App\Models\DailyVisitors;
use App\Models\Bigdealsoffers;
use App\Models\fundingrequests;
use App\Models\Newsletters;
use App\Models\chatleavemessages;
use App\Models\adminnotifications;
use App\Models\storeproducts;
use DB;
use Illuminate\Support\Facades\Mail;
class SiteController extends Controller
{
   public function indexview()
   {
      $ip_address =  $this->getUserIpAddr();
      $date = date('d-m-Y');
      $test =  DB::table('daily_visitors')->where('ip', $ip_address)->where('visitordata', $date)->first();
      if(empty($test)){
         $visitors = new DailyVisitors;
         $visitors->ip =  $ip_address;
         $visitors->country = $this->ip_info($ip_address, "country");
         $visitors->state = $this->ip_info($ip_address, "state");
         $visitors->city = $this->ip_info($ip_address, "city");
         $visitors->visitordata = date('d-m-Y');
         $visitors->save();
      }
      $metas = DB::table('cms')->where('pagename', 'homepage')->first();
      return view('welcome')->with(array('metatags'=>$metas));
   }
   public function checkurl($id)
   {
      $url = DB::table('siteurls')->where('url', $id)->first();
      if(!empty($url))
      {
        $modalname = $url->modalname;
        if($modalname == "services")
        {
          $data = DB::table('services')->where('serviceurl', $id)->first();
          return view('pages.services.viewservice')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "faq") {
          $data = DB::table('faqquestions')->get();
          return view('pages.faq.index')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "privacypolicy") {
          
        }
        elseif ($modalname == "termsandcondition") {
          $data = DB::table('siteurls')->where('url', $id)->first();
          return view('pages.terms.index')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "products") {
          $data = storeproducts::all();
          return view('pages.products.index')->with(array('data'=>$data));
        }
        elseif ($modalname == "blogs") {
          $data = DB::table('siteurls')->where('url', $id)->first();
          return view('pages.blogs.index')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "aboutus") {
          $data = DB::table('siteurls')->where('url', $id)->first();
          return view('pages.aboutus.index')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "contactus") {
          return view('pages.contactus.index');
        }
        elseif ($modalname == "technology") {
          $data = DB::table('technologies')->where('technologiesurl', $id)->first();
          return view('pages.technologies.index')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "alltechnologies") {
          $data = DB::table('siteurls')->where('url', $id)->first();
          return view('pages.technologies.all')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "allservices") {
          $data = DB::table('siteurls')->where('url', $id)->first();
          return view('pages.services.all')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "requestquote") {
          return view('pages.request.index');
        }
        elseif ($modalname == "whyuspage") {
          $data = DB::table('cms')->where('pagename', 'why')->first();
          return view('pages.whyus.index')->with(array('metatags'=>$data));
        }
        elseif ($modalname == "singleblog") {
          $data = DB::table('blogs')->where('url', $id)->first();
          return view('pages.blogs.viewblog')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "blogcategories") {
          $data  = DB::table('blogcategories')->where('url', $id)->first();
          $catid = $data->id;
          $blog   = DB::table('blogs')->where('blogcategoryid', $catid)->get();
          return view('pages.blogs.blogbycat')->with(array('metatags'=>$data , 'data'=>$blog));
        }
        elseif ($modalname == "storeproduct") {
          $data  = DB::table('storeproducts')->where('url', $id)->first();
          return view('pages.products.viewproduct')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "dashboard") {
          if(Auth::check()){
            // $data = cases::where('users' , Auth::user()->id)->get();
            return view('pages.dashboard.index');
          }else{
            return redirect()->route('login');
          }
        }
      }
      else
      {
        return view('errors.404');  
      }
   } 
   public function faq()
   {
    if(Session::get('language') == "ar"){
      return view('pages.faq.arabic');
    }else{
      return view('pages.faq.english');
    }
   }
   public function why()
   {
    $metas = DB::table('cms')->where('pagename', 'why')->first();
    if(Session::get('language') == "ar"){
      return view('pages.why.arabic')->with(array('metatags'=>$metas));
    }else{
      return view('pages.why.english')->with(array('metatags'=>$metas));
    }
   }



   public function privacypolicy()

   {

    if(Session::get('language') == "ar"){

      return view('pages.privacy.arabic');

    }else{

      return view('pages.privacy.english');

    }

   }

   public function termscondition()

   {

    if(Session::get('language') == "ar"){

      return view('pages.terms.arabic');

    }else{

      return view('pages.terms.english');

    }

   }



   public function homeservices()

   {

      if(Session::get('language') == "ar"){

         return view('afterlogin.navbar.arabic');

      }else{

         return view('afterlogin.navbar.english');

      }

   }



   public function profile()

   {

   if(Session::get('language') == "ar"){

         return view('pages.profile.arabic');

      }else{

         return view('pages.profile.english');

      }

   }

   public function commission()
   {
    $metas = DB::table('cms')->where('pagename', 'commission')->first();
      if(Session::get('language') == "ar"){
         return view('pages.commission.arabic')->with(array('metatags'=>$metas));
      }else{
         return view('pages.commission.english')->with(array('metatags'=>$metas));
      }
   }

   public function servicedetails($id)
   {
      if(Session::get('language') == "ar"){
         return view('afterlogin.services.arabic')->with('id' , $id);
      }else{
         return view('afterlogin.services.english')->with('id', $id);
      }
   }

   public function updateprofile(Request $request)

   {
      $name = $request->name;
      $email = $request->email;
      $country = $request->country;
      $phone = $request->phone;
      $id =  Auth::user()->id;
      $data = array('name'=>$name,"email"=>$email,"country"=>$country,"phonenumber"=>$phone);
      user::where('id', $id)->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');

   }
   public function service($id)
   {
      $metas = DB::table('services')->where('id', $id)->first();
      if(Session::get('language') == "ar"){
         return view('pages.services.allchild.arabic')->with(array('id'=>$id , 'metatags'=>$metas));
      }else{
         return view('pages.services.allchild.english')->with(array('id'=>$id , 'metatags'=>$metas));
      }
      
   }
   public function viewservice($id)
   {
      $test =  DB::table('childservices')->where('id', $id)->first();
      $metas = DB::table('childservices')->where('id', $id)->first();
      if(Session::get('language') == "ar"){
         return view('pages.services.viewservice.arabic')->with(array('data'=>$test,'metatags'=>$metas));
      }else{
         return view('pages.services.viewservice.english')->with(array('data'=>$test,'metatags'=>$metas));
      }
   }
   public function insertemailfornewsletter(Request $request)
   {
       $email = $request->email;
       $test =  DB::table('newsletters')->where('email', $email)->first();
       if (empty($test)) {
         $subject = "Welcome to Sarck Solution";
         $name = "Sarck Solution";
         Mail::send(array('html' => 'mail.newsubscribe'), array('name' => $name), function($message) use ($email, $subject)
          {
              $message->to($email)->subject($subject);
          });
         $requestquote = new Newsletters;
         $requestquote->email =  $request->email;
         $requestquote->save();
         echo "subscribed";
       }else{
        echo "already";
       }
   }
   public function insertchatmessage(Request $request)
   {
      $notification = $request->chatname." Send Message";
      $type = "Leave Message";
      $url =  url('admin/leavechatbox');
      $this->adminnotification($url,$notification,$type);
      $ip_address =  $this->getUserIpAddr();
      $chat = new chatleavemessages;
      $chat->country =  $this->ip_info($ip_address, "country");
      $chat->state =  $this->ip_info($ip_address, "state");
      $chat->city =  $this->ip_info($ip_address, "city");
      $chat->url = $request->url;
      $chat->chatname = $request->chatname;
      $chat->chatemail = $request->chatemail;
      $chat->readstatus = 1;
      $chat->status = 'recieved';
      $chat->chatmessagemessage = $request->chatmessagemessage;
      $chat->save();

   }
   public function submitquote(Request $request)

   {
        $name  = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $service = $request->service;
        $message = $request->message;
        $date  = date('d-m-Y');

        // $requesturl = "bigdealoffersadmin";
        // Mail::send(array('html' => 'mail.offers'), array('name' => $name,'email' => $email,'phone_number' => $phone_number,'country' => $country,'usermessage' => $usermessage,'date' => $date,'requesturl' => $requesturl), function($message) use ($email, $subject)
        // {
        //     $message->to('info@tamwilly.com')->subject($subject);
        // });

       $requestquote = new Bigdealsoffers;
       $requestquote->name =  $name;
       $requestquote->email = $email;
       // $requestquote->country = $phone;
       $requestquote->phonenumber = $phone;
       $requestquote->message = $message;
       $requestquote->status = 1;
       $requestquote->offerdate = date('d-m-Y');
       $requestquote->inquiryservice = $service;
       if($requestquote->save()){
        echo "success";
       }else{
        echo "string";
       }
   }
   public function submitcontactus(Request $request)

   {
        $name  = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $websitename = $request->websitename;
        $message = $request->message;
        // $subject = $name." Sent Funding Request Offer";
        // $date  = date('d-m-Y');
        // $requesturl = "fundingrequestsadmin";
        // Mail::send(array('html' => 'mail.offers'), array('name' => $name,'email' => $email,'phone_number' => $phone_number,'country' => $country,'usermessage' => $usermessage,'date' => $date,'requesturl' => $requesturl), function($message) use ($email, $subject)
        // {
        //     $message->to('info@tamwilly.com')->subject($subject);
        // });
       $quote = new fundingrequests;
       $quote->name =  $name;
       $quote->email = $email;
       $quote->phonenumber = $phone;
       $quote->websitename = $websitename;
       $quote->message = $message;
       $quote->status = 1;
       $quote->offerdate = date('d-m-Y');
       $quote->save();
       return redirect()->back()->with('success', 'Your Message Submited Successfully. We Wil Contact You Soon for Further Details Call this Number '.DB::table('sitesettings')->where('id', 1)->first()->phoneno.'');
   }

    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }





   function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {

    $output = NULL;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {

        $ip = $_SERVER["REMOTE_ADDR"];

        if ($deep_detect) {

            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))

                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))

                $ip = $_SERVER['HTTP_CLIENT_IP'];

        }

    }

    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));

    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");

    $continents = array(

        "AF" => "Africa",

        "AN" => "Antarctica",

        "AS" => "Asia",

        "EU" => "Europe",

        "OC" => "Australia (Oceania)",

        "NA" => "North America",

        "SA" => "South America"

    );

    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {

        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {

            switch ($purpose) {

                case "location":

                    $output = array(

                        "city"           => @$ipdat->geoplugin_city,

                        "state"          => @$ipdat->geoplugin_regionName,

                        "country"        => @$ipdat->geoplugin_countryName,

                        "country_code"   => @$ipdat->geoplugin_countryCode,

                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],

                        "continent_code" => @$ipdat->geoplugin_continentCode

                    );

                    break;

                case "address":

                    $address = array($ipdat->geoplugin_countryName);

                    if (@strlen($ipdat->geoplugin_regionName) >= 1)

                        $address[] = $ipdat->geoplugin_regionName;

                    if (@strlen($ipdat->geoplugin_city) >= 1)

                        $address[] = $ipdat->geoplugin_city;

                    $output = implode(", ", array_reverse($address));

                    break;

                case "city":

                    $output = @$ipdat->geoplugin_city;

                    break;

                case "state":

                    $output = @$ipdat->geoplugin_regionName;

                    break;

                case "region":

                    $output = @$ipdat->geoplugin_regionName;

                    break;

                case "country":

                    $output = @$ipdat->geoplugin_countryName;

                    break;

                case "countrycode":

                    $output = @$ipdat->geoplugin_countryCode;

                    break;

            }

        }

    }

    return $output;

}

    public function adminnotification($url , $notification , $type)
    {
      $notifye = new adminnotifications;
      $notifye->url = $url;
      $notifye->notification = $notification;
      $notifye->readstatus = 1;
      $notifye->type = $type;
      $notifye->save();
    }

}

