<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SendMessage;

class SubmitFeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $feedBacks = SendMessage::where('type', 'Submit Feedback')->orderBy('id', 'desc')->paginate(10);
        return response()->json($feedBacks);
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
        $feedBack = SendMessage::where('type', 'Submit Feedback')->where('id', $id)->first();
        return response()->json($feedBack);
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'Fname' => 'required|max:255',
            'Lname' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:255',
        ]);
        $data = SendMessage::where('id', $id)->where('type', 'Submit Feedback')->first();

        $data->Fname = $request->Fname;
        $data->Lname = $request->Lname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->account = $request->account;
        $data->message = $request->message;
        $data->update();
        $notification = array(
            'messege' => 'FeedBack successfully Update!',
            'type' => 'success'
        );
        return response()->json($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SendMessage::where('id', $id)->delete();
        $notification = array(
            'messege' => 'Feedback Delete successfully',
            'type' => 'success'
        );
        return response()->json($notification);
    }
}
