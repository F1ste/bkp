<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Collection;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request){
        $request->validated();
        $feedback = new Feedback;
        $feedback->cover_letter = $request->cover_letter;
        $feedback ->status = null;
        $feedback ->user_id = auth()->user()->id;
        $feedback->service_id = $request->service_id;
        $feedback->role_name=$request->role_name;
        $feedback->save();
        return redirect()->route('projects');
    }

    public function update (FeedbackRequest $request ){
        $request->validated();
        $feedback = Feedback::where('id',$request->id)->update([
            'status'=>$request->status
        ]);
        return response()->json($feedback, 201);
    }
    public function candidat_index ($id){
        $feedback = Feedback::find($id)->with('service')->where('user_id', auth()->user()->id)->first();
        $serch = json_decode($feedback->service->serch);
        return view('pages.user.feedback.candidat',[
            'feedback'=>$feedback,
            'serch'=>$serch
        ]);
    }
    public function owner_index(){
        $feedback = Collection::with('feedback')->where('user_id',auth()->user()->id)->get();
        return view ('pages.user.feedback.owner')->with('feedback',$feedback);
    }
}
    