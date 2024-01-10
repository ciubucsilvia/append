<?php

namespace App\Http\Controllers\Append;

use App\Http\Requests\StoreContactRequest;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(StoreContactRequest $request) 
    {
        $data = $request->all();
        
        Mail::to(env('ADMINISTRATOR'))->send(new Contact($data));

        return redirect('/#contact')
        ->with(['success' => 'Your message has been sent. Thank you!']);
    }
}
