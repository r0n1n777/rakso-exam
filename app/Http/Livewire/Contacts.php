<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Contacts extends Component
{
    public $contacts;

    public $contact_id;
    public $title;
    public $fname;
    public $lname;
    public $phone;
    public $company;

    public $success = false;

    protected $rules = [
        'title' => 'required|max:4|min:2',
        'fname' => 'required|min:2',
        'lname' => 'required|min:2',
        'phone' => 'required|digits:11',
        'company' => 'required'
    ];

    public function render()
    {
        $this->show();

        return view('livewire.contacts');
    }

    public function show()
    {
        $this->contacts = Contact::all();
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        $this->contact_id = $id;
        $this->title = $contact->title;
        $this->fname = $contact->fname;
        $this->lname = $contact->lname;
        $this->phone = $contact->phone;
        $this->company = $contact->company;
    }

    public function update() {
        $this->validate();

        $contact = Contact::find($this->contact_id);

        $contact->title = $this->title;
        $contact->fname = $this->fname;
        $contact->lname = $this->lname;
        $contact->phone = $this->phone;
        $contact->company = $this->company;

        $contact->save();

        $this->success = true;
    }

    public function delete($id) {
        $this->contact_id = $id;
        
        Contact::find($this->contact_id)->delete();
    }
}
