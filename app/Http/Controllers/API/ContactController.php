<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
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
        $request->validate([
            'title' => 'required|max:4|min:2',
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'phone' => 'required|digits:11',
            'company' => 'required'
        ]);

        return Contact::create([
            'fname' => ucwords($request['fname']),
            'lname' => ucwords($request['lname']),
            'phone' => $request['phone'],
            'company' => $request['company'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Place::where('user_id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return Place::find($id);
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
        $request->validate([
            'title' => 'required|max:4|min:2',
            'fname' => 'required|min:2',
            'lname' => 'required|min:2',
            'phone' => 'required|digits:11',
            'company' => 'required'
        ]);

        $contact = Contact::find($id);

        $contact->title = $request['title'];
        $contact->fname = $request['fname'];
        $contact->lname = $request['lname'];
        $contact->phone = $request['phone'];
        $contact->company = $request['company'];

        $contact->save();

        return Contact::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Contact::find($id)->delete();
    }
}
