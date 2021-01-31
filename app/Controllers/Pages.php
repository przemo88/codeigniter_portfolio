<?php namespace App\Controllers;

use App\Models\PagesModel;
use CodeIgniter\Controller;

class Pages extends Controller{


    public function __constructor(){
        parent::__construct();

        
    }

    public function index(){
        $session = \Config\Services::session();
        $image = \Config\Services::image();
        $model = new PagesModel();
       
        $data = [
            'pages'  => $model->getPages(),
            'name' => 'Strony',
        ];

        echo view('statics/menu');
        echo view('pages/index', $data);
    }

    public function view($id = null){
        echo view('statics/menu');
        $model = new PagesModel();
        $data['pages'] = $model->getPages($id);

        if (empty($data['pages']))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Nie znaleziono strony o id równym: '. $id);
    }

    echo view('pages/view', $data);

    }

    public function add(){   
    echo view('statics/menu');
    $env_pass = env('pass');
    $env_login = env('login');

    $user = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];

    $validated = ($env_pass == $pass && $env_login == $user);

    if (!$validated) {
    header('WWW-Authenticate: Basic realm="Wymagane uprawnienia administratora."');
    header('HTTP/1.0 401 Unauthorized');
    die(
        "<div class='alert alert-danger text-center'>Brak dostępu</div>"
        );
    }
else
{
    $session = \Config\Services::session();
    $model = new PagesModel();

    if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => [
                'label' => 'name',
                'rules' => 'required|min_length[3]|max_length[5]',
                'errors' => [
                    'required' => 'Podaj nazwę.',
                    'min_length' => 'Nazwa nie może być krótsza niż 3 znaki.',
                    'max_length' => 'Nazwa nie może być dłuższa niż 20 znaków.',
                    'set_error_delimiters' => 'error'
                ]
            ],

            'description'  => [
                'label' => 'description',
                'rules' => 'required|min_length[10]|max_length[500]',
                'errors' => [
                    'required' => 'Dodaj opis.',
                    'min_length' => 'Opis nie może być krótszy niż 10 znaków.',
                    'max_length' => 'Opis nie może być dłuższy niż 500 znaków.',
                    'set_error_delimiters' => 'error'
                ]
            ],


            'github'  => [
                'label' => 'github',
                'rules' => 'required|min_length[10]|max_length[500]|regex_match[https:\/\/github.com\/przemo88\/[Aa-zZ]{1,}.[Aa-zZ]{1,}]',
                'errors' => [
                    'required' => 'Dodaj link do githuba.',
                    'min_length' => 'Opis nie może być krótszy niż 10 znaków.',
                    'max_length' => 'Opis nie może być dłuższy niż 500 znaków.',
                    'regex_match' => 'To nie jest poprawny link do githuba.',
                    'set_error_delimiters' => 'error'
                ]
            ],

            'website'  => [
                'label' => 'website',
                'rules' => 'required|min_length[10]|max_length[500]|regex_match[https:\/\/[aA-zZ]{1,}.przemyslawprzewoznik.pl]',
                'errors' => [
                    'required' => 'Dodaj link do strony.',
                    'min_length' => 'Opis nie może być krótszy niż 10 znaków.',
                    'max_length' => 'Opis nie może być dłuższy niż 500 znaków.',
                    'regex_match' => 'To nie jest poprawny link do strony.',
                    'set_error_delimiters' => 'error'
                ]
            ],
   
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4096]',
            ]
            
        ]))
        
    {

        try
    {
        $image = $this->request->getFile('image');
        $image->move(ROOTPATH . 'public/image/');

        $image_name = $image->getName();

    $model->save([
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'github' => $this->request->getPost('github'),
        'website' => $this->request->getPost('website'),
        'image' => $image_name
    ]);
    
        $session = \Config\Services::session();
        $_SESSION['add_success'] = 'Strona została dodana.';
        $session = session();
        $session->markAsFlashdata('add_success');
        return redirect()->to(base_url('pages'));
    }
        catch (\Exception $e)
        {
            die($e->getMessage()); 
        }
    }
    else
    {
        echo view('pages/add');
        }
    }

}

    public function edit($id = null){
        echo view('statics/menu');
        
        $env_pass = env('pass');
        $env_login = env('login');

        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];

        $validated = ($env_pass == $pass && $env_login == $user);

        if (!$validated) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        die(
            "<div class='alert alert-danger text-center'>Brak dostępu</div>"
            );
        }
        else
        {
            $model = new PagesModel();
            $data['pages'] = $model->getPages($id);

            if (empty($data['pages']))
            {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nie znaleziono strony o id równym: '. $id);
            }
            echo view('pages/edit',$data);
        }

    }

    public function destroy($id = null){
        $model = new PagesModel();
        $data['pages'] = $model->getPages($id);

        if (empty($data['pages']))
        {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Nie znaleziono strony o id równym: '. $id);
        }
        else{
            echo view('statics/menu');

            $env_pass = env('pass');
            $env_login = env('login');

            $user = $_SERVER['PHP_AUTH_USER'];
            $pass = $_SERVER['PHP_AUTH_PW'];

            $validated = ($env_pass == $pass && $env_login == $user);

            if (!$validated) {
            header('WWW-Authenticate: Basic realm="Wymagane uprawnienia administratora."');
            header('HTTP/1.0 401 Unauthorized');
            die(
                "<div class='alert alert-danger text-center'>Brak dostępu</div>"
                );
            }
            else
            {
                echo view('pages/destroy',$data);
            }
        }
    }

    public function delete(){
        helper('filesystem');
        $model = new PagesModel();
        $id =  $this->request->getPost('id');
        $file_name = $this->request->getPost('image');
        $model->where('id', $id)->delete();

        unlink(ROOTPATH . "public/image/". $file_name);
       
        $session = \Config\Services::session();
        $_SESSION['delete_success'] = 'Dane zostały usunięte.';
        $session = session();
        $session->markAsFlashdata('delete_success');
        return redirect()->to(base_url('pages'));
    }

    public function update(){
        if ($this->request->getMethod() === 'post')
    {
        try
    {
        $model = new PagesModel();
        $id =  $this->request->getPost('id');

        $image = $this->request->getFile('image');
        $image->move(ROOTPATH . 'public/image/');

        $image_name = $image->getName();

        $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'github' => $this->request->getPost('github'),
        'website' => $this->request->getPost('website'),
        'image' => $image_name
    ];

        $model->update($id, $data);
        $session = \Config\Services::session();
        $_SESSION['update_success'] = 'Dane zostały zaktualizowane.';
        $session = session();
        $session->markAsFlashdata('update_success');
        return redirect()->to(base_url('pages'));

    }
        catch (\Exception $e)
            {
            die($e->getMessage());
            }
        }
    }
}

