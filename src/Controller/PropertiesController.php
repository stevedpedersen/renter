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
                $this->Flash->success(__('Your property info has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to edit the property info.'));
            }
        }
        $this->set('property', $property);
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
        // no view to render
        $this->autoRender = false;

        $id--;
        $http = new Client();
        $response = $http->get('http://mgautschi.dev.at.sfsu.edu/building_mgmt/properties/api');

        $rental = json_decode($response->body);

        // echo $rental[$id - 1]->address;
        // die;

        $property = $this->Properties->newEntity();

        // Added this line
        $property->user_id = $this->Auth->user('id');
        $property->unitType = $rental[$id]->unitType;
        $property->address = $rental[$id]->address; 
        $property->city = $rental[$id]->city;
        $property->state = $rental[$id]->state; 
        $property->zip = $rental[$id]->zip;
        $property->building = $rental[$id]->building;
        $property->unitNumber = $rental[$id]->unit;
        $property->beds = $rental[$id]->beds;
        $property->baths = $rental[$id]->baths;
        $property->rent = $rental[$id]->rent;
        $property->square_feet = $rental[$id]->squareFt;           


        
        if ($this->Properties->save($property)) {
            $this->Flash->success(__('You are now renting at '. $property->address));
            return $this->redirect(['action' => 'search']);
        }
        //return $this->redirect(['action' => 'search']);

        //$this->Flash->error(__('Unable to rent this property.'));

        return $this->redirect(['action' => 'search']);
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
        $http = new Client();

        $requestUrl = str_replace(' ', '+', "https://maps.googleapis.com/maps/api/geocode/json?address="
            .$property->address.",+"
            .$property->city.",+"
            .$property->state
            ."&key=AIzaSyC-SGyJ3ak0wFm9mleUQV9wftiUJJiXB5Y");
        $request = file_get_contents($requestUrl);
        $json = json_decode($request, true);
        $lat = $json['results'][0]['geometry']['location']['lat'];
        $lng = $json['results'][0]['geometry']['location']['lng'];

// https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=37.7205614,-122.47586519999999&sensor=true&key=AIzaSyC-SGyJ3ak0wFm9mleUQV9wftiUJJiXB5Y&rankby=distance&types=bus_station&types=subway_station

        $requestUrl = str_replace(' ', '+', "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="
            .$lat.",".$lng
            ."&sensor=true&key=AIzaSyC-SGyJ3ak0wFm9mleUQV9wftiUJJiXB5Y&rankby=distance&types=bus_station|subway_station|train_station");

        $request = file_get_contents($requestUrl);
        $stations = json_decode($request, true)['results'];

        //$property = $this->Properties->find('all');
        $this->set([
            'property' => $property,
            '_serialize' => ['property']
        ]);
        $this->set([
            'stations' => $stations,
            '_serialize' => ['stations']
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