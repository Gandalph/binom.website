	<div class="pages">
		<?php 
            $i = 1; 
            $n = $post_num;
            $post_num = ceil(($post_num)/5);
        ?>
        
        <?php
            $match_found = preg_match("/search/i", $_SERVER['REQUEST_URI']);
            if($n == 0 && $match_found) {
                echo "<div class=\"empty-result page-num\" data-page-max=\"0\">"
                        ."<p>Нема пронађених чланака</p>"
                    ."</div>";
            }
        ?>
        
		<div class="arrow-page" onclick="window.location= window.location.pathname.split('/')[2] + '?page_num=<?php echo $temp-1; ?><?= $window_location ?>'">
			<span>&lt; предходна</span>
		</div>

		<?php while($i <= $post_num): ?>
	        <?php  if($i++ == $temp): ?>
	            <div class="page-num current" data-page-max="<?= $post_num ?>"><?= $i-1 ?></div><!-- end page_num -->
	        <?php endif; ?>
	    <?php endwhile; ?>

		<div class="arrow-page" onclick="window.location= window.location.pathname.split('/')[2] + '?page_num=<?php echo $temp+1; ?><?= $window_location ?>'">
			<span>следећа &gt;</span>
		</div>

	</div>

	<footer>
        <p>Copyright &copy; Бином</p>
	</footer>
</body>
</html>
