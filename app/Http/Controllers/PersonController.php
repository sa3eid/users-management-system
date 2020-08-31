<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persons;
use Faker\Provider\ar_JO\Person;
use PDO;
use DataTables;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // handle root(index) route for persons
    public function index()
    {
        //retreive all data from DB
        $data = Persons::all();
        // get data ordered by name
        // $data = Persons::orderBy('Name', 'Desc')->get();
        // get daata by Id
        // $data = Persons::where('Id', 1)->get();

        // $data = [
        //     ['name' => 'Georgina Rodriguez', 'age' => 28, 'nationality' => 'Argentinian'],
        //     ["name" => "Irina Shayk", "age" => 34, "nationality" => "Russian"],
        // ];

        // return respeonse as a string value
        // return 'Hello World!!';

        //return response as json representation of array
        // return [
        //     ["name" => "Georgina Rodriguez", "age" => 28, "Nationality" => "Argentinian"],
        //     ["name" => "Irina Shayk", "age" => 34, "Nationality" => "Russian"],
        // ];

        // return view

        // get name and age from query parameters url

        return view('persons.persons', [
            "data" => $data,
            "name" => request('name'),
            "age" => request('age'),
        ]);
    }

    // taking route parameters
    public function show($id)
    {
        $data = Persons::findOrFail($id);
        return view('persons.details', [
            "data" => $data,
        ]);
        // return $data;
    }

    public function create()
    {
        // $Nationalities = Persons::pluck('Nationality', 'Id')->toArray();
        // error_log(json_encode($Nationalities));
        // return view('persons.create', compact('Nationalities'));
        return view('persons.create');
    }

    public function store()
    {
        // error_log(request('residence'));
        // dd(request('name'));
        // error_log(request('nationality'));

        // $data = request()->validate([
        //     'Name' => 'required|min:3',
        //     'Nationality' => 'required|min:3',
        //     'Residence' => 'required|min:3',
        //     'Email' => 'required|min:3',
        //     'Age' => 'required',
        //     'Birthdate' => 'required',
        // ]);
        // \App\Persons::create($data);

        $person = new Persons;
        $person->Name = request('name');
        $person->Age = request('age');
        $person->Email = request('email');
        $person->Residence = request('residence');
        $person->Nationality = request('nationality');
        $person->Birthdate = request('birthdate');

        $person->save();

        return redirect('/persons')->with('msg', 'User has been submitted successfully');
    }

    public function destroy($id)
    {
        // error_log($id);
        $person = Persons::where('Id', $id)->delete();
        // error_log($person);
        // $person->delete();
        return redirect('/persons')->with('msg', 'User is deleted successfully');
    }

    public function edit($id)
    {
        $person = Persons::where('Id', $id)->get();
        // error_log($id);
        return view('subviews.edit', ["person" => $person]);
    }

    // update database
    public function modify()
    {
        $data = request()->validate([
            'Name' => 'required|min:3',
            'Nationality' => 'required|min:3',
            'Residence' => 'required|min:3',
            'Email' => 'required|min:3',
            'Age' => 'required',
        ]);
        Persons::where('Id', request('id'))->update($data);
        return redirect('/persons/datatable')->with('msg', 'User data has been updated successfully');
    }
    public function select2()
    {
        $matchedNationality =  Persons::select('Id as id', 'Nationality as text')->where('Nationality', 'LIKE',  '%' . request('searchTerm') . '%')->distinct()->get();

        return $matchedNationality;
    }

    public function getdatatable()
    {
        return view('persons.datatable');
    }
    public function handledatatable()
    {
        $data = Persons::latest()->get();
        return DataTables::of($data)->addColumn('Action', function ($data) {
            $button = '<button id="' . $data->Id . '" class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#exampleModal">Edit</button>';
            $button .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" 
            name="delete" id="' . $data->Id . '" class="delete btn btn-danger btn-sm">
            Delete
            </button>';
            return $button;
        })->rawColumns(['Action'])->make(true);
        return view('persons.datatables');
    }
}
