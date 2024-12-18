<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $contacts = $this->list($request);
        
        return view('Contacts.index', compact('contacts'))->with(request()->input('page'));
    }

    public function list(Request $request)
    {
        $response = Contacts::orderBy('id')->paginate(20);
        return $response;
    }

    public function create(Request $request)
    {
        return view('Contacts.form');
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Inertia\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(Request $request, $id)
    {
        $contact = Contacts::where('contacts.id', $id)->get()[0];
        return view('Contacts.form', compact('contact'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        $body = $this->parseBody($request);
        
        try {
            $contacts = Contacts::create($body);

            return redirect()->route('contacts.index')
                ->with('success', 'Contato criado com sucesso!');
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            return redirect()->route('contacts.create')->with('error', $message);
        }
    }


    public function update($id, Request $request)
    {
        $body = $this->parseBody($request, $id);
        try {
            Contacts::where('id', $id)->update($body);
            return redirect()->route('contacts.index')
                ->with('success', 'Contato atualizado com sucesso!');
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            return redirect()->route('contacts.show', $id)->with('error', $message);
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            Contacts::where('id', $id)->delete();
            return redirect()->route('contacts.index')
                ->with('success', 'Contato deletado com sucesso!');
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            return redirect()->route('contacts.index')->with('error', $message);
        }
    }


    public function parseBody(Request $request, $id = null)
    {
        $request->validate([
            'name'    => 'required|min:5',
            'contact' => 'required|min:9|max:9|unique:contacts,contact,' . $id,
            'email'   => 'required|email|unique:contacts,email,' . $id
        ]);

        $body = $request->all();
        unset($body['_token']);
        if (isset($body['_method'])) {
            unset($body['_method']);
        }
        
        return $body;
    }
}
