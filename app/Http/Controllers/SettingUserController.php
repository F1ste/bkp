<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class SettingUserController extends Controller
{
    /**
     * View Page Setting
     */
    public function setting()
    {
        $regions = Region::orderBy('name')->get();
        return view('pages.user.setting.setting', compact('regions'));
    }

    /**
     * POST Update Profile User
     */
    public function update(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->update([
            'surname' => $request->surname,
            'first_name' => $request->firstname,
            'city' => $request->city,
            'phone' => $request->phone,
            'youtube' => $request->youtube,
            'vk' => $request->vk,
            'about' => $request->about,
            'org' => $request->org,
            'ruk' => $request->ruk,
            'inn' => $request->inn,
            'napr' => $request->napr,
            'tel_org' => $request->tel_org,
            'sait' => $request->sait,
            'telegram' => $request->telegram,
            'dpl' => $request->dpl,
            'name' => $request->name,
            'email' => $request->email,
            'portfol' => $request->portfol
        ]);

        return response()->json($user, 201);
    }

    /**
     * POST Avatar
     */
    public function avatar(Request $request)
    {
        $size = $request->file('file')->getSize();
        $type = $request->file('file')->extension();

        $name = $size . '_' . 'image' . '.' . $type;

        $request->file('file')->storeAs(
            'img',
            $name
        );

        $link = '/storage/' . $name;

        User::where('id', auth()->user()->id)->update([
            'avatar' => $link
        ]);

        return $link;
    }
}
