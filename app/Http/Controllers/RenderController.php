<?php

namespace App\Http\Controllers;

use App\Modules\Dates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\IncomeCategoriesRepository;
use App\Repositories\ExpensesCategoriesRepository;

class RenderController extends Controller
{
    /**
     * @var IncomeCategoriesRepository
     */
    private $incomeCategoriesRepository;

    /**
     * @var ExpensesCategoriesRepository
     */
    private $expensesCategoriesRepository;

    /**
     * @param IncomeCategoriesRepository $incomeCategoriesRepository
     * @param ExpensesCategoriesRepository $expensesCategoriesRepository
     */
    public function __construct(IncomeCategoriesRepository $incomeCategoriesRepository,
                                ExpensesCategoriesRepository $expensesCategoriesRepository)
    {
        $this->incomeCategoriesRepository = $incomeCategoriesRepository;
        $this->expensesCategoriesRepository = $expensesCategoriesRepository;

    }

    /**
     * Вывод данных на главную страницу
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $incomes = [];
        $expenses = [];

        if(Auth::check()){
            $incomes = (new Dates($this->incomeCategoriesRepository))->getMonthFromRequest($request, Auth::id())->toBase()->get();
            $expenses = (new Dates($this->expensesCategoriesRepository))->getMonthFromRequest($request, Auth::id())->toBase()->get();
        };

        return view('bookkeeping.index', compact('incomes', 'expenses'));
    }
}
