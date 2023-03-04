<?php
namespace Project\Controllers;

class DataEnterController
{
    public function saveData(string $location, array $data):void
    {
        $serializedData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($location, $serializedData);
    }
}