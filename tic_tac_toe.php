<?php
// kata tic-tac-toe
class TicTacToe {
    // Atributos
    protected array $input = [];
    private int $witness;

    public function __construct($input, $witness = 0)
    {
        $this->input = $input;
        $this->witness = $witness;
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
        } while ($i <= 2 || $end = false);
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
        } while ($i <= 2 || $end = false);
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
        $compare = "The winner is : ";
        $reply1 = $this->checkRows();
        $reply2 = $this->checkColumns();
        $reply3 = $this->checkDiagonals();
        if($this->witness > 1){$reply = "Invalid game!!!";}
        elseif(($reply1 == $reply2) && ($reply2 == $reply3) && ($reply1 == $compare)){$reply = "No winner, truce!!";}
        elseif(!($reply1 == $compare)){$reply = $reply1;}
        elseif(!($reply2 == $compare)){$reply = $reply2;}
        else{$reply = $reply3;}
        return $reply;
    }
}
?>