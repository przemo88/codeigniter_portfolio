<?php namespace App\Controllers;

use App\Models\EmailModel;
use CodeIgniter\Controller;

class Start extends Controller{

    public function index(){
        return view('start/index');
    }

    public function contact(){
        return view('start/contact');
    }

    public function send(){

        $msg = new EmailModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'email'  => 'required',
            'message'  => 'required|min_length[3]|max_length[1000]'    
        ]))
    {

    
        $email = \Config\Services::email();
        $email->setFrom($this->request->getPost('email'));
        $email->setTo('kontakt@przemyslawprzewoznik.pl');
    
        
        $email->setSubject('Wysłane ze strony z portfolio (codeigniter).');
        $email->setMessage($this->request->getPost('message'));
        
        $email->send();

        $session = session();
        $session->setFlashData('success','Dziękuję za wysłanie emaila');
        echo view('start/email_success');
    }
       
        else
        {
            echo view('start/contact');
        }
    }
}
