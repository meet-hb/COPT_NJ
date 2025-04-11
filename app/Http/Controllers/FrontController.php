<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Blog;
use App\Models\cause;
use App\Models\Faq;
use App\Models\JobsTitle;
use App\Models\OurLocation;
use App\Models\Team;
use App\Models\Therapy;
use App\Models\TherapyDetail;
use App\Models\Treatment;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view("front.index");
    }
    public function appointment()
    {
        return view("front.appointment");
    }
    public function contact()
    {
        return view("front.contact");
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:10,15',
            'subject' => 'required',
            'message' => 'required|string|max:1000',
        ]);

        $details = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "subject" => $request->subject,
            "message" => $request->message,
            'template' => 'emails.contactus_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Your Message has been sent successfully!');
    }

    public function ourpractice()
    {
        $ourPractice = Setting::where('name', 'ourpractice')->first();
        return view("front.our-practice", compact('ourPractice'));
    }
    public function ourlocations()
    {
        $getLocations = OurLocation::where('is_active', 1)->where('is_deleted', 0)->get();
        return view("front.our-locations", compact('getLocations'));
    }


    public function loctionDetails($location)
    {
        $getLocationDetails = OurLocation::where('location_name', $location)->where('is_active', 1)->where('is_deleted', 0)->first();

        return view("front.location-details", compact('getLocationDetails'));
    }


    public function ourteam()
    {
        $teams = Team::all();
        $physicalTherapist = Team::where('category', 'Physical Therapists')->where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'asc')->get();
        $OccupationalTherapist = Team::where('category', 'Occupational Therapist')->where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'asc')->get();
        $Acupuncturist = Team::where('category', 'Acupuncturist')->where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'asc')->get();
        $Administration = Team::where('category', 'Administration')->where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'asc')->get();
        return view("front.our-team", compact("teams", 'physicalTherapist', 'OccupationalTherapist', 'Acupuncturist', 'Administration'));
    }

    public function ourteamop($id)
    {
        $team = Team::find($id);
        return view("front.team-detail", compact("team"));
    }
    public function career()
    {
        $jobs = JobsTitle::where('is_active', 1)->where('is_deleted', 0)->orderBy('sequence', 'desc')->get();
        return view("front.career", compact("jobs"));
    }

    public function sendmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:10,15',
            'date' => 'required|date',
            'service_time' => 'required',
            'service_refer' => 'required|in:Physician referral,Google,Facebook,Friend',
            'prefer_location_for_visit' => 'required',
            'message' => 'required|string|max:1000',
        ]);

        $details = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "date" => $request->date,
            "service_time" => $request->service_time,
            "service_refer" => $request->service_refer,
            "subject" => 'Request Appointment by ' . $request->name,
            "prefer_location_for_visit" => $request->prefer_location_for_visit,
            "message" => $request->message,
            'template' => 'emails.appointment_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Appointment request sent successfully!');
    }

    public function viewTherapyTreatment($therapy_name)
    {
        $therapy_id = Therapy::where('therapy_name', $therapy_name)->value('id');
        $therapy_details = TherapyDetail::where('therapy_id', $therapy_id)->first();
        return view("front.how_we_treat", compact('therapy_name', 'therapy_details'));
    }


    public function viewTreatmentNames($treatment_name)
    {
        $treatments = Treatment::where('treatment_name', $treatment_name)->first();

        $treatment_causes_exists = cause::where('treatment_id', $treatments->id)->exists();
        if ($treatment_causes_exists) {
            $treatment_causes = cause::where('treatment_id', $treatments->id)->get();
        } else {
            $treatment_causes = NULL;
        }
        return view("front.what_we_treat", compact('treatments', 'treatment_name', 'treatment_causes'));
    }

    public function healthBlog()
    {
        $healthBlogs = Blog::where('is_active', 1)
            ->where('is_deleted', 0)
            ->paginate(6);

        $popularBlogs = Blog::where('is_active', 1)
            ->where('is_deleted', 0)
            ->inRandomOrder() // Fetch random records
            ->limit(3)
            ->get();

        return view("front.blogs", compact('healthBlogs', 'popularBlogs'));
    }


    public function blogDetails($id)
    {
        $blogDetails = Blog::where('id', $id)->first();
        $popularBlogs = Blog::where('is_active', 1)
            ->where('is_deleted', 0)
            ->inRandomOrder() // Fetch random records
            ->limit(3)
            ->get();
        return view("front.blog-details", compact('blogDetails', 'popularBlogs'));
    }

    public function patientInfo()
    {
        $patientInfo = Setting::where('name', 'patientinfo')->first();
        return view("front.patient-info", compact('patientInfo'));
    }

    public function refererAFriend()
    {
        $patientInfo = Setting::where('name', 'patientinfo')->first();
        return view("front.refer-a-friend");
    }


    public function faq()
    {
        $faqs = Faq::where('is_active', 1)->where('is_deleted', 0)->get();

        return view("front.faq", compact('faqs'));
    }

    public function contactop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:10,15',
            'date' => 'required|date',
            'service_time' => 'required',
            'service_refer' => 'required|in:Physician referral,Google,Facebook,Friend',
            'message' => 'required|string|max:1000',
        ]);

        $details = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "date" => $request->date,
            "service_time" => $request->service_time,
            "service_refer" => $request->service_refer,
            "message" => $request->message,
            'template' => 'emails.contactus_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Appointment request sent successfully!');
    }


    public function leaveComment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comments' => 'required|string',
        ]);

        $details = [
            "blog" => $request->blog,
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->comments,
            'template' => 'emails.leave_comment_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Your Comments has been sent successfully!');
    }


    public function blogRequestFormSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $details = [
            "email" => $request->email,
            "message" => $request->comments,
            'template' => 'emails.blog_subscribe_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Your Request has been sent successfully!');
    }


    public function privacyPolicy()
    {
        $privacyPolicy = Setting::where('name', 'privacy')->value('value');
        return view('front.privacy-policy', compact('privacyPolicy'));
    }


    public function termsAndConditions()
    {
        $termsAndConditions = Setting::where('name', 'terms')->value('value');
        return view('front.terms-and-conditions', compact('termsAndConditions'));
    }


    public function siteMap()
    {
        return view('front.sitemap');
    }


    public function careerFormSubmit(Request $request)
    {

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        } else {
            $resumePath = null;
        }

        $details = [
            "name" => $request->full_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "edu_institute" => $request->edu_institute,
            "job_position" => $request->job_position,
            "resume" => $resumePath,
            "availability" => $request->availability,
            "additional_details" => $request->additional_details,
            'template' => 'emails.career_mail',
        ];

        dispatch(new SendEmailJob($details));

        return redirect()->back()->with('success', 'Appointment request sent successfully!');
    }


    public function whatWeTreats(Request $request)
    {
        return view('front.what-we-treats');
    }
    public function howWeTreats(Request $request)
    {
        return view('front.how-we-treats');
    }
}
