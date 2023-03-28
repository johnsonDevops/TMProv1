<x-daysheet-layout>
    {{-- <div class="noprint"style="text-align:right;padding:15px 0px;">
                <form>
                    <input type="button" class="noprint btn btn-primary btn-lg" value="Print" onclick="window.print()" />
                </form>
            </div> --}}




<div style="text-align:right;">
<button onClick="window.print()" class="button-58 none" role="button">Print Me</button>
</div>

<style>
/* CSS */
.button-58 {
  align-items: center;
  background-color: #06f;
  border: 2px solid #06f;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  fill: #000;
  font-family: Inter,sans-serif;
  font-size: 16px;
  font-weight: 600;
  height: 48px;
  justify-content: center;
  letter-spacing: -.8px;
  line-height: 24px;
  min-width: 140px;
  outline: 0;
  padding: 0 5px;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  border-radius:10px;
}

.button-58:focus {
  color: #171e29;
  color: #fff;
}

.button-58:hover {
  background-color: #3385ff;
  border-color: #3385ff;
  fill: #06f;
  color: #fff;
}

.button-58:active {
  background-color: #3385ff;
  border-color: #3385ff;
  fill: #06f;
  color: #fff;
}

@media (min-width: 768px) {
  .button-58 {
    min-width: 170px;
  }
}
</style>
<style type="text/css" media="print">
@media print {
    @page {
        margin-top: 0;
        margin-bottom: 0;
    }

    body {
        padding-top: 72px;
        padding-bottom: 72px;
        font-size: 10px;

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

    .none {
        visibility: hidden;
        display: none;
    }
}
</style>
    {{-- -------------------------------------------------------------------------------- --}}
    <div class="">
        <div class="" style="display:flex; justify-content:center; width:100%; text-align:center;">

            <img src="{{ asset('/storage/img/bey-logo.png') }}" class="img-fluid" alt="Beyonce Logo" width="250px">

        </div>
    </div>

    {{-- -------------------------------------------------------------------------------- --}}





    <h1 {{-- style="
            text-align:center;
            font-weight:bold;
            text-transform:capitalize;
            text-xl
            margin-bottom:40px;
            padding-bottom:40px;
            padding-bottom:0;
            psdding-bottom:0;
            margin-left:0;
            margin-right:0;
            padding-left:0;
            padding-right:0;
            " --}} style="font-size:20px;font-weight:bold;text-align:center;padding:16px 0px 20px 0;">

            {{ \Carbon\Carbon::parse($daysheet->date)->format('F j, Y') }}<br>
        @isset($daysheet->event->venue->name)
            {{ $daysheet->event->venue->name ?? '-----' }}
        @endisset
        
        {{-- @isset($daysheet->day_type) || {{ $daysheet->day_type ?? '---' }} Day @else || {{ $daysheet->event->day_type ?? '---' }} Day @endisset --}}
        @isset($daysheet->day_type)
            | {{ str_replace('_', ' ', $daysheet->day_type) ?? '---' }} Day
        @else
            | {{ str_replace('_', ' ', $daysheet->event->day_type) ?? '---' }} Day
        @endisset
    </h1>


    {{-- --------- --}}
    <style>
        /* .schedule div:nth-child(odd) {
            background-color: rgb(241 245 249);
        } */
    </style>
    @if (!empty($daysheet->schedule))



        {{-- --------- --}}

        <div class="schedule bg-white overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach ($daysheet->schedule as $schedule)
                    <li>
                        <div
                            class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="px-4 pt-2 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="leading-5 font-semibold text-gray-900" style="padding-right:20px;">
                                        {{ $schedule['event_name'] ?? '' }}
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <span class="px-2 inline-flex leading-5 font-semibold">
                                            {{ $schedule['event_start_time'] ? \Carbon\Carbon::parse($schedule['event_start_time'])->format('g:i a') : '' }} -
                                            {{ $schedule['event_end_time'] ? \Carbon\Carbon::parse($schedule['event_end_time'])->format('g:i a') : '' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="mt-2 flex items-center leading-5 text-gray-500 sm:mt-0">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
    @endif


    {{-- -------------------------------------------------------------------------------- --}}
    @isset($daysheet->notes)
        <h3 class="mb-0">Notes</h3>
        <div class="table mt-0" style="display:table; width:100%;">
            <div class="tr" style="display:table-row;">
                <div class="td" style="display:table-cell;text-align:left;">

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
            <div class="td fs-6 text-center"
                style="display:table-cell;text-align:left;color:#888;font-size:11px !important; text-align:center;">
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
















</x-daysheet-layout>
