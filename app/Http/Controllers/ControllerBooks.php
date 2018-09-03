<?php 

namespace App\Http\Controllers;

use League\Fractal;
use League\Fractal\Manager;
use Illuminate\Http\Request;
use App\Repositories\RepositoryBooks;
use App\Transformers\BooksTransformer;

class ControllerBooks extends Controller
{
    private $repository_books;

    public function __construct(RepositoryBooks $repository_books)
    {
        $this->repository_books = $repository_books;
    }

    public function index(Request $request)
    {
        $filter = $request->input('filter', []);

        $books = $this->repository_books->getBooks($filter);

        $fractal  = new Manager; 
        $resource = new Fractal\Resource\Collection($books, new BooksTransformer, 'books');

        return $fractal
            ->parseIncludes(['author', 'publisher'])
            ->createData($resource)
            ->toArray();
    }

    public function store(Request $request)
    {
        $book = $this->repository_books->save($request);

        $fractal  = new Manager; 
        $resource = new Fractal\Resource\Item($book, new BooksTransformer, 'book');

        return $fractal
            ->createData($resource)
            ->toArray();
    }
}