<?php
namespace Project\Controllers;
use Project\Frameworks\DIContainer;
use Project\Models\ErrorMessage;
use Project\Repositories\ReservationRepository;

//updating info in json and displaying new reservationList
class EditingController
{

    public function __construct(private DIContainer $container)
    {
    }

    public function set(): void
    {
        require __DIR__ . "/../../Views/editForm.php";
    }
    public function get()
    {
//
        $formId = $_POST['id'];
        $repository = $this->container->get(ReservationRepository::class);

        try {
            $uniqueReservation = $repository->find($formId);

        }catch (\Exception $e){
            $message = $e->getMessage();
        }
        require __DIR__ . '/../../Views/editForm.php';

        return $uniqueReservation;
         }


}

