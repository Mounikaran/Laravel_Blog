<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => "HomePage",
            'heading' => " Welcome to HomePage"
        );
        // return view('pages.index', compact('title'));
        return view('pages.index')->with($data);
    }
    public function about()
    {
        $data = array(
            'title' => "About",
            'heading' => " Welcome to About pAge"
        );

        return view('pages.about')->with($data);
    }
    public function services()
    {
        $data = array(
            'title' => "Services",
            'heading' => " Welcome to ServicesPage",
            'services' => ['WEB designing', 'SEO', "Wordpress"]
        );
        return view('pages.services')->with($data);
    }
}