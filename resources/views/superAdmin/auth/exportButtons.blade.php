@php
$app_logo = App\Models\Setting::first();
@endphp
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<div class="dropdown">
    @if (auth()->user()->hasRole('super admin'))
    <button class="btn btn-primary dropdown-toggle export-btns" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('Export')}}
    </button>
    @elseif(auth()->user()->hasRole('doctor'))
    <!-- <button class="btn btn-primary dropdown-toggle export-btns" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('Export')}}
    </button> -->
    <button class="doctor-btn">
        {{__('Export')}}
    </button>
    @endif
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item has-icon" href="" id="export_print">
            <span class="navi-icon">
                <i class="fa fa-print"></i>
            </span>
            <span class="navi-text ml-2">{{__('Print')}}</span>
        </a>

        <a class="dropdown-item has-icon" href="" id="export_copy">
            <span class="navi-icon">
                <i class="fa fa-copy"></i>
            </span>
            <span class="navi-text ml-2">{{__('Copy')}}</span>
        </a>

        <a class="dropdown-item has-icon" href="" id="export_excel">
            <span class="navi-icon">
                <i class="fa fa-file-excel"></i>
            </span>
            <span class="navi-text ml-2">{{__('Excel')}}</span>
        </a>

        <a class="dropdown-item has-icon" href="" id="export_csv">
            <span class="navi-icon">
                <i class="fa fa-file-csv"></i>
            </span>
            <span class="navi-text ml-2">{{__('CSV')}}</span>
        </a>

        <a class="dropdown-item has-icon" href="" id="export_pdf">
            <span class="navi-icon">
                <i class="fa fa-file-pdf"></i>
            </span>
            <span class="navi-text ml-2">{{__('PDF')}}</span>
        </a>
    </div>
</div>
