<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
      $contacts = array('data' => Contact::simplePaginate(10));
      return $contacts;
    }
}
