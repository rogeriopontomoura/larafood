<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    private $repository;

    public function __construct(PlanDetail $planDetail, Plan $plan)    
    {
        $this->repository = $planDetail;
        $this->plan = $plan;
    }

    public function index($planUrl) {

        if(!$plan = $this->plan->where('url', $planUrl)->first()) {
            return redirect()->back();
        };

        $details = $plan->details;

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);

    }

    public function create($planUrl) {
    
        if(!$plan = $this->plan->where('url', $planUrl)->first()) {
            return redirect()->back();
        };      

        return view('admin.pages.plans.details.create', compact('plan'));

    }    

    public function store(StoreUpdatePlanDetail $request, $planUrl) {

        if(!$plan = $this->plan->where('url', $planUrl)->first()) {
            return redirect()->back();
        }; 

        $plan->details()->create($request->all());

        return redirect()->route('plan.details.index', $planUrl);
    }     
    
    public function edit($urlPlan, $idDetail) 
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);


        if(!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
                    'plan' => $plan,
                    'detail' => $detail
                ]);
    }       

    public function update(StoreUpdatePlanDetail $request, $urlPlan, $idDetail) 
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail) {
            return redirect()->back();
        }
        
        $detail->update($request->all());

        return redirect()->route('plan.details.index', $plan->url);

    }       

    public function show($urlPlan, $idDetail) 
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail) {
            return redirect()->back();
        }
        
        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }    

    public function destroy($urlPlan, $idDetail) 
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail) {
            return redirect()->back();
        }
        
        $detail->delete();

        return redirect()
            ->route('plan.details.index', $plan->url)
            ->with('message', 'Registro Deletado com sucesso');
    }    
}
