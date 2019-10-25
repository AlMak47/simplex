<?php

namespace App\Http\Controllers;
use App\Traits\Similarity;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\AboutRequest;
use App\Produit;
use App\Faq;
use App\Blog;
use App\Contact;
use App\Slideshow;
use App\About;
class PageController extends Controller
{
    //

    use Similarity;
    protected $pages , $produits;
    public function __construct() {
      $this->pages = About::all();
      $this->produits = Produit::all();
    }

    public function home() {
      $slideshow = Slideshow::all();
    	return view('acceuil')->withPages($this->pages)->withProduits($this->produits)->withSlides($slideshow);
    }

    public function aboutUsPages($slug) {
      $detail = About::find($slug);
      return view('about-us')->withPages($this->pages)->withSlug($slug)->withDetail($detail);
    }

    public function contactUs() {
    	return view('contact-us')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles);
    }

    public function faqDetails($id) {
        $details = Faq::select()->where('id',$id)->get()[0];
        return view('faq-details')->withProduits($this->produits)
                                ->withQuestions($this->questions)
                                ->withQuestionsFirst($this->_questions)
                                ->withArticles($this->articles)
                                ->withArticlesFirst($this->_articles)
                                ->withDetails($details);
    }

    public function blogDetails($id) {
        $details = Blog::select()->where('id',$id)->get()[0];
        return view('blog-details')->withProduits($this->produits)
                                ->withQuestions($this->questions)
                                ->withQuestionsFirst($this->_questions)
                                ->withArticles($this->articles)
                                ->withArticlesFirst($this->_articles)
                                ->withDetails($details);
    }

    public function produitsDetails($id) {
        return view('produit-details')->withProduits($this->produits)
                                ->withQuestions($this->questions)
                                ->withQuestionsFirst($this->_questions)
                                ->withArticles($this->articles)
                                ->withArticlesFirst($this->_articles);
    }

    public function postContact(ContactRequest $request) {
        $contact = new Contact;
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->objet = $request->input('objet');
        $contact->message = $request->input('message');
        // SEND BY EMAIL AND SAVE TO DATABASE
        // dd($contact);
        $contact->save();
        return redirect('/contact-us/success');
    }

    public function contactSendSuccess() {
        return view('contact-us-success')->withSuccess('Votre Message a été Envoyé , Nous vous répondrons sous peu de temps !')
        ->withProduits($this->produits)
                                ->withQuestions($this->questions)
                                ->withQuestionsFirst($this->_questions)
                                ->withArticles($this->articles)
                                ->withArticlesFirst($this->_articles);
    }


}
