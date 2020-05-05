<?php $__env->startSection('content'); ?>
 <div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Add Project
                            </h1>
                            
                        </div>
                    </div>
                </section><br><br>
                <div class="columns">
                    <div class="column">
                        <form action="<?php echo e(route('projects.store')); ?>" method="POST"  class="box">
                            <div class="field">
                                <label for="title" class="label">Project Name</label>
                                <div class="control has-icons-left">
                                <input type="text" placeholder="Enter Project Name" 
                                id="title" name="title" 
                                value="<?php echo e($project->title); ?>"
                                class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                </div>
                            </div>    
                            <div class="field">
                                <label for="desc" class="label">Project Description</label>
                                <textarea class="textarea" 
                                id="desc" name="desc" 
                                placeholder="Enter Description"><?php echo e($project->desc); ?></textarea>
                                
                            </div>
                            <div class="field">
                                <label class="label">Client</label>
                                <div class="control">
                                    <div class="select" >
                                        <select name="client_id" id="client_id" >
                                        <option value="1">Adam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Developers</label>
                                <div class="control">
                                    <input name="dev" value="dev1" type="checkbox">  Dev1
                                    <br>
                                     <input name="dev" value="dev2" type="checkbox"> Dev2
                                </div>
                            </div>
                            <div class="field">
                                <button class="button is-success">
                                    Save Project
                                </button>
                            </div>
                            <input type="hidden" name="id" value="<?php echo e($project->id); ?>"> 
                             <?php echo e(csrf_field()); ?> 
                        </form>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/status/resources/views/projects/add.blade.php ENDPATH**/ ?>