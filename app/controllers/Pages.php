<?php

class Pages extends Controller {

    public function __construct()
    {

    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'theReviewer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum.'
        ];

        $this->view('pages/index',$data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us!',
            'description' => 'Integer pretium mauris nisi, id congue ipsum condimentum vitae. Fusce.'
        ];
        $this->view('pages/about',$data);
    }
}
