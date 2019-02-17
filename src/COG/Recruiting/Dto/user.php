<?php

class Hotel
{
    public function addCustomer(string $name, string $lastName)
    {
        $customerDetails = json_encode(['name' => $name, 'last name' => $lastName]);
        $storage->customer($customerDetails);
    }

    public function getCustomer(string $name)
    {
        $customer = $storage->getCustomerByName($name);
        return json_decode($customer, true);
    }
}

?>