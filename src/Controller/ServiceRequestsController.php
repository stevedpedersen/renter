<?php

namespace App\Controller;

use Cake\Network\Http\Client;
use Cake\Network\Request;
use Cake\Event\Event;



class ServiceRequestsController extends AppController
{

    public $uses = array(
        'User',
        'Properties'
    );

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['edit']); // the publicly available options list
    }

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

	public function index()
	{
		// serviceRequests is the view variable
        $this->loadModel('Properties');
        $id = $this->Auth->user('id');
        //$this->loadModel('Properties');
        $serviceRequests = $this->ServiceRequests->find('all');
        $properties = $this->Properties->find('all');
        
		$this->set([
			'serviceRequests' => $serviceRequests,
			'_serialize' => ['serviceRequests']
		]);
        $this->set('properties' , $properties);


	}

	public function view($id = null)
    {
        $serviceRequest = $this->ServiceRequests->get($id);
        //$serviceRequest = $this->ServiceRequests->find('all');
        $this->set([
        	'serviceRequest' => $serviceRequest,
        	'_serialize' => ['serviceRequest']
        ]);
    }

    public function edit($id)
    {
        $this->autoRender = false;
        $serviceRequest = $this->ServiceRequests->get($id);

        $serviceRequest = $this->ServiceRequests->patchEntity($serviceRequest, $this->request->data);
        //$serviceRequest->save($entity, ['completed' => true]);
        $serviceRequest->completed = true;
        if ($this->ServiceRequests->save($serviceRequest)) {
            //$serviceRequest->save($serviceRequest, ['completed' => true]);
            $this->Flash->success(__('Thank you for completing the request!'));
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('Unable to edit or locate the service request.'));
        }

    }

    public function add($id)
    {

        $serviceRequest = $this->ServiceRequests->newEntity();

        if ($this->request->is('post')) {
            $serviceRequest = $this->ServiceRequests->patchEntity($serviceRequest, $this->request->data);

            if ($this->ServiceRequests->save($serviceRequest)) {

                $this->send($serviceRequest);
                $this->Flash->success(__('Your service request has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your service request.'));
        }
        $this->set('id', $id);
        $this->set('serviceRequest', $serviceRequest);
    }

    public function send($serviceRequest)
    {
        // no view to render
        $this->autoRender = false;

        $http = new Client();

        $response = $http->post(
            'http://mgautschi.dev.at.sfsu.edu/building_mgmt/serviceRequests',
            json_encode($serviceRequest), 
            ['type' => 'json']);

        // var_dump($response->body);
        // die;
        // $response = $http->post(
        //      'http://spedersen.dev.at.sfsu.edu/renter_mgmt/service_requests/add',
        //      $this->to_json(), 
        //      ['type' => 'json']);
        
        //$this->Flash->success(__('Your service request has been sent.'));
        //return $this->redirect(['controller' => 'ServiceRequests',  'action' => 'index']);
    }

    public function delete($id)
    {
        $serviceRequest = $this->ServiceRequests->get($id);

        if (!$this->ServiceRequests->delete($serviceRequest)) {
            $this->Flash->error(__('Error deleting service request.'));
        }
        $this->Flash->success(__('Deleted'));
        return $this->redirect(['action' => 'index']);
    }

}

// class ServiceRequest {
//     private $property_id;
//     private $completed;
//     private $description;

//     public function __construct()
//     {
//         $this->property_id = 1;
//         $this->completed = false;
//         $this->description = "The roof is on fire.";
//     }

//     public function set_id($id) { $this->property_id = $id; }

//     public function set_completed($value) { $this->completed = $value; }

//     public function set_description($value) { $this->description = $value; }

//     public function get_id() { return $this->property_id; }

//     public function get_completed() { return $this->completed; }

//     public function get_description() { return $this->description; }


//     public function to_json()
//     {
//         $arr = array(
//             'property_id' => $this->property_id,
//             'completed' => $this->completed,
//             'description' => $this->description);
//         return json_encode($arr);
//     }
// }