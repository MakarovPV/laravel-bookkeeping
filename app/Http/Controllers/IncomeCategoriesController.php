<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IncomeCategories;

class IncomeCategoriesController extends Controller
{
    /**
     * Добавление нового источника доходов
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->input();

        IncomeCategories::insert([
            'user_id' => Auth::id(),
            'source_of_income' => $data['source_name'],
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
            'source_of_income' => $data['source_name'],
            'price' => $data['price'],
        ];
        IncomeCategories::where('id', $id)->update($input);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        IncomeCategories::where('id', $id)->delete();
    }
}
