<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {


        // If our user is the admin 
        if (auth()->user()->id == 1) {
            // Collect all expenses
            $expenses = Expense::all();

            // Fill the calendar with all the expenses
            foreach ($expenses as $event) {
                $events[] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->date,
                ];
            }




            // Sum all costs
            $sum = $expenses->sum('cost');
            return view('expense.index', [
                'events' => $events,
                'costs' => $sum
            ]);
            // If our user is not the admin (employee)
        } else {

            // initialise an array to store the attributes
            $events = array();
            // variable to hold total costs for a specific employee
            $costs = 0;
            // Take auth user's expenses 
            foreach (auth()->user()->expenses as $event) {

                $events[] = [
                    // take only these specific attributes
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->date,
                ];

                // Calculate total cost for the specific employee
                $costs += $event->cost;
            }

            return view('expense.index', [

                'events' => $events,
                'costs' => $costs,
            ]);
        }
    }

    public function show(Expense $expense)
    // Route model binding
    {


        // an expense is viewable by his employee or admin
        if (auth()->user()->id == $expense->user_id || auth()->user()->id == 1) {
            return view('expense.show', [
                'expense' => $expense
            ]);
        } else return redirect('dashboard');
    }


    // See expenses page
    public function create(Request $request)
    {
        return view('expense.create', [
            'user' => $request->user(),

        ]);
    }

    // User can edit the expense
    public function edit(Expense $expense)
    {
        if (auth()->user()->id == $expense->user_id) {
            return view('expense.edit', [
                'expense' => $expense,
            ]);
        } else return redirect('dashboard');
    }

    // Update the expense at the db
    public function update(Expense $expense, StoreExpenseRequest $request): RedirectResponse
    {
        if (auth()->user()->id == $expense->user_id) {

            // dd($request)->file('image');
            $validated = $request->validated();

            // If user wants to edit the image
            if ($request->hasFile('image')) {
                // delete old image if it has 
                if ($expense->path !== null) {

                    Storage::delete($expense->path);
                }
                $path = $request->file('image')->store();
                $validated['path'] = "$path";
            }
            $expense->update($validated);

            // flash message
            session()->flash('success', 'Expense updated');

            return redirect('expenses');
        } else return redirect('dashboard');
    }
    // Add a new expense
    public function store(StoreExpenseRequest $request): RedirectResponse
    {
        // Validate user's input using the StoreExpenseRequest 
        $validated = $request->validated();


        //* If employee uploaded an image
        if ($request->hasFile('image')) {

            // store the path (filename in db) and the file in storage/private folder)
            $path = $request->file('image')->store();
            $validated['path'] = "$path";
        }


        // Add to the validated data the authenticated user's id to associate it with the expense
        $validated['user_id'] = auth()->user()->id;
        // Create a new model with the validated attributes
        $expense = Expense::create($validated);

        // save the expense on the db
        $expense->save();

        session()->flash('success', 'Expense Created Succesfully');
        return redirect('/dashboard');
    }
}
