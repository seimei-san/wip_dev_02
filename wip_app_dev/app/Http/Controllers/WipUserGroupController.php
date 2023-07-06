<?php

namespace App\Http\Controllers;

use App\Models\WipUserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\WipUser;
use App\Models\WipGroup;


class WipUserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wip_users = WipUser::get();
        $wip_groups = WipGroup::get();
        $wip_user_groups = WipUserGroup::orderBy('user_id', 'asc')->get();
        return view('wip_user_groups', ['wip_user_groups' => $wip_user_groups])
        ->with('wip_users', $wip_users)
        ->with('wip_groups', $wip_groups);
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
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|min:20|max:20',
            'group_id' => 'required|min:12|max:12'
        ]);
        if ($validator->fails()) {
            return redirect('/user_groups')->withInput()->withErrors($validator);
        }
        $wip_user_group = new WipUserGroup();
        $wip_user_group->user_id = $request->user_id;
        $wip_user_group->group_id = $request->group_id;
        $wip_user_group->save();
        return redirect('/user_groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(WipUserGroup $wipUserGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_group_id)
    {
        //
        $wip_users = WipUser::get();
        $wip_groups = WipGroup::get();
        $wip_user_groups = WipUserGroup::find($user_group_id);
        return view('wip_user_groupedit', ['wip_user_groups' => $wip_user_groups])
        ->with('wip_users', $wip_users)
        ->with('wip_groups', $wip_groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipUserGroup $wipUserGroup)
    {
        //
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|min:20|max:20',
            'group_id' => 'required|min:12|max:12'
        ]);
        if ($validator->fails()) {
            return redirect('/user_groupedit'.$request->user_group_id)
            ->withInput()->withErrors($validator);
        }
        $wip_user_group = WipUserGroup::find($request->user_group_id);
        $wip_user_group->user_id = $request->user_id;
        $wip_user_group->group_id = $request->group_id;
        $wip_user_group->save();
        return redirect('/user_groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_group_id)
    {
        //
        $wip_user_group = WipUserGroup::find($user_group_id);
        $wip_user_group->delete();
        return redirect('/user_groups');
    }
}
