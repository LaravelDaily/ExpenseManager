<?php

namespace App\Http\Controllers\Admin;

use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExpenseCategoriesRequest;
use App\Http\Requests\Admin\UpdateExpenseCategoriesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ExpenseCategoriesController extends Controller
{
    /**
     * Display a listing of ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('expense_category_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('ExpenseCategory.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('ExpenseCategory.filter', 'my');
            }
        }

                $expense_categories = ExpenseCategory::all();

        return view('admin.expense_categories.index', compact('expense_categories'));
    }

    /**
     * Show the form for creating new ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('expense_category_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.expense_categories.create', compact('created_bies'));
    }

    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseCategoriesRequest $request)
    {
        if (! Gate::allows('expense_category_create')) {
            return abort(401);
        }
        $expense_category = ExpenseCategory::create($request->all());



        return redirect()->route('admin.expense_categories.index');
    }


    /**
     * Show the form for editing ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('expense_category_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $expense_category = ExpenseCategory::findOrFail($id);

        return view('admin.expense_categories.edit', compact('expense_category', 'created_bies'));
    }

    /**
     * Update ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseCategoriesRequest $request, $id)
    {
        if (! Gate::allows('expense_category_edit')) {
            return abort(401);
        }
        $expense_category = ExpenseCategory::findOrFail($id);
        $expense_category->update($request->all());



        return redirect()->route('admin.expense_categories.index');
    }


    /**
     * Display ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('expense_category_view')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$expenses = \App\Expense::where('expense_category_id', $id)->get();

        $expense_category = ExpenseCategory::findOrFail($id);

        return view('admin.expense_categories.show', compact('expense_category', 'expenses'));
    }


    /**
     * Remove ExpenseCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('expense_category_delete')) {
            return abort(401);
        }
        $expense_category = ExpenseCategory::findOrFail($id);
        $expense_category->delete();

        return redirect()->route('admin.expense_categories.index');
    }

    /**
     * Delete all selected ExpenseCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('expense_category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ExpenseCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
