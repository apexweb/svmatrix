<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Core\Exception\Exception;

class SettingsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
       if ($this->Auth->user()) {
            $this->Auth->allow(['index']);
        }

    }
    
    public function index()
    {
        $settings = $this->Settings->find('all')
                        ->where(['user_id' => $this->Auth->user('id')])->first();
        $fields = array('products' => array('product_item_number'           => 'NO.',
                                            'product_qty'     => 'Quantity',
                                            'product_sec_dig_perf_fibr' => 'Product Type',
                                            'product_window_or_door'  => 'Window/Door',
                                            'product_configuration' => 'Configuration',
                                            ),
                        'additional_section' => array('additional_section_per_meter' => array('additional_item_number' => 'Item No.',
                                                                                              'additional_per_meter' => 'Per Meter',
                                                                                              'additional_name' => 'Additional Section'
                                                                                            ),
                                                      'additional_section_per_length' => array('additional_item_number' => 'Item No.',
                                                                                              'additional_per_length' => 'Per Length',
                                                                                              'additional_name' => 'Additional Section'),
                                                      'accessories' => array('accessory_item_number' => 'Item No.',
                                                                             'accessory_each' => 'Each',
                                                                             'accessory_name' => 'Accessories Section'),
                                                    )
                 );
        if(empty($settings)){
            $settings = $this->Settings->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {            
            $settings = $this->Settings->patchEntity($settings, $this->request->data);
            $settings->user_id = $this->Auth->user('id');
            $settings->data = base64_encode(serialize($this->request->data));
            if ($this->Settings->save($settings)) {
                $this->Flash->success(__('The field settings has been saved.'));

               // return $this->redirect(['controller' => 'pages', 'action' => 'importantinfo']);
            } else {
                $this->Flash->error(__('The field settings could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fields' , 'settings'));
        $this->set('_serialize', ['settings']);
    }
}
