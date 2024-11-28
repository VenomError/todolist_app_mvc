<?php

namespace Core;
interface DB
{

    public function create(array $data);
    public function update(array $data);
    public function delete(array $data);
}