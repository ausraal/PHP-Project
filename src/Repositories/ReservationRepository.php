<?php
namespace Project\Repositories;

use Project\Controllers\DataEnterController;
use Project\Controllers\DataGetController;
use Project\Frameworks\DIContainer;
use Project\Models\ErrorMessage;


class ReservationRepository implements ReserveRepositoryInterface{
    public function __construct(public DIContainer $container)
    {
    }
    public function get(): array {
        $allArrayData = $this->container->get(DataGetController::class);
        return $allArrayData->getData('src/storage/reservations.json');
    }
    public function find($id): ?array {
        $e = $this->container->get(ErrorMessage::class);
        $allArrayData = $this->container->get(DataGetController::class);
        $reservations = $allArrayData->getData('src/storage/reservations.json');
        $filteredReservations = array_filter($reservations, function ($value) use ($id){
            return $value['id']===$id;
        });
        if (empty($filteredReservations)) {
            throw new \Exception($e->searchError());
        } else {
            return reset($filteredReservations);
        }
    }
    public function save($reservation): array {
        $e = $this->container->get(ErrorMessage::class);
        $allArrayData = $this->container->get(DataGetController::class);
        $reservations = $allArrayData->getData('src/storage/reservations.json');
        foreach ($reservations as &$r) {
            if ($r['id'] === $reservation['id']) {
                $r = $reservation;
                $found = true;
                break;
            }
        }
        if($found){
            $encoding = $this->container->get(DataEnterController::class);
            $encoding->saveData('src/storage/reservations.json', $reservations);
             return $reservation;
        } else {
            throw new \Exception($e->searchError());
        }


    }

    public function remove($id){}



}