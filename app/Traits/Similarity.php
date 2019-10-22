<?php


namespace App\Traits;
use App\About;
trait Similarity {
	public function storeDataAbout($request) {
		dd($request);
		$volet = new About;
        $volet->titre = $request->input('titre');
        $volet->contenu = $request->input('contenu');
        $volet->save();
	}
}
