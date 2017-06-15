<?php $sum=($data['tips_summary']['finished_tips'])+($data['tips_summary']['in_progress_tips'])+($data['tips_summary']['not_started_tips']); ?>
<?php $submitted=($data['tips_summary']['finished_tips']); ?>
<?php $inProgress=($data['tips_summary']['in_progress_tips']); ?>
<?php $notStarted=($data['tips_summary']['not_started_tips']); ?>


                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Current Academic Year</span>
                        <h2>TIPS Summary</h2>
                    </div>
                    <div class="ibox-content">
                        <div class="row">

                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['tips_summary']['finished_tips'] }}</h2>
                                <h5>Submitted</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width:<?php echo ($submitted/$sum)*100; ?>%"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['tips_summary']['in_progress_tips'] }}</h2>
                                <h5>In-progress</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width:<?php echo ($inProgress/$sum)*100; ?>%"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['tips_summary']['not_started_tips'] }}</h2>
                                <h5>Not-started</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width:<?php echo ($notStarted/$sum)*100; ?>%"></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            



