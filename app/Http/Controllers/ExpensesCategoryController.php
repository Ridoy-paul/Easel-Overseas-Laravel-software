<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('agents.view') == true) {
            $categories = ExpensesCategory::all();
            return view('pages.expenses.expenses_type', compact('categories'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
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
        if(User::checkPermission('expenses.category.create') == true) {
            $validated = $request->validate([
                'expense_type' => 'required',
                'title' => 'required|unique:expenses_categories',
            ]);
    
            $category = new ExpensesCategory;
            $category->title = $request->title;
            $category->expense_type = $request->expense_type;
            $category->user_id = Auth::user()->id;
            $category->save();
            return redirect()->back()->with('success', 'New Expenses Category Added');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpensesCategory  $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesCategory $expensesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpensesCategory  $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('expenses.category.edit') == true) {
            $category = ExpensesCategory::where('id', $id)->first();
            return view('pages.expenses.edit_expenses_category', compact('category'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpensesCategory  $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('expenses.category.edit') == true) {
            $category = ExpensesCategory::where('id', $id)->first();
            $validated = $request->validate([
                'title' => 'required|unique:expenses_categories,title,'.$category->id,
            ]);

            $category->title = $request->title;
            $category->expense_type = $request->expense_type;
            $category->update();
            
            return Redirect()->route('expense.category.index')->with('success', 'Expenses Category info Updated Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpensesCategory  $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesCategory $expensesCategory)
    {
        //
    }
}
