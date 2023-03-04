<?php
namespace Project\Models;

class ReserveModel {
    public function __construct(
        private string $ownerName,
        private string $dogName,
        private string $dogBreed,
        private string $visitDate,
        private string $visitTime,
        private string $phoneNumber,
        private string $id)
    {
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function getDogName(): string
    {
        return $this->dogName;
    }

    public function getDogBreed(): string
    {
        return $this->dogBreed;
    }

    public function getVisitDate(): string
    {
        return $this->visitDate;
    }

    public function getVisitTime(): string
    {
        return $this->visitTime;
    }

      public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}