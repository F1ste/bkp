<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRatingRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {   if($request->has('created_at')){
        $user = User::orderBy('created_at','desc')->paginate(8);
    }
    elseif($request->has('rating')){
        $user = User::orderBy('rating','desc')->paginate(8);
    }
    else{
        $user = User::paginate(8);
    }
        return view('pages.admin.user.index')->with('user', $user);
    }
    public function edit($id)
    {
        $user =  User::where('id', $id)->first();
        $user_rating = User::RATING;
        return view('pages.admin.user.edit', [
            'user'      => $user,
            'id'       => $id,
            'user_rating' => $user_rating

        ]);
    }
    
    public function update (UserRatingRequest $request, User $user){
        $request->validated();
        $user ->update([
            'rating'=>$request->rating
        ]);
        return redirect()->route('admin.user');
    }
}
