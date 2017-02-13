<?php
    require_once "src/Queen.php";

    class QueenTest extends PHPUnit_Framework_TestCase
    {

        function test_canAttack_vertical()
        {
            //Arrange
            $test_Queen = new Queen;
            $targetXCoord = 1;
            $targetYCoord = 3;

            //Act
            $result = $test_Queen->canAttack($targetXCoord, $targetYCoord);

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_canAttack_horizontal()
        {
            //Arrange
            $test_Queen = new Queen;
            $targetXCoord = 3;
            $targetYCoord = 1;

            //Act
            $result = $test_Queen->canAttack($targetXCoord, $targetYCoord);

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_canAttack_diagonal()
        {
            //Arrange
            $test_Queen = new Queen;
            $targetXCoord = 3;
            $targetYCoord = 3;

            //Act
            $result = $test_Queen->canAttack($targetXCoord, $targetYCoord);

            //Assert
            $this->assertEquals(true, $result);
        }
    }

?>
