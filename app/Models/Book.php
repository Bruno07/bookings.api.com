<?php 

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Uuids;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publishing_company_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }
}