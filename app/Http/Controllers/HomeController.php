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
use Illuminate\Support\Facades\File;
use App\Slideshow;

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
    // slideshow index

    public function slideShowIndex() {
      $slides=Slideshow::all();
      return view('admin.slideshow-index')->withPages($this->pages)->withSlides($slides);
    }

    public function addProduits(Request $request) {
      $validation = $request->validate([
        'libelle' =>  'required|string',
        'prix_unitaire' =>  'required|numeric',
        'image' =>  'image',
        'fiche_technique' =>  'file'
      ]);
      $item = new Produit;
      $item->reference = 'item-'.time();
      $item->libelle = $request->input('libelle');
      $item->description = $request->input('description');
      $item->prix_unitaire  = $request->input('prix_unitaire');

      if($request->hasFile('fiche_technique') || $request->hasFile('image')) {
        // un fichier existe
        if($request->hasFile('image')) {
          // image
          $extension = $request->file('image')->getClientOriginalExtension();
          $item->image = Str::random(10).'-'.time().'.'.$extension;
          $request->file('image')->move(config('image.path'),$item->image);
        }
        if($request->hasFile("fiche_technique")) {
          // fiche technique
        }
      }
      $item->save();
      return redirect("admin/produits")->withSuccess("Success!");
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

      $item = Produit::find($request->input('reference'));
      $item->libelle = $request->input('libelle');
      $item->description = $request->input('description');
      $item->prix_unitaire  =   $request->input('prix_unitaire');

      if($request->hasFile('image') || $request->hasFile('fiche_technique')) {
        // un fichier existe
        if($request->hasFile('image')) {
          // seulement limage
          if(File::exists(config('image.path').'/'.$item->image)) {
            File::delete(config('image.path').'/'.$item->image);
            $extension = $request->file("image")->getClientOriginalExtension();
            $item->image = Str::random(10).'-'.time().'.'.$extension;
            $request->file('image')->move(config('image.path'),$item->image);
          } else {
            $extension = $request->file('image')->getClientOriginalExtension();
            $item->image = Str::random(10).'-'.time().'.'.$extension;
            $request->file('image')->move(config('image.path'),$item->image);
          }
        }

        if($request->hasFile('fiche_technique')) {

          if(File::exists(config('fiche.path').'/'.$item->fiche_technique)) {
            $extension = $request->file('fiche_technique')->getClientOriginalExtension();
            File::delete(config('fiche.path').'/'.$item->fiche_technique);
            $item->fiche_technique = Str::random(10).'-'.time().'.'.$extension;
            $request->file('fiche_technique')->move(config('fiche.path'),$item->fiche_technique);
          } else {
            $_extension = $request->file('fiche_technique')->getClientOriginalExtension();
            $item->fiche_technique = Str::random(10).'-'.time().'.'.$_extension;
            $request->file('fiche_technique')->move(config('fiche.path'),$item->fiche_technique);
          }
        }
      }
      $item->save();
      return redirect("/admin/produits/".$item->reference."/edit")->withSuccess("Success!");
    }

  public function addSlideshow(Request $request) {
    $validation = $request->validate([
      'titre' =>  'string',
      'slide' =>  'required|image',
      'description' =>  'string'
    ]);
    $slide = new SlideShow;
    $slide->titre = $request->input('titre');
    $slide->description = $request->input('contenu');
    if($request->hasFile('slide')) {
      $extension = $request->file('slide')->getClientOriginalExtension();
      $slide->slide = Str::random(10).'-'.time().'.'.$extension;
      if($request->file('slide')->move(config('slideshow.path'),$slide->slide)) {
        $slide->save();
      }
    }
    return redirect("/admin/slideshow")->withSuccess('Success!');
  }

}
