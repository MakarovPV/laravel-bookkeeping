<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpensesCategories;

class ExpensesCategoriesController extends Controller
{
    /**
     * Добавление нового источника расходов
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->input();

        ExpensesCategories::insert([
            'user_id' => Auth::id(),
            'source_of_expenses' => $data['source_name'],
            'price' => $data['price'],
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $input = [
            'user_id' => Auth::id(),
            'source_of_expenses' => $data['source_name'],
            'price' => $data['price'],
        ];
        ExpensesCategories::where('id', $id)->update($input);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        ExpensesCategories::where('id', $id)->delete();
    }
}
