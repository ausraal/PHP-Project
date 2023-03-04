<?php
namespace Project\Models;

class ErrorMessage {
    public function wrongPhone(): string
    {

        return 'Įveskite veikiantį telefono numerį iš 11 skaičių (370XXXXXXXX)';
        }
    public function missingVisitTime(): string
    {
        return 'Nepasirinkote vizito laiko';
    }
    public function searchError(): string
    {
        return 'Jūsų rezervacija nerasta';
    }
 }