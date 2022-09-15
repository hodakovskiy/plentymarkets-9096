<?php
namespace App\Mapper;

use App\Entity\Availability;
use App\Model\AvailabilityModel;



class AvailabilityMapper 
{
    public function mapToEntity(AvailabilityModel $availabilityModel): Availability
    {
        $availability = new Availability();
        $availability->setName($availabilityModel->getName());
        return $availability;
    }
}