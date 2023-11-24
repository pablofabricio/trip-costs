<?php

class Trip
{
    private int $nStudents;
    private array $individualCosts = [];
    private float $equalizePay = 0.0;
    private float $totalCosts = 0.0;
    
    public function calculateTrips(array $inputs)
    {
        foreach ($inputs as $input) {
            if ($input == 0) {
                $this->showIndividualCost(); 
                continue;
            }
            
            if (is_int($input) && $this->totalCosts == 0.0) {
                $this->nStudents = $input; 
                continue;
            }
            
            if (is_int($input) && $this->totalCosts > 0) {
                $this->showIndividualCost();
                $this->nStudents = $input; 
                continue;
            }   
        
            $this->individualCosts[] = number_format($input, 2, '.', ''); 
            $this->totalCosts += $input;
        }
    }
    
    private function showIndividualCost()
    {
        $minToPay = (int) $this->totalCosts / $this->nStudents;
        
        foreach($this->individualCosts as $individualCost) {
            if ($individualCost < $minToPay) {
                $this->equalizePay += $minToPay - $individualCost;
            }    
        }
        
        echo "$". $this->equalizePay . " ";
        
        $this->equalizePay = 0.0;
        $this->totalCosts = 0.0;
        $this->individualCosts = [];
    }
}