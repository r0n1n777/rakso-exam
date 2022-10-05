<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class UploadCSV extends Controller
{
    public function index(Request $request) {
        if ($request->csv->extension() == 'csv') {

            $title = $request->title_value;
            $fname = $request->fname_value;
            $lname = $request->lname_value;
            $phone = $request->phone_value;
            $company = $request->company_value;

            $contacts = [];

            if (($open = fopen($request->csv->getPathName(), "r")) !== FALSE) {

                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $contacts[] = $data;
                }

                fclose($open);
            }

            
            foreach ($contacts as $contact) {
                
                $new_contact = new Contact;

                $new_contact->$title = $contact[0];
                $new_contact->$fname = $contact[1];
                $new_contact->$lname = $contact[2];
                $new_contact->$phone = $contact[3];
                $new_contact->$company = $contact[4];

                $new_contact->save();
            }

            session()->flash('success', 'CSV Record has been uploaded successfully.');
            return redirect()->route('welcome');
        }
        else {
            session()->flash('fail', 'Please upload a valid file: (.csv) files only.');
            return redirect()->route('welcome');
        }
    }
}
