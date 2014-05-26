<?php

class Posts extends Eloquent{

	protected $fillable = array('post_title', 
								'post_author', 
								'post_date', 
								'post_content', 
								'post_category', 
								'post_status', 
								'post_parent', 
								'comment_count'
								);  

	public static $rules = array('post_title'  => 'required|min:3',
								'post_author'  => 'required|min:3',
								'post_date'    => 'required|date',
								'post_content' => 'required|min:30',
								'post_category'=> 'required|min:1',
								'post_status'  => 'required|min:1',
								'post_parent'  =>'required|min:1',
								'comment_count'=> 'required|min:1'
								);
}


