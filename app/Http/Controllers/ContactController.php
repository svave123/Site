<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        
        $contact = new Contact();
        $contact->id_user = Auth::user()->id;
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было добавлено');
    }

    public function allData() {
        $contact = new Contact;
        return view('messages', ['data' => $contact->orderBy('created_at', 'desc')->take(5)->get()]);
    }

    public function showOneMessage($id) {
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    // public function showMessageUser($id) {
    //     $contact = new Contact;
    //     return view('user-one-message', ['data' => $contact->find($id)]);
    // }


    public function allDataUser() {
        $contact = new Contact;
        return view('user-data', ['data' => $contact->orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get()]);
    }

    public function showOneMessageUser($id) {
        $contact = new Contact;
        return view('user-one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
        $contact = new Contact;
        return view('user-update', ['data' => $contact->find($id)]);
    }

    public function deleteMessage($id) {
        Contact::find($id)->delete();
        return redirect()->route('user-data')->with('success', 'Сообщение было удалено');
    }

    public function updateMessageSubmit($id, ContactRequest $req) {

        $contact = Contact::find($id);

        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('user-data-one', $id)->with('success', 'Сообщение было обновлено');
    }
}
