<h1>Testing the API in create.php file</h1>

<form method="POST" action="create.php">
    User ID: <input type="text" name='userID' required><br>
    Game: <input type="text" name='game' required><br>
    Score: <input type="text" name='score' required><br>
    Date: <input type="text" name='timeplayed' required><br>
    User Name: <input type="text" name='username' required><br>

    <input type="submit" value='Unit Test'><br>
</form>

<!-- 
    Takes the inputs of the form above,
    passes it into sendScores to show example of using JS function
-->
<h1>Test that JS sends to API</h1>
<script src="scoreSend.js"></script>
<button onclick="sendScores(
    document.querySelector('input[name=\'userID\']').value,
    document.querySelector('input[name=\'game\']').value,
    document.querySelector('input[name=\'score\']').value,
    document.querySelector('input[name=\'timeplayed\']').value,
    document.querySelector('input[name=\'username\']').value
);">Test the JS</button>
