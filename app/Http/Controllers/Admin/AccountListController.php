<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AccountListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('accounts_manage')) {
            return abort(401);
        }
        $accounts = AccountList::with(['key','user'])->get();
        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        if (! Gate::allows('accounts_delete')) {
            return abort(401);
        }
        AccountList::find($id)->delete();
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Delete all selected AccountList at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('accounts_delete')) {
            return abort(401);
        }
        AccountList::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
