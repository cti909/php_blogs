<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL.'media/fontawesome/css/all.css');
array_push($mediaFiles['css'], RootREL.'media/css/posts.css');
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>

<?php if($this->records) { ?>
	<h1 class="text-center p-3">Posts</h1>
	<?php for($index=0; $index<$this->records_count; $index++) { ?>
	<div class="card shadow-lg my-3">
		<div class="card-body">
			<div class="d-flex">
				<div class="border border-dark rounded-circle icon-svg">
					<i class="fa-solid fa-user"></i>
				</div>
				<h5 class="d-flex align-items-center card-title text-margin ms-2"><?php echo $this->dictionary[$index]["creator_name"] ?></h5>
				<?php if($this->dictionary[$index]["is_creator"]) { ?>
				<div class="ps-2">
					<button class="btn btn-warning" id="edit_post<?php echo $this->dictionary[$index]["id"] ?>">
						<i class="fa-solid fa-pen-to-square"></i>
					</button>
					<button class="btn btn-danger" id="delete_post<?php echo $this->dictionary[$index]["id"] ?>">
						<i class="fa-solid fa-trash"></i>
					</button>
				</div>
				<?php } ?>
			</div>
			<small class="text-muted">Posting time: <?php echo $this->dictionary[$index]["posting_time"] ?></small>
			<p class="card-text"><?php echo $this->dictionary[$index]["content"] ?></p>
			<?php if($this->dictionary[$index]["photo"] != null) { ?>
			<img class="img-thumbnail" src="<?php echo "media/upload/" .$this->controller.'/'.$this->dictionary[$index]["photo"]; ?>" alt="loading" >
			<?php } ?>
			<hr>
			<span>is liked</span>
			<div class="d-flex">
				<div class="feature-item pe-2">
					<button class="btn btn-outline-dark w-100">
						<i class="fa-regular fa-thumbs-up"></i>
					</button>
				</div>
				<div class="feature-item ps-2">
					<a role="button" class="btn btn-outline-dark w-100" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'detail',
										'params'=>array(
										'id' => $this->dictionary[$index]["id"],
										// 'post_like'=> $this->like[$i],
										// 'user_like'=> $this->user_liked[$i]
									)
									)); ?>">
						Comments
					</a>
				</div>
				<div class="feature-item px-2">
					<a role="button" href="#" class="btn btn-outline-dark w-100">
						Share
						<i class="fa-solid fa-share"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<?php } else { ?>
		<p>There are no records</p> 
<?php }  ?>
</div>

<!-- <div class="row row-offcanvas row-offcanvas-right">
  	<div class="col-xs-12 col-sm-9">
	<?php $i=0; ?>
  	<?php if($this->records) { ?>
		<?php while($row = mysqli_fetch_array($this->records)) : ?>
			<div class="d-flex">
				<h4><?php echo $row['name']; ?></h4>
				<?php if(isset($_SESSION['user_id'])) {
					if($_SESSION['username'] == $row['name']) { // xu ly sua xoa?> 
				<a role="button" class="btn btn-warning mx-3" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'edit',
										'params'=>array(
											'id'=>$row['id']
									))); ?>">
					Edit post
				</a>
				<a role="button" class="btn btn-danger" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'delPost',
										'params'=>array(
											'id'=>$row['id']
									))); ?>">
					Delete post
				</a>
				<?php } }// end?>				
			</div>
			<p>Posting time: <?php echo $row['posting_time'];?></p>
			<p><?php echo $row['content']; ?></p>
			<div class="d-flex">
				<a role="button" class="btn btn-primary" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'like',
										'params'=>array(
											'like' => ($this->user_liked[$i])? 'liked' : 'not_liked',
											'id'=>$row['id'], // id post

										)
									)); ?>">
					<?php echo ($this->user_liked[$i])? "Like" : "Not like" ?>
					(<?php echo $this->like[$i]; ?>)
				</a>
				<a role="button" class="btn btn-info mx-3" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'detail',
										'params'=>array(
										'id'=>$row['id'],
										'post_like'=> $this->like[$i],
										'user_like'=> $this->user_liked[$i]
									)
									)); ?>">
					View detail
				</a>				
			</div>
			<hr>
			<?php $i++; ?>
		<?php endwhile; ?>
	<?php } else { ?>
			<p>There are no records</p> 
	<?php }  ?>
</div> -->

</div>
<?php array_push($mediaFiles['js'], RootREL."media/js/jquery.min.js"); ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/posts.js"); ?>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
