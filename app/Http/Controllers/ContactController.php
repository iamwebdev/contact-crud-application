<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $contactDetails = Contact::all();
        return view('contact.view',compact('contactDetails'));
    }

    public function create()
    {
        return view('contact.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:contacts',
            'job_title' => 'required|string|',
            'city' => 'required|string',
            'country' => 'required|string',
        ]);
        $objContact = new Contact;
        $objContact->fill($request->all());
        if ($objContact->save()){
            Session::flash('success','Contact saved successfully');
        }else{
            Session::flash('failure','Sorry something went wrong');
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $contactDetails = Contact::findorfail($id);
        return view('contact.show',compact('contactDetails'));
    }

    public function edit($id)
    {
        $contactDetails = Contact::findorfail($id);
        return view('contact.edit',compact('contactDetails'));
    }

    public function update(Request $request, $id)
    {
        $contactDetails = Contact::findorfail($id);
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:contacts,email,'.$id,
            'job_title' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
        ]);
        $contactDetails->fill($request->all());
        if ($contactDetails->update()){
            Session::flash('success','Contact details updated successfully');
        }else{
            Session::flash('failure','Sorry something went wrong');
        }
        return redirect()->back();   
    }

    public function destroy($id)
    {
        Contact::findorfail($id)->delete();
        return redirect()->back();
    }
}
