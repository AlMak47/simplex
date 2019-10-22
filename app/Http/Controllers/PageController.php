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
use App\About;
class PageController extends Controller
{
    //

    use Similarity;
    protected $produits,$questions,$_questions,$articles,$_articles;
    public function __construct() {
    	$this->produits = Produit::select()->get();
    	$this->questions = Faq::select()->orderBy('id','desc')->limit(5)->get();
    	$this->_questions = Faq::select()->orderBy('id','desc')->limit(3)->get();
    	$this->articles = Blog::select()->orderBy('id','desc')->limit(5)->get();
    	$this->_articles = Blog::select()->orderBy('id','desc')->limit(3)->get();
    }

    public function home() {
    	return view('acceuil')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles);
    }

    public function aboutUs($item) {
        $post = Blog::select()->orderBy('id','desc')->limit(5)->get();
        $faq = Faq::select()->orderBy('id','desc')->limit(5)->get();
    	switch ($item) {
    		case 'presentation':
                $data = About::select()->where('titre','presentation')->first();
    			return view('about-us')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles)
    							->withItem($item)
                                ->withData($data)
                                ->withPost($post)
                                ->withFaq($faq);	
			break;
    		case 'history':
                $data = About::select()->where('titre','historique')->first();
				return view('about-us')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles)
    							->withItem($item)
                                ->withData($data)
                                ->withPost($post)
                                ->withFaq($faq);
			break;
    		case 'project':
            $data = About::select()->where('titre','projet')->first();
				return view('about-us')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles)
    							->withItem($item)
                                ->withData($data)
                                ->withPost($post)
                                ->withFaq($faq);
			break;
    		case 'team':
				return view('about-us')->withProduits($this->produits)
    							->withQuestions($this->questions)
    							->withQuestionsFirst($this->_questions)
    							->withArticles($this->articles)
    							->withArticlesFirst($this->_articles)
    							->withItem($item)
                                ->withPost($post)
                                ->withFaq($faq);
			break;
    		default:
    			# code...
			break;
    	}
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

