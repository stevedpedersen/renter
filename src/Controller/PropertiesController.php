<?php

namespace App\Controller;

use Cake\Network\Http\Client;

class PropertiesController extends AppController
{

    

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth');
    }

	public function index()
	{
		// properties is the view variable
        $id = $this->Auth->user('id');
        $userProperties = $this->Properties->find('all', array(
            'conditions' => array('Properties.user_id' => $id)
        ));
        
		$this->set([
			'properties' => $userProperties,
			'_serialize' => ['properties']
		]);

	}

	public function view($id = null)
    {
        $property = $this->Properties->get($id);
        //$property = $this->Properties->find('all');
        $this->set([
        	'property' => $property,
        	'_serialize' => ['property']
        ]);
    }

    public function add()
    {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            // Added this line
            $property->user_id = $this->Auth->user('id');
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$property = $this->Properties->patchEntity($property, $newData);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('Your property has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your property.'));
        }
        $this->set('property', $property);
    }

    public function edit($id)
    {
        $property = $this->Properties->get($id);
        if ($this->request->is(['post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            if ($this->Properties->save($property)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function search()
    {
        $http = new Client();
        $response = $http->get('http://mgautschi.dev.at.sfsu.edu/building_mgmt/properties/api');

        $properties = json_decode($response->body);

        $this->set([
            'properties' => $properties,
            '_serialize' => ['properties']
        ]);
    }

    public function rent($id)
    {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->data);
            // Added this line
            $property->user_id = $this->Auth->user('id');
            $property->unitType;
            $property->address; 
            $property->city;
            $property->state; 
            $property->zip;
            $property->building;
            $property->unit;
            $property->beds;
            $property->baths;
            $property->rent;
            $property->squareFt;           


            if ($this->Properties->save($property)) {
                $this->Flash->success(__('Your property has been saved.'));
                return $this->redirect(['action' => 'search']);
            }
            $this->Flash->error(__('Unable to rent this property.'));
        }
        $this->set('property', $property);
    }

    public function delete($id)
    {
        $property = $this->Properties->get($id);
        $message = 'Deleted';
        if (!$this->Properties->delete($property)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
        return $this->redirect(['action' => 'index']);
    }

    public function getUserID()
    {
        return $this->Auth->user('id');
    }


    public function isAuthorized($user)
    {
        // All registered users can add properties
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of a property can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $propertyId = (int)$this->request->params['pass'][0];
            if ($this->Properties->isOwnedBy($propertyId, $user['id'])) {
                return true;
            }
        }

        // overriding the AppController’s isAuthorized() call and internally 
        // checking if the parent class is already authorizing the use
        return parent::isAuthorized($user);
    }


    public function map($id = null)
    {
        $property = $this->Properties->get($id);
        //$property = $this->Properties->find('all');
        $this->set([
            'property' => $property,
            '_serialize' => ['property']
        ]);
    }

    public function bus($id = null)
    {
        $property = $this->Properties->get($id);
        //$property = $this->Properties->find('all');
        $this->set([
            'property' => $property,
            '_serialize' => ['property']
        ]);
    }

    public function service($id = null)
    {

        if (empty($id)) {
            throw new NotFoundException;
        }
        $property = $this->Properties->get($id);
        //$property = $this->Properties->find('all');
        $this->set([
            'property' => $property,
            '_serialize' => ['property']
        ]);
    }
    
}