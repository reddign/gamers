function loadGame(select) {
            const selectedGame = select.value;
            if (selectedGame) {
                window.location.href = "games.php?whichGame=" + selectedGame;
            }
}