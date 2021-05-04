<?php
  // file: controllers/BookController.php

  require_once('models/Book.php');

  class BookController extends Controller {

    public function index() {  
      return view('book/index',
       ['books'=>Book::all(),
        'title'=>'Books List']);
    }

    public function show($id) {
      $book = Book::find($id);
      return view('book/show',
        ['book'=>$book,
         'title'=>'Book Detail']);
    }

    public function create() {
      return view('book/create',
        ['title'=>'Create book']);
    }

    public function store($param1 = NULL) {
      $id = Input::get('id');
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $languaje = Input::get('languaje');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $author_id = Input::get('author_id');
      $publisher = Input::get('publisher');
      $publisher_id = Input::get('publisher_id');
      $item = ['id'=>$id,'title'=>$title,
               'edition'=>$edition,'copyright'=>$copyright,
                'languaje'=>$languaje,'pages'=>$pages,
                'author'=>$author,'author_id'=>$author_id,
                'publisher'=>$publisher,'publisher_id'=>$publisher_id];
      Book::create($item);
      return redirect('/book');
    }  
  }
?>