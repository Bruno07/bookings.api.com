<?php 

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Uuid;

class RepositoryBooks
{
    public function getBooks(array $filter = [])
    {
        $query = Book::query();

        if (!empty($filter))
            $this->applyFilters($query, $filter);

        $books = $query->get();

        return $books;
    }

    private function applyFilters($query, $filter)
    {

    }

    public function save(Request $request, $id = null)
    {
        if (empty($id))
            $book = new Book;
        else
            $book = Book::findOrFail($id);

        $book->image = $request->input('image');
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author_id = $request->input('author_id');
        $book->category_id = $request->input('category_id');
        $book->publishing_company_id = $request->input('publishing_company_id');
        $book->language_id = $request->input('language_id');
        $book->format_id = $request->input('format_id');
        $book->publication_date = $request->input('publication_date');
        $book->notice = $request->input('notice');
        $book->category = $request->input('category');
        $book->save();

        return $book;
    }
}