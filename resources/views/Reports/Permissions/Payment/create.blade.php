

    {{-- @extends('Layout.web') --}}
    @extends(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null ? 'Layout.web' : 'Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.report') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.Permission_receive_cash') }}  </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    {{-- <button class="btn btn-primary waves-effect waves-light">{{ __('titles.cancel') }}</button>
                    <button class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button> --}}
                    <a href="{{url(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null ? '/' : '/Company')}}" class="btn btn-primary waves-effect waves-light">{{ __('titles.cancel') }}</a>

                </div>
            <form action="{{url('/Permissions/Payment/Report/Fetch')}}" method="post">
                {{ csrf_field() }}
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h4 style="text-align:right">{{ __('titles.Permission_receive_cash') }}</h4>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright dir-rtl" >
                                <div class="chosen-select-single mg-b-20 dir-rtl" >
                                    <button class="btn btn-primary waves-effect waves-light">{{ __('titles.show_report') }}</button>
                                </div>
                                <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row row-ltr" style="margin-top:5px;">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                        <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                                    @if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110)
                                                        <select required data-placeholder="Choose a Country..." name="company_id" class="selectpicker" id="company_id" data-live-search="true" data-width="100%" tabindex="-1">
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach ($Companies as $Company)
                                                                <option value="{{$Company->id}}">{{$Company->company_official_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        {{$Companies[0]->company_official_name}}
                                                    <input id="company_id" type="hidden" value="{{$Companies[0]->id}}" />
                                                    @endif

                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">{{ __('titles.company') }}</label>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" name="exit_permission_code" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">{{ __('titles.permission_no') }}</label>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="date" name="from_date" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2"><b>{{ __('titles.date_from') }}</b></label>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="date" name="to_date" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2"><b>{{ __('titles.date_to') }}</b></label>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <select data-placeholder="Choose a Country..." name="person_id" id="persons" class="selectpicker" data-live-search="true" data-width="100%" tabindex="-1">
                                                        <option value="" selected disabled>{{ __('titles.select') }}</option>
                                                        @foreach ($Persons as $Person)
                                                            <option value="{{$Person->id}}">{{$Person->person_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                        <input class="radio-checked" type="radio" checked="" value="101" id="firsr_check" name="person_type_id">
                                                        <label><b> {{ __('titles.suppliers') }} </b></label>
                                                        <input class="" type="radio" value="102" id="optionsRadios2" name="person_type_id">
                                                        <label><b> {{ __('titles.employees') }} </b></label>
                                                        <input class="" type="radio" value="100" id="optionsRadios3" name="person_type_id">
                                                        <label><b> {{ __('titles.clients') }} </b></label>
                                                        <input class="" type="radio" value="" id="optionsRadios4457" name="person_type_id">
                                                        <label><b> {{ __('titles.all') }} </b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .dropzone.dz-clickable .dz-message {
        display: none;
    }
</style>
@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
        @section('scripts')
        @if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110)
        <script>
            $('#company_id').change(function(){
                $('#firsr_check').prop("checked", true);
                var Company_id = $('#company_id').val();
                fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}",Company_id);
            });
        </script>
        @endif
        <script>
            $(document).ready(function(){
                debugger;
                $('#persons').selectpicker();
            })

            $('input[name=person_type_id]').change(function() {
                debugger;
                var Company_id = $('#company_id').val();
                if($('input[name=person_type_id]:checked').val() == 100){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Clients')}}",Company_id);
                }else if($('input[name=person_type_id]:checked').val() == 101){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}",Company_id);
                }else if($('input[name=person_type_id]:checked').val() == 102){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Employees')}}",Company_id);
                }else{
                    $('#persons').attr('disabled','disabled');
                    $('#persons').selectpicker('refresh');
                }
            })
            function fetchPersons(url, compid) {
                $.ajax({
                    type:'GET',
                    url:url,
                    data:{
                        compid : compid
                    },
                        success:function(data) {
                            $('#persons').attr('disabled',false);
                            $('#persons').html(data);
                            $('#persons').selectpicker('refresh');
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                    });
            }
        </script>
    @endsection
 