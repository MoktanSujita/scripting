<?php

session_start();
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=($_POST['name']);
    $address=($_POST['address']);
    $dob=($_POST['dob']);
    $gender=($_POST['gender']);
    $skills[]=($_POST['skills[]']);

    try
    {
        $stmt=$conn->prepare("INSERT INTO students(name,address,dob,gender,skills) VALUES (:name,:address,:dob,:gender,:skills)");
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':dob',$dob);
        $stmt->bindParam(':gender',$gender);
        $stmt->bindParam(':skills',$skills[]);
        $stmt->execute();

    }
    catch(PDOException $e)
    {
        $error_message="Error:" .$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST" action="">
            <table border="0" cellpadding="10" cellspacing="0">
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" name="name" id="name" placeholder="Enter your name" /></td>
                </tr>
                <tr> 
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" name="address" placeholder="Enter your address" /></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of birth:</label></td>
                    <td><input type="date" name="dob" placeholder="Enter your DOB" /></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td>
                        <label> Male
                            <input type="radio" name="gender" value="male" />
                        </label>
                        <label> Female
                            <input type="radio" name="gender" value="female" />
                        </label>
                        <label> Others
                            <input type="radio" name="gender" value="others" />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="skills">Select your skills:</label></td>
                    <td>
                        <input type="checkbox" name="skills[]" value="html" />
                        <label for="html">HTML</label><br>
                        <input type="checkbox" name="skills[]" value="css" />
                        <label for="css">CSS</label><br>
                        <input type="checkbox" name="skills[]" value="javascript" />
                        <label for="javascript">JavaScript</label><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <button type="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>

