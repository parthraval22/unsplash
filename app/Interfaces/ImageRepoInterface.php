<?php

namespace App\Interfaces;

interface ImageRepoInterface 
{
    public function search($query, $page, $perPage);
    public function download($downloadURL);
    public function downloads();
}