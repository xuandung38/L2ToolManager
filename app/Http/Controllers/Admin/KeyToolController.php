<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreKeyToolRequest;
use App\Http\Requests\Admin\UpdateKeyToolRequest;
use App\Models\ToolKeyList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class KeyToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (! Gate::allows('keys_manage')) {
            return abort(401);
        }

        $keys = ToolKeyList::all();

        return view('admin.keys.index', compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (! Gate::allows('keys_manage')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.keys.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreKeyToolRequest $request)
    {
        if (! Gate::allows('keys_manage')) {
            return abort(401);
        }

        ToolKeyList::create([
            'key' => $request->input('key'),
            'machine_name' => $request->input('machine_name'),
            'user_id'   => $request->input('user_id'),
            'expired_at' => Carbon::createFromFormat('Y-m-d', $request->get('expired_at')),
            'is_active' =>$request->input('is_active'),
        ]);

        return redirect()->route('admin.key_tool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (! Gate::allows('keys_manage')) {
            return abort(401);
        }
        $users = User::all();
        $key = ToolKeyList::find($id);

        return view('admin.keys.edit', compact('users','key'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateKeyToolRequest $request, $id)
    {
        $key = ToolKeyList::find($id);

        $key->update([
            'key' => $request->input('key'),
            'machine_name' => $request->input('machine_name'),
            'user_id'   => $request->input('user_id'),
            'expired_at' => Carbon::createFromFormat('Y-m-d', $request->get('expired_at')),
            'is_active' =>$request->input('is_active'),
        ]);

        return redirect()->route('admin.key_tool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Delete all selected ToolKeyList at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('keys_manage')) {
            return abort(401);
        }
        ToolKeyList::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
