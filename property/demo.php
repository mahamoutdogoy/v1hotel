<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal confirmation</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Delete all items": function() {
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  } );
  </script>
</head>
<body>
 
<div id="dialog-confirm" title="Empty the recycle bin?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
 
<p>Sed vel diam id libero <a href="http://example.com">rutrum convallis</a>. Donec aliquet leo vel magna. Phasellus rhoncus faucibus ante. Etiam bibendum, enim faucibus aliquet rhoncus, arcu felis ultricies neque, sit amet auctor elit eros a lectus.</p>
 
 
</body>
</html>


.bordered td.free1{
  color:#555;
  background:rgba(255,234,234); /*#FCC*/
  background: -moz-linear-gradient(top,  rgba(255,234,234,1) 0%, rgba(255,193,193,1) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,234,234,1)), color-stop(100%,rgba(255,193,193,1)));
  background: -webkit-linear-gradient(top,  rgba(255,234,234,1) 0%,rgba(255,193,193,1) 100%);
  background: -o-linear-gradient(top,  rgba(255,234,234,1) 0%,rgba(255,193,193,1) 100%);
  background: -ms-linear-gradient(top,  rgba(255,234,234,1) 0%,rgba(255,193,193,1) 100%);
  background: linear-gradient(to bottom,  rgba(255,234,234,1) 0%,rgba(255,193,193,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffeaea', endColorstr='#ffc1c1',GradientType=0 );
}