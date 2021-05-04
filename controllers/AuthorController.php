<?php
  // file: controllers/AuthorController.php

  require_once('models/Author.php');
  require_once('models/Book.php');

  class AuthorController extends Controller {

    public function index() {  
      return view('author/index',
       ['authors'=>Author::all(),
        'title'=>'Authors List']);
    }

    public function show($id) {
      $author = Author::find($id);
      $books = Book::where("author_id",$id); 
      return view('author/show',
        ['author'=>$author,
          'books'=>$books,
         'title'=>'Author Detail']);
    }

    public function create() {
      return view('author/create',
        ['title'=>'Create Author']);
    }

    public function store($param1 = NULL) {
      $id = Input::get('id');
      $author = Input::get('author');
      $nationality = Input::get('nationality');
      $birth_year = Input::get('birth_year');
      $fields = Input::get('fields');
      $item = ['id'=>$id,'author'=>$author,
               'nationality'=>$nationality,'birth_year'=>$birth_year,
                'fields'=>$fields];
      Author::create($item);
      return redirect('/author');
    }  
  }
?>