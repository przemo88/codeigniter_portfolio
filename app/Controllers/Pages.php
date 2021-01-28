<?php namespace App\Controllers;

use App\Models\PagesModel;
use CodeIgniter\Controller;

class Pages extends Controller{

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

    public function add()
{
    $session = \Config\Services::session();
    echo view('statics/menu');
    $model = new PagesModel();

    if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'description'  => 'required',
            'github'  => 'required',
            'website'  => 'required',
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

    public function edit($id = null){
        
        echo view('statics/menu');
        $model = new PagesModel();
        $data['pages'] = $model->getPages($id);

        if (empty($data['pages']))
        {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Nie znaleziono strony o id równym: '. $id);
        }
        echo view('pages/edit',$data);
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
            echo view('pages/destroy',$data);
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

