<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{{route('dashboard')}}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">{{optional($setting)->company_name}}<span class="font-w400"></span></span>
        </a>
        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
        <ul class="nav-main">
                @if($user->hasPermissionTo('dashboard.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('dashboard')}}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                @endif
                @if($user->hasPermissionTo('settings') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('admin.settings')}}">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>
                @endif

                @if($user->hasPermissionTo('owners.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('owners.view')}}">
                        <i class="nav-main-link-icon fas fa-walking"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Owners</span></span>
                    </a>
                </li>
                @endif
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-red-river"></i>
                        <span class="nav-main-link-name">Owners Transaction</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @if($user->hasPermissionTo('owners.transaction.create') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('owners.withdraw.balance')}}">
                                <span class="nav-main-link-name">Withdraw Balance</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('owners.transaction.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('owners.transactions.index')}}">
                                <span class="nav-main-link-name">View Transaction</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                
                @if($user->hasPermissionTo('crm.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('admin.crm')}}">
                        <i class="nav-main-link-icon fas fa-user-friends"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">CRM</span></span>
                    </a>
                </li>
                @endif

                @if($user->hasPermissionTo('role.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('admin.role')}}">
                        <i class="nav-main-link-icon fab fa-r-project"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Roles</span></span>
                    </a>
                </li>
                @endif
                @if($user->hasPermissionTo('country.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('countries')}}">
                        <i class="nav-main-link-icon fab fa-gg"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Countries</span></span>
                    </a>
                </li>
                @endif
                @if($user->hasPermissionTo('visa.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('visa')}}">
                        <i class="nav-main-link-icon fab fa-gitlab"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Visa</span></span>
                    </a>
                </li>
                @endif

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-red-river"></i>
                        <span class="nav-main-link-name">Passports</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @if($user->hasPermissionTo('passport.create') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('passport.create')}}">
                                <span class="nav-main-link-name">Add Passport</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('passport.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('passport.index')}}">
                                <span class="nav-main-link-name">All Passports</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if($user->hasPermissionTo('agents.view') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('agent.index')}}">
                        <i class="nav-main-link-icon fab fa-amilia"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Agents</span></span>
                    </a>
                </li>
                @endif
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Work</span>
                    </a>
                    <ul class="nav-main-submenu">
                    @if($user->hasPermissionTo('work.create') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('work.create')}}">
                                <span class="nav-main-link-name">Add New Work</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('work.all.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('work.index')}}">
                                <span class="nav-main-link-name">All Work</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Income</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @if($user->hasPermissionTo('income.create') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('income.create', 0)}}">
                                <span class="nav-main-link-name">Add Income</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('income.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('income.index')}}">
                                <span class="nav-main-link-name">Income History</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-arrow-down"></i>
                        <span class="nav-main-link-name">Expenses</span>
                    </a>
                    <ul class="nav-main-submenu">
                        @if($user->hasPermissionTo('expenses.category.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('expense.category.index')}}">
                                <span class="nav-main-link-name">Expense Category</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('expenses.create') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('expense.create')}}">
                                <span class="nav-main-link-name">Add Expense</span>
                            </a>
                        </li>
                        @endif
                        @if($user->hasPermissionTo('expenses.view') || $user->type == 'admin')
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('expense.index')}}">
                                <span class="nav-main-link-name">Expenses History</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if($user->hasPermissionTo('owners.report') || $user->type == 'admin')
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Report</span>
                    </a>
                    <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('report.expenses.ledger')}}">
                                <span class="nav-main-link-name">Expenses Ledger</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('report.income.ledger')}}">
                                <span class="nav-main-link-name">Income Ledger</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                @endif
                
                

                
            </ul>
        </div>
    </div>
</nav>

