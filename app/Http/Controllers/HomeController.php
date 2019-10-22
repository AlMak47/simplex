<?php

namespace App\Http\Controllers;
use App\Traits\Similarity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\AboutRequest;
use App\Produit;
use App\Faq;
use App\Blog;
use App\About;
class HomeController extends Controller
{
    use Similarity;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $file,$filename;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getFichier($chemin,$fichier,$request) {

        $this->file=$request->file($fichier);
        if($this->file->isValid()) {
            // $chemin=config('image.path');
            $extension=$this->file->getClientOriginalExtension();
            do {
                $nom=str_random(10).'.'.$extension;
            } while(file_exists($chemin.'/'.$nom));
            $this->filename=$nom;
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function addproduit() {
        return view('admin.addproduits');
    }

    public function postProduit(ProduitRequest $request) {
        // dd($request);
        $produit=new Produit;
        $produit->nom=$request->input('nom');
        $produit->description=$request->input('description');
        $this->getFichier(config('image.path'),'image',$request);
        $tmp1=$this->file;
        $produit->image=$this->filename;
        $this->getFichier(config('file.path'),'fichier',$request);
        $tmp2=$this->file;
        $produit->fichier=$this->filename;
        // dd($this->file);
        if($tmp1->move(config('image.path'),$produit->image) && $tmp2->move(config('file.path'),$produit->fichier)) {
            // image telecharger
            $produit->save();
            return redirect('admin/listproduit');
        }

    }

    // list des produits
    public function listProduit() {
        $produits = Produit::select()->get();
        return view('admin.list-produit')->withProduits($produits);
    }

    // delete produits

    public function deleteProduits($id) {
        $tmp=Produit::select()->where('id',$id)->get()[0]->image;
        $tmp1=Produit::select()->where('id',$id)->get()[0]->fichier;
        Produit::destroy($id);
        // Storage::delete('public/img/ban.jpg');
        return redirect('admin/listproduit');
        // $store=Storage::files('public');
        // dd($store);
    }

    public function addQuestion() {
        return view('admin.addquestion');
    }

    public function postQuestion(FaqRequest $request) {
        $faq= new Faq;
        $faq->intitule = $request->input('intitule');
        $faq->reponse = $request->input('reponse');
        $faq->save();
        return redirect('admin/add-question');
    }

    public function listQuestion() {
        $question=Faq::select()->get();
        return view('admin.list-question')->withQuestion($question);
    }

    public function addArticle() {
        return view('admin.add-article');
    }

    public function postArticle(BlogRequest $request) {
        // dd($request);
        $article = new Blog;
        $article->nom=$request->input('nom');
        $article->description=$request->input('description');
        $this->getFichier(config('image.path'),'image',$request);
        $article->image=$this->filename;
        if($this->file->move(config('image.path'),$article->image)) {
            $article->save();
            return redirect('admin/add-article');
        }
    }

    public function listArticle() {
        $articles = Blog::select()->get();
        return view('admin.list-article')->withArticles($articles);
    }

    public function aboutPage() {
        return view('admin.about-settings');
    }

     public function postPresentation(AboutRequest $request) {
        $this->storeDataAbout($request);
        $msg;
        if($request->titre == "presentation") {
            $msg = "presentation";
        } else if($request->titre == "historique") {
            $msg = "historique";
        } else {
            $msg = "projet";
        }
        return redirect('admin/about-settings')->with('success',"$msg ajouté avec success");
    }
}
