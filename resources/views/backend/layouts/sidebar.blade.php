@php
$route_name = Route::currentRouteName();
@endphp
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        @if (!empty(Auth::user()->avatar))
                            <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <img alt="{{ Auth::user()->name }}" class="img-circle"
                                src="{{ asset('backend/images/profile_small.png') }}" />
                        @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                            @if (!empty(Auth::user()->roles[0]->name))
                                <span class="text-muted text-xs block">
                                    {{ Auth::user()->roles[0]->name }} <b class="caret"></b>
                                </span>
                            @endif
                        </span>
                    </a>
                    @php
                        
                    @endphp
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('profile.edit', Auth::user()->id) }}">Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>

                </div>
                <div class="logo-element">
                    ME
                </div>
            </li>
            <li class="@if ($route_name=='dashboard' ) active @endif">
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span
                        class="nav-label">Dashboards</span></a>
            </li>

            @php
                $user_role = Auth::User()->role();
            @endphp
            @if ($user_role == 'ADMIN' || $user_role == 'ED' || $user_role == 'DoA')

                <li class="@if ($route_name=='users.index' || $route_name=='users.edit' ) active @endif">
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='users.index' ) active @endif"><a href="{{ route('users.index') }}">All
                                Users</a></li>
                    </ul>
                </li>
            @endif

            <li class="@if ($route_name=='resources.index' || $route_name=='resources.edit'|| $route_name=='resources.create' || $route_name=='resources.show' ) active @endif">
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Resources</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='resources.index' ) active @endif"><a href="{{ route('resources.index') }}">Pages</a></li>
                        <li class="@if ($route_name=='resources.create' || $route_name=='resources.edit') active @endif"><a href="{{ route('resources.create') }}">Add New Page</a></li>
                    </ul>
            </li>
                
                

            <li class="@if ($route_name=='projects.index' || $route_name=='add.activity' ||
                $route_name=='user-projects.index' || $route_name=='project.show' || $route_name=='project.edit' ||
                $route_name=='projects.load' || $route_name=='projects.unassigned' || $route_name=='project.assign' ||
                $route_name=='projects.em-planning' || $route_name=='jac15.index' || $route_name=='jac15.edit' ) active @endif">
                <a href="#" class=""><i class="fa fa-tasks"></i> <span class="nav-label">Activities</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='projects.index' || $route_name=='project.show'
                        ) active @endif">
                        <a href="{{ route('projects.index') }}">All Activities</a>
                    </li>
                    <li class="@if ($route_name=='user-projects.index' ) active @endif"><a href="{{ route('user-projects.index') }}">My Activities</a></li>
                    @if ($user_role == 'ADMIN' || $user_role == 'ED' || $user_role == 'DoA')
                        <li class="@if ($route_name=='projects.unassigned' ) active @endif">
                            <a href="{{ route('projects.unassigned') }}">Unassigned Activities</a>
                        </li>
                    @endif
                    <li class="@if ($route_name=='add.activity' ) active @endif">
                        <a href="{{ route('add.activity') }}">Start Activity</a>
                    </li>
                    <li class="@if ($route_name=='project.create' ) active @endif">
                        <a href="{{ route('project.create') }}" target="_blank">Add Activity</a>
                    </li>
                    @if ($user_role == 'ADMIN' || $user_role == 'ED' || $user_role == 'DoA')
                        <li class="@if ($route_name=='projects.load' ) active @endif">
                            <a href="{{ route('projects.load') }}">Activity Load</a>
                        </li>
                    @endif

                    <li class="@if ($route_name=='projects.em-planning' ) active @endif">
                        <a href="{{ route('projects.em-planning') }}">EM Planning</a>
                    </li>

                    <li class="@if ($route_name=='jac15.index' ) active @endif">
                        <a href="{{ route('jac15.index') }}">JAC15 - Training</a>
                    </li>


                </ul>
            </li>

            <li class="@if ($route_name=='outcome.report' || $route_name=='activity.participant'
                || $route_name=='outcome.index' || $route_name=='outcome.show' || $route_name=='outcome.edit' ) active @endif">
                <a href="#"><i class="fa fa-upload"></i> <span class="nav-label">Uploads</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='outcome.report' ||
                        $route_name=='activity.participant' ) active @endif">
                        <a href="{{ route('outcome.report') }}">EM Analysis</a>
                    </li>
                    <li class="@if ($route_name=='activity.participant' ) active @endif">
                        <a href="{{ route('activity.participant') }}">Activity Participant</a>
                    </li>
                    @if ($user_role == 'ADMIN')
                        <li class="@if ($route_name=='outcome.index' ) active @endif">
                            <a href="{{ route('outcome.index') }}">Edit Outcome</a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="@if ($route_name=='audience-types.index' ||
                $route_name=='audience-types.edit' ) active @endif">
                <a href="#" class=""><i class="fa fa-list-alt"></i> <span class="nav-label">Audience
                        Types</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='audience-types.index' ) active @endif"><a href="{{ route('audience-types.index') }}">Audience Types</a></li>
                </ul>
            </li>

            <li class="@if ($route_name=='credit-types.index' || $route_name=='credit-types.edit'
                ) active @endif">
                <a href="#" class=""><i class="fa fa-list-alt"></i> <span class="nav-label">Credit
                        Types</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='credit-types.index' ) active @endif"><a href="{{ route('credit-types.index') }}">Credit Types</a></li>
                </ul>
            </li>


            <li class="@if ($route_name=='joint-providers.index' ||
                $route_name=='joint-providers.edit' || $route_name=='educational-partners.index' ||
                $route_name=='educational-partners.edit' || $route_name=='joint-provider-contacts.index' ||
                $route_name=='joint-provider-contacts.edit' || $route_name=='educational-partner-contacts.index' ||
                $route_name=='educational-partner-contacts.edit' ) active @endif">
                <a href="#" class=""><i class="fa fa-briefcase"></i> <span class="nav-label">Partners</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @if ($user_role == 'ADMIN' || $user_role == 'ED'|| $user_role == 'DoA')
                        <li class="@if ($route_name=='joint-providers.index' ) active @endif">
                            <a href="{{ route('joint-providers.index') }}">Joint Providers</a>
                        </li>
                    @endif
                    <li class="@if ($route_name=='joint-provider-contacts.index' ) active @endif">
                        <a href="{{ route('joint-provider-contacts.index') }}">JP Contacts</a>
                    </li>
                    @if ($user_role == 'ADMIN' || $user_role == 'ED'|| $user_role == 'DoA')
                        <li class="@if ($route_name=='educational-partners.index' ) active @endif">
                            <a href="{{ route('educational-partners.index') }}">Educational Partners</a>
                        </li>
                    @endif
                    <li class="@if ($route_name=='educational-partner-contacts.index' ) active @endif">
                        <a href="{{ route('educational-partner-contacts.index') }}">EP Contacts</a>
                    </li>

                </ul>
            </li>


            @if ($user_role == 'ADMIN' || $user_role == 'ED' || $user_role == 'DoA')
                <li class="@if ($route_name=='moc-boards.index' ||
                    $route_name=='moc-credit-types.index' || $route_name=='moc-practices.index' ||
                    $route_name=='moc-boards.edit' || $route_name=='moc-credit-types.edit' ||
                    $route_name=='moc-practices.edit' ) active @endif">
                    <a href="#" class=""><i class="fa fa-list-alt"></i> <span class="nav-label">MOC/CC</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='moc-boards.index' ) active @endif"><a href="{{ route('moc-boards.index') }}">MOC Boards</a></li>
                        <li class="@if ($route_name=='moc-credit-types.index' ) active @endif"><a href="{{ route('moc-credit-types.index') }}">MOC
                                Credit Types</a>
                        </li>
                        <li class="@if ($route_name=='moc-practices.index' ) active @endif"><a href="{{ route('moc-practices.index') }}">MOC
                                Practices</a></li>
                    </ul>
                </li>
            @endif


            @if ($user_role == 'ADMIN' || $user_role == 'ED' || $user_role == 'DoA')
                <li class="@if ($route_name=='ilna-codes.index' || $route_name=='ilna-codes.edit'
                    ) active @endif">
                    <a href="#" class=""><i class="fa fa-list-alt"></i> <span class="nav-label">ILNA Codes</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='ilna-codes.index' ) active @endif"><a href="{{ route('ilna-codes.index') }}">Ilna Codes</a></li>

                    </ul>
                </li>
            @endif


            @if ($user_role == 'ADMIN' || $user_role == 'ED')
                <li class="@if ($route_name=='mli-fees.index' || $route_name=='mli-fees.edit' ) active @endif">
                    <a href="#" class=""><i class="fa fa-list-alt"></i> <span class="nav-label">MLI
                            Fee</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='mli-fees.index' ) active @endif"><a href="{{ route('mli-fees.index') }}">MLI Fees</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="@if ($route_name=='reports.expiring-activity' ||
                $route_name=='reports.expired-activity' || $route_name=='reports.accreditation' ||
                $route_name=='reports.jac-13' || $route_name=='reports.jac-14' || $route_name=='reports.jac-15' ||
                $route_name=='reports.jac-17' || $route_name=='reports.jac-18' || $route_name=='reports.jac-19' ||
                $route_name=='reports.jac-23' || $route_name=='reports.jac-24' || $route_name=='reports.jac-25' ) active @endif">
                <a href="#"><i class="fa fa-flag"></i> <span class="nav-label">Reports</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='reports.expiring-activity' ) active @endif"><a
                            href="{{ route('reports.expiring-activity') }}">Expiring
                            Activities</a></li>
                    <li class="@if ($route_name=='reports.expired-activity' ) active @endif"><a href="{{ route('reports.expired-activity') }}">Expired
                            Activities</a></li>
                    <li class="@if ($route_name=='reports.accreditation' ) active @endif"><a href="{{ route('reports.accreditation') }}">Accreditations</a>
                    </li>
                    <li class="@if ($route_name=='reports.jac-13' ) active @endif"><a href="{{ route('reports.jac-13') }}">JAC-13</a></li>
                    <li class="@if ($route_name=='reports.jac-14' ) active @endif"><a href="{{ route('reports.jac-14') }}">JAC-14</a></li>
                    <li class="@if ($route_name=='reports.jac-15' ) active @endif"><a href="{{ route('reports.jac-15') }}">JAC-15</a></li>
                    <li class="@if ($route_name=='reports.jac-17' ) active @endif"><a href="{{ route('reports.jac-17') }}">JAC-17</a></li>
                    <li class="@if ($route_name=='reports.jac-18' ) active @endif"><a href="{{ route('reports.jac-18') }}">JAC-18</a></li>
                    <li class="@if ($route_name=='reports.jac-19' ) active @endif"><a href="{{ route('reports.jac-19') }}">JAC-19</a></li>
                    <li class="@if ($route_name=='reports.jac-23' ) active @endif"><a href="{{ route('reports.jac-23') }}">JAC-23</a></li>
                    <li class="@if ($route_name=='reports.jac-24' ) active @endif"><a href="{{ route('reports.jac-24') }}">JAC-24</a></li>
                    <li class="@if ($route_name=='reports.jac-25' ) active @endif"><a href="{{ route('reports.jac-25') }}">JAC-25</a></li>
                </ul>
            </li>
            <li class="@if ($route_name=='status-report.index' || $route_name=='mof-report.index'
                || $route_name=='mof-report.edit' || $route_name=='jac-report.index' ) active @endif">
                <a href="#" class=""><i class="fa fa-flag"></i> <span class="nav-label">Weekly Reports</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if ($route_name=='status-report.index' ) active @endif"><a href="{{ route('status-report.index') }}">Status Report</a>
                    </li>
                    <li class="@if ($route_name=='mof-report.index' ||
                        $route_name=='mof-report.edit' ) active @endif"><a
                            href="{{ route('mof-report.index') }}">MOF Report</a>
                    </li>
                    <li class="@if ($route_name=='jac-report.index' ) active @endif"><a href="{{ route('jac-report.index') }}">JAC Report</a>
                    </li>
                </ul>
            </li>
            @if ($user_role == 'ADMIN')
                <li class="@if ($route_name=='general-setting.index' ) active @endif">
                    <a href="#" class=""><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="@if ($route_name=='general-setting.index' ) active @endif"><a
                                href="{{ route('general-setting.index') }}">General Settings</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </div>
</nav>
