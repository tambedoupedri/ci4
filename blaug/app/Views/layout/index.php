<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('post/create/');?>"> 
            Create New Post
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th width="240px">Action</th>
            </tr>
 
            <?php foreach ($posts as $post) { ?>      
            <tr>
                <td><?php echo $post->name; ?></td>
                <td><?php echo $post->description; ?></td>          
                <td>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('post/show/'. $post->id) ?>"> 
                        Show
                    </a>
                    <a
                        class="btn btn-outline-success"
                        href="<?php echo base_url('post/edit/'.$post->id) ?>"> 
                        Edit
                    </a>
                    <a
                        class="btn btn-outline-danger"
                        href="<?php echo base_url('post/delete/'.$post->id) ?>"> 
                        Delete
                    </a>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>