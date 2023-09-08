<?php

$Db->setParams(['table' => 'banner']);
$banner = count($Db->result());

$Db->setParams(['table' => 'user']);
$user = count($Db->result());
?>
<div id="page-painel">

    <div class="col-md-4" style="margin-bottom: 15px">
        <a href="banner">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-picture-o"></i> Banner <span class="pull-right badge"><?= $banner ?></span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="margin-bottom: 15px">
        <a href="usuarios">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-users"></i>  Usuários <span class="pull-right badge"><?= $user ?></span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </a>
    </div>

    <div class="clearfix"></div>

    <hr>
</div>