<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)    
    {
        $this->repository = $plan;
    }

    public function index() {

        $plans = $this->repository->latest()->paginate();
    
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);

    }

    public function create() {
    
        return view('admin.pages.plans.create');

    }    

    // Usa request para validar 
    public function store(StoreUpdatePlan $request) {

        //$data = $request->all();
        //Movido para observer
        //$url = Str::kebab($data['name']);
        //$data['url'] = $url;

        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }    
    
    public function show($url) 
    {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();
        
        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }


    public function destroy($url) 
    {
        $plan = $this->repository->where('url', $url)->first();
        
        if(!$plan)
            return redirect()->back();
        
        if($plan->details->count() > 0) {
            return redirect()
                ->route('plans.index')
                ->with('error', 'Existem detalhes vinculados a este plano, verifique.');

        };

        $plan->delete();

        return redirect()
            ->route('plans.index')
            ->with('success', 'Plano Removido com sucesso.');
    }

    public function edit($url) 
    {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', [
                    'plan' => $plan
                ]);
    }    
    
    // Utiliza request para validar
    public function update(StoreUpdatePlan $request, $url) 
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }    

    public function search(Request $request) 
    {
        $filters = $request->except('_token');


        $plans = $this->repository->search($request->filter);
      
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }       
}
