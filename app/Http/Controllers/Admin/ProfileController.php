<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->find($id)) { 
            redirect()->back();
        }

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(!$profile = $this->repository->find($id)) { 
            redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if(!$profile = $this->repository->find($id)) { 
            redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index')
        ->with('message', 'Registro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id)) { 
            redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profiles.index')
        ->with('message', 'Registro deletado com sucesso');

    }


    public function search(Request $request)
    {

        $filters = $request->only('filter');

        $profiles = $this->repository
                            ->where(function($query) use ($request) {
                                if($request->filter) {
                                    $query
                                    ->where('name', $request->filter)
                                    ->orWhere('description', 'LIKE', "%$request->filter%");
                                }                                
                            })
                            ->paginate(1);
    
        return view('admin.pages.profiles.index', compact('profiles', 'filters'));
    }

    
}
