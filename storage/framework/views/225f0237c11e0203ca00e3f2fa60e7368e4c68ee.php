<?php $__env->startSection('content'); ?>
      <div class="jumbotron text-center" style="margin-top:10px">
              <h1 class="display-3">Welcome to Laravel!</h1>
              <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
              <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a></p>
      </div>
<?php $__env->stopSection(); ?> 
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>