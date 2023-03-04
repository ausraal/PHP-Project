<?php
namespace Project\Controllers;

use Project\Frameworks\DIContainer;
use Project\Repositories\ReservationRepository;
use ReflectionException;

class ReservationController {
    public function __construct(public DIContainer $container)
    {
    }
    public function set (): void {
        require __DIR__ . "/../../Views/form.php";
    }

    /**
     * @throws ReflectionException
     */
    public function listed() {
        $validator = $this->container->get(Validator::class);
        $data = $this->container->get(ReservationRepository::class);

        try {
            $validator->validate();
            $message = 'Registracija sėkminga';
            $dataList = $data->get();

        }catch (\Exception $e){
            $message = $e->getMessage();
        }
        require __DIR__ . '/../../Views/reservationList.php';


            }
}
//    public function details (string $registrationId) {
//
//    }