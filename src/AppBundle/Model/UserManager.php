<?php

namespace AppBundle\Model;

use AppBundle\Model\ModelManagerInterface;
use Doctrine\ORM\EntityManager;

class UserManager implements ModelManagerInterface
{
    protected $em;
    protected $class;
    protected $repository;

    /**
     * Constructor.
     *
     * @param EntityManager  $em
     * @param string   $class
     */
    public function __construct(EntityManager $em, $class) {

        $this->em = $em;
        $this->repository = $this->em->getRepository($class);
        $metadata = $this->em->getClassMetadata($class);
        $this->class = $metadata->name;

    }

    /**
     * Create model object
     *
     * @return BaseModel
     */
    public function create() {
        $class = $this->getClass();
        return new $class;
    }
    /**
     * Persist the model
     *
     * @param $model
     * @param boolean $flush
     * @return BaseModel
     */
    public function save($model, $flush= true) {

        // $this->getDispatcher()->dispatch('model_before_save', new ModelEvent($model, $this->getContainer()));
        // $this->getDispatcher()->dispatch($model->getEventPrefix() . '_before_save', new ModelEvent($model, $this->getContainer()));

        $this->_save($model, $flush);

        // $this->getDispatcher()->dispatch('model_after_save', new ModelEvent($model, $this->getContainer()));
        // $this->getDispatcher()->dispatch($model->getEventPrefix() . '_after_save', new ModelEvent($model, $this->getContainer()));

        return $model;
    }
    /**
     *    This is basic save function. Child model can overwrite this.
     */
    protected function _save($model, $flush=true) {
        $this->em->persist($model);
        if ($flush) {
            $this->em->flush();
        }
    }
    /**
     * Delete a model.
     *
     * @param BaseModel $model
     */
    public function delete($model, $flush = true) {
        // $this->getDispatcher()->dispatch('model_before_delete', new ModelEvent($model, $this->getContainer()));
        // $this->getDispatcher()->dispatch($model->getEventPrefix() . '_before_delete', new ModelEvent($model, $this->getContainer()));
        $this->_delete($model, $flush);
        // $this->getDispatcher()->dispatch('model_after_delete', new ModelEvent($model, $this->getContainer()));
        // $this->getDispatcher()->dispatch($model->getEventPrefix() . '_after_delete', new ModelEvent($model, $this->getContainer()));
    }
    /**
     * Remove model.
     */
    public function _delete($model, $flush = true) {
        $this->em->remove($model);
        if ($flush) {
            $this->em->flush();
        }
    }

    /**
     * Returns the user's fully qualified class name.
     *
     * @return string
     */
    public function getClass() {
        return $this->class;
    }
    /**
     * @param $id
     * @return BaseModel
     */
    public function findOneBy($array = array()) {
        return $this->repository->findOneBy($array);
    }


}



?>
