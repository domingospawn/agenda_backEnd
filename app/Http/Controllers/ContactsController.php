<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contact;
use Illuminate\Support\Facades\Log;

class ContactsController extends Controller
{
    private $text;

    public function index()
    {
      $contacts = array('data' => Contact::simplePaginate(10));
      return $contacts;
    }

    public function token()
    {
      return csrf_token();
    }

    public function saveText(Request $request)
    {
      Log::info('Contacts controller');
      Log::info('Request from controller======================================');
      Log::info( $request->all() );
      Log::info('=============================================================');
      $text = $request->input('text');
      $this->text = $text;

      Log::info('save text -> '.$text);

      return 'sended: '.$text;
    }

    public function getText()
    {
      return 'text salved '.$this->text;
    }
}
