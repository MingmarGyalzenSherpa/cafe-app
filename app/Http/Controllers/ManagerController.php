<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Employee;
use App\Models\EmployeeContacts;
use App\Models\Enquiry;
use App\Models\Img;
use App\Models\Items;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    //
    public function create()
    {

        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }

        return view('frontend.adminPanel.manager.dashboard');
    }

    public function showItems(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')
            ->select('items.id as itemID', 'items.*', 'categories.*')->whereNull('items.deleted_at')->get();
        if ($req->catID && $req->catID != "all") {

            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.categories_id', '=', $req->catID)->whereNull('items.deleted_at')
                ->select('items.id as itemID', 'items.*', 'categories.*')->get();
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        } else if ($req->dishName) {
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.name', 'like', '%' . $req->dishName . '%')->whereNull('items.deleted_at')
                ->select('items.id as itemID', 'items.*', 'categories.*')->get();
        }
        return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
    }

    public function editItem($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }

        $item = Items::find($id);
        $categories = DB::table('categories')->get();
        $img = DB::table('imgs')->where('items_id', '=', $id)->first();
        return view('frontend.adminPanel.manager.edit-items', compact('id', 'categories', 'img', 'item'));
    }

    public function saveEditItem(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $item = Items::find($req->id);
        $item->name = $req->name;
        $item->categories_id = $req->categories_id;
        $item->price = $req->price;
        $item->save();
        if ($img = $req->File('img')) {

            $imgDB = Img::where('items_id', '=', $req->id)->first();
            if (Storage::delete('/public/' . $imgDB->img_path)) {
                $response = $img->store('images', 'public');
                $imgDB->img_path = $response;
                $imgDB->save();
            }
        }
        return redirect()->route('showItems');
    }

    public function deleteItem(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $item = Items::find($req->id);
        $item->delete();
        return redirect()->route('showItems');
    }

    public function showEmployees()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $employees = DB::table('employees')->join('employee_contacts', 'employees.id', '=', 'employee_contacts.employee_id')->select(
            'employees.id as id',
            'employees.first_name',
            'employees.middle_name',
            'employees.last_name',
            'employees.shift',
            'employees.salary',
            'employees.role',
            'employee_contacts.contact',
            'employee_contacts.city',
            'employee_contacts.email',
        )->get();
        return view('frontend.adminPanel.manager.employees', compact('employees'));
    }

    public function searchEmployee(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }

        $employees = Employee::join('employee_contacts', 'employees.id', '=', 'employee_contacts.employee_id');

        switch ($req->searchBy) {

            case 'name':
                $employees = $employees->where('first_name', 'like', '%' . $req->input . '%')->orWhere('middle_name', 'like', '%' . $req->input . '%')->orWhere('last_name', 'like', '%' . $req->input . '%')->get();
                break;

            case 'address':
                $employees = $employees->where('city', 'like', '%' . $req->input . '%')->get();
                break;

            case 'contacts':
                $employees = $employees->where('contact', 'like', '%' . $req->input . '%')->get();
                break;
            case 'email':
                $employees = $employees->where('email', 'like', '%' . $req->input . '%')->get();
        }

        return view('frontend.adminPanel.manager.employees', compact('employees'));
    }

    public function deleteEmployee($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $emp = Employee::find($id);
        $emp_contacts = EmployeeContacts::where('employee_id', '=', $emp->id)->first();
        if ($emp_contacts->delete()) {
            $emp->delete();
        }
        return redirect()->route('showEmployees');
    }

    public function editEmployee($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $employee = DB::table('employees')->join('employee_contacts', 'employees.id', '=', 'employee_contacts.employee_id')->select(
            'employees.id as id',
            'employees.first_name',
            'employees.middle_name',
            'employees.last_name',
            'employees.shift',
            'employees.salary',
            'employees.role',
            'employee_contacts.contact',
            'employee_contacts.city',
            'employee_contacts.email',
        )->where('employees.id', '=', $id)->first();

        return view('frontend.adminPanel.manager.edit-employee', compact('employee'));
    }

    public function saveEditEmployee(Request $req)
    {
        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'shift' =>  'required',
            'salary' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'email' => 'required',
        ]);
        $employee = Employee::find($req->id);
        $employee->first_name = $req->first_name;
        $employee->middle_name = $req->middle_name;
        $employee->last_name = $req->last_name;
        $employee->role = $req->role;
        $employee->shift = $req->shift;
        $employee->salary = $req->salary;
        $employee_contact_PK = EmployeeContacts::where('employee_id', '=', $req->id)->first();
        $employee_contact = EmployeeContacts::find($employee_contact_PK->id);
        $employee_contact->contact = $req->contact;
        $employee_contact->city = $req->city;
        $employee_contact->email = $req->email;
        $employee->save();
        $employee_contact->save();
        return redirect()->route('showEmployees');
    }

    public function addEmployee()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        return view('frontend.adminPanel.manager.add-employee');
    }

    public function submitEmployee(Request $req)
    {
        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'shift' =>  'required',
            'salary' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'email' => 'required',
        ]);

        $emp = Employee::Create([
            "first_name" => $req->first_name,
            'middle_name' => $req->middle_name,
            'last_name' => $req->last_name,
            'role' => $req->role,
            'shift' => $req->shift,
            'salary' => $req->salary,
        ]);

        EmployeeContacts::Create([
            'employee_id' => $emp->id,
            'contact' => $req->contact,
            'city' => $req->city,
            'email' => $req->email,
        ]);

        return redirect()->route('showEmployees');
    }

    public function showCategories()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $counts = array();
        foreach ($categories as $category) {
            $count = DB::table('items')->whereNull('deleted_at')->where('categories_id', '=', $category->id)->count();
            array_push($counts, $count);
        }
        return view('frontend.adminPanel.manager.categories', compact('categories', 'counts'));
    }

    public function addCategory(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $req->validate([
            'name' => 'required',
        ]);
        Categories::Create([
            "cat_name" => $req->name
        ]);
        return back();
    }

    public function editCategory($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $category = Categories::find($id);
        return view('frontend.adminPanel.manager.edit-categories', compact('category'));
    }

    public function saveEditCategory(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);
        $category = Categories::find($req->id);
        $category->cat_name = $req->name;
        $category->save();
        return redirect()->route('showCategories');
    }

    public function deleteCategory(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $category = Categories::find($req->id);
        $category->delete();
        return redirect()->route('showCategories');
    }

    //show-reservations
    public function showReservations($status = null) //1 means approved , 0 means pending
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $reservations = '';
        if ($status) {
            $reservations = Reservations::all()->where('status', '=', 'approved');
        } else {
            $reservations = Reservations::all()->where('status', '=', 'pending');
        }

        return view('frontend.adminPanel.manager.reservations', compact('reservations', 'status'));
    }

    public function showMessages()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $messages = Enquiry::all();
        return view('frontend.adminPanel.manager.messages', compact('messages'));
    }

    public function showAccounts($type)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $accounts = User::where('type', '=', $type)->get();

        return view('frontend.adminPanel.manager.accounts', compact('accounts', 'type'));
    }

    public function addAccount()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        return view('frontend.adminPanel.manager.add-account');
    }

    public function saveNewAccount(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'type' => 'required',
            'password' => 'required',
        ]);
        dd($req->type);
    }
}
