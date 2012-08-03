<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>JS Bin - About</title>
<link rel="stylesheet" href="/sandbox.css" type="text/css" media="screen" charset="utf-8" />
</head>
<?php
if (@$_COOKIE['light']) {
  echo "<body id=\"\aboutpage\" class=\"light\">\n";
} else {
  echo "<body id=\"\aboutpage\">\n";
}
?>

<div id="header">
    <ul>
        <li class="right"><a id="back" href="/">Back to code editing</a></li>
    </ul>
</div>
<ul id="navigation">
    <li><a class="tab selected" href="#about">About</a></li>
    <li><a class="tab" href="#video">Video Introduction</a></li>
    <li><a class="tab" href="#ajax">Ajax Debugging</a></li>
    <li><a class="tab" href="#faq">FAQ</a></li>
</ul>
<div id="wrapper">
    <div id="body">
        <div id="about" class="panel">
            <h1>About</h1>
            <p><a href="/">JS Bin</a> is a webapp specifically designed to help JavaScript and CSS folk test snippets of code, within some context, and debug the code collaboratively.</p>
            <p>JS Bin allows you to edit and test JavaScript and HTML (reloading the URL also maintains the state of your code - new tabs doesn't). Once you're happy you can save, and send the URL to a peer for review or help. They can then make further changes saving anew if required.</p>
            <p>The original idea spawned from a conversation with another developer in trying to help him debug an Ajax issue. The original aim was to build it using Google's app engine, but in the end, it was <a href="http://ejohn.org">John Resig</a>'s <a href="http://ejohn.org/apps/learn">Learning app</a> that inspired me to build the whole solution in JavaScript with liberal dashes of jQuery and a tiny bit of LAMP for the saving process.</p>
            <p>It took me the best part of 4 hours to develop - so if it's shaky around the edges, let me know!</p>
            <p><em>This webapp was built by <a href="http://remysharp.com">Remy Sharp</a> (<a href="http://twitter.com/rem">@rem</a>) of <a href="http://leftlogic.com">Left Logic</a>. <a href="http://leftlogic.com/contact?message=Found%20through%20jsbin.com">Please get in touch</a> if you're interested in working with me.</em></p>
        </div>
        <div id="video" class="panel">
            <h1>Video Introduction</h1>
            <div class="videoBlock">
                <div id="introVideo"></div>
            </div>
        </div>
        <div id="ajax" class="panel">
            <h1>Ajax Debugging</h1>
            <div class="videoBlock">
                <div id="ajaxVideo"></div>
            </div>
        </div>
        <div id="faq" class="panel">
            <h1>FAQ</h1>
            
            <h2>I didn't insert the JavaScript and it still runs</h2>
            <p>When you tab to the <em>output</em> panel, JS Bin <em>automatically</em> inserts your JavaScript on the fly, so you don't need to worry about it.</p>
            
            <h2>I need my JavaScript inserted in a specific position</h2>
            <p>The <em>special %code%</em> symbol will be replaced with your JavaScript. If it's not included, it will be included just before the body closes. Otherwise you can add <em>&lt;script&gt;%code%&lt;/script&gt;</em> anywhere you like.</p>
            
            <h2>How do I re-run the code</h2>
            <p>Just <em>click the 'Output'</em> tab, and the entire frame will re-execute.</p>
            
            <h2>Can I see the output outside of this window?</h2>
            <p>Yes. First you must save the code, then <em>use the 'Live' link</em>. This is now stored privately and can be shared amongst your peers.</p>
            
            <h2>When I click the live link it doesn't reflect my changes</h2>
            <p>The live link <em>only shows the saved</em> code, any changes must be saved first.</p>
<?php /*
            <h2>How long does saved code last?</h2>
            <p>Code that hasn't be viewed in <em>3 months</em> is automatically deleted.</p>
*/ ?>

            <h2>Can JS Bin respond to Ajax requests?</h2>
            <p>Yes. See the <a class="tab" href="#video">video introduction</a> for a demo. Or, it's as simple as removing the HTML output, saving the code, then requesting the URL via a new snippet.  JS Bin will respond to Ajax requests appropriately.</p>
            
            <h2>Is there a bookmarklet?</h2>
            <p>Funny you ask! Yes, just drag the following <a href="javascript:(function(){window.location='http://jsbin.com/?js='+encodeURIComponent((window.getSelection?window.getSelection():document.selection.createRange().text)+'')})()">jsbin</a> bookmarklet to your bookmark bar. The bookmarklet will inject any selected JavaScript in to JS Bin.</p>
            
            <h2>IE6?</h2>
            <p>Sorry: <em>no</em>.</p>
            
            <h2>My question isn't answered</h2>
            <p>Feel free to <a href="http://leftlogic.com/contact?message=Question%20regarding%20JS Bin:%20">get in touch</a> and if appropriate I'll add it to the FAQ.</p>
            
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/swfobject.js"></script>
<script type="text/javascript" charset="utf-8">
$(function () {
    var so = new SWFObject('/player.swf','mpl','1038','666','9');
    so.addParam('allowfullscreen','true');
    so.addParam('flashvars','autoplay=false&file=http://jqueryfordesigners.com/media/ajax.flv&image=/ajax.jpg');
    so.write('ajaxVideo');

    so = new SWFObject('/player.swf','mpl','1038','666','9');
    so.addParam('allowfullscreen','true');
    so. addParam('flashvars','autoplay=false&file=http://jqueryfordesigners.com/media/jsbin.flv&image=/jsbin.jpg');
    so.write('introVideo');

    
    $('#back').click(function () {
        window.history.back();
        return false;
    });
   
    var $tabLinks = $('#navigation a');
    $('a.tab').click(function () {
        $tabLinks.removeClass('selected');
        $tabLinks.filter('[hash=' + this.hash + ']').addClass('selected');
        var a = $('#body .panel').hide().filter(this.hash).show();
        return false;
    });
    $tabLinks.filter(window.location.hash ? '[hash=' + window.location.hash + ']' : ':first').click();
});
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1656750-13");
pageTracker._trackPageview();
</script>
</body>
</html>
