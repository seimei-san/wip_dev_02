<?php

namespace App\Http\Controllers;

use App\Models\WipDomain;
use App\Models\WipGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WipGroupController extends Controller
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
        $wip_domains = WipDomain::get();
        $wip_groups = WipGroup::orderBy('group_short_name', 'asc')->get();
        return view('wip_groups', ['wip_groups' => $wip_groups])->with('wip_domains',$wip_domains);
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
            'group_short_name' => 'required|min:3|max:12',
            'group_display_name' => 'required|min:3|max:36'
        ]);
        if ($validator->fails()) {
            return redirect('/groups')->withInput()->withErrors($validator);
        }
        $tmpId = \App\Libs\Util::generateId('U', 12);
        $request['group_id'] = $tmpId;
        $wip_group = new WipGroup();
        $wip_group->group_id = $request->group_id;
        $wip_group->group_short_name = $request->group_short_name;
        $wip_group->group_display_name = $request->group_display_name;
        $wip_group->domain_id = $request->domain_id;
        $wip_group->group_active = $request->group_active;
        $wip_group->save();
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(WipGroup $wipGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($group_id)
    {
        //
        $wip_domains = WipDomain::get();
        $wip_groups = WipGroup::find($group_id);
        return view('wip_groupedit', ['wip_groups' => $wip_groups])->with('wip_domains',$wip_domains);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipGroup $wipGroup)
    {
        //
        $validator = Validator::make($request->all(), [
            'group_short_name' => 'required|min:3|max:12',
            'group_display_name' => 'required|min:3|max:36',
            'domain_id' => 'required|min:3|max:8'
        ]);
        if ($validator->fails()) {
            return redirect('/groupedit/'.$request->group_id)
            ->withInput()
            ->withErrors($validator);
        }
        $wip_group = WipGroup::find($request->group_id);
        $wip_group->group_short_name = $request->group_short_name;
        $wip_group->group_display_name = $request->group_display_name;
        $wip_group->domain_id = $request->domain_id;
        if (empty($request->group_active)) {
            $wip_group->group_active = 0;
        } else {
            $wip_group->group_active = 1;
        }
        $wip_group->save();
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($group_id)
    {
        //
        $wip_group = WipGroup::find($group_id);
        $wip_group->delete();
        return redirect(('/groups'));
    }
}
