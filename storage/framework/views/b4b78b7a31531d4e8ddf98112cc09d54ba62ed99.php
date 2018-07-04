<?php $__env->startSection('content'); ?>
<a href="/posts" class="btn btn-dark">Go Back </a>
    <h1><?php echo e($post->title); ?></h1>
<div>
    
    <?php echo $post->body; ?> 
</div>
<small> Written on <?php echo e($post->created_at); ?></small>
<hr>
<a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-dark">Edit</a>

<?php echo Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']); ?>

    <?php echo e(Form::hidden('_method', 'DELETE')); ?>

    <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

<?php echo Form::close(); ?>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>