<?php
class post_model extends main_model {
	protected $table = 'posts';
	public function get_all_posts() {
		$query = "SELECT posts.id, users.name, posts.content, posts.photo, posts.posting_time, posts.creator_id FROM posts, users where users.id = posts.creator_id";
		$result = mysqli_query($this->con,$query);
		return $result;
	}
	public function get_detail_post($post_id) {
		$query = "SELECT posts.id, users.name, posts.content, posts.photo, posts.posting_time, posts.creator_id FROM posts, users where users.id = posts.creator_id and posts.id=".$post_id;
		$result = mysqli_query($this->con,$query);
		return $result;
	}
}
?>
