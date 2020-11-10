<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use Illuminate\Http\Response;


class TodoController extends Controller
{
    private $validationRules = [
        'text' => ['required', 'min:3'],
        'done' => []
    ];

    private $validationMessages = [
        'text.required' => 'Bitte Todo eingeben',
        'text.min'      => 'Das Todo muss mindestens :min Zeichen enthalten'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todos = Todos::all();
        /*
        $viewPrefix = auth()->check() ? 'admin' : 'public';
        return view( $viewPrefix . 'todo.index', ['todos' => $todos]);
        */
        if(auth()->check()){
            return view('admin.todos.index', ['todos' => $todos]);
        } else {
            return view('public.todos.index', ['todos' => $todos]);
            //return view('public.todos.index', ['todos' => Todos::all()]);
        }
        /* Kurzschreibweise
        $viewPrefix = (auth()->check() ? 'admin' : 'public';
        return view( $viewPrefix . 'todo.index', ['todos' => $todos]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request->post());
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        Todos::create($validated);
        return redirect('todos');

        /*
        $todo = new Todos;
        $todo->text = $request->text;
        $todo->done = $request->has('done') ? 1 : 0;
        $todo->save();


        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $todo = Todos::find($id);
        if($todo){
            return view('public.todos.show', ['todo' => $todo]);
        }
        else{
            return view('errors.massage', ['message' => "Todo mit ID $id nicht gefunden"]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $todo = Todos::find($id);
        return view('admin.todos.edit', ['todo'=>$todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate($this->validationRules,$this->validationMessages);
        Todos::find($id)->update($validated);

        /*
        $todo = Todos::find($id);
        $todo->text = $request->text;
        $todo->done = $request->has('done') ? 1 : 0;
        $todo->save();
        */

        return redirect('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Todos::find($id)->delete();
        return redirect('todos');
    }
}
