<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpensesCategories;

class ExpensesCategoriesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $model = ExpensesCategories::insert([
            'user_id' => Auth::id(),
            'source_of_expenses' => $data['source_name'],
            'price' => $data['price'],
        ]);
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
        $data = $request->all();

        $input = [
            'user_id' => Auth::id(),
            'source_of_expenses' => $data['source_name'],
            'price' => $data['price'],
        ];

        $model = ExpensesCategories::where('id', $id)
                                   ->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ExpensesCategories::where('id', $id)->delete();
    }
}
