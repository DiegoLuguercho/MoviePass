<?php
  namespace Interfaces;
  /**
   *
   */
  interface Crud
  {
    public function create($objeto);
    public function read($id);
    public function update ($objeto,$parameter);
    public function delete($id);
    public function readAll();
  }


 ?>
