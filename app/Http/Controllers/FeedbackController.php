<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Project;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.user.feedback.index');
    }

    public function store(FeedbackRequest $request)
    {
        $request->validated();
        $feedback = new Feedback();
        $feedback->cover_letter = $request->cover_letter;
        $feedback->status = null;
        $feedback->user_id = auth()->user()->id;
        $feedback->service_id = $request->service_id;
        $feedback->role_name = $request->role_name;
        $feedback->save();
        return redirect()->route('projects');
    }

    public function update(FeedbackRequest $request)
    {
        $request->validated();
        $feedback = Feedback::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        return response()->json($feedback, 201);
    }

    public function candidat_index($id)
    {
        $feedback = Feedback::where('id', $id)->with('service')->where('user_id', auth()->user()->id)->first();
        $serch = json_decode($feedback->service->serch, true);
        $mysubarr = [];
        foreach ($serch as $subarr) {
            if ($subarr['sel'] == $feedback['role_name']) {
                $mysubarr = $subarr;
                break;
            }
        }

        return view('pages.user.feedback.candidat', [
            'feedback' => $feedback,
            'mysubarr' => $mysubarr
        ]);
    }

    public function owner_index($id)
    {

        $feedback = Feedback::with('service')
            ->where('id', $id)
            ->whereHas('service', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })
            ->first();

        $serch = json_decode($feedback->service->serch, true);
        $mysubarr = [];
        foreach ($serch as $subarr) {
            if ($subarr['sel'] == $feedback['role_name']) {
                $mysubarr = $subarr;
                break;
            }
        }

        return view('pages.user.feedback.owner', [
            'feedback' => $feedback,
            'mysubarr' => $mysubarr
        ]);
    }

    public function owner_all()
    {
        $project = Project::with('feedbacks')
            ->where('user_id', auth()->user()->id)
            ->get();

        $mysubarr = [];
        $feedbacks = [];

        foreach ($project as $item) {
            array_push($feedbacks, Feedback::with('service')->where('service_id', $item->id)->get());
        }

        foreach ($project as $item) {
            $serch = json_decode($item->serch, true);

            foreach ($item->feedbacks as $el) {
                foreach ($serch as $subarr) {
                    if ($subarr['sel'] == $el->role_name) {
                        $mysubarr = $subarr;
                        break;
                    }
                }
            }
        }

        return view('pages.user.feedback.ownerall', [
            'feedbacks' => $feedbacks,
            'mysubarr' => $mysubarr
        ]);
    }

    public function candidat_all()
    {
        $feedback = Feedback::with('service')->where('user_id', auth()->user()->id)->get();
        $mysubarr = [];
        foreach ($feedback as $item) {
            $serch = json_decode($item->service->serch, true);
            if (isset($feedback->service)) {
                $feedback = null;
                $mysubarr = null;
            } else {
                foreach ($serch as $subarr) {
                    if ($subarr['sel'] == $item['role_name']) {
                        $mysubarr = $subarr;
                    }
                }
            }
        }

        return view('pages.user.feedback.candidatall', [
            'feedback' => $feedback,
            'mysubarr' => $mysubarr
        ]);
    }

    public function accept($id)
    {
        $feedback = Feedback::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json($feedback, 201);
    }

    public function decline($id)
    {
        $feedback = Feedback::where('id', $id)->update([
            'status' => 2
        ]);
        return response()->json($feedback, 201);
    }

    public function viewed($id)
    {
        $feedback = Feedback::where($id)->update([
            'status' => 3
        ]);
        return response()->json($feedback, 201);
    }
}
