<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require  $_SERVER['DOCUMENT_ROOT'].'/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role'])." Dashbord || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'].'/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'].'/cms/inc/sidebar.php';
$person = new Personal();
$orga = new Organization();
$ind = new Industrial();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo SITE_URL; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to homepage</a>
    </div>
</div>
<br>
<!-- Populations -->
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-2">Population details since (<?php $yfield = ' MIN(DateOfBirth)';
                                                        $yresult = $person->selectFieldC($yfield);
                                                        echo $yresult[0]->Counts; ?>) AD</h2>
    </div>
</div>
<div class="container-fluid">
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <div class="text">
                            <h2><?php $popnCondition = 'IsAlive';
                                $popnValue = 'Alive';
                                $totalPopn = $person->selectCountCv($popnCondition, $popnValue);
                                echo $totalPopn[0]->Count; ?></h2>
                            <span>Total population</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-people-carry"></i>
                        </div>
                        <div class="text">
                            <h2><?php $manCondition = 'floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) <=64 and floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) >=16  and IsAlive=\'Alive\'';
                                $manPopn = $person->selectCountC($manCondition);
                                echo $manPopn[0]->Counts; ?></h2>
                            <span>Manpower</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="text">
                            <h2><?php $teenCondition = 'floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) <=19 and floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) >=13 and IsAlive=\'Alive\'';
                                $teenPopn = $person->selectCountC($teenCondition);
                                echo $teenPopn[0]->Counts; ?></h2>
                            <span>Tenagers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-blind"></i>
                        </div>
                        <div class="text">
                            <h2><?php $elderCondition = ' floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) >=60 and IsAlive=\'Alive\'';
                                $elderPopn = $person->selectCountC($elderCondition);
                                echo $elderPopn[0]->Counts; ?></h2>
                            <span>Elderly peoples</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="text">
                            <h2><?php $elderCondition = 'floor(DATEDIFF(CURRENT_DATE, DateOfBirth)/365) <=5 and IsAlive=\'Alive\'';
                                $elderPopn = $person->selectCountC($elderCondition);
                                echo $elderPopn[0]->Counts; ?></h2>
                            <span>Childrens</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-skull"></i>
                        </div>
                        <div class="text">
                            <h2><?php $popnCondition = 'IsAlive';
                                $popnValue = 'Dead';
                                $totalPopn = $person->selectCountCv($popnCondition, $popnValue);
                                echo $totalPopn[0]->Count; ?></h2>
                            <span>Dead</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Organizations -->
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-2">Organization details since (<?php $yofield = ' MIN(EstablishedDate)';
                                                        $yoresult = $orga->selectFieldC($yofield);
                                                        echo $yoresult[0]->Counts; ?>) AD</h2>
    </div>
</div>
<div class="container-fluid">
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="text">
                            <h2><?php $orgCondition = 'IsPresent=\'Present\'';
                                $totalorg = $orga->selectCountC($orgCondition);
                                echo $totalorg[0]->Counts; ?></h2>
                            <span>Total Organizations</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="text">
                            <h2><?php $govCondition = 'Type=\'Government\' and IsPresent=\'Present\'';
                                $totalgorg = $orga->selectCountC($govCondition);
                                echo $totalgorg[0]->Counts; ?></h2>
                            <span>Government</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="text">
                            <h2><?php $govCondition = 'Type=\'Private\' and IsPresent=\'Present\'';
                                $totalgorg = $orga->selectCountC($govCondition);
                                echo $totalgorg[0]->Counts; ?></h2>
                            <span>Private</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-ban"></i>
                        </div>
                        <div class="text">
                            <h2><?php $govCondition = 'IsBanned=\'Banned\' and IsPresent=\'Present\'';
                                $totalgorg = $orga->selectCountC($govCondition);
                                echo $totalgorg[0]->Counts; ?></h2>
                            <span>Banned</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <div class="text">
                            <h2><?php $govCondition = 'IsPresent=\'Collapsed\'';
                                $totalgorg = $orga->selectCountC($govCondition);
                                echo $totalgorg[0]->Counts; ?></h2>
                            <span>Collapsed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Industries -->
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-2">Industry details since (<?php $yoindfield = ' MIN(EstablishedDate)';
                                                    $yoindresult = $ind->selectFieldC($yoindfield);
                                                    echo $yoindresult[0]->Counts; ?>) AD</h2>
    </div>
</div>
<div class="container-fluid">
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="text">
                            <h2><?php $indcon = 'isPreasent=\'Present\'';
                                $indrus = $ind->selectCountC($indcon);
                                echo $indrus[0]->Counts; ?></h2>
                            <span>Industries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="text">
                            <h2><?php $govConditionind = 'Type=\'Government\' and isPreasent=\'Present\'';
                                $totalgorgind = $ind->selectCountC($govConditionind);
                                echo $totalgorgind[0]->Counts; ?></h2>
                            <span>Government</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="text">
                            <h2><?php $prvConditionind = 'Type=\'Private\' and isPreasent=\'Present\'';
                                $totalgorgindprv = $ind->selectCountC($prvConditionind);
                                echo $totalgorgindprv[0]->Counts; ?></h2>
                            <span>Private</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-ban"></i>
                        </div>
                        <div class="text">
                            <h2><?php $indbanCondition = 'isBanned=\'Banned\' and isPreasent=\'Present\'';
                                $totalbanind = $ind->selectCountC($indbanCondition);
                                echo $totalbanind[0]->Counts; ?></h2>
                            <span>Banned</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <div class="text">
                            <h2><?php $colindCondition = 'isPreasent=\'Collapsed\'';
                                $totalindcol = $ind->selectCountC($colindCondition);
                                echo ($totalindcol[0]->Counts); ?></h2>
                            <span>Collapsed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'inc/footer.php';
?>