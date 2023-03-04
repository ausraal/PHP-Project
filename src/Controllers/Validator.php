<?php
namespace Project\Controllers;

use Project\Models\ErrorMessage;
use Project\Models\ReserveModel;
use Project\Frameworks\DIContainer;

class Validator {
    public function __construct(public DIContainer $container)
    {
    }
    public function validate(): array {
        $e = $this->container->get(ErrorMessage::class);
        $encoding = $this->container->get(DataEnterController::class);
        $decoding = $this->container->get(DataGetController::class);
        $ownerName = htmlspecialchars($_POST['ownerName']);
        $dogName = $_POST['dogName'];
        $dogBreed = $_POST['dogBreed'];
        $id = $_POST['id'];
        $visitDate = $_POST['visitDate'];
        $visitTime = $_POST['visitTime'];
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $filteredNumber = str_replace("-", "", filter_var($phoneNumber,  FILTER_SANITIZE_NUMBER_INT));
        $location = 'src/storage/reservations.json';
        if($visitTime==='empty') {
            throw new \Exception($e->missingVisitTime());
        }elseif (strlen($filteredNumber)!=11){
            throw new \Exception($e->wrongPhone());
        }else {
                $res = new ReserveModel($ownerName, $dogName, $dogBreed, $visitDate, $visitTime, $filteredNumber, $id);
                $allData = [
                    'ownerName'=>$res->getOwnerName(),
                    'dogName'=>$res->getDogName(),
                    'dogBreed'=>$res->getDogBreed(),
                    'visitDate'=>$res->getVisitDate(),
                    'visitTime'=>$res->getVisitTime(),
                    'phoneNumber'=>$res->getPhoneNumber(),
                    'id'=>$res->getId(),
                ];

            $data = $decoding->getData($location);
            $data[] = $allData;
            $encoding->saveData($location, $data);
        }
                 return $allData;
        }

}
