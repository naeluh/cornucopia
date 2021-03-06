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

          <div class="twelve columns"><p>&nbsp;</p></div>
          <div class="twelve columns"><p>&nbsp;</p></div>
          <div class="twelve columns"><p>&nbsp;</p></div>
          <div class="twelve columns"><p>&nbsp;</p></div>

          <div class="twelve columns">
            <label for="folderInput">Folder Name</label>
            <input class="u-full-width" type="text" placeholder="images" id="folderInput" name="folderInput" required="true">
            <input class="u-full-width" type="hidden" id="kill" name="kill" value="">
          </div>
        </div>
        <input id="start" class="button-primary" type="submit" value="Start">
        <input id="stop" class="button-primary" type="submit" value="Stop">
        </form>
      <!--
      <form name="dataend" id="dataend" method="post">
          <input class="u-full-width" type="hidden" id="kill" name="kill" value="kill">
          <input id="stop" class="button-primary" type="submit" value="Stop">
      </form>
      -->
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
var start = null;

$("#start").on("click", function(event) {
  event.preventDefault();
  if ($("#folderInput").val() !== "") {
    data = $("#data").serialize();
    console.log(data);
    $.ajax({
      type:"POST", 
      url:"post.php", 
      data:data, 
      success:function(data) {
        console.log(data);
        //start = setInterval(function() { reload(); console.log('load') }, 10E3);
      }, error:function(data) {
        console.log(data);
      }
    });
  } else {
    alert("Please add a value");
  }
  return false;
});

$("#stop").on("click", function(event) {
    event.preventDefault();
    clearInterval(start);
    $("#folderInput").val('');
    $("#kill").val('kill');
    data = $("#data").serialize();
    console.log(data);
    $.ajax({
      type:"POST", 
      url:"post.php", 
      data:data, 
      success:function(data) {
        console.log(data);
      }, error:function(data) {
        console.log(data);
      }
    });
  return false;
});

var reload = function(){
    $.ajax({
      type:"POST", 
      url:"image.php", 
      data:data, 
      success:function(data) {
        console.log(data);
      }, error:function(data) {
        console.log(data);
      }
    });
};
</script>
</body>
</html>
