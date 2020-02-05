<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\AccountStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountAPI;
use App\Http\Requests\UpdateAccountAPI;
use App\Models\AccountList;
use App\Models\ToolKeyList;
use Illuminate\Http\Request;

class AccountListController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAccountAPI $request)
    {
        $key = ToolKeyList::with(['user'])->where('key' , $request->header('key'))->first();
        $account = AccountList::create([
            'name' =>  $request->input('name'),
            'server' =>   $request->input('server'),
            'planet' =>    $request->input('planet'),
            'power' =>    $request->input('power'),
            'gem' =>    $request->input('gem'),
            'missions' =>    $request->input('missions'),
            'map' =>    $request->input('map'),
            'login_at' =>   $request->input('login_at'),
            'status' =>    $request->input('status'),
            'key_id'    => $key->id,
            'user_id'   => $key->user->id
        ]);
        return  response()->json(['status' => 'true', 'data' => $account]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $key = ToolKeyList::with(['user'])->where('key' , $request->header('key'))->first();
        $accounts = AccountList::where('key_id' , $key->id)->where('status', '!=' , AccountStatus::COMPLETED )->get();

        return  response()->json(['status' => true, 'data' => $accounts]);
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
    public function update(UpdateAccountAPI $request,$id)
    {
        $key = ToolKeyList::with(['user'])->where('key' , $request->header('key'))->first();
        $account = AccountList::where('id', $id)->where('name', $request->input('name'))->where('key_id', $key->id)->first();
        if (!isset($account)){
            return  response()->json(['status' => 'false', 'error' => 'Không tìm thấy tài khoản']);
        }

        $account->update([
            'name' =>  $request->input('name'),
            'server' =>   $request->input('server'),
            'planet' =>    $request->input('planet'),
            'power' =>    $request->input('power'),
            'gem' =>    $request->input('gem'),
            'missions' =>    $request->input('missions'),
            'map' =>    $request->input('map'),
            'login_at' =>   $request->input('login_at'),
            'status' =>    $request->input('status'),
            'key_id'    => $key->id,
            'user_id'   => $key->user->id
        ]);
        return  response()->json(['status' => 'true', 'data' => $account]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
