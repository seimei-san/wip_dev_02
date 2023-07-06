<?php

namespace App\Http\Controllers;

use App\Models\WipUserProfile;
use App\Models\WipUser;
use App\Models\WipChatSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WipUserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wip_users = WipUser::get();
        $wip_chat_systems = WipChatSystem::get();
        $wip_user_profiles =WipUserProfile::orderBy('user_id', 'asc')->get();
        return view('wip_user_profiles', ['wip_user_profiles' => $wip_user_profiles])
        ->with('wip_users', $wip_users)
        ->with('wip_chat_systems', $wip_chat_systems);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|min:20|max:20',
            'chat_user_id' => 'required|min:3|max:20',
            'chat_sys' => 'required|min:3|max:3',
            'chat_interval' => 'required|min:1|max:4',
            'chat_limit' => 'required|min:1|max:4',
        ]);
        if ($validator->fails()) {
            return redirect('/user_profiles')->withInput()->withErrors($validator);
        }
        $wip_user_profile = new WipUserProfile();
        $wip_user_profile->user_id = $request->user_id;
        $wip_user_profile->chat_user_id = $request->chat_user_id;
        $wip_user_profile->chat_sys = $request->chat_sys;
        $wip_user_profile->chat_interval = $request->chat_interval;
        $wip_user_profile->chat_limit = $request->chat_limit;
        $wip_user_profile->user_profile_active = $request->user_profile_active;
        $wip_user_profile->user_note = $request->user_note;
        $wip_user_profile->save();
        return redirect('/user_profiles');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(WipUserProfile $wipUserProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_profile_id)
    {
        //
        $wip_users = WipUser::get();
        $wip_chat_systems = WipChatSystem::get();
        $wip_user_profiles = WipUserProfile::find($user_profile_id);
        return view('wip_user_profileedit', ['wip_user_profiles' => $wip_user_profiles])
        ->with('wip_users', $wip_users)
        ->with('wip_chat_systems', $wip_chat_systems);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipUserProfile $wipUserProfile)
    {
        //
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|min:20|max:20',
            'chat_user_id' => 'required|min:3|max:20',
            'chat_sys' => 'required|min:3|max:3',
            'chat_interval' => 'required|min:1|max:4',
            'chat_limit' => 'required|min:1|max:4',
        ]);
        if ($validator->fails()) {
            return redirect('/user_profileedit/'.$request->user_profile_id)
            ->withInput()
            ->withError($validator);
        }
        $wip_user_profile = WipUserProfile::find($request->user_profile_id);
        $wip_user_profile->user_id = $request->user_id;
        $wip_user_profile->chat_user_id = $request->chat_user_id;
        $wip_user_profile->chat_sys = $request->chat_sys;
        $wip_user_profile->chat_interval = $request->chat_interval;
        $wip_user_profile->chat_limit = $request->chat_limit;
        if (empty($request->user_profile_active)) {
            $wip_user_profile->user_profile_active = 0;
        } else {
            $wip_user_profile->user_profile_active = 1;
        }
        $wip_user_profile->user_note = $request->user_note;
        $wip_user_profile->save();
        return redirect('/user_profiles');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_profile_id)
    {
        //
        $wip_user_profile = WipUserProfile::find($user_profile_id);
        $wip_user_profile->delete();
        return redirect('/user_profiles');
    }
}
