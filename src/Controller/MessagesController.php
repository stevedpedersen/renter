<?php

namespace App\Controller;

use Cake\Network\Http\Client;
use Cake\Network\Request;



class MessagesController extends AppController
{


	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

	public function index()
	{
		// messages is the view variable
        $id = $this->Auth->user('id');
        $messages = $this->Messages->find('all');
        
		$this->set([
			'messages' => $messages,
			'_serialize' => ['messages']
		]);

	}

	public function view($id = null)
    {
        $message = $this->Messages->get($id);
        //$message = $this->Messages->find('all');
        $this->set([
        	'message' => $message,
        	'_serialize' => ['message']
        ]);
    }

    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            // Added this line
            $message->user_id = $this->Auth->user('id');

            if ($this->Messages->save($message)) {
                $this->Flash->success(__('Your message has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your message.'));
        }
        $this->set('message', $message);
    }

    public function send()
    {
        // no view to render
        $this->autoRender = false;


        $message = new Message();
        

        $http = new Client();

        $response = $http->post(
            'http://spedersen.dev.at.sfsu.edu/renter_mgmt/messages/add',
            $message->to_json(), 
            ['type' => 'json']);
        // $response = $http->post(
        //     'http://spedersen.dev.at.sfsu.edu/renter_mgmt/messages/add',
        //     $message->to_json(), 
        //     ['type' => 'json']);
        
        $this->Flash->success(__('Your message has been sent.'));
        return $this->redirect(['action' => 'index']);
    }

    public function delete($id)
    {
        $message = $this->Messages->get($id);
        $display = 'Deleted';
        if (!$this->Messages->delete($message)) {
            $display = 'Error';
        }
        $this->set([
            'display' => $display,
            '_serialize' => ['display']
        ]);
        return $this->redirect(['action' => 'index']);
    }

}

class Message {
    private $subject;
    private $body;

    public function __construct()
    {
        $this->subject = "test";
        $this->body = "test this body";
    }

    public function to_json()
    {
        $arr = array(
            'subject' => $this->subject,
            'body' => $this->body);
        return json_encode($arr);
    }
}