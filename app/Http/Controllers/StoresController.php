<?php

namespace App\Http\Controllers;

use App\Models\Store; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoresController extends Controller
{

    public readonly Store $store;

    public function __construct()
    {
        $this->store = new Store();
    }

    public function index()
    {
        $stores = $this->store->all();
        return view('page_stores.stores', ['stores' => $stores]);
    }

   
    public function create()
    {
        return view('page_stores.stores_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->store->create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'active' => $request->input('active', 0), 
        ]);
    
        if ($created) {
            return redirect()->route('stores.index');
        }
        return redirect()->back()->with('message', 'Error created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('page_stores.stores_edit', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->store->where('id', $id)->update($request->except(['_token', '_method']));

        if($updated){
            return redirect()->route('stores.index');
        }
        return redirect()->back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return redirect()->route('stores.index')->with('message', 'Store successfully deleted.');
    }
}
