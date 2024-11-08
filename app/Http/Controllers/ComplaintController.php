<?php

namespace App\Http\Controllers;

use App\Mail\ForwardMail;
use App\Models\Category;
use App\Models\ComplaintCase;
use App\Models\Complaints;
use App\Models\Depatment;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaints::all();
        //dd($complaints);
        return view('admin.complaints.index',['complaints'=>$complaints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $roles      = Role::all();
        $departments = Depatment::all();
        return view('admin.complaints.create',["roles"=>$roles,"categories"=>$categories,"departments"=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name"=>"required",
                "email"=>"required",
                "category_id"=>"required",
                "role_id"=>"required",
                "depatment_id"=>"required",
                "title"=>"required",
                "description"=>"required"

            ]
            );
            $allowedFileTypes = ['pdf','docx','jpeg','png'];
            $files = $request->file('files');
            //dd($files);

            $fileNames = [];
            $i=0;

            foreach($files as $file)
            {
                if($file != null)
            {
                $file_extension = $file->extension();
               //dd($file_extension);
               if(in_array($file_extension,$allowedFileTypes))
               {
                $fileName =time().$file->getClientOriginalName();
                //dd($fileName);
                //$request->file('files')->move(public_path('uploads'),$fileName);
                $file->storeAs('uploads',$fileName);

                $fileNames[$i++]=$fileName;
               }
            }
            }

            $complaint = new Complaints();
            $complaint->name = $request->name;
            $complaint->anonymous =$request->anonymous;
            $complaint->email = $request->email;
            $complaint->role_id = $request->role_id;
            $complaint->category_id = $request->category_id;
            $complaint->depatment_id = $request->depatment_id;
            $complaint->title = $request->title;
            $complaint->description = $request->description;
            $complaint->files = implode(",",$fileNames);
            $complaint->save();
      //  Complaints::create($request->all());
        return redirect()->route('complaints.index')->with('success','successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function forward($id)
    {
        $complaint = Complaints::find($id);

        // $team_emails = Team::select("email")->where("role_id",$complaint->role_id)->where("depatment_id",$complaint->depatment_id)->get();
        $teams = Team::select("*")->where("role_id",$complaint->role_id)->where("depatment_id",$complaint->depatment_id)->get();
        return view('admin.complaints.forward',['complaint'=>$complaint,"team"=>$teams]);
        // foreach($team_emails as $email)
        // {
        //     Mail::to($email)->send(new ForwardMail($complaint));
        // }
        // return response()->json(["success"=>"Successfully Send"]);


    }

    public function send(Request $request)
    {
    //    dd($request->all());
        $complaint = Complaints::find($request->complaint);
        $member_id = $request->members;
        $team_emails = [];

        foreach($member_id as $member){

            $complaintCase = new ComplaintCase();
            $complaintCase->complaint_id = $request->complaint;
            $complaintCase->team_id = $member;
            $complaintCase->status = 1;
            $complaintCase->save();

            $team_emails = Team::select("email")->where('id',"=",$member)->get();
            Mail::to($team_emails)->send(new ForwardMail($complaint));
    }

    $complaint->status = 1;
    $complaint->save();



    return redirect()->route('complaints.index');


    }
}
