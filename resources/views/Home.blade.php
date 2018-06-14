@extends('layout.app')

@section('title', 'Nieuwe Reservering')

@section('content')


  
</form> 

<div class="main">
    <div class="container">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Statistieken
                </div>
                <div class="panel-body">
                    <form action="{{ url('/day') }}" method="post" name="form1" class="form-horizontal">
                        {{ csrf_field() }}

                          <select name="IDValue[]" multiple="multiple">
                            @foreach ($rooms as $room)
                                  <option name="IDValue[]" value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                          </select>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Datum</label>
                            <div class="col-sm-6 input-group date" id="datetimepicker1">
                                <input type="text" name="date" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
                        </div>
                       <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Datum</label>
                            <div class="col-sm-6 input-group date" id="datetimepicker2">
                                <input type="text" name="date" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            daysOfWeekDisabled: [0,6],
            viewMode: 'days',
            showTodayButton: true
        });
        $('#datetimepicker2').datetimepicker({
            format: 'HH:mm',
        });
        $('#datetimepicker3').datetimepicker({
            format: 'HH:mm',
        });
        $("#datetimepicker2").on("dp.change", function (e) {
            $('#datetimepicker3').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker3").on("dp.change", function (e) {
            $('#datetimepicker2').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
@endsection