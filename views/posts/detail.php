<?php
global $mediaFiles;
array_push($mediaFiles['css'], RootREL.'media/fontawesome/css/all.css');
array_push($mediaFiles['js'], "media/js/comment.js");
array_push($mediaFiles['css'], RootREL.'media/css/posts.css');
array_push($mediaFiles['css'], RootREL.'media/css/commentsshow.css');
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<!-- <div class="row row-offcanvas row-offcanvas-right">
  	<div class="col-xs-12 col-sm-9">
	  <?php $post_id=0; ?>
      <?php if($this->postDetail) { ?>
		<?php while($row = mysqli_fetch_array($this->postDetail)) : ?>
			<?php $post_id=$row['id'];?>
			<div class="d-flex">
				<h4><?php echo $row['name']; ?></h4>
				<?php if($_SESSION['username'] == $row['name']) { ?>
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
				<?php } ?>				
			</div>
			<p>Posting time: <?php echo $row['posting_time'];?></p>
			<p><?php echo $row['content']; ?></p>
			<div class="d-flex">
			<a role="button" class="btn btn-primary" href="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'like',
										'params'=>array(
											'like' => ($this->user_like)? 'liked' : 'not_liked',
											'id'=>$row['id'],
											// 'user_like' => $this->user_like,
											// 'post_like' => $this->post_count_like
										)
									)); ?>">
					<?php echo ($this->user_like)? "Like" : "Not like" ?>
					(<?php echo $this->post_count_like; ?>)
				</a>				
			</div>
		<?php endwhile; ?>
	<?php } ?> -->

	<div class="card shadow-lg my-3" id="<?php echo $this->post["id"] ?>">
		<div class="card-body">
			<div class="d-flex">
				<div class="border border-dark rounded-circle icon-svg">
					<i class="fa-solid fa-user"></i>
				</div>
				<h5 class="d-flex align-items-center card-title text-margin ms-2"><?php echo $this->post["creator_name"] ?></h5>
				<?php if($this->post["is_creator"]) { ?>
				<div class="ps-2">
					<button class="btn btn-warning" id="edit_post<?php echo $this->post["id"] ?>">
						<i class="fa-solid fa-pen-to-square"></i>
					</button>
					<button class="btn btn-danger" id="delete_post<?php echo $this->post["id"] ?>">
						<i class="fa-solid fa-trash"></i>
					</button>
				</div>
				<?php } ?>
			</div>
			<small class="text-muted">Posting time: <?php echo $this->post["posting_time"] ?></small>
			<p class="card-text"><?php echo $this->post["content"] ?></p>
			<?php if($this->post["photo"] != null) { ?>
			<img class="img-thumbnail" src="<?php echo "media/upload/" .$this->controller.'/'.$this->post["photo"]; ?>" alt="loading" >
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
										'id' => $this->post["id"],
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
			<div>
			<h3>Comments</h3>
    		<div id="comment"></div>
			<?php if (isset($_SESSION['user_id'])) { ?>
			<div class="card mt-3">
				<div class="card-header p-3">
					Questions & Comments
				</div>
				<div class="card-body">
					<form method="POST" class="d-flex my-2 form_cmt" id="form_cmt<?php echo $this->post["id"]; ?>" action="<?php echo html_helpers::url(
									array('ctl'=>'posts', 
										'act'=>'process',
										'params'=>array(
										'id' => $this->post["id"],
									)
									)); ?>">
						<textarea id="contact_list" class="form-control " name="comment_content"></textarea>
						<button type="submit" class="btn btn-secondary">
							<i class="fa-solid fa-paper-plane"></i>
						</button>
					</form>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>

<!-- ------------------comment-------------------------- -->
<!-- <?php $i=0; ?> 
    <h2 class="text-center my-4">Comment (<?php echo $this->comment_count; ?>)</h2>
  	<?php if($this->records) {	?>
		<?php while($row = mysqli_fetch_array($this->records)) : ?>
            <div style="margin: 30px 0; margin-left: calc(80px*<?php echo $this->mar_len[$i];?>);">
                <div class="d-flex">
                    <h4><?php echo $row['name']; ?></h4>
                    <?php if($_SESSION['username'] == $row['name']) { // xu ly sua xoa?> 
                    <a role="button" class="btn btn-warning mx-3" href="<?php echo html_helpers::url(
                                        array('ctl'=>'comments', 
                                            'act'=>'edit',
                                            'params'=>array(
												'id'=>$row['id']
												// 'post_id'=>$post_id,
												// 'user_like' => $this->user_like,
												// 'post_like' => $this->post_count_like,
                                                // 'comment_id'=>$row['id'],
												// 'content' => $row['content'],
												// 'posting_time' => $row['posting_time'],
												// 'creator_id' => $_SESSION['user_id'],
												// 'path' => $row['path'],
                                        ))); ?>">
                        Edit comment
                    </a>
                    <a role="button" class="btn btn-danger" href="<?php echo html_helpers::url(
                                        array('ctl'=>'comments', 
                                            'act'=>'delcmt',
                                            'params'=>array(
												'post_id'=>$post_id,
                                                'comment_id'=>$row['id'],
												// 'user_like' => $this->user_like,
												// 'post_like' => $this->post_count_like
                                        ))); ?>">
                        Delete comment
                    </a>
                    <?php }  // end xu ly?>				
                </div>
                <p>Posting time: <?php echo $row['posting_time'];?></p>
                <p><?php echo $row['content']; ?></p>
                <div class="d-flex">
					<a role="button" class="btn btn-primary" href="<?php echo html_helpers::url(
										array('ctl'=>'comments', 
											'act'=>'like',
											'params'=>array(
												'like' => ($this->user_liked[$i])? 'liked' : 'not_liked',
												'comment_id'=>$row['id'],
												'post_id'=>$post_id,
												// 'user_like' => $this->user_like,
												// 'post_like' => $this->post_count_like
												
											)
										)); ?>">
						<?php echo ($this->user_liked[$i])? "Like" : "Not like" ?>
						(<?php echo $this->like[$i]; ?>)
					</a>
                    <a role="button" class="btn btn-info mx-3" 
                                        onClick="creForm(<?php echo $i; ?>)">
						Reply
                    </a>
                </div>
				<?php 
				$format = "Y-m-d";
				$time = date($format, time());
				// echo $row['path'];
				?>
				<form method="post" action="<?php echo html_helpers::url(
                                        array('ctl'=>'comments', 
                                            'act'=>'addcmt',
											'params'=>array(
												// 'id'=>$row['id'],
												'posting_time'=>$time,
												'post_id'=>$post_id,
												'creator_id'=>$_SESSION['user_id'],
												'path'=>$row['path'],
												// 'user_like' => $this->user_like,
												// 'post_like' => $this->post_count_like

                                        ))); ?>"																
										id="cre<?php echo $i;?>" style="display: none;">
					<div class="row mb-4">
						<textarea class="my-3 col-8 form-control" style="box-sizing: border-box;" name="content" type="text" placeholder="Content"></textarea>
						<button class="btn btn-info" type="submit" name="btn_submit">Send message</button>
					</div>
				</form>
            </div>
		<?php $i++; endwhile; ?>
	<?php } else { ?>
			<p>There are no comments</p>
	<?php }  ?>
		<a role="button" class="btn btn-info" 
							onClick="creForm(<?php echo $i; ?>)">
			Add comment of post
		</a>
<?php 
	$format = "Y-m-d";
	$time = date($format, time());
	?>
	<form method="post" action="<?php echo html_helpers::url(
							array('ctl'=>'comments', 
								'act'=>'addcmt',
								'params'=>array(
									// 'id'=>$row['id'],
									'posting_time'=>$time,
									'post_id'=>$post_id,
									'creator_id'=>$_SESSION['user_id'],
									'path'=>"__",
									// 'user_like' => $this->user_like,
									// 'post_like' => $this->post_count_like
							))); ?>"																
							id="cre<?php echo $i;?>" style="display: none;">
		<div class="row mb-4">
			<textarea class="my-3 col-8 form-control" style="box-sizing: border-box;" name="content" type="text" placeholder="Content"></textarea>
			<button class="btn btn-info" type="submit" name="btn_submit">Send message</button>
		</div>
	</form>
</div>
 <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
	<?php include_once 'views/widgets/sidebar.php'; ?>
</div>
</div> -->
<?php array_push($mediaFiles['js'], RootREL."media/js/jquery.min.js"); ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/post_detail.js"); ?>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
