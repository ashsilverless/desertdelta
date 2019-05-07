<div class="candidate-card <?php echo strtolower($type); ?> <?php echo strtolower($sex); ?> mb2 slide-right">

    <p class="type mb0"><?php echo $type;?></p>
    <h2 class="name heading heading__md"><?php echo $title; ?></h5>  
    <p class="sex heading"><?php  echo $sex; ?></p>
    <div class="description"><?php echo $description; ?></div>
    <p class="skills"><span class="heading">Skills: </span><?php echo $skills;?></p>
   <p class="location"><span class="heading">Location/s: </span><?php echo $location;?></p>
    <p class="language"><span class="heading">Langauge/s Spoken: </span><?php echo $language;?></p>
    <p class="salary"><span class="heading">Salary: </span><?php echo $salary;?></p>
    <p class="transport"><span class="heading">Transport: </span>
        <?php if( get_field('transport', $id)):?>
        	    Yes
        <?php else:?>
            No
        <?php endif; ?>
    </p>
    <a href="mailto:ash@desertdelta.co.uk?subject=Enquire About Hiring <?php echo $title; ?>&body=Hi, I found <?php echo $title; ?> on the list of First Press candidates for hire.  Please contact me for more information." class="button button__ghost mt1">Hire Me</a>
    
</div>