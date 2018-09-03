<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Book;
use League\Fractal\TransformerAbstract;

class BooksTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'author',
        'publisher'
    ];

    public function transform(Book $book)
    {
        return [
            'id' => $book->code,
            'image' => $book->image,
            'title' => $book->title,
        ];
    }

    public function includeAuthor(Book $book)
    {
        $author = $book->author;

        return $this->item($author, new AuthorsTransformer, 'author');
    }

    public function includePublisher(Book $book)
    {
        $publisher = $book->publisher;

        return $this->item($publisher, new PublisherTransformer, 'publisher');
    }
}