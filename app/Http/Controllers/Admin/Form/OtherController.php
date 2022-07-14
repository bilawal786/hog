<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SendMessage;

class OtherController extends Controller
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
        $others = SendMessage::where('type', 'Others')->orderBy('id', 'desc')->paginate(10);
        return response()->json($others);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $other = SendMessage::where('type', 'Others')->where('id', $id)->first();
        return response()->json($other);
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
        $data = SendMessage::where('id', $id)->where('type', 'Others')->first();

        $data->Fname = $request->Fname;
        $data->Lname = $request->Lname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->update();
        $notification = array(
            'messege' => 'Other successfully Update!',
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
            'messege' => 'Other Querry Delete successfully',
            'type' => 'success'
        );
        return response()->json($notification);
    }
}
