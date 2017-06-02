<script>
    if (window.XMLHttpRequest) {
        // code for modern browsers
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for old IE browsers
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    function precheck(){
        var account=document.getElementById('account').Value;
        xmlhttp.onreadystatechange =callback;
        xmlhttp.open("GET", "php52.php?a="+account, true);
        xmlhttp.send();
    }
    function callback(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("test").innerHTML =
                this.responseText;
        }
    }
</script>
<form action="addAccount.php">
    <table>
        <tr>
            <th>Account</th>
            <td><input id="account" type="text" name="account" onblur="precheck()"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="passwd"></td>
        </tr>
        <tr>
            <th>Real Name</th>
            <td><input type="text" name="realname"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="submit"></td>
        </tr>
    </table>
</form>
<div id="test"></div>
