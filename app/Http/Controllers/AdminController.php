<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\cms;
use App\Models\technologies;
use App\Models\faqquestions;
use App\Models\Testimonials;
use App\Models\Childservices;
use App\Models\Notifications;
use App\Models\Notificationcategories;
use App\Models\financingtypes;
use App\Models\sitesettings;
use App\Models\user;
use App\Models\privacypolicies;
use App\Models\termsandconditions;
use App\Models\advertisements;
use App\Models\blogcategories;
use App\Models\blogtags;
use App\Models\blogs;
use App\Models\storecategories;
use App\Models\storetags;
use App\Models\storeproducts;
use DB;
use Mail;
use Validator;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
          return 'n-a';
        }
        return $text;
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function websiteurls()
    {
        return view('admin.settings.url');
    }
    public function addnewservice()
    {
        return view('admin.services.add');
    }
    public function allservices()
    {
        return view('admin.services.all');
    }
    public function faqcategory()
    {
        return view('admin.faq.category');
    }
    public function allfaq()
    {
        return view('admin.faq.all');
    }
    public function addfaq()
    {
        return view('admin.faq.add');
    }
    public function whyussarcksolution()
    {
        return view('admin.cms.why');
    }
    public function addtestimonials()
    {
        return view('admin.testimonials.add');
    }
    public function viewtestimonials()
    {
        return view('admin.testimonials.all');
    }
    public function websiteusers()
    {
        return view('admin.users.alluser');
    }
    public function addsubservices()
    {
        return view('admin.services.addchild');
    }
    public function addadvertisement()
    {
        return view('admin.services.addadvertisement');
    }
    public function addnewnotification()
    {
        return view('admin.notifications.add');
    }
    public function allnotification()
    {
        return view('admin.notifications.all');
    }
    public function addnotificationcategory()
    {
        return view('admin.notifications.category');
    }
    public function quoterequests()
    {
        return view('admin.requests.requestquote');
    }
    public function contactrequests()
    {
        return view('admin.requests.contactrequests');
    }
    public function adminusers()
    {
        return view('admin.users.adminusers');
    }
    public function addadminusers()
    {
        return view('admin.users.add');
    }
    public function homepagecms()
    {
        return view('admin.cms.homepage');
    }
    public function allsubservices()
    {
        return view('admin.services.allchild');
    }
    public function alladvertisement()
    {
        return view('admin.services.alladvertisements');
    }
    public function allcountries()
    {
        return view('admin.countries');
    }
    public function privacypolicyadmin()
    {
        return view('admin.policies.privacy');
    }
    public function termsandconditionadmin()
    {
        return view('admin.policies.terms');
    }
    public function addblog()
    {
        return view('admin.blogs.add');
    }
    public function addblogcategory()
    {
        return view('admin.blogs.categories');
    }
    public function addstorecategory()
    {
        return view('admin.store.category');
    }
    public function addstoretags()
    {
        return view('admin.store.tag');
    }
    public function addblogtags()
    {
        return view('admin.blogs.tags');
    }
    public function allblogs()
    {
        return view('admin.blogs.all');
    }
    public function addproduct()
    {
        return view('admin.store.add');
    }
    public function editblog($id)
    {
        $data = DB::table('blogs')->where('id' , $id)->get()->first();
        return view('admin.blogs.edit')->with(array('data'=>$data));
    }
    public function leavechatbox()
    {
        return view('admin.chat.leavemessages');
    }
    public function createblogcategory(Request $request)
    {
        $name = $request->categoryname;
        $url = $this->slugify($name);
        $newurl = $url."-blogs";
        $category = new blogcategories;
        $category->name = $name;
        $category->url = $newurl;
        $category->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$newurl', 'blogcategories')");
        return redirect()->back()->with('message', 'Category Successfully Inserted');
    }
    public function getblogcategory($id)
    {
       $data = DB::table('blogcategories')->where('id', $id)->first();
       $name = $data->name;
       $mettatittle = $data->mettatittle;
       $metadescription = $data->metadescription;
       $metakeywords = $data->keywords;
       $id = $data->id;
       return response()->json(['metakeywords' => $metakeywords,'name' => $name,'id' => $id,'mettatittle' => $mettatittle,'metadescription' => $metadescription,'metaid' => $id]);
    }
    public function updateblogcategory(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        $data = array('name'=>$name);
        blogcategories::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function createblogtags(Request $request)
    {
        $name = $request->categoryname;
        $url = $this->slugify($name);
        $newurl = $url."-blogs";
        $tag = new blogtags;
        $tag->name = $name;
        $tag->url = $newurl;
        $tag->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$newurl', 'blogtags')");
        return redirect()->back()->with('message', 'Tag Successfully Inserted');
    }
    public function getblogtags($id)
    {
       $data = DB::table('blogtags')->where('id', $id)->first();
       $name = $data->name;
       $mettatittle = $data->mettatittle;
       $metadescription = $data->metadescription;
       $id = $data->id;
       $metakeywords = $data->keywords;
       return response()->json(['metakeywords' => $metakeywords,'name' => $name,'id' => $id,'mettatittle' => $mettatittle,'metadescription' => $metadescription,'metaid' => $id]);
    }
    public function updateblogtags(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        $data = array('name'=>$name);
        blogtags::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function createblog(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'tittle' => 'required|max:255',
            'blogdate' => 'required|max:255',
            'blog' => 'required',
            'blogcategory' => 'required',   
        ]);
        foreach($request->blogtags as $tag){
            $alltags[]=$tag;
        }
        $url = $this->slugify($request->tittle);
        $blogtags = implode("|",$alltags);
        $image = $request->file('image');
        $blogimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $blogimage);
        $saveblog = new blogs;
        $saveblog->image = $blogimage;
        $saveblog->url = $url;
        $saveblog->tittle = $request->tittle;
        $saveblog->blogdate = $request->blogdate;
        $saveblog->description = $request->blog;
        $saveblog->blogtags = $blogtags;
        $saveblog->blogcategoryid = $request->blogcategory;
        $saveblog->blogshortdescription = $request->blogshortdescription;

        $saveblog->mettatittle = $request->tittle;
        $saveblog->metadescription = $request->blogshortdescription;
        $saveblog->ogtittle = $request->tittle;
        $saveblog->ogdescription = $request->blogshortdescription;
        $saveblog->og_image = url('public/images/'.$blogimage);
        $saveblog->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'singleblog')");
        return redirect()->back()->with('message', 'Service Successfully Inserted');
    }
    public function updateblog(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|max:255',
            'blogdate' => 'required|max:255',
            'blog' => 'required',
            'blogcategory' => 'required',   
        ]);
        foreach($request->blogtags as $tag){
            $alltags[]=$tag;
        }
        $id =  $request->id;
        $blogtags = implode("|",$alltags);
        $tittle = $request->tittle;
        $url = $this->slugify($request->tittle);
        $savedurl = DB::table('siteurls')->where('url', $url)->first();
        if(empty($savedurl))
        {
            DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'singleblog')");
        }
        $blogdate = $request->blogdate;
        $blog = $request->blog;
        $blogurl = $url;
        $blogcategoryid = $request->blogcategory;
        $blogshortdescription = $request->blogshortdescription;
        $data = array('blogshortdescription'=>$blogshortdescription,'url'=>$blogurl,"tittle"=>$tittle,"blogdate"=>$blogdate,"description"=>$blog, "blogtags" =>$blogtags, "blogcategoryid" =>$blogcategoryid);
        blogs::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateblogimage(Request $request)
    {
        $id =  $request->id;
        $image = $request->file('image');
        $blogimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $blogimage);
        $data = array('image'=>$blogimage);
        blogs::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function editnotification($id)
    {
        $data = DB::table('notifications')->where('id' , $id)->get()->first();
        return view('admin.notifications.edit')->with(array('data'=>$data));
    }
    public function createnewservice(Request $request)
    {
        $validatedData = $request->validate([
            'serviceimage' => 'required',
            'servicename' => 'required|max:255',
            'serviceurl' => 'required|max:255',
            'serviceshortdescription' => 'required',
            'servicedescription' => 'required',   
            'bannerimage' => 'required',         
        ]);
        if($files=$request->file('serviceimage')){
            $image = $request->file('serviceimage');
            $serviceimage = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $serviceimage);
            $ogimage =  url('public/images/'.$serviceimage);
        }else{
            $ogimage =  url('public/images/logo.jpg');
        }
        if($files=$request->file('bannerimage')){
            $newimage = $request->file('bannerimage');
            $bannerimage = rand() . '.' . $newimage->getClientOriginalExtension();
            $newimage->move(public_path('images'), $bannerimage);
        }
        $service = new Services;
        $service->serviceurl = request('serviceurl');
        $service->servicename = request('servicename');
        $service->serviceshortdescription = request('serviceshortdescription');
        $service->servicedescription = request('servicedescription');
        $service->image = $serviceimage;
        $service->bannerimage = $bannerimage;
        $service->mettatittle = request('servicename');
        $service->metadescription = request('serviceshortdescription');
        $service->ogtittle = request('servicename');
        $service->ogdescription = request('serviceshortdescription');
        $service->og_image = $ogimage;
        $service->save();
        $url = request('serviceurl');
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'services')");
        return redirect()->back()->with('message', 'Service Successfully Inserted');
    }
    public function updateservice(Request $request)
    {
      $serviceurl = $this->slugify($request->servicename);

      if(DB::table('siteurls')->where('url' , $serviceurl)->count() == 0)
      {
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$serviceurl', 'services')");
      }

      $servicename = $request->servicename;
      $serviceshortdescription = $request->serviceshortdescription;
      $servicedescription = $request->servicedescription;
      $id =  $request->id;
      $data = array('serviceurl'=>$serviceurl,"servicename"=>$servicename,"serviceshortdescription"=>$serviceshortdescription,"servicedescription"=>$servicedescription);
        Services::where('id', $id)->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateserviceimage(Request $request){
        $id =  $request->id;
        $image = $request->file('image');
        $serviceimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $serviceimage);
        $data = array('image'=>$serviceimage);
        Services::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatebannerimage(Request $request){
        $id =  $request->id;
        $image = $request->file('bannerimage');
        $serviceimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $serviceimage);
        $data = array('bannerimage'=>$serviceimage);
        Services::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function addnewtechnology(Request $request)
    {
        $url = $this->slugify($request->technologyname);
        $image = $request->file('image');
        $technologyimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $technologyimage);
        $technology = new technologies;
        $technology->image = $technologyimage;
        $technology->technologyname = $request->technologyname;
        $technology->technologiesurl = $this->slugify($request->technologyname);
        $technology->description = $request->technologydescription;
        $technology->mettatittle = $request->technologyname;
        $technology->metadescription = $request->technologyname;
        $technology->ogtittle = $request->technologyname;
        $technology->ogdescription = $request->technologyname;
        $technology->og_image = $technologyimage;
        $technology->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'technology')");
        return redirect()->back()->with('message', 'Technology Successfully Inserted');
    }
    public function edittechnology($id)
    {   
       $user = DB::table('technologies')->where('id', $id)->first();
       $technologyname = $user->technologyname;
       $description = $user->description;
       $mettatittle = $user->mettatittle;
       $metadescription = $user->metadescription;
       $id = $user->id;
       return response()->json(['technologyid' => $id,'name' => $technologyname,'description' => $description,'metatittle' => $mettatittle,'metadescription' => $metadescription,'metatittleid' => $id]);
    }
    public function updatetechnology(Request $request)
    {
        $id =  $request->id;
        $image = $request->file('technologyimage');
        $technologyimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $technologyimage);
        $name = $request->technologyname;
        $description = $request->description;
        $url = $this->slugify($request->technologyname);
        $data = array('image'=>$technologyimage,'description'=>$description,'technologyname'=>$name,'technologiesurl'=>$url);
        technologies::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateservicesshortdescription(Request $request)
    {
        $englishservicesshortdescription = $request->englishservicesshortdescription;
        $data = array("englishservicesshortdescription"=>$englishservicesshortdescription);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatewhy(Request $request)
    {
        $description = $request->editor1;
        $data = array('description'=>$description);
        cms::where('pagename', 'why')->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function createtestimonial(Request $request)
    {
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $testimonials = new Testimonials;
        $testimonials->image = $new_name;
        $testimonials->name = request('name');
        $testimonials->designation = request('designation');
        $testimonials->testimonial = request('testimonial');
        $testimonials->save();
        return redirect()->back()->with('message', 'Testimonial Successfully Inserted');

    }
    public function updatetestimonial(Request $request)
    {
        $name = $request->name;
        $designation = $request->designation;
        $testimonial = $request->testimonial;
        $id = $request->id;
        $data = array('name'=>$name,"designation"=>$designation,"testimonial"=>$testimonial);
        Testimonials::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatetestimonialimage(Request $request)
    {
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $id = $request->id;
        $data = array('image'=>$new_name);
        Testimonials::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatefootertext(Request $request)
    {
        $english = $request->english;
        $data = array('footertextenglish'=>$english);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatecontactdetails(Request $request)
    {
        $phonenumber = $request->phonenumber;
        $email = $request->email;
        $address = $request->address;
        $whatsappnumber = $request->whatsappnumber;
        $data = array('address'=>$address,"phoneno"=>$phonenumber,"email"=>$email,"whatsappnumber"=>$whatsappnumber);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatesocialmedialinks(Request $request)
    {
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkdlin = $request->linkdlin;
        $data = array('facebook'=>$facebook,"twitter"=>$twitter,"instagram"=>$instagram,"linkdlin"=>$linkdlin);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function addnewadmin(Request $request)
    {
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->country = request('country');
        $user->phonenumber = request('contactnumber');
        $user->is_admin = 1;
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect()->back()->with('message', 'Admin Successfully Inserted');
    }
    public function insertpolicy(Request $request)
    {
        $policy = new privacypolicies;
        $policy->heading_english = request('headingenglish');
        $policy->heading_arabic = request('headingarabic');
        $policy->paragraph_english = request('policyenglish');
        $policy->paragraph_arabic = request('policyarabic');
        $policy->important = request('important');
        $policy->save();
        return redirect()->back()->with('message', 'Policy Successfully Inserted');
    }
    public function insertterms(Request $request)
    {
        $terms = new termsandconditions;
        $terms->heading = request('heading');
        $terms->paragraph = request('policy');
        $terms->important = request('important');
        $terms->save();
        return redirect()->back()->with('message', 'Condition Successfully Inserted');
    }
    public function websitesettings()
    {
        $data = DB::table('sitesettings')->get()->first();
        return view('admin.settings.settings')->with(array('data'=>$data));
    }
    public function editservice($id)
    {
        $data = DB::table('services')->where('id' , $id)->get()->first();
        return view('admin.services.editservice')->with(array('data'=>$data));
    }
    public function editurl($id)
    {
       $data = DB::table('siteurls')->where('id', $id)->first();
       $url = $data->url;
       $modalname = $data->modalname;
       $mettatittle = $data->mettatittle;
       $metadescription = $data->metadescription;
       $metakeywords = $data->keywords;
       $id = $data->ID;
       return response()->json(['metakeywords' => $metakeywords,'url' => $url,'modalname' => $modalname,'id' => $id,'mettatittle' => $mettatittle,'metadescription' => $metadescription,'metaid' => $id]);
    }
    public function updatsiteurl()
    {

    }
    public function viewfundingrequestoffer($id)
    {
        $test =  DB::table('bigdealsoffers')->where('id', $id)->first();
        return view('admin.requests.viewquoterequest')->with(array('data'=>$test));
    }
    public function viewcontactrequests($id)
    {
        $test =  DB::table('fundingrequests')->where('id', $id)->first();
        return view('admin.requests.viewcontactrequest')->with(array('data'=>$test));
    }
    public function createquestions()
    {
        $faqquestions = new faqquestions;
        $faqquestions->e_question = request('e_question');
        $faqquestions->e_answer = request('e_answer');
        $faqquestions->save();
        return redirect()->back()->with('message', 'FAQ Successfully Inserted');
    }

    public function updatefaq()
    {
        $e_question = request('e_question');
        $e_answer = request('e_answer');
        $a_question = request('a_question');
        $a_answer = request('a_answer');
        $id = request('id');
        $data = array('e_question'=>$e_question,'e_answer'=>$e_answer,'a_question'=>$a_question,"a_answer"=>$a_answer);
        faqquestions::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }


    public function updatehomepage(Request $request)
    {
        $english = $request->editor1;
        $data = array('ourvisionenglish'=>$english);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatetestimonialshortdescription(Request $request)
    {
        $englishtestimonialshortdescription = $request->englishtestimonialshortdescription;
        $data = array("englishtestimonialshortdescription"=>$englishtestimonialshortdescription);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    // Delete Functions
    public function deletetestimonial($id)
    {
        DB::table('testimonials')->delete($id);
        return redirect()->back()->with('message', 'Delete Testimonial Successfully');
    }
    public function deleteeservice($id)
    {
        DB::table('childservices')->delete($id);
        return redirect()->back()->with('message', 'Delete Type Successfully');
    }
    // Edit Functions
    public function edittestimonial($id)
    {
      $test =   DB::table('testimonials')->where('id', $id)->first();
      return view('admin.testimonials.edit')->with(array('data'=>$test));
    }
    public function editadvertisements($id)
    {
      $test =   DB::table('advertisements')->where('id', $id)->first();
      return view('admin.services.editadvertisement')->with(array('data'=>$test));
    }
    public function edituser($id)
    {
       $user = DB::table('users')->where('id', $id)->first();
       $name = $user->name;
       $email = $user->email;
       $country = $user->country;
       $phonenumber = $user->phonenumber;
       $id = $user->id;
       return response()->json(['userid' => $id,'name' => $name,'email' => $email,'country' => $country,'phonenumber' => $phonenumber]);
    }

    public function editfrequentlyquestion($id)
    {
       $user = DB::table('faqquestions')->where('id', $id)->first();
       $e_question = $user->e_question;
       $e_answer = $user->e_answer;
       $a_question = $user->a_question;
       $a_answer = $user->a_answer;
       $id = $user->id;
       return response()->json(['e_question' => $e_question,'e_answer' => $e_answer,'a_question' => $a_question,'a_answer' => $a_answer,'id' => $id]);
    }
    public function editservices($id)
    {
       $user = DB::table('services')->where('id', $id)->first();
       $englishname = $user->englishname;
       $englishdescription = $user->englishdescription;
       $arabicname = $user->arabicname;
       $arabicdescription = $user->arabicdescription;
       $meta_tittle_english = $user->meta_tittle_english;
       $meta_description_english = $user->meta_description_english;
       $meta_tittle_arabic = $user->meta_tittle_arabic;
       $meta_description_arabic = $user->meta_description_arabic;
       $id = $user->id;
       return response()->json(['serviceid' => $id,'englishname' => $englishname,'englishdescription' => $englishdescription,'arabicname' => $arabicname,'arabicdescription' => $arabicdescription ,'meta_tittle_english' => $meta_tittle_english,'meta_description_english' => $meta_description_english,'meta_tittle_arabic' => $meta_tittle_arabic,'meta_description_arabic' => $meta_description_arabic]);
    }
    public function editcountry($id)
    {
       $user = DB::table('country')->where('id', $id)->first();
       $english = $user->name;
       $arabic = $user->arabicname;
       $id = $user->id;
       return response()->json(['englishname' => $english,'arabicname' => $arabic,'countryid' => $id]);
    }
    public function updatecountry(Request $request)
    {
        $english = $request->english;
        $arabic = $request->arabic;
        $id = $request->id;
        $update_query = "UPDATE `country` SET `name` = '$english', `arabicname` = '$arabic' WHERE `id` = '$id'";
        DB::statement($update_query);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateuser(Request $request)
    {
      $name = $request->name;
      $email = $request->email;
      $country = $request->country;
      $phone = $request->phone;
      $id =  $request->id;
      $data = array('name'=>$name,"email"=>$email,"country"=>$country,"phonenumber"=>$phone);
      user::where('id', $id)->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateadvertisement(Request $request)
    {

      $nameenglish = $request->englishservicename;
      $editor1 = $request->editor1;
      $namearabic = $request->arabicservicename;
      $editor2 = $request->editor2;
      $parent_id = $request->categoryid;
      $child_id = $request->childservices;
      $id =  $request->id;
      $url = $this->slugify($nameenglish);
      $data = array('advertisement_url'=>$url,'englishname'=>$nameenglish,"englishdescription"=>$editor1,"arabicname"=>$namearabic,"arabicdescription"=>$editor2,"parent_id"=>$parent_id,"child_id"=>$child_id);
        advertisements::where('id', $id)->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');

    }
    public function changestatus($id , $table)
    {
        DB::table($table) ->where('id', $id)->limit(1)->update( [ 'status' => 0 ]); 
    }
    public function addfinancingtype(Request $request)
    {
        $typename = $request->name;    
        $arabicname = $request->arabicname;
        $type = new financingtypes;
        $type->name = $typename;
        $type->arabicname = $arabicname;
        $type->save();
        return redirect()->back()->with('message', 'Successfully Inserted');
    }
    public function updatemetatagsenglish(Request $request)
    {
        $validatedData = $request->validate([
            'mettatittle' => 'required|max:255',
            'image' => [
                            Rule::dimensions()->minWidth(300)->minHeight(300),
                        ],
            'metadescription' => 'required|max:255',            
        ]);
        if($files=$request->file('image')){
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $ogimage =  url('public/images/'.$new_name);
        }else{
            $ogimage =  url('public/images/logo.jpg');
        }
        $id = $request->id;
        $modalname = $request->modalname;
        $mettatittle = $request->mettatittle;
        $metadescription= $request->metadescription;
        $keywords = $request->mettakeywords;
        $ogtittle= $request->mettatittle;
        $ogdescription= $request->metadescription;
        DB::statement("UPDATE $modalname SET mettatittle = '$mettatittle',keywords = '$keywords',metadescription = '$metadescription',ogtittle = '$ogtittle' , ogdescription = '$ogdescription' , og_image = '$ogimage'  where id = $id");
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function createstorecategory(Request $request)
    {
        $name = $request->categoryname;
        $url = $this->slugify($name);
        $category = new storecategories;
        $category->name = $name;
        $category->storecategoryurl = $url;
        $category->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'storecategories')");
        return redirect()->back()->with('message', 'Successfully Inserted');
    }
    public function createstoretags(Request $request)
    {
        $name = $request->tagname;
        $url = $this->slugify($name);
        $storetags = new storetags;
        $storetags->name = $name;
        $storetags->storetagurl = $url;
        $storetags->save();
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'storetags')");
        return redirect()->back()->with('message', 'Successfully Inserted');
    }
    public function getstorecategory($id)
    {
       $data = DB::table('storecategories')->where('id', $id)->first();
       $name = $data->name;
       $mettatittle = $data->mettatittle;
       $metadescription = $data->metadescription;
       $metakeywords = $data->keywords;
       $id = $data->id;
       return response()->json(['metakeywords' => $metakeywords,'name' => $name,'id' => $id,'mettatittle' => $mettatittle,'metadescription' => $metadescription,'metaid' => $id]);
    }
    public function updatestorecategory(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        $data = array('name'=>$name);
        storecategories::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function getstoretag($id)
    {
       $data = DB::table('storetags')->where('id', $id)->first();
       $name = $data->name;
       $mettatittle = $data->mettatittle;
       $metadescription = $data->metadescription;
       $metakeywords = $data->keywords;
       $id = $data->id;
       return response()->json(['metakeywords' => $metakeywords,'name' => $name,'id' => $id,'mettatittle' => $mettatittle,'metadescription' => $metadescription,'metaid' => $id]);
    }
    public function updatestoretag(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        $data = array('name'=>$name);
        storetags::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    public function createproduct(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'image' => 'required|max:255',
        //     'shortdescription' => 'required|max:255',
        //     'description' => 'required',
        //     'categories' => 'required',    
        // ]);
        $id = rand(50000000 , 1000000000000);
        $url = $this->slugify($request->name);
        $image = $request->file('image');
        $productimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $productimage);
        $product = new storeproducts;
        $product->id = $id;
        $product->image = $productimage;
        $product->name = $request->name;
        $product->url = $this->slugify($request->name);
        $product->shortdescription = $request->shortdescription;
        $product->description = $request->description;
        $product->mettatittle = $request->name;
        $product->metadescription = $request->shortdescription;
        $product->ogtittle = $request->name;
        $product->ogdescription = $request->shortdescription;
        $product->og_image = $productimage;
        $product->save();
        $categories = $request->categories;
        foreach($categories as $r){
            DB::statement("INSERT INTO `storeproductcategories` (`storecategories`, `storeproducts`)VALUES ('$r',$id)");
        }
        $tags = $request->tags;
        foreach($tags as $tag){
            DB::statement("INSERT INTO `storeproducttags` (`storetags`, `storeproducts`)VALUES ('$tag',$id)");
        }
        DB::statement("INSERT INTO `siteurls` (`url`, `modalname`)VALUES ('$url', 'storeproduct')");
        return redirect()->back()->with('message', 'Product Successfully Inserted');
    }
}

