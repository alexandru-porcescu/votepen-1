@extends('layouts.backend-layout')

@section('title')
    Admin Panel
@endsection

@section('content')

<section class="section container">
    <div class="columns is-multiline is-mobile">
        <div class="column is-half statistics">
            <h1 class="title">
                Analytics
            </h1>
            
            <div id="anychart-embed-column-chart" class="anychart-embed anychart-embed-column-chart">
            <script src="https://cdn.jsdelivr.net/npm/votepen@16.0.0/js/anychart-base.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/votepen@14.0.0/js/anychart-ui.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/votepen@14.0.0/js/anychart-exports.min.js"></script>
            <div id="ac_style_column-chart" style="display:none;">
            html, body, #container {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }
            </div>
            <script>(function(){
            function ac_add_to_head(el){
            	var head = document.getElementsByTagName('head')[0];
            	head.insertBefore(el,head.firstChild);
            }
            function ac_add_link(url){
            	var el = document.createElement('link');
            	el.rel='stylesheet';el.type='text/css';el.media='all';el.href=url;
            	ac_add_to_head(el);
            }
            function ac_add_style(css){
            	var ac_style = document.createElement('style');
            	if (ac_style.styleSheet) ac_style.styleSheet.cssText = css;
            	else ac_style.appendChild(document.createTextNode(css));
            	ac_add_to_head(ac_style);
            }
            ac_add_link('https://cdn.jsdelivr.net/npm/votepen@15.0.0/css/anychart-ui.min.css');
            ac_add_link('https://cdn.jsdelivr.net/npm/votepen@15.0.0/css/anychart-font.css');
            ac_add_style(document.getElementById("ac_style_column-chart").innerHTML);
            ac_add_style(".anychart-embed-column-chart{width:600px;height:450px;}");
            })();</script>
            <div id="container"></div>
            <script>
            anychart.onDocumentReady(function() {
                // create column chart
                var chart = anychart.column();
            
                // set chart title
                chart.title('VotePen\'s Analytics Overtime');
            
                // set chart data
                chart.data([
                    {x: 'REG', value: {{ $usersTotal }}},
                    {x: 'AU ', value: {{ $activeUsersTotal }}},
                    {x: 'SUB', value: {{ $submissionsTotal }}},
                    {x: 'CMT', value: {{ $commentsTotal }}},
                    {x: 'CHL', value: {{ $categoriesTotal }}},
                    {x: 'SUBs', value: {{ $subscriptionsTotal }}},
                    {x: 'MSG', value: {{ $messagesTotal }}},
                    {x: 'SV', value: {{ $submissionVotesTotal }}},
                    {x: 'CV', value: {{ $commentVotesTotal }}}
                ]);
            
                // set container id for the chart
                chart.container('container');
            
                // initiate chart drawing
                chart.draw();
            });
            </script>
        </div>
        </div>

        <div class="column is-half">
        	<h1 class="title">
        		Statistics
        	</h1>

			<table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th></th>
                        <th>Today</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            Registers
                        </td>
                        <td>
                            {{ $usersToday }}
                        </td>
                        <td>
                            {{ $usersTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Active Users
                        </td>
                        <td>
                            {{ $activeUsersToday }}
                        </td>
                        <td>
                            {{ $activeUsersTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Submissions
                        </td>
                        <td>
                            {{ $submissionsToday }}
                        </td>
                        <td>
                            {{ $submissionsTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Comments
                        </td>
                        <td>
                            {{ $commentsToday }}
                        </td>
                        <td>
                            {{ $commentsTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Channels
                        </td>
                        <td>
                            {{ $categoriesToday }}
                        </td>
                        <td>
                            {{ $categoriesTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Subscriptions
                        </td>
                        <td>
                            {{ $subscriptionsToday }}
                        </td>
                        <td>
                            {{ $subscriptionsTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Messages
                        </td>
                        <td>
                            {{ $messagesToday }}
                        </td>
                        <td>
                            {{ $messagesTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Reports
                        </td>
                        <td>
                            {{ $reportsToday }}
                        </td>
                        <td>
                            {{ $reportsTotal }}
                        </td>
                    </tr>

                	<tr>
                        <td>
                            Submission Votes
                        </td>
                        <td>
                            {{ $submissionVotesToday }}
                        </td>
                        <td>
                            {{ $submissionVotesTotal }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Comment Votes
                        </td>
                        <td>
                            {{ $commentVotesToday }}
                        </td>
                        <td>
                            {{ $commentVotesTotal }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

	<br>

    <div class="columns is-multiline is-mobile">
    	<div class="column is-full">
            <h1 class="title">
                Latest Activities
            </h1>

            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>By</th>
                        <th>Country</th>
                        <th>Device</th>
                        <th>OS</th>
                        <th>Browser</th>
                        <th>IP</th>
                        <th>At</th>
                    </tr>
                </thead>

                <tbody>
                    {{ $activities->links() }}

                    @foreach($activities as $activity)
                        <tr>
                            <td>
                                <a href="{{ url()->current() }}?name={{ $activity->name }}">
                                    {{ $activity->name }}
                                </a>
                            </td>
                            <td>
                                <a href="/backend/users/{{ $activity->owner->username }}">
                                    <img width="30" class="margin-right-half" src="{{ $activity->owner->avatar }}"
                                         alt="{{ $activity->owner->username }}">
                                </a>

                                <a href="{{ url()->current() }}?user_id={{ $activity->owner->id }}">
                                    {{ $activity->owner->username }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ url()->current() }}?country={{ $activity->country }}">
                                    <span class="tag">{{ $activity->country ?? 'unknown' }}</span>
                                </a>
                            </td>

                            <td>
                                <a href="{{ url()->current() }}?device={{ $activity->device }}">
                                    <span class="tag">{{ $activity->device ?? 'unknown' }}</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url()->current() }}?os={{ $activity->os }}">
                                    <span class="tag">{{ $activity->os ?? 'unknown' }}</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url()->current() }}?browser_name={{ $activity->browser_name }}">
                                    <span class="tag">{{ $activity->browser_name . ' ' . $activity->browser_version ?? 'unknown' }}</span>
                                </a>
                            </td>

                            <td>
                                <a href="{{ url()->current() }}?ip_address={{ $activity->ip_address }}">
                                    <span class="tag">{{ $activity->ip_address ?? 'unknown' }}</span>
                                </a>
                            </td>
                            <td>
                                <span class="tag">{{ $activity->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    	</div>
    </div>
</section>

@endsection
