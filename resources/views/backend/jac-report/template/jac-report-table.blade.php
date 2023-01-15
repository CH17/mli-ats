<div class="ibox float-e-margins">

    <div class="ibox-title">
        <div class="titleWrap">
            <h5>JAC Criteria</h5>
        </div>
    </div>

    <div class="ibox-content">
        @if(count($jac_reports))
        <table class="table table-striped table-bordered table-hover">
            <thead>
                @php
                    $total = $jac_report->total;
                    $jac13_rate = '';
                    $jac14_rate = '';                   
                    $jac17_rate = '';
                    $jac18_rate = '';                   
                    $jac23_rate = '';                   
                   

                    if($total > 0){
                        $jac13_rate = ($jac_report->jac13 * 100) / $total;
                        $jac13_rate = number_format($jac13_rate, 2) ;

                        $jac14_rate = ($jac_report->jac14 * 100) / $total;
                        $jac14_rate = number_format($jac14_rate, 2) ;

                        $jac17_rate = ($jac_report->jac17 * 100) / $total;
                        $jac17_rate = number_format($jac17_rate, 2);

                        $jac18_rate = ($jac_report->jac18 * 100) / $total;
                        $jac18_rate = number_format($jac18_rate, 2);

                        $jac23_rate = ($jac_report->jac23 * 100) / $total;
                        $jac23_rate = number_format($jac23_rate, 2);
                    }
                @endphp
                <tr>
                    <th class="text-center">#</th>
                    <th>Week</th>
                    <th>JAC 13</th>
                    <th>JAC 14</th>
                    <th>JAC 15</th>
                    <th>JAC 16</th>
                    <th>JAC 17</th>
                    <th>JAC 18</th>
                    <th>JAC 19</th>
                    <th>JAC 23</th>
                    <th>JAC 24</th>
                    <th>JAC 25</th>
                </tr>
            </thead>

            <tbody>
                <tr class="gradeX">
                    <td class="text-center"></td>
                    <td></td>
                    <td>Patients</td>
                    <td>Students</td>
                    <td>Training</td>
                    <td>Poster</td>
                    <td>Health and Practice Data</td>
                    <td>Factors Beyond Clinical Care</td>
                    <td>Collaboration</td>
                    <td>Team Performance Improvement</td>
                    <td>HC QI</td>
                    <td>IPCE Positive Impact</td>
                </tr>
                <tr class="gradeX">
                    <td class="text-center"></td>
                    <td>Current Status</td>
                    <td>@if($jac13_rate < 0.10) No @else Yes @endif</td> 
                    <td>@if($jac14_rate < 0.10) No @else Yes @endif</td> 
                    <td>Yes</td>
                    <td>Unknown</td>
                    <td>@if($jac17_rate < 0.10) No @else Yes @endif</td>
                    <td>@if($jac18_rate < 0.10) No @else Yes @endif</td>
                    <td>@if($jac_report->jac19 < 4) No @else Yes @endif</td>
                    <td>@if($jac23_rate < 0.10) No @endif</td>
                    <td>@if($jac_report->jac24 < 4) No @else Yes @endif</td>
                    <td>@if($jac_report->jac25 < 4) No @else Yes @endif</td>
                </tr>
                <tr class="gradeX">
                    <td class="text-center"></td>
                    <td>Rule</td>
                    <td>Min 10%, XL = 8</td>
                    <td>Min 10%, XL = 8</td>
                    <td>Time and Resources</td>
                    <td>2x</td>
                    <td>Min 10%, XL = 8</td>
                    <td>Min 10%, XL = 8</td>
                    <td>4x</td>
                    <td>Min 10%, XL = 8</td>
                    <td>2x</td>
                    <td>2x</td>
                </tr>
                @foreach ($jac_reports as $key => $jac_report )
                @php
                $total = $jac_report->total;
                $jac13_rate = '';
                $jac14_rate = '';
                $jac15_rate = '';
                $jac16_rate = '';
                $jac17_rate = '';
                $jac18_rate = '';
                $jac19_rate = '';
                $jac23_rate = '';
                $jac24_rate = '';
                $jac25_rate = '';
                if($total > 0){
                $jac13_rate = ($jac_report->jac13 * 100) / $total;
                $jac13_rate = "(" . number_format($jac13_rate, 2) . "%)" ;

                $jac14_rate = ($jac_report->jac14 * 100) / $total;
                $jac14_rate = "(" . number_format($jac14_rate, 2) . "%)" ;

                // $jac15_rate = ($jac_report->jac15 * 100) / $total;
                // $jac15_rate = "(" . number_format($jac15_rate, 2) . "%)" ;

                // $jac16_rate = ($jac_report->jac16 * 100) / $total;
                // $jac16_rate = "(" . number_format($jac16_rate, 2) . "%)" ;

                $jac17_rate = ($jac_report->jac17 * 100) / $total;
                $jac17_rate = "(" . number_format($jac17_rate, 2) . "%)" ;

                $jac18_rate = ($jac_report->jac18 * 100) / $total;
                $jac18_rate = "(" . number_format($jac18_rate, 2) . "%)" ;

                $jac19_rate = ($jac_report->jac19 * 100) / $total;
                $jac19_rate = "(" . number_format($jac19_rate, 2) . "%)" ;

                $jac23_rate = ($jac_report->jac23 * 100) / $total;
                $jac23_rate = "(" . number_format($jac23_rate, 2) . "%)" ;

                $jac24_rate = ($jac_report->jac24 * 100) / $total;
                $jac24_rate = "(" . number_format($jac24_rate, 2) . "%)" ;

                $jac25_rate = ($jac_report->jac25 * 100) / $total;
                $jac25_rate = "(" . number_format($jac25_rate, 2) . "%)" ;
                }
                @endphp

                <tr class="gradeX">
                    <td class="text-center">{!! ($key+1)+(15*($jac_reports->currentPage()-1)) !!}</td>
                    <td>{{date('m/d/Y',strtotime($jac_report->week))}}</td>
                    <td>{{ $jac_report->jac13 }} {{ $jac13_rate}}</td>
                    <td>{{ $jac_report->jac14 }} {{ $jac14_rate}}</td>
                    <td>{{ $jac_report->jac15 }} {{ $jac15_rate}}</td>
                    <td>{{ $jac_report->jac16 }} {{ $jac16_rate}}</td>
                    <td>{{ $jac_report->jac17 }} {{ $jac17_rate}}</td>
                    <td>{{ $jac_report->jac18 }} {{ $jac18_rate}}</td>
                    <td>{{ $jac_report->jac19 }} {{ $jac19_rate}}</td>
                    <td>{{ $jac_report->jac23 }} {{ $jac23_rate}}</td>
                    <td>{{ $jac_report->jac24 }} {{ $jac24_rate}}</td>
                    <td>{{ $jac_report->jac25 }} {{ $jac25_rate}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="dataTables_paginate paging_simple_numbers">
            {{$jac_reports->links()}}
        </div>
        @else
        <div class="text-center">
            <h4>No JAC Criteria Available</h4>
        </div>
        @endif
    </div>
</div>