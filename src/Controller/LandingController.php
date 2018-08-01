<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Landing Controller
 *
 *
 * @method \App\Model\Entity\Landing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LandingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $landing = ['title'=>'Landing','login'=>Router::url(["_name"=>"login"])];
        $this->set('pageTitle','Landing Page');
        $this->set(compact('landing'));
    }

    /**
     * View method
     *
     * @param string|null $id Landing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landing = $this->Landing->get($id, [
            'contain' => []
        ]);

        $this->set('landing', $landing);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $landing = $this->Landing->newEntity();
        if ($this->request->is('post')) {
            $landing = $this->Landing->patchEntity($landing, $this->request->getData());
            if ($this->Landing->save($landing)) {
                $this->Flash->success(__('The landing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The landing could not be saved. Please, try again.'));
        }
        $this->set(compact('landing'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Landing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $landing = $this->Landing->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $landing = $this->Landing->patchEntity($landing, $this->request->getData());
            if ($this->Landing->save($landing)) {
                $this->Flash->success(__('The landing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The landing could not be saved. Please, try again.'));
        }
        $this->set(compact('landing'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Landing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $landing = $this->Landing->get($id);
        if ($this->Landing->delete($landing)) {
            $this->Flash->success(__('The landing has been deleted.'));
        } else {
            $this->Flash->error(__('The landing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
