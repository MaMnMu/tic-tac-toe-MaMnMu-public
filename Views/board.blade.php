{{-- Used to create the board component. Uses the data attribute --}}
<table class="grid">
    @for ($i = 0; $i< BOARD_SIZE; $i++) 
    <tr>
        @for ($j = 0; $j < BOARD_SIZE; $j++) 
        <td data-x="{{ $i }}" data-y="{{ $j }}" data-imgplayerpath="{{PATH_PLAYER_PIC}}" data-imgcomputerpath="{{PATH_COMPUTER_PIC}}" id="{{ $i . $j }}"></td>
        @endfor
    </tr>
    @endfor
</table>

