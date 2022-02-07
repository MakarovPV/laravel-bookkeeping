<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\IncomeCategoriesRepository;
use App\Repositories\ExpensesCategoriesRepository;
use App\Models\IncomeCategories;

class RenderController extends Controller
{
    private $incomeCategoriesRepository;
    private $expensesCategoriesRepository;

    public function __construct(IncomeCategoriesRepository $incomeCategoriesRepository, 
                                ExpensesCategoriesRepository $expensesCategoriesRepository)
    {
        $this->incomeCategoriesRepository = $incomeCategoriesRepository;
        $this->expensesCategoriesRepository = $expensesCategoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $incomes = [];
        $expenses = [];

        if(Auth::check()){
            $incomes = $this->incomeCategoriesRepository->getMonthFromRequest($request, Auth::id())->toBase()->get();
            $expenses = $this->expensesCategoriesRepository->getMonthFromRequest($request, Auth::id())->toBase()->get();
        };       
       
        return view('bookkeeping.index', compact('incomes', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
