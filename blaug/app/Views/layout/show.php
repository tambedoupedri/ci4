<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('post/');?>"> 
            View All posts
        </a>
    </div>
    <div class="card-body">
       <b class="text-muted">Name:</b>
       <p><?php echo $post->name;?></p>
       <b class="text-muted">Description:</b>
       <p><?php echo $post->description;?></p>
    </div>
</div>