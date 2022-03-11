<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\User;
use  App\TodoNote;

use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $todonotes = Auth::user()->todonotes()->get();
      return response()->json(['todonotes' => $todonotes], 200);
    }

    public function create(Request $request)
    {

      $this->validate($request, [
          'content' => 'required',
      ]);
      if(Auth::user()->todonotes()->create($request->all())){
         return response()->json(['status' => 'success']);
      }else{
         return response()->json(['status' => 'failed']);
      }

    }

    public function edit($id)
    {
      $todonote = TodoNote::find($id);
      $this->authorize('update', $todonote);
      return response()->json(['status' => 'success', 'todonote'=>$todonote]);
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
          'content' => 'required',
      ]);

      $todonote = TodoNote::find($id);
      $this->authorize('update', $todonote);
      if($todonote->update($request->all())){
         return response()->json(['status' => 'success']);
      }
      return response()->json(['status' => 'failed']);

    }
    public function completion($id)
    {
      $todonote = TodoNote::find($id);
      $this->authorize('update', $todonote);

        if(is_null($todonote->completion_time)){
             $todonote->completion_time = Carbon::now();
             $todonote->touch();
             return response()->json(['status' => 'set to completed ','completion_time' => date('m-d-Y H:i:s',strtotime($todonote->completion_time))]);
        }else{
          $todonote->completion_time = null;
          $todonote->touch();
          return response()->json(['status' => 'set to not completed']);
        }
    }

    public function remove($id)
    {
      $todonote = TodoNote::find($id);
      $this->authorize('update', $todonote);

        if($todonote->delete()){
             return response()->json(['status' => 'success']);
        }
    }
}
