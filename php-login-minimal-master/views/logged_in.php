<!-- if you need nutzer information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['nutzer_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)

<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Logout</a>
