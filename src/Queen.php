<?php
    Class Queen
    {
        private $xCoord;
        private $yCoord;

        function __construct($xCoord,$yCoord) {
            $this->xCoord = $xCoord;
            $this->yCoord = $yCoord;
        }

        function canAttack($targetXCoord, $targetYCoord) {
            if ($this->xCoord == $targetXCoord) {
                return true;
            } elseif ($this->yCoord == $targetYCoord) {
                return true;
            } elseif ($this->slope($targetXCoord, $targetYCoord) == 1) {
                return true;
            }
        }

        function slope($targetXCoord, $targetYCoord) {
            $xSlope = $this->xCoord - $targetXCoord;
            $ySlope = $this->yCoord - $targetYCoord;
            $slope = abs($xSlope/$ySlope);
            return $slope;
        }





    }

?>
