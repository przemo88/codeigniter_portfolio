<?php namespace App\Controllers;

use App\Models\EmailModel;
use CodeIgniter\Controller;

class Statics extends Controller{


    public function index(){
        echo view('statics/menu');
        echo view('statics/index');
    }

    public function contact(){
        echo view('statics/menu');
        echo view('statics/contact');
        echo view('statics/footer');
    }
    
   

    public function send(){
          
        echo view('statics/menu');
        $msg = new EmailModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => [
                'label' => 'name',
                'rules' => 'required|min_length[3]|max_length[30]|regex_match[/[a-zA-Z]|\s/]',
                'errors' => [
                    'required' => 'Podaj swoje imię.',
                    'min_length' => 'Minimalna długość imienia to 3 litery.',
                    'max_length' =>  'Minimalna długość imienia to 30 litery.',
                    'regex_match' => 'Twoję imię może się składać wyłącznie z samych liter.'
                ]
            ],

            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Podaj swój email.',
                    'valid_email' => 'Wpisz poprawny adres email.',
                ]
            ],
            
            'message' => [
                'label' => 'message',
                'rules' => 'required|min_length[20]|max_length[1000]',
                'errors' => [
                    'required' => 'Napisz swoją wiadomość.',
                    'min_length' => 'Minimalna długość wiadomości to 20 liter.',
                    'max_length' =>  'Maksymalna długość wiadomości to 1000 liter.'
                ]
            ],

            'reCaptcha2' => [
                'label' => 'reCaptcha2',
                'rules' => 'required|reCaptcha2[]',
                'errors' => [
                    'required' => 'Uzupełnij reCaptcha.'
                ]
            ],
           
        ]))
    {
    
       
        $email = \Config\Services::email();
        $email->setFrom($this->request->getPost('email'));
        $email->setTo('kontakt@przemyslawprzewoznik.pl');
    
        
        $email->setSubject('Wysłane ze strony z portfolio (codeigniter).');
        $email->setMessage($this->request->getPost('message'));
        
        $email->send();

        $session = \Config\Services::session();
        $_SESSION['email_success'] = 'Dziękuję, email został wysłany.';
        $session = session();
        $session->markAsFlashdata('email_success');
        return redirect()->to(base_url('pages'));
    }
       
        else
        {
            echo view('statics/contact');
        }
    }
}