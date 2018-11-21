<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Translation;

class TranslationController extends Controller
{
     public function read()
    {
    	$translation = Translation::all();
    	return json_encode($translation);
    }

     public function create(Request $request)
    {
       
        $a = $request->models;
        $a = trim($a, "[]");
        $b = json_decode($a);
        $id = $b->translation_id;
        if ($id == 0) {
            $translation = new Translation;
            $translation->word = $b->word;
            $translation->translation = $b->translation;          

        }else{            
            $translation = Translation::find($id);
            $translation->word = $b->word;
            $translation->translation = $b->translation;
        }          
        $translation->save();
        return $translation->translation_id;
    }

    public function destroy(Request $request)
    {
        $a = $request->models;
        $a = trim($a, "[]");
        $b = json_decode($a);
        $id = $b->id;
        $translation = Translation::destroy($id);        
    }

    public function getWord()
    {
    	$word = Translation::where('learned', 0)->first();        
    	return view('test', ['word'=> $word]);
    }
}

