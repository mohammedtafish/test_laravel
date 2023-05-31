<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public string $title;



    public string $body ;

    public  string $date;

    public  string $slug;

    public function __construct($title,$body ,$date,$slug){
        $this->title=$title;
        $this->body=$body;
        $this->date=$date;
        $this->slug=$slug;
    }


    public static function all(){



//        $posts=[];
//        foreach ($files as $file){
//            $doc=YamlFrontMatter::parseFile($file);
//            $posts[]= new post(
//                $doc->matter("title"),
//                $doc->body(),
//                $doc->matter("date")
//            );
//        }
//        return $posts;


//       return array_map(function($file){
//
//           $doc=YamlFrontMatter::parseFile($file);
//            return new post(
//                $doc->matter("title"),
//                $doc->body(),
//                $doc->matter("date")
//           );
//
//        },$files);

        return cache()->rememberForever("posts.all",function (){

            return collect(file::files(resource_path("post")))->map(function ($file){
                $doc=YamlFrontMatter::parseFile($file);
                return new post(
                    $doc->matter("title"),
                    $doc->body(),
                    $doc->matter("date"),
                    $doc->matter("slug")
                );
            })->sortByDesc("date");

        });





    }


    public static function find($slug)
    {
        return static::all()->firstwhere('slug', $slug);


    }
