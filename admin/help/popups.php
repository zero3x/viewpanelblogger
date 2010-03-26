<html>
<script>
function basicsettings_help()
{
  var generator=window.open('','Basic Settings','height=400,width=500');
  
  generator.document.write('<html><head><title>Basic Settings</title>');
  generator.document.write('</head><body>');
  generator.document.write('<p>Basic settings are the settings that must be filled out. Without them the thing you are trying to do             just will not work!</p>');
  generator.document.write('</body></html>');
  generator.document.close();
}

function advancedsettings_help()
{
  var generator=window.open('','Advanced Settings','height=400,width=500');
  
  generator.document.write('<html><head><title>Advanced Settings</title>');
  generator.document.write('</head><body>');
  generator.document.write('<p>Advanced settings do not need to be filled out and your script will work just fine without them. It is            not advised you touch them unless you know basic PHP and HTML.</p>');
  generator.document.write('</body></html>');
  generator.document.close();
}

function borderwidth_help()
{
  var generator=window.open('','The Border Width','height=400,width=500');
  
  generator.document.write('<html><head><title>The Border Width</title>');
  generator.document.write('</head><body>');
  generator.document.write('<p>The Border Width is the width (in pixels) of your table border. 0 means the border will be invisible.             </p>');
  generator.document.write('</body></html>');
  generator.document.close();
}

function mysqltable_help()
{
  var generator=window.open('','Choosing A MySQL Table','height=400,width=500');
  
  generator.document.write('<html><head><title>Choosing A MySQL Table</title>');
  generator.document.write('</head><body>');
  generator.document.write('<p>The MySQL table stores all your posts - so select the table with the correct posts in.</p>');
  generator.document.write('</body></html>');
  generator.document.close();
}

</script>
</html>