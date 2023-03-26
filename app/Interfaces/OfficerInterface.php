<?php

namespace App\Interfaces;

interface OfficerInterface {
    public function get();
    public function store($data);
    public function find($id);
    public function destroy($id);
    public function activate($id);
    public function update($data, $id);
}
