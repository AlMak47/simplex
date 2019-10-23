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
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use Similarity;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $file,$filename , $pages;

    public function __construct() {
        $this->middleware('auth');
        $this->pages = About::all();
    }

    public function pagesIndex() {
      $pages = About::all();
      return view('admin.pages-index')->withPages($pages);
    }

    public function editPage($slug) {
      $edit = About::find($slug);
      return view("admin.edit-page")->withPages($this->pages)->withEdit($edit);
    }

    public function produitIndex() {
      $produits = Produit::all();
      return view('admin.produit-index')->withPages($this->pages)->withProduits($produits);
    }

    public function addProduits(Request $request) {
      $validation = $request->validate([
        'libelle' =>  'required|string',
        'prix_unitaire' =>  'required|numeric',
        'image' =>  'image',
        'fiche_technique' =>  'file'
      ]);
      if($request->hasFile('fiche_technique') || $request->hasFile('image')) {
        // un fichier existe
      } else {
        // aucun fichier n'existe
        $item = new Produit;
        $item->reference = 'item-'.time();
        $item->libelle = $request->input('libelle');
        $item->description = $request->input('description');
        $item->save();
        return redirect("admin/produits")->withSuccess("Success!");
      }
    }
    //
    public function makeEditPage(Request $request,$slug) {
      $validation = $request->validate([
        'slug'  =>  'required|exists:pages,slug',
        'titre' =>  'required|string',
        'contenu' =>   'required|string'
      ]);
      $edit = About::find($slug);
      $edit->titre = $request->input('titre');
      $edit->contenu = $request->input('contenu');
      $edit->slug = Str::slug($request->input("titre"),'-');
      $edit->save();
      return redirect('/admin/pages/'.$edit->slug.'/edit')->withSuccess("Success!");
    }
    // ajouter une page
    public function addPages(Request $request) {
      $validation = $request->validate([
        'titre' =>  'required|string',
        'contenu' =>  'required|string'
      ]);

      $pages = new About ;
      $pages->slug = Str::slug($request->input('titre'),'-');
      $pages->titre = $request->input('titre');
      $pages->contenu = $request->input('contenu');
      $pages->save();
      return redirect('admin/pages')->withSuccess('Success!');
    }
    // editer un produit
    public function editProduit(Request $request , $reference) {
      $edit = Produit::find($reference);
      return view('admin.edit-produit')->withEdit($edit)->withPages($this->pages);
    }
    // make edit produit
    public function makeEditProduit(Request $request , $reference) {
      $validation = $request->validate([
        'libelle' =>  'required|string',
        'reference' =>  'required|string|exists:produits,reference',
        'prix_unitaire' =>  'numeric',
        'image' =>  'image',
        'fichie_technique'  =>  'file'
      ]);
      if($request->hasFile('image') || $request->hasFile('fiche_technique')) {
        // un fichier existe

        // dd($item);
        dd($request);
      } else {
        // aucun fichier n'existe
        $item = Produit::find($request->input('reference'));
        $item->libelle = $request->input('libelle');
        $item->description = $request->input('description');
        $item->prix_unitaire  =   $request->input('prix_unitaire');
        $item->save();
        return redirect("/admin/produits/".$item->reference."/edit")->withSuccess("Success!");
      }
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

    public function postQuestion(FaqRequest $request) {
        $faq= new Faq;
        $faq->intitule = $request->input('intitule');
        $faq->reponse = $request->input('reponse');
        $faq->save();
        return redirect('admin/add-question');
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

}
