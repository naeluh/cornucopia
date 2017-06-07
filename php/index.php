<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Array of Creativity</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
<form name="data" id="data" method="post">
  <div class="row">
    <!--<div class="twelve columns">
      <label for="exampleEmailInput">Your email</label>
      <input class="u-full-width" type="email" placeholder="test@mailbox.com" id="exampleEmailInput">
    </div> -->
    <div class="twelve columns">
      <label for="folderInput">Folder Name</label>
      <input class="u-full-width" type="text" placeholder="images" id="folderInput" name="folderInput" required="true">
    </div>
  </div>
  <input id="s" class="button-primary" type="submit" value="Start">
</form>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$('#s').on('click', function(event) {
  event.preventDefault();
    data = $('#data').serialize();
    console.log(data);
    $.ajax({
        type: "POST",
        url: "post.php",
        data: data,
        success: function(data) {
            console.log(data);
        },
        error: function(data){
      console.log(data);
        }
    });
    return false;
});
</script>
</body>
</html>
