<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $stores = Store::where('user_id', $user_id)->get();

        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|min:2|unique:stores'
        ]);

        $user_id = Auth::user()->id;

        $store = new Store([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'state' => $request->input('state'),
            'lga' => $request->input('lga'),
            'description' => $request->input('description'),
            'user_id' => $user_id
        ]);

        $store->save();

        return redirect()->route('stores.show', ['store' => $store->id])->with('info', 'Store Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        // go stuff like get all product of a store

        return view('stores.show', ['store' => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $user_id = Auth::user()->id;

        if ($user_id !== $store->user_id) {
            return view('stores.error', ['error_code' => '403', 'error_message' => 'You\'re not allowed to view this page']);
        }

        return view('stores.edit', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $user_id = Auth::user()->id;

        if ($user_id !== $store->user_id) {
            return view('stores.error', ['error_code' => '403', 'error_message' => 'You\'re not allowed to view this page']);
        }

        $this->validate($request, [
            'name' => 'required|max:50|min:2'
        ]);

        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->state = $request->input('state');
        $store->lga = $request->input('lga');
        $store->description = $request->input('description');
        $store->save();

        return redirect()->route('stores.show', ['store' => $store]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
      $user_id = Auth::user()->id;

      if ($user_id !== $store->user_id) {
          return view('stores.error', ['error_code' => '403', 'error_message' => 'You\'re not allowed to view this page']);
      }

      $store->delete();

      return redirect()->back();
    }
}
