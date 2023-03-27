<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $a_party_daysheet->venue->name ?? 'Today\'s Day Sheet' }} {{ $adaysheet->date ?? '' }}</title>
    <link href="storage/css/print.css" rel="stylesheet">

    <style type="text/css" media="print">
        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 72px;
                padding-bottom: 72px;
                font-size: 11px;

            }

            .page-break {
                page-break-after: always;
            }

            .table {
                display: table;
            }

            .tr {
                display: table-row;
            }

            .td {
                display: table-cell;
            }

            .noprint {
                visibility: hidden;
                display: none;
            }
        }
    </style>
</head>

<body style="background-color:white">


    <div class="container" style="max-width:650px;">

        {{-- <div class="noprint"style="text-align:right;padding:15px 0px;">
                <form>
                    <input type="button" class="noprint btn btn-primary btn-lg" value="Print" onclick="window.print()" />
                </form>
            </div> --}}


        <div class="table" style="display:table; width:100%;">
            <div class="tr" style="display:table-row;">
                <div class="td"
                    style="display:table-cell; text-align:center;padding-bottom:2px;padding-bottom:10px;">

                    <img src="{{ asset('public/storage/img/bey-logo.png') }}" class="img-fluid" alt="Beyonce Logo" width="320px">

                </div>
            </div>
        </div>

        {{-- -------------------------------------------------------------------------------- --}}


        <h2
            style="
            text-align:center;
            font-weight:bold;
            text-transform:capitalize;
            margin-bottom:20px;
            padding-bottom:40px;
            padding-bottom:0;
            psdding-bottom:0;
            margin-left:0;
            margin-right:0;
            padding-left:0;
            padding-right:0;
            ">
            @isset($daysheet->event->venue->name){{ $daysheet->event->venue->name ?? '-----' }}<br>@endisset
            {{ \Carbon\Carbon::parse($daysheet->date)->format('F j, Y') }}
            {{-- @isset($daysheet->day_type) || {{ $daysheet->day_type ?? '---' }} Day @else || {{ $daysheet->event->day_type ?? '---' }} Day @endisset --}}
            @isset($daysheet->day_type) || {{ str_replace('_', ' ', $daysheet->day_type) ?? '---' }} Day @else || {{ str_replace('_', ' ', $daysheet->event->day_type) ?? '---' }} Day @endisset


            {{-- @isset($daysheet->day_type)&nbsp; || &nbsp; {{ $daysheet->day_type ?? '---' }} Day @endisset --}}
        </h2>


        {{-- -------------------------------------------------------------------------------- --}}


        <div class="table" style="display:table; width:100%; margin-top:40px; table-layout:fixed;" width=100>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:left; width:70%;">Event</th>
                        <th scope="col" style="text-align:right; width:15%;">Start</th>
                        <th scope="col" style="text-align:right; width:15%;">End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daysheet->schedule as $schedule)
                        <tr>
                            <td style="width:70% font-size:15px; padding: 10px 20px 10px 0; border-bottom: 1px solid #d3d3d3;">
                                {{ $schedule['event_name'] ?? '-----' }}</td>
                            <td
                                style="width:15%; font-size:15px; padding: 10px 0;min-width: 80px;text-align:right; border-bottom: 1px solid #d3d3d3;">
                                {{ $schedule['event_start_time'] ?? '-----' }}</td>
                            <td
                                style="width:15%; font-size:15px; padding: 10px 0;min-width: 80px; text-align:right; border-bottom: 1px solid #d3d3d3;">
                                {{ $schedule['event_end_time'] ?? '-----' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <br>
        {{-- -------------------------------------------------------------------------------- --}}
        @isset($daysheet->notes)
            <h3 class="mb-0">Notes</h3>
            <div class="table mt-0" style="display:table; width:100%;">
                <div class="tr" style="display:table-row;">
                    <div class="td" style="display:table-cell;text-align:left;font-size:15px;">

                        {!! $daysheet->notes ?? '...' !!}<br>

                    </div>
                </div>
            </div>
        @endisset
        {{-- -------------------------------------------------------------------------------- --}}

        <hr>
        <div class="table" style="display:table; width:100%;">
            <div class="tr" style="display:table-row;">
                @isset($daysheet->event->venue->name)
                    <div class="td" style="display:table-cell; text-align:center;">
                        <span style="font-weight:bold; text-decoration:underline;">Venue</span> <br>
                        <span style="font-weight:bold;">{{ $daysheet->event->venue->name ?? '-----' }} </span> <br>
                        {{ $daysheet->event->venue->addr ?? '...' }}<br>
                        {{ $daysheet->event->venue->city ?? '...' }}
                        {{ $daysheet->event->venue->state ?? '...' }}
                        {{ $daysheet->event->venue->country ?? '...' }}
                        {{ $daysheet->event->venue->zip ?? '...' }}
                    </div>
                @endisset


                @isset($daysheet->hotel1->name)
                    <div class="td" style="display:table-cell;text-align:center;">
                        <span style="font-weight:bold; text-decoration:underline;">Hotel</span> <br>
                        <span style="font-weight:bold;">{{ $daysheet->hotel1->name ?? '-----' }}</span> <br>
                        {{ $daysheet->hotel1->addr ?? '-----' }}<br>
                        {{ $daysheet->hotel1->city ?? '-----' }},
                        {{ $daysheet->hotel1->state ?? '-----' }}
                        {{ $daysheet->hotel1->zip ?? '-----' }}

                    </div>
                @endisset


                @isset($daysheet->hotel2->name)
                    <div class="td" style="display:table-cell; text-align:center;">
                        <span style="font-weight:bold; text-decoration:underline;">Hotel 2</span> <br>
                        <span style="font-weight:bold;">{{ $daysheet->hotel2->name ?? '-----' }}</span> <br>
                        {{ $daysheet->hotel2->addr ?? '-----' }}<br>
                        {{ $daysheet->hotel2->city ?? '-----' }},
                        {{ $daysheet->hotel2->state ?? '-----' }}
                        {{ $daysheet->hotel2->zip ?? '-----' }}
                    </div>
                @endisset


            </div>
        </div>

        <hr>

        {{-- -------------------------------------------------------------------------------- --}}

        <div class="table" style="display:table; width:100%;">
            <div class="tr" style="display:table-row;">
                <div class="td fs-6 text-center" style="display:table-cell;text-align:left;color:#888;font-size:11px !important;">
                    {{-- Updated: {{ $daysheet->updated_at ?? '...' }} --}}
                    Generated:
                    @php
                        date_default_timezone_set('America/New_York');
                        echo date('D M d, Y @ h:iA');
                    @endphp
                    EST.
                </div>
                <div class="td" style="display:table-cell;text-align:right;font-size:10px;color:#888;">

                </div>
            </div>
        </div>


        {{-- -------------------------------------------------------------------------------- --}}










    </div>





</body>

</html>
