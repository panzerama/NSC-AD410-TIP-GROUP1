

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Current Academic Year</span>
                        <h2>TIPS Summary</h2>
                    </div>
                    <div class="ibox-content">
                        <div class="row">

                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['num_finished_tips'] }}</h2>
                                <h5>Submitted</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width: 44%;"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['num_in_progress_tips'] }}</h2>
                                <h5>In-progress</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width: 10%;"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="no-margins">{{ $data['num_faculty_no_tip'] }}</h2>
                                <h5>Not-started</h5>
                                <div class="progress progress-mini">
                                <div class="progress-bar" style="width: 46%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
             



