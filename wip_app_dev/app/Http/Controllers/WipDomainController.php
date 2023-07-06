<?php

namespace App\Http\Controllers;

use App\Models\WipDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class WipDomainController extends Controller
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
        $wip_domains = WipDomain::orderBy('domain_short_name', 'asc')->get();
        return view('wip_domains', ['wip_domains' => $wip_domains]);
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
            'domain_short_name' => 'required|min:3|max:12',
            'domain_display_name' => 'required|min:3|max:32'
        ]);
        if ($validator->fails()) {
            return redirect('/domains')->withInput()->withErrors($validator);
        }
        $tmpId = \App\Libs\Util::generateId('U', 8);
        $request['domain_id'] = $tmpId;
        $wip_domain = new WipDomain;
        $wip_domain->domain_id = $request->domain_id;
        $wip_domain->domain_short_name = $request->domain_short_name;
        $wip_domain->domain_display_name = $request->domain_display_name;
        $wip_domain->domain_active = $request->domain_active;
        $wip_domain->save();
        return redirect('/domains');

    }

    /**
     * Display the specified resource.
     */
    public function show(WipDomain $wipDomain)
    {
        //
    }  


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($domain_id)
    {
        //
        $wip_domains = WipDomain::find($domain_id);
        return view('wip_domainedit', ['wip_domains' => $wip_domains]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipDomain $wipDomain)
    {
        //
        $validator = Validator::make($request->all(), [
            'domain_short_name' => 'required|min:3|max:12',
            'domain_display_name' => 'required|min:3|max:32',
        ]);
        if ($validator->fails()) {
            return redirect('/domainedit/'.$request->domain_id)
            ->withInput()
            ->withErrors($validator);
        }

        $wip_domain = WipDomain::find($request->domain_id);
        $wip_domain->domain_short_name = $request->domain_short_name;
        $wip_domain->domain_display_name = $request->domain_display_name;
        if (empty($request->domain_active)) {
            $wip_domain->domain_active = 0;
        } else {
            $wip_domain->domain_active = 1;
        }
        // $wip_domain->domain_active = $request->domain_active;
        $wip_domain->save();
        return redirect('/domains');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($domain_id)
    {
        //
        $wip_domain = WipDomain::find($domain_id);
        $wip_domain->delete();
        return redirect('/domains');
    }
}
