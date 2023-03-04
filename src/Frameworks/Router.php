<?php
namespace Project\Frameworks;

use Project\Controllers\EditingController;
use Project\Controllers\ReservationController;
use Project\Controllers\SearchController;


class Router {
    public function __construct(protected DIContainer $container)
    {
    }

    /**
     * @throws \ReflectionException
     */
    public function process(string $path, string $method): void
    {
        $reservationController = $this->container->get(ReservationController::class);
        $editingController = $this->container->get(EditingController::class);
        $searchController = $this->container->get(SearchController::class);

        if ($path === '/form' && $method === 'GET') {
            $reservationController->set(); // back to initial form
        } elseif ($path === '/form' && $method === 'POST') {
            $reservationController->listed(); // calling reservationList
        } elseif ($path === '/editForm' && $method === 'POST') {
            $editingController->get(); //editing form data
        } elseif ($path === '/updatedForm' && $method === 'POST') {
            $searchController->update(); //updating info in json and displaying new data
    }
}
}