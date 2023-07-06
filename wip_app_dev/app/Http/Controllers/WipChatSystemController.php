<?php

namespace App\Http\Controllers;

use App\Models\WipChatSystem;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WipChatSystemController extends Controller
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
        $wip_chat_systems = WipChatSystem::orderBy('chat_sys', 'asc')->get();
        return view('wip_chat_systems', ['wip_chat_systems' => $wip_chat_systems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**orderBy
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           'chat_sys' => 'required|min:3|max:3',
           'chat_sys_name'  => 'required|min:3|max:30'
        ]);
        if ($validator->fails()) {
            return redirect('/chat_systems')->withInput()->withErrors($validator);
        }
        $wip_chat_system = new WipChatSystem();
        $wip_chat_system->chat_sys = $request->chat_sys;
        $wip_chat_system->chat_sys_name = $request->chat_sys_name;
        $wip_chat_system->save();
        return redirect('/chat_systems');

    }

    /**
     * Display the specified resource.
     */
    public function show(WipChatSystem $wipChatSystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($chat_sys)
    {
        //
        $wip_chat_systems = WipChatSystem::find($chat_sys);
        return view('wip_chat_systemedit', ['wip_chat_systems' => $wip_chat_systems]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipChatSystem $wipChatSystem)
    {
        //
        $validator = Validator::make($request->all(), [
            // 'chat_sys' => 'required|min:3|max:3',
            'chat_sys_name' => 'required|min:3|max:30'
        ]);
        if ($validator->fails()) {
            return redirect('/chat_systemedit/'.$request->chat_sys)
            ->withInput()->withErrors($validator);
        }
        $wip_chat_system = WipChatSystem::find($request->chat_sys);
        $wip_chat_system->chat_sys = $request->chat_sys;
        $wip_chat_system->chat_sys_name = $request->chat_sys_name;
        $wip_chat_system->save();
        return redirect(('/chat_systems'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($chat_sys)
    {
        //
        $wip_chat_system = WipChatSystem::find($chat_sys);
        $wip_chat_system->delete();
        return redirect('/chat_systems');
    }
}
