<?php 
$hero_type = get_field('hero_type');
if($hero_type=='video') { 
	$v = get_field('video');	
	$webm = (isset($v['video_webm'])) ? $v['video_webm'] : '';
	$mp4 = (isset($v['video_mp4'])) ? $v['video_mp4'] : '';
	$text = (isset($v['video_text'])) ? $v['video_text'] : '';
	if($webm || $mp4) { ?>
	<div class="video-panel <?php echo ($text) ? 'has-caption':'no-caption'?>">
		<?php if($text) { ?>
		<div class="video-caption">
			<div class="video-text">
				<?php echo $text ?>
			</div>
		</div>
		<?php } ?>
		<div class="video-frame">
			<video autoplay loop  muted>
				<?php if($webm) { ?>
					<source src="<?php echo $webm ?>" type="video/webm">
				<?php } ?>
				<?php if($mp4) { ?>
					<source src="<?php echo $mp4 ?>" type="video/mp4">
				<?php } ?>
			</video>
		</div>
	</div>
	<?php } ?>
<?php } ?>