<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
Use RealRashid\SweetAlert\Facades\Alert;
use App\Enums\ClientType;
use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $clients = Client::query()
                    ->latest()
                    ->paginate(Client::PER_PAGE);

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());
        Alert::success('Client created successfully');

        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $client->update([
            'company_name' => $request->get('company_name'),
            'company_email' => $request->get('company_email'),
            'date_of_birth' => $request->get('type_of_client') == ClientType::PERSON->value
                ? $request->get('date_of_birth')
                : NULL,
            'registration_number' => $request->get('type_of_client') == ClientType::COMPANY->value
                ? $request->get('registration_number')
                : NULL,
            'contact_name' => $request->get('contact_name'),
            'contact_email' => $request->get('contact_email'),
            'type_of_client' => $request->get('type_of_client')
        ]);
        Alert::success('Client details edited successfully');

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();
        Alert::success('Client deleted successfully');

        return redirect()->route('clients.index');
    }
}
