<h1>Testing the API in create.php file</h1>

<form method="Post" action="create.php">
    User ID:<input type="text" name='userID'><BR>
    Game:<input type="text" name='game'><BR>
    Date:<input type="text" name='timeplayed'><BR>
    Score:<input type="text" name='score'><BR>
    User Name:<input type="text" name='username'><BR>

    <input type="submit" value='Unit Test'><BR>
</form>

<h1>Test that JS sends to API</h1>
<script src="scoreSend.js"></script>
<script src="unittest.js"></script>
<button onclick="runButtonTest();">Test the JS</button>