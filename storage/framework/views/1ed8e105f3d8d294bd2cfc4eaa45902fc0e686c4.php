<?php $__env->startSection('title','Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="body">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Iniciar Sesión</h5>
                            <form class="form-signin">
                                <?php echo csrf_field(); ?>
                                <div class="form-label-group">
                                    <input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Correo electrónico" required autofocus>
                                    <label for="txt_email">Correo electrónico</label>
                                </div>
                    
                                <div class="form-label-group">
                                    <input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="Contraseña" required>
                                    <label for="txt_password">Contraseña</label>
                                </div>
                    
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>