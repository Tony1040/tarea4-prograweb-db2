<?php
  // file: controllers/BookController.php

  require_once('models/Publisher.php');
  require_once('models/Book.php');

  class PublisherController extends Controller {

    public function index() {  
      return view('publisher/index',
       ['publishers'=>Publisher::all(),
        'title'=>'Publishers List']);
    }

    public function show($id) {
      $publisher = Publisher::find($id);
      $books = Book::where("publisher_id",$id);
      return view('publisher/show',
        ['publisher'=>$publisher,
         'books'=>$books,
         'title'=>'Publisher Detail']);
    }

    public function create() {
      return view('publisher/create',
        ['title'=>'Create Publisher']);
    }

    public function store($param1 = NULL) {
      $id = Input::get('id');
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');

      $item = ['id'=>$id,'publisher'=>$publisher,
               'country'=>$country,'founded'=>$founded,
                'genere'=>$genere];
      Publisher::create($item);
      return redirect('/publisher');
    }  

    public function edit($id) {
      $publisher = Publisher::find($id);
      return view('publisher/edit',
        ['publisher'=>$publisher,
         'title'=>'Publisher Edit']);
    }  

    public function update($_,$id) {
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['publisher'=>$publisher,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
      Publisher::update($id,$item);
      return redirect('/publisher');
    }
    
    public function destroy($id) {  
      Publisher::destroy($id);
      return redirect('/publisher');
    }
  }
?>