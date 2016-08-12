<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login<b class="caret"></b></a>
        <ul id="login-dp" class="dropdown-menu">
            <li>
                <div class="col-md-12">
                     <form class="form" name="formu"role="form" method="post" action="mod-login/autenticacion.php" accept-charset="UTF-8" id="login-nav">
                            <div class="form-group">
                                 <label class="sr-only" for="usuario_login">Usuario</label>
                                 <input type="text" class="form-control" id="usuario_login" name="usuario_login" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                 <label class="sr-only" for="password_login">Password</label>
                                 <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-block" onsubmit="validarlogin();">Entrar</button>
                            </div>
                            <span name="error" value=""></span>
                            <?php
                            if(isset($_GET["error"])){
                                if ($_GET["error"]=="true"){ ?>
                            <div class="alert alert-info">
                            <label class="mensaje" for="mensaje" id="mensaje">Acceso Denegado!!Revise que sus datos y vuelva a intentarlo.</label>   
                            </div>
                            <?php 
                            } 
                            }
                            ?>
                            
                            
                     </form>
                </div>            
            </li>            
        </ul>
 </li>
                