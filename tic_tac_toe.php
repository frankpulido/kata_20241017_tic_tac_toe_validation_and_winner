<?php
declare(strict_types=1);

class TicTacToe {
    // Atributos
    protected array $input;
    private int $witness;

    public function __construct($input, $witness = 0)
    {
        $this->input = $input;
        $this->witness = $witness;
    }

    public function validateTurnCount() : bool {
        $passed = false;
        $count_turns = array_count_values(array_merge($this->input[0],$this->input[1],$this->input[2]));
        $turnsX = array_key_exists("X", $count_turns)? $count_turns["X"] : 0;
        $turnsO = array_key_exists("O", $count_turns)? $count_turns["O"] : 0;
        if(abs($turnsX - $turnsO) < 2){$passed = true;}
        return $passed;
    }

    public function checkRows() : string {
        $reply = "The winner is : ";
        $end = false;
        $i = 0;
        do {
            if(($this->input[$i][0] == $this->input[$i][1] && $this->input[$i][1] == $this->input[$i][2]) && ($this->input[$i][2] != "-")){
                $reply = $reply . $this->input[$i][0];
                $end = true;
                $this->witness++;
            }
            $i++;
        } while ($i <= 2);
        return $reply;
    }

    public function checkColumns() : string {
        $reply = "The winner is : ";
        $end = false;
        $i = 0;
        do {
            if(($this->input[0][$i] == $this->input[1][$i] && $this->input[1][$i] == $this->input[2][$i]) && ($this->input[2][$i] != "-")){
                $reply = $reply . $this->input[0][$i];
                $end = true;
                $this->witness++;
            }
            $i++;
        } while ($i <= 2);
        return $reply;
    }

    public function checkDiagonals() : string {
        $reply = "The winner is : ";
        if(($this->input[0][0] == $this->input[1][1] && $this->input[1][1] == $this->input[2][2]) && ($this->input[2][2] != "-")){
            $reply = $reply . $this->input[1][1];
            $this->witness++;
        }
        if(($this->input[0][2] == $this->input[1][1] && $this->input[1][1] == $this->input[2][0]) && ($this->input[2][0] != "-")){
            $reply = $reply . $this->input[1][1];
            $this->witness++;
        }
        return $reply;
    }

    public function checkWinner() : string {
        $reply = "";
        if($this->validateTurnCount()){
            $compare = "The winner is : ";
            $reply1 = $this->checkRows();
            $reply2 = $this->checkColumns();
            $reply3 = $this->checkDiagonals();
            if($this->witness > 1){$reply = "Invalid game!!!. We found $this->witness lines (with 3 matching symbols) in total.";}
            elseif(($reply1 == $reply2) && ($reply2 == $reply3) && ($reply1 == $compare)){$reply = "No winner, truce!!";}
            elseif(!($reply1 == $compare)){$reply = $reply1;}
            elseif(!($reply2 == $compare)){$reply = $reply2;}
            else{$reply = $reply3;}
        }
        else{$reply = "Game doesn't pass plays turn count";}
        return $reply;    
    }
}
?>