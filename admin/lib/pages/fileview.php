
<?php
if (isset($_POST['submit'])) { 
    $toscan = $_GET["dirtoread"]; 
    $output = scandir($toscan);
}
?>
<div id="apDiv1">
  <div>
    <h1>File Viewer</h1>
    <p>Coming soon.</p>
</div>
</div>
</body>
</html>