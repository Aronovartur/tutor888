<?php

namespace App\Models;

use App\Scopes\LangScope;
use App\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'blog_category_id',
        'lang',
        'slug',
        'body',
        'type',
        'display_main_menu',
        'display_footer',
        'featured_frontend',
        'published'
    ];


    public function category(){
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

protected static function boot()
{
    parent::boot();
    static::addGlobalScope(new PublishedScope);
    static::addGlobalScope(new LangScope);
}

public function getRouteKeyName()
{
    return 'slug';
}
}
