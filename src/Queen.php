<?php
    class Piece
    {
        public $xCoord;
        public $yCoord;

        function __construct($xCoord,$yCoord) {
            $this->xCoord = $xCoord;
            $this->yCoord = $yCoord;
        }

        function slope($targetXCoord, $targetYCoord) {
            $xSlope = $this->xCoord - $targetXCoord;
            $ySlope = $this->yCoord - $targetYCoord;
            $slope = abs($xSlope/$ySlope);
            return $slope;
        }
    }


    class Queen extends Piece
    {
        function canAttack($targetXCoord, $targetYCoord) {
            if ($this->xCoord == $targetXCoord) {
                return true;
            } elseif ($this->yCoord == $targetYCoord) {
                return true;
            } elseif ($this->slope($targetXCoord, $targetYCoord) == 1) {
                return true;
            }
        }
    }


    class Knight extends Piece
    {
        function canAttack($targetXCoord, $targetYCoord) {
            if (abs($this->xCoord - $targetXCoord) == 2 || abs($this->yCoord - $targetYCoord) == 2) {
                if (abs($this->xCoord - $targetXCoord) == 1 || abs($this->yCoord - $targetYCoord) == 1) {
                    return true;
                }
            }
        }
    }

?>
