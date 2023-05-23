<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function welcome () {
        //$articles= Article::all();
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('welcome', compact('articles'));
    }

    public function about() {
        return view('about');
    }

    public function revisorHistory(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('revisor.revisorHistory', compact ('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function createProfile(){
        return view('profile.createProfile');
    }

    public function showProfile(){
        $userId = Auth::id();
        $profile = Auth::user()->profile;
        $articles = Article::where('user_id', $userId)->get();
    
        return view('profile.showProfile', compact('profile', 'articles'));
    }

    public function edit(Profile $profile){
        return view ('profile.edit', compact ('profile'));
    }
        
}


