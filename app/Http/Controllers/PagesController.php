<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getAboutPages()
    {
        $this->data['titlePage'] = 'About us';
        return view('about.index', $this->data);
    }
    public function getBlogPages()
    {
        $this->data['titlePage'] = 'Blog';
        return view('blog.index', $this->data);
    }
    public function getContactPages()
    {
        $this->data['titlePage'] = 'Contact us';
        return view('contact.index', $this->data);
    }

}
