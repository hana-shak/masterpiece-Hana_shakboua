<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;


class ReportController extends Controller
{

    public function __construct(){
        Date::setLocale('ar');
        $this->middleware('auth:admin, auth');
    }

    public function index()
    {
       // $reported = Report::all();
        $reported = Report::orderByDesc('id')->get();;
        return view('dashboard.reportedreplies',compact('reported'));

    }


    public function create($id)
    {
        $reply = Reply::findOrFail($id);
        Report::create([
            'user_id'=>auth::id(),
            'replies_id'=> $id,
        ]);
        return redirect()->back();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $singlereport = Report::findOrFail($id);
        //$repdata = $singlereport->reply->user->name;
        //dd($repdata);
        // $userrep = $singlereport->user;
        // dd($userrep );
       //dd($singlereport->user->name);

        return view('dashboard.singlereported',compact('singlereport'));
    }


    public function edit(Report $report)
    {
        //
    }


    public function update(Request $request, Report $report)
    {
        //
    }

    //to delete reply from the db
    public function destroyReply($id)
    {
       $rep = Reply::findOrFail($id);
      // dd('hey ya');
      $report = $rep->reports;

      foreach($rep->reports as $r)
         $repo_id = $r->id;

      Reply::destroy($id);
      Report::destroy($repo_id);
      return ($this->index());
    }

    //Deleting report itself not the reply
    public function destroy($id)
    {
       Report::destroy($id);
       return ($this->index());
    }
}
