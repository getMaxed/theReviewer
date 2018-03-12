<?php

class Posts extends Controller {
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }







    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (!empty($_FILES['file'])) {
                $file = $_FILES['file'];
                $filename = basename($file['name']);
                $fileTmp = $file['tmp_name'];
                $fileSize = $file['size'];
                $error = $file['error'];

                $ext = explode('.', $filename);
                $ext = strtolower(end($ext));
                $allowed_ext = array('jpg', 'png', 'jpeg');

                if (in_array($ext, $allowed_ext) === true) {
                    if ($error === 0) {
                        if ($fileSize <= 209272152) {
                            $fileRoot = 'images/' . $filename;
                            move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'] . '/123/projects/xxx/theReviewer/public/' . $fileRoot);
//                              return $fileRoot;
                        } else {
                            $GLOBALS['imageError'] = "The file size is too large";
                        }
                    }
                } else {
                    $GLOBALS['imageError'] = "The extension is not allowed";
                }
            }

                $data = [
                    'title' => trim($_POST['title']),
                    'artist_name' => trim($_POST['artist_name']),
                    'album_name' => trim($_POST['album_name']),
                    'album_year' => trim($_POST['album_year']),
                    'album_rating' => trim($_POST['album_rating']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'image' => $fileRoot,
                    'title_err' => '',
                    'body_err' => ''
                ];

                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }
                if (empty($data['artist_name'])) {
                    $data['artist_name_err'] = 'Please enter artist name';
                }
                if (empty($data['album_name'])) {
                    $data['album_name_err'] = 'Please enter album name';
                }
                if (empty($data['album_year'])) {
                    $data['album_year_err'] = 'Please select the album year';
                }
                if (empty($data['album_rating'])) {
                    $data['album_rating_err'] = 'Please rate an album';
                }
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please write a review';
                }

                if (empty($data['title_err']) && empty($data['artist_name_err']) && empty($data['album_name_err']) && empty($data['album_year_err']) && empty($data['album_rating_err']) && empty($data['body_err'])) {
                    if ($this->postModel->addPost($data)) {
                        flash('post_message', 'Review Added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('posts/add', $data);
                }

            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
                $this->view('posts/add', $data);
            }

        }




    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please write a review';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/edit', $data);
            }


        } else {
            // Get existing post from the model
            $post = $this->postModel->getPostById($id);

            // Check for post owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];

            $this->view('posts/edit', $data);
        }

    }

    public function show($id)
    {
        $post= $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $this->postModel->getPostById($id);

            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Review Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }
}