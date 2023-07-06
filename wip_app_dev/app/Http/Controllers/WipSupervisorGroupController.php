<?php

namespace App\Http\Controllers;

use App\Models\WipSupervisorGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\WipUser;
use App\Models\WipGroup;

class WipSupervisorGroupController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $supervisor_key = config('spv.key', 'SV');
        $wip_users = WipUser::where('perm_group_id', $supervisor_key)->get();
        $wip_groups = WipGroup::get();
        $wip_supervisor_groups = WipSupervisorGroup::orderBy('supervisor_user_id', 'asc')->get();
        return view('wip_supervisor_groups', ['wip_supervisor_groups' => $wip_supervisor_groups])
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
            'supervisor_user_id' => 'required|min:20|max:20',
            'group_id' => 'required|min:12|max:12'
        ]);
        if ($validator->fails()) {
            return redirect('/supervisor_groups')->withInput()->withErrors($validator);
        }
        $wip_supervisor_group = new WipSupervisorGroup();
        $wip_supervisor_group->supervisor_user_id = $request->supervisor_user_id;
        $wip_supervisor_group->group_id = $request->group_id;
        $wip_supervisor_group->save();
        return redirect('/supervisor_groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(WipSupervisorGroup $wipSupervisorGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($supervisor_group_id)
    {
        //
        $supervisor_key = config('spv.key', 'SV');
        $wip_users = WipUser::where('perm_group_id', $supervisor_key)->get();
        $wip_groups = WipGroup::get();
        $wip_supervisor_groups = WipSupervisorGroup::find($supervisor_group_id);
        return view('wip_supervisor_groupedit', ['wip_supervisor_groups' => $wip_supervisor_groups])
        ->with('wip_users', $wip_users)
        ->with('wip_groups', $wip_groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipSupervisorGroup $wipSupervisorGroup)
    {
        //
        $validator = Validator::make($request->all(), [
            'supervisor_user_id' => 'required|min:20|max:20',
            'group_id' => 'required|min:12|max:12'
        ]);
        if ($validator->fails()) {
            return redirect('/supervisor_groupedit'.$request->supervisor_group_id)
            ->withInput()->withErrors($validator);
        }
        $wip_supervisor_group = WipSupervisorGroup::find($request->supervisor_group_id);
        $wip_supervisor_group->supervisor_user_id = $request->supervisor_user_id;
        $wip_supervisor_group->group_id = $request->group_id;
        $wip_supervisor_group->save();
        return redirect('/supervisor_groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($supervisor_group_id)
    {
        //
        $wip_supervisor_group = WipSupervisorGroup::find($supervisor_group_id);
        $wip_supervisor_group->delete();
        return redirect('/supervisor_groups');
    }
}
