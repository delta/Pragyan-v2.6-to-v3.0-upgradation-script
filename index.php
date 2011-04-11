<html>
<head>
<title>Upgrade to Pragyan CMS v3.0</title>
<script src="jquery.js"></script>
<script>
var totalwidth=300, stepscomplete=0, totalsteps=7;
$(document).ready(function() {
  x = setInterval(showprogress,300);
  function showprogress() {
    
    if(stepscomplete==totalsteps-1) clearInterval(x);
    $.ajax({
      url:"upgrade.php",
      type:"GET",
      success : function(data) {
       $("#progressdetail").html($("#progressdetail").html()+"<br>"+data);
       stepscomplete++;
      },
      async:false,
    });
    $("#progress").css({"width":totalwidth*stepscomplete/totalsteps+"px"});

  }
});
</script>
<style>
#box {padding:10px; border:5px solid #7878e6; position:absolute; width:350px; top:100px; left:300px; background-color:#fff; font-size:small; }
#head {background-color:#3838a6; color:#fff; margin:-10px; margin-bottom:5px; padding:10px; font-weight:bold; }
#close {float:right; font-size:x-small; padding:2px;}
#progressbar {border:1px solid #000; height:30px; width:300px; margin:25px; }
#progress {float:left; height:30px; width:20px; background-color:#3838a6;}
#progressdetail {border:1px solid #000; width:300px; padding:5px; margin:15px; }
</style>
</head>
<body>
<h2>Upgrade to Pragyan CMS v3.0</h2>
<p>You are about to upgrade to the new latest version of Pragyan CMSv3</p>
<p>Click on the button below to upgrade your site to the new pragyan cms v3.0. note that your site will be temporarily be down for some time while the upgradation is in progress. It is recommended that you backup all your uploads and template files before the upgradation, just in case something goes wrong.</p>
<input type="submit" value="Upgrade!">

<div id="box"><div id="head"><div id="close">X</div>Upgrade in progress</div>
Site upgradation in progress. Please do not close the window until the upgradation process completes.
<div id="progressbar">
<div id="progress"></div>
</div>
<div id="progressdetail">
Begining upgradation....
</div>
</div>
</body>
</html>
