<?php

require 'trip.php';

$trip = new Trip();

$tripDatas = [3, 10.00, 20.00, 30.00, 4, 15.00, 15.01, 3.00, 3.01, 0];

$trip->calculateTrips($tripDatas);