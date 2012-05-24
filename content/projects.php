<?php
switch ($_GET['page']) {
  case 'keptosh':
    $project_title = 'Keptosh: The Search for junc';
    $project_description = '
    
    <img style="float: left; border: 1px solid #000; margin: 5px;" src="../images/keptosh.png" alt="Screenshot from the Keptosh adventure game." width="250" />
    <p>On January 29th, 2003 Keptosh was released. Created using Adventure Game Studio, the game received praise from members of the AGS community. It was nominated for Best Game and Best Sound/Music in the <a href="http://www.adventuregamers.com/display.php?id=339" title="View the list of nominees for the 2003 AG: Underground Awards.">2003 AG: Underground Awards</a>. The game was favorably <a href="http://www.adventuregamers.com/article/id,279" title="Read the review.">reviewed</a> by Dave Gilbert.</p>

    <p>Keptosh featured the Character Control System Plug-in by Scorpiorus which allowed non-player characters to move about the environment in what appeared to be their daily activities. Combined with the soundtrack and setting this made a rather simple game very immersive for some.</p>

    <p>Keptosh has been downloaded from the Adventure Game Studio website over 4800 times.</p>

    <blockquote style="background-color: #ccc; border: 1px solid #333; padding: 10px;">
    <p>It is the year 2084.</p>

    <p>You live in ServaCor city. The city is ruled by the massive corporation called ServaCor. Humans have come to rely on electricity and data to sustain their lives. The slang term of "junc and flow" has been given to these two vices. ServaCor supplies junc to the entire city, while flow is gathered from a Lunar based computer network.</p>

    <p>Most citizens of ServaCor and the millions of other cities just like it hate their rulers. The corporations provide the citizens with free food, beer, shelter, junc, and flow in exchange for what is almost slave labor in huge robot factories. Most people are not happy with their situation, they see these "free" provisions as thinly masked ways to keep the citizens in line.</p>

    <p>Welcome to the future.</p>

    <p>You are Adis Keptosh.</p>
    </blockquote>
    <h3>Downloads</h3>
    <ul>
    	<li><a href="../downloads/keptosh.zip" title="Download the Keptosh game.">Download the Game</a> (Free! Windows Only)</li>
    	<li><a href="../downloads/keptosh_source.zip" title="Download the Keptosh AGS Source Code.">Keptosh AGS Source Code</a></li>
    	<li><a href="../downloads/keptosh-devdoc-1.pdf" title="Download the Development Document: Assets and Summary.">Development Document: Assets and Summary</a></li>
    	<li><a href="../downloads/keptosh-devdoc-2.pdf" title="Download the Development Document: Schedule.">Development Document: Schedule</a></li>
    </ul>
    ';
  break;
  default:
    $project_title = 'PROJECTINDEX';
}
?>

<section id="projects">
  
  <h2 class="page-title">Projects</h2>
  <article>
  <?php if ($project_title == 'PROJECTINDEX') { ?>
  <p>Our current projects are listed below.</p>
  <ul>
  	<li><a href="/projects/keptosh" title="View the Keptosh project.">Keptosh: The Search for junc</a></li>
  </ul>
  <?php } else { ?>
  <h3><?php print $project_title; ?></h3>
  <?php print $project_description; ?>
  <hr />
  <a href="/projects" title="Return to the listing of projects.">Back to project listing</a>
  <?php } ?>
  </article>
  
</section>