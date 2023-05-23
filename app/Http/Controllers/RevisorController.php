<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function revisorIndex(){
    $article_to_check = Article::where('is_accepted', null)->first();
    return view('revisor.revisorIndex', compact ('article_to_check'));
    }

    public function acceptArticle (Article $article){
    $article->setAccepted(true);
    return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectArticle (Article $article){
    $article->setAccepted(false);
    return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }

    public function undoArticle (Article $article){
        $article->setAccepted(null);       
        return redirect('/revisor/home')->with('message', 'Hai ripristinato l\'articolo, lo puoi revisionare qui.');

        if (Auth::user()->is_revisor) {
            return redirect()->back()->with('message', 'Hai ripristinato l\'annuncio, lo trovi in zona Revisore');
        // } else {
        //     return redirect()->back()->with('message', 'L\'annuncio è in attesa di revisione. Grazie per la tua segnalazione');
        }
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Complimenti! hai richiesto di diventare revisore correttamente');
        return view('mail.becomeRevisor');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message', "Complimenti! Sei diventato revisore");
    }

    public function rejectRevisor(User $user){
        return redirect('/')->with('message_invalid', "Siamo spiacenti, non sei stato nominato revisore");
    }
}
