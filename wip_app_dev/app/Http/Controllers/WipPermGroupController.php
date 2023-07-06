<?php

namespace App\Http\Controllers;

use App\Models\WipPermGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WipPermGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wip_perm_groups = WipPermGroup::orderBy('perm_group_id', 'asc')->get();
        return view('wip_perm_groups', ['wip_perm_groups' => $wip_perm_groups]);
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
            'perm_group_id' => 'required|min:2|max:2',
            'perm_group_name' => 'required|min:3|max:20'
        ]);
        if ($validator->fails()) {
            return redirect('/perm_groups')->withInput()->withErrors($validator);
        }
        $wip_perm_group = new WipPermGroup();
        $wip_perm_group->perm_group_id = $request->perm_group_id;
        $wip_perm_group->perm_group_name = $request->perm_group_name;
        $wip_perm_group->save();
        return redirect('/perm_groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(WipPermGroup $wipPermGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($perm_group_id)
    {
        //
        $wip_perm_groups = WipPermGroup::find($perm_group_id);
        return view('wip_perm_groupedit', ['wip_perm_groups' => $wip_perm_groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipPermGroup $wipPermGroup)
    {
        //
        $validator = Validator::make($request->all(), [
            'perm_group_name' => 'required|min:3|max:20'
        ]);
        if ($validator->fails()) {
            return redirect('/perm_groupedit/'.$request->perm_group_id)
            ->withInput()->withErrors($validator);
        }
        $wip_perm_group = WipPermGroup::find($request->perm_group_id);
        $wip_perm_group->perm_group_name = $request->perm_group_name;
        $wip_perm_group->save();
        return redirect('/perm_groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($perm_group_id)
    {
        //
        $wip_perm_group = WipPermGroup::find($perm_group_id);
        $wip_perm_group->delete();
        return redirect('/perm_groups');
    }
}
