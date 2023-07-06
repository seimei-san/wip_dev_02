<?php

namespace App\Http\Controllers;

use App\Models\WipUser;
use App\Models\WipDomain;
use App\Models\WipPermGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WipUserController extends Controller
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
        $wip_users = WipUser::orderBy('name', 'asc')->get();
        return view('wip_users', ['wip_users' => $wip_users]);        
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
    }

    /**
     * Display the specified resource.
     */
    public function show(WipUser $wipUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        //
        $wip_domains = WipDomain::get();
        $wip_perm_groups = WipPermGroup::get();
        $wip_users = WipUser::find($user_id);
        return view('wip_useredit', ['wip_users' => $wip_users])->with('wip_domains', $wip_domains)->with('wip_perm_groups', $wip_perm_groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipUser $wipUser)
    {
        //
        $validator = Validator::make($request->all(), [
            'domain_id' => 'required|min:8|max:8',
            'perm_group_id' => 'required|min:2|max:2'
        ]);
        if ($validator->fails()) {
            return redirect('/useredit/'.$request->user_id)
            ->withInput()
            ->withErrors($validator);
        }
        $wip_user = WipUser::find($request->user_id);
        $wip_user->domain_id = $request->domain_id;
        $wip_user->perm_group_id = $request->perm_group_id;
        if (empty($request->user_active)) {
            $wip_user->user_active = 0;
        } else {
            $wip_user->user_active = 1;
        }
        $wip_user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        //
        $wip_user = WipUser::find($user_id);
        $wip_user->delete();
        return redirect('/users');
    }
}
