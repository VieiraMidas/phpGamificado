<?php $recurso = $_SERVER["PATH_INFO"] ?>
<div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <ul class="nav flex-column  nav-pills vertical">
                    <li class="nav-item">
                        <a class="nav-link <?= ($recurso == '/usuarios')?'active':''?>" href="/usuarios">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($recurso == '/questoes')?'active':'' ?>" href="/questoes">Quiz</a>
                    </li>
                </ul>
            </div>
           
           
