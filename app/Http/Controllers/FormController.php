<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\FormField;
use Illuminate\Http\Request;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:G-formulaires')->only(['create', 'store', 'edit', 'update', 'delete']);
        // $this->middleware('permission:remplissage-fromulaire')->only(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forms.liste',['forms'=>Form::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->data);
        if (count($data->questions) > 0) {
            $formName = $data->form_name;
            $form = new Form ;
            $form->name = $formName;
            $form->save();
            $form_fields = array_map(function($data_field) use ($form) {
                $form_field = new FormField;
                $form_field->form_id = $form->id;
                $form_field->label = $data_field->question_name;
                $form_field->type = $data_field->question_type;
                if ($data_field->question_type == "checkbox" || $data_field->question_type == "radio") {
                    $form_field->options = json_encode($data_field->options);
                }
                $form_field->save();
                return $form_field;
            }, $data->questions);
            return back()->with('succes', 'succes');
        }else{
            return back()->with('err', 'err');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        $fields = $form->formFields;
        return view('forms.forms',['form' => $form ,'fields' => $fields]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }

    public function submit(Request $request)
    {
        $form = Form::find($request->formId);
        $data = $form->formFields ;
        $array = json_decode($data, true);

        $labels = array_map(function($item ,) {
            return $item['label'];
        }, $array);

        foreach ($labels as $value) {
            $result = [
                "label" => $value,
                "reponse" => $request->$value
            ];
            $results[] = $result;
        }
        $formSubmmission = new FormSubmission ;
        $formSubmmission->form_id = $request->formId ;
        $formSubmmission->agent_id = Auth::user()->id ;
        $formSubmmission->data = json_encode($results) ;
        if ($formSubmmission->save()) {
            return back()->with('succes', 'succes');
        } else {
            return back()->with('err', 'err');
        }
        
    }

    public function submissions(Request $request)
    {
        $id = $request->segment(3);
        $form = Form::find($id);
        $subs = FormSubmission::where('form_id','=',$form->id)->paginate(1);
        return view('forms.form-remplis',['submissions'=> $subs, 'form'=>$form]);
        // $form_submission = FormSubmission::find($id);
        // $form = Form::find($form_submission->form_id);
        // $allData = json_decode($form_submission->data);
        // $agent =  User::find($form_submission->agent_id);
        // return view('forms.form-remplis',['agent'=>$agent,'allData'=>$allData , 'form'=>$form ]);
    }
}
 