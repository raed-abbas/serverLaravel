<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // création de méthode index
    // Affichier tous les contacts
    function index()
    {
        $contacts = Contact::all();
        return view('contact', ['contacts'=>$contacts]);
    }
    
   
    // cette fucntion envoie les données du fromulaire à DB
    public function addContact(Request $request)
    {
        // Ajouter un contact
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contact',
            'message' => 'required'
        ]);
        $now = Carbon::now();
        $details = [
            'name' => $request -> name,
            'email' => $request -> email,
            'message' => $request -> message,
            'date' => $now
        ];
        $contact = Contact::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'message' => $request -> message,
            'date' => $now
        ]);
        if($contact){
            return back()->with('success', 'Le contact a été bien envoyé');
        }else{
            return back()->with('fail', 'Il y a une erreur dans la requête ...!');
        }
        // second méthod
        // $query = DB::table('contact')->insert([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'message' => $request -> message,
        //     'date' => $now
        // ]);
        // // tester si la reqêute a été bien passée
        // if($query){
        //     return back()->with('success', 'Les donées ont été bien enregistrées');
        // }else{
        //     return back()->with('fail', 'Il y a une erreur dans la requête ...!');
        // }
        // return $details;
        // envoie d'un mail
        // Mail::to('raedabbasps@gmail.com')->send(new Contact($details));
        // return back()->with('message_envoye', 'Votre message a été bien envoyé');
    }
}
