// Runs when any cell in the board is clicked

function checkPosition(e) {
    if ((e.target.nodeName === 'TD') && (e.target.childElementCount === 0)) { // Checks if the cell is empty
        var box = e.target; // Extracts the table cell DOM object from the event
        $(box).html(`<img src=${box.dataset.imgplayerpath}>`); // Adds the player token to the selected cell
        $.ajax({// Sends the Ajax Request
            type: 'POST', // Type POST
            url: 'index.php', // to index.php script
            dataType: "json", // Data coded sent in JSON
            data: {// Coordinates sent to the server
                x: box.dataset.x,
                y: box.dataset.y
            },
            success: function (result) { // When the server response arrives correctly
                console.log(result);
                if (result.x !== undefined) { // If the response info has an x property
                    $(`#${result.x}${result.y}`).html(`<img src=${box.dataset.imgcomputerpath}>`); // Adds the computer token to the selected cell
                }
                    if (result.gameRes !== undefined) { // If the response info has a gameRes property
                    switch (result.gameRes) {
                        case 0: // If the value is 0 show Draw
                            $("#message").text("Draw!!");
                            break;
                        case 1: // If the value is 1 show You Win!!
                            $("#message").text("You Win!!");
                            break;
                        case - 1: // If the value is 1 show You lost!!
                            $("#message").text("You lost!!");
                            break;
                    }
                    $('table').unbind('click'); // Removes the event handler on the table
                }
            },
            error: function (xhr, status, error) { // If the ajax communication failed
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage); // Show an alert
            }
        });
    }
}
;

// Establish a handler to run when the DOM is loaded. 

$(document).ready(function () {
    $('table').click(checkPosition); // Establish a handler to run on all elements components of table
});

