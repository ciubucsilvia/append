<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->title = 'Client';
        $this->folder = 'clients';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view clients')) abort('401');

        $this->title .= 's';

        $items = $this->clientRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.clients.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create client')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.clients.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        if(!$this->user->can('store client')) abort(401);
        $data = $request->all();
        
        // $client = Client::create($data);
        $client = $this->clientRepository->create($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->clientRepository->saveImage($client, $file, $this->folder);
        }
        // save $data['active']
        $this->clientRepository->setActive($client, $data);

        if($client) {
            return redirect()
            ->route('admin.clients.index')
            ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        if(!$this->user->can('show client')) abort(401);

        $this->content = view(env('THEME') . '.admin.clients.show', compact('client'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        if(!$this->user->can('edit client')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.clients.edit', 
            compact('client'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        if(!$this->user->can('update client')) abort(401);
        $data = $request->all();
        
        $client->update($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->clientRepository->saveImage($client, $file, $this->folder);
        }
        
        // save $data['active']
        $this->clientRepository->setActive($client, $data);

        if($client) {
            return redirect()
            ->route('admin.clients.index')
            ->with(['success' => "Client: $client->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if(!$this->user->can('delete client')) abort(401);
        $clientName = $client->name;

        $this->clientRepository->deleteImage($client->image, $this->folder);
        $client->delete();
        
        return redirect()
            ->route('admin.clients.index')
            ->with(['success' => "Client: $clientName deleted!"]);
    }
}
