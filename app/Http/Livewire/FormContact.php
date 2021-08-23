<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormContact extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $message, $document;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'message' => 'required',
        'document' => ['required','mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf','max:500']
    ];
    protected $messages = [
        'required' => 'Este campo é obrigatório.',
        'email' => 'O campo deve ser um e-mail válido.',
        'min' => 'O campo deve conter no minimo :min caracteres',
        'max' =>'O documento deve ter no maximo :max kb.',
        'mimes' => "O documento deve ser do tipo: :values",
        'regex' => 'Formato de inválido'
    ];



    public function render()
    {
        return view('livewire.form-contact', [
            'messages'=> Contact::get()
        ])->layout('layouts.guest');
    }

    public function send()
    {

        $this->validate();

        $pathDocument = $this->document->store('documents');

        Contact::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'message'=>$this->message,
            'file_path'=>$pathDocument,
            'sender_ip'=>request()->ip(),
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($this->name,$this->email, $this->phone, $this->message, $pathDocument));

        $this->reset(['name','email','phone','message', 'document']);

        session()->flash('message', 'E-mail enviado com sucesso.');
    }
}
